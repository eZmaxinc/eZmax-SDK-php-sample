<?php

/**
 * This sample shows how to create an apikey for an user.
 * In this example, we will create a single apikey but you can create more than one by adding more objects to the array.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectApikeyApi;
use eZmaxAPI\Model\ApikeyCreateObjectV1Request;
use eZmaxAPI\Model\ApikeyRequest;
use eZmaxAPI\Model\MultilingualApikeyDescription;


/*
 * The pkiUserID to which we want to create a new api key.
 * This value was returned after a successful user creation.
 */
 
define ('SAMPLE_pkiUserID', 11);

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectApikeyApi $objObjectApikeyApi
 */
$objObjectApikeyApi = new ObjectApikeyApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contains all the objects we want to create.
$a_objApikeyCreateObjectV1Request = [];

/**
 * This is the object that will contains either a objApikey or a objApikeyCompound
 * depending on the type of object you want to create.
 * @var \eZmaxAPI\Model\ApikeyCreateObjectV1Request $objApikeyCreateObjectV1Request
 */
$objApikeyCreateObjectV1Request = new ApikeyCreateObjectV1Request ();

/**
 * For this example, let's create an apikey 
 * @var \eZmaxAPI\Model\ApikeyRequest $objApikeyRequest
 */
$objApikeyRequest = new ApikeyRequest();

//This will link the Apikey to an existing user. This value was returned after a successful User creation. 
$objApikeyRequest->setFkiUserID(SAMPLE_pkiUserID);

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
$objApikeyRequest->setObjApikeyDescription($objMultilingualApikeyDescription);

// Since we created an apikey, set the proper value in the ApikeyCreateObjectV1Request object
$objApikeyCreateObjectV1Request->setObjApikey($objApikeyRequest);

//Finally push the request to the array of objects to save
$a_objApikeyCreateObjectV1Request [] = $objApikeyCreateObjectV1Request;

try {
	
    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
    //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($a_objApikeyCreateObjectV1Request), JSON_PRETTY_PRINT).PHP_EOL;
    
    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server 
     * @var \eZmaxAPI\Model\ApikeyCreateObjectV1Response $objApikeyCreateObjectV1Response
     */
    $objApikeyCreateObjectV1Response = $objObjectApikeyApi->apikeyCreateObjectV1($a_objApikeyCreateObjectV1Request);
    
    /*
     * The server will return a unique objApikeyResponse of each created Apikey in the same order they were in the $a_objApikeyCreateObjectV1Request array.
     * You can keep these values for future requests to check the status or other needs
     */
    foreach ($objApikeyCreateObjectV1Response->getMPayload()->getAObjApikey() as $objApikeyResponse) {
        echo 'ID: '.$objApikeyResponse->getPkiApikeyID().PHP_EOL;
        echo 'Token: '.$objApikeyResponse->getSComputedToken().PHP_EOL;
        echo 'Description (FR): '.$objApikeyResponse->getObjApikeyDescription()->getSApikeyDescription1().PHP_EOL;
        echo 'Description (EN): '.$objApikeyResponse->getObjApikeyDescription()->getSApikeyDescription2().PHP_EOL;
        echo 'User created by ID: '.$objApikeyResponse->getObjAudit()->getFkiUserIDCreated().PHP_EOL;
	    echo 'User modified by ID: '.$objApikeyResponse->getObjAudit()->getFkiUserIDModified().PHP_EOL;
    }
    
    //Uncomment this line to ouput complete response
    //print_r($objApikeyCreateObjectV1Response);
    
}
catch (Exception $e) {
    print_r($e);
}

?>