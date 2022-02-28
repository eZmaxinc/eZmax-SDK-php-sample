<?php

/**
 * This sample shows how to create one or more Ezsignfolder.
 * In this example, we will create a single Ezsignfolder but you can create more than one by adding more objects to the array.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsignfolderApi;
use eZmaxAPI\Model\EzsignfolderCreateObjectV2Request;
use eZmaxAPI\Model\EzsignfolderRequestCompound;

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectEzsignfolderApi $objObjectEzsignfolderApi
 */
$objObjectEzsignfolderApi = new ObjectEzsignfolderApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contains all the objects we want to create.
$a_objEzsignfolderRequestCompound = [];

/********************************** EXAMPLE Ezsignfolder Only (Begin) **********************************/

/**
 * This is the object that will contains an array of objEzsignfolderCompound you want to create.
 * @var \eZmaxAPI\Model\EzsignfolderCreateObjectV2Request $objEzsignfolderCreateObjectV2Request
 */
$objEzsignfolderCreateObjectV2Request = new EzsignfolderCreateObjectV2Request ();

/**
 * For this example, let's create an objEzsignfolder 
 * @var \eZmaxAPI\Model\EzsignfolderRequestCompound $objEzsignfolderRequestCompound
 */
$objEzsignfolderRequestCompound = new EzsignfolderRequestCompound();

//This will determine in wich type of folder the folder will be. 
$objEzsignfolderRequestCompound->setFkiEzsignfoldertypeID(1);

//Set if you need TSA or not. Please refer to API Documentation
$objEzsignfolderRequestCompound->setFkiEzsigntsarequirementID(1);

//Set the reminder frequency for Ezsign signers that haven't signed the document
$objEzsignfolderRequestCompound->setEEzsignfolderSendreminderfrequency('Daily');

//Set the "name" of the folder for easy reference
$objEzsignfolderRequestCompound->setSEzsignfolderDescription('Test eZsign Folder');

//Add extra notes to the folder (facultative)
$objEzsignfolderRequestCompound->setTEzsignfolderNote('An extra notes we can add to the ezsign folder');

//Finally push the request to the array of objects to save
$a_objEzsignfolderRequestCompound [] = $objEzsignfolderRequestCompound;

// Set the array containing all objEzsignfolderRequestCompound in the EzsignfolderCreateObjectV2Request object
$objEzsignfolderCreateObjectV2Request->setAObjEzsignfolder($a_objEzsignfolderRequestCompound);



/********************************** EXAMPLE Ezsignfolder Only (End) **********************************/

try {
    
    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
   //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($objEzsignfolderCreateObjectV2Request), JSON_PRETTY_PRINT).PHP_EOL;
    
    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server 
     * @var \eZmaxAPI\Model\EzsignfolderCreateObjectV2Response $objEzsignfolderCreateObjectV2Response
     */
    $objEzsignfolderCreateObjectV2Response = $objObjectEzsignfolderApi->ezsignfolderCreateObjectV2($objEzsignfolderCreateObjectV2Request);
    
    /*
     * The server will return the unique pkiEzsignfolderID of each created Ezsignfolder in the same order they were in the $a_objEzsignfolderRequestCompound array.
     * You can keep these values for future requests to check the status or other needs
     */
    foreach ($objEzsignfolderCreateObjectV2Response->getMPayload()->getAPkiEzsignfolderID() as $pkiEzsignfolderID) {
        echo "Ezsignfolder created with pkiEzsignfolderID = $pkiEzsignfolderID".PHP_EOL;
    }
    
    //Uncomment this line to ouput complete response
    //print_r($objEzsignfolderCreateObjectV2Response);
    
}
catch (Exception $e) {
    print_r($e);
}

?>