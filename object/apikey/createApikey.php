<?php

/**
 * This sample shows how to create an apikey for an user.
 * In this example, we will create a single apikey but you can create more than one by adding more objects to the array.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectApikeyApi;
use eZmaxAPI\Model\ApikeyCreateObjectV2Request;
use eZmaxAPI\Model\ApikeyRequestCompound;
use eZmaxAPI\Model\MultilingualApikeyDescription;


/*
 * The pkiUserID to which we want to create a new api key.
 * This value was returned after a successful user creation.
 */
 
define ('SAMPLE_pkiUserID', 3);

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectApikeyApi $objObjectApikeyApi
 */
$objObjectApikeyApi = new ObjectApikeyApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contains all the objects we want to create.
$a_objApikeyRequestCompound = [];

/**
 * This is the object that will contains an array of objApikeyRequestCompound you want to create.
 * @var \eZmaxAPI\Model\ApikeyCreateObjectV2Request $objApikeyCreateObjectV2Request
 */
$objApikeyCreateObjectV2Request = new ApikeyCreateObjectV2Request ();

/**
 * For this example, let's create an apikey 
 * @var \eZmaxAPI\Model\ApikeyRequestCompound $objApikeyRequestCompound
 */
$objApikeyRequestCompound = new ApikeyRequestCompound();

//This will link the Apikey to an existing user. This value was returned after a successful User creation. 
$objApikeyRequestCompound->setFkiUserID(SAMPLE_pkiUserID);

/**
 * Create an object containing all the translation for the description
 * @var \eZmaxAPI\Model\MultilingualApikeyDescription $objMultilingualApikeyDescription
 */
$objMultilingualApikeyDescription = new MultilingualApikeyDescription();

//Set the french description of the apikey.
$objMultilingualApikeyDescription->setSApikeyDescription1('Projet X');

//Set the english description of the apikey.
$objMultilingualApikeyDescription->setSApikeyDescription2('Project X');

//Set the translations object of the apikey.
$objApikeyRequestCompound->setObjApikeyDescription($objMultilingualApikeyDescription);

// Let's add the ApikeyRequestCompound to the array we wish to create
$a_objApikeyRequestCompound[] = $objApikeyRequestCompound;

//Finally we set the array of the request to the array containing all ApikeyRequestCompound
$objApikeyCreateObjectV2Request->setAObjApikey($a_objApikeyRequestCompound);

try {
	
    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
    //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($objApikeyCreateObjectV2Request), JSON_PRETTY_PRINT).PHP_EOL;
    
    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server 
     * @var \eZmaxAPI\Model\ApikeyCreateObjectV2Response $objApikeyCreateObjectV2Response
     */
    $objApikeyCreateObjectV2Response = $objObjectApikeyApi->apikeyCreateObjectV2($objApikeyCreateObjectV2Request);
    
    /*
     * The server will return a unique objApikeyResponse of each created Apikey in the same order they were in the 
	 * $objApikeyCreateObjectV2Request->a_objApikey array.
     * You can keep these values for future requests to check the status or other needs
     */
    foreach ($objApikeyCreateObjectV2Response->getMPayload()->getAObjApikey() as $objApikeyResponse) {
        echo 'ID: '.$objApikeyResponse->getPkiApikeyID().PHP_EOL;
        echo 'Token: '.$objApikeyResponse->getSComputedToken().PHP_EOL;
        echo 'Description (FR): '.$objApikeyResponse->getObjApikeyDescription()->getSApikeyDescription1().PHP_EOL;
        echo 'Description (EN): '.$objApikeyResponse->getObjApikeyDescription()->getSApikeyDescription2().PHP_EOL;
        echo 'User created by ID: '.$objApikeyResponse->getObjAudit()->getFkiUserIDCreated().PHP_EOL;
	    echo 'User modified by ID: '.$objApikeyResponse->getObjAudit()->getFkiUserIDModified().PHP_EOL;
    }
    
    //Uncomment this line to ouput complete response
    //print_r($objApikeyCreateObjectV2Response);
    
}
catch (Exception $e) {
    print_r($e);
}

?>