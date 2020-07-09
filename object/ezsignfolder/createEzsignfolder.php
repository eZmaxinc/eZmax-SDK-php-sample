<?php

/**
 * This sample shows how to create one or more Ezsignfolder.
 * In this example, we will create a single Ezsignfolder but you can create more than one by adding more objects to the array.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\EzsignfolderApi;
use eZmaxAPI\Model\EzsignfolderCreateObjectV1Request;
use eZmaxAPI\Model\EzsignfolderRequest;

require_once (__DIR__ . '/../../connector.php');

$objEzsignfolderApi = new EzsignfolderApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contain all the objects we want to create.
$a_objEzsignfolderCreateObjectV1Request = [];

/********************************** EXAMPLE Ezsignfolder Only (Begin) **********************************/

/**
 * This is the object that will contain either a objEzsignfolder or a objEzsignfolderCompound
 * depending on the type of object you want to create.
 * @var \eZmaxAPI\Model\EzsignfolderCreateObjectV1Request $objEzsignfolderCreateObjectV1Request
 */
$objEzsignfolderCreateObjectV1Request = new EzsignfolderCreateObjectV1Request ();

/**
 * For this example, let's create an objEzsignfolder 
 * @var \eZmaxAPI\Model\EzsignfolderRequest $objEzsignfolderRequest
 */
$objEzsignfolderRequest = new EzsignfolderRequest();

//This will determine in wich type of folder the folder will be. 
$objEzsignfolderRequest->setFkiEzsignfoldertypeID(1);

//Set if you need TSA or not. Please refer to API Documentation
$objEzsignfolderRequest->setFkiEzsigntsarequirementID(1);

//Set the reminder frequency for Ezsign signers that haven't signed the document
$objEzsignfolderRequest->setEEzsignfolderSendreminderfrequency('Daily');

//Set the "name" of the folder for easy reference
$objEzsignfolderRequest->setSEzsignfolderDescription('Test eZsign Folder');

//Add extra notes to the folder (facultative)
$objEzsignfolderRequest->setTEzsignfolderNote('An extra notes we can add to the ezsign folder');

// Since we created a objEzsignfolder, set the proper value in the EzsignfolderCreateObjectV1Request object
$objEzsignfolderCreateObjectV1Request->setObjEzsignfolder($objEzsignfolderRequest);

//Finally push the request to the array of objects to save
$a_objEzsignfolderCreateObjectV1Request [] = $objEzsignfolderCreateObjectV1Request;

/********************************** EXAMPLE Ezsignfolder Only (End) **********************************/

try {
    
    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
   //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($a_objEzsignfolderCreateObjectV1Request), JSON_PRETTY_PRINT).PHP_EOL;
    
    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server 
     * @var \eZmaxAPI\Model\EzsignfolderCreateObjectV1Response $objEzsignfolderCreateObjectV1Response
     */
    $objEzsignfolderCreateObjectV1Response = $objEzsignfolderApi->ezsignfolderCreateObjectV1($a_objEzsignfolderCreateObjectV1Request);
    
    /*
     * The server will return the unique pkiEzsignfolderID of each created Ezsignfolder in the same order they were in the $a_objEzsignfolderCreateObjectV1Request array.
     * You can keep these values for future requests to check the status or other needs
     */
    foreach ($objEzsignfolderCreateObjectV1Response->getMPayload()->getAPkiEzsignfolderID() as $pkiEzsignfolderID) {
        echo "Ezsignfolder created with pkiEzsignfolderID = $pkiEzsignfolderID".PHP_EOL;
    }
    
    //Uncomment this line to ouput complete response
    //print_r($objEzsignfolderCreateObjectV1Response);
    
}
catch (Exception $e) {
    print_r($e);
}

?>