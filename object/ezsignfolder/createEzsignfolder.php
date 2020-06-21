<?php

use \eZmaxAPI\Client\Model;
use eZmaxAPI\Client\Model\EzsignfolderCreateObjectV1Request;
use eZmaxAPI\Client\Model\EzsignfolderRequest;

/**
 * This sample shows how to create one or more ezsignfolder.
 * In this example, we will create many ezsign folders at the same time to show all possibilities.
 * If you want to create only one, you would add only one object to the array
 * 
 */

require_once (__DIR__ . '/../../connector.php');

$objEzsignfolderApi = new eZmaxAPI\Client\Api\EzsignfolderApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contain all the objects we want to create.
$a_objEzsignfolderCreateObjectV1Request = [];

/********************************** EXAMPLE Ezsignfolder Only (Begin) **********************************/

/**
 * This is the object that will contain either a objEzsignfolder or a objEzsignfolderCompound
 * depending on the type of object you want to create.
 * @var \eZmaxAPI\Client\Model\EzsignfolderCreateObjectV1Request $objEzsignfolderCreateObjectV1Request
 */
$objEzsignfolderCreateObjectV1Request = new EzsignfolderCreateObjectV1Request ();

/**
 * For this example, let's create an objEzsignfolder 
 * @var \eZmaxAPI\Client\Model\EzsignfolderRequest $objEzsignfolderRequest
 */
$objEzsignfolderRequest = new EzsignfolderRequest();

//This will determine in wich type of folder the folder will be. 
$objEzsignfolderRequest->setFkiEzsignfoldertypeID(1);

//Set if you need TSA or not. Please refer to API Documentation
$objEzsignfolderRequest->setFkiEzsigntsarequirementID(1);

/*
 * The language in which the signing process will happen (For evidence file for exemple). Each signer will still receive
 * emails and see interface in their own language.
 */
$objEzsignfolderRequest->setFkiLanguageID(2);

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
    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server 
     * @var \eZmaxAPI\Client\Model\EzsignfolderCreateObjectV1Response $x
     */
    $objEzsignfolderCreateObjectV1Response = $objEzsignfolderApi->ezsignfolderCreateObjectV1($a_objEzsignfolderCreateObjectV1Request);
    
    //Ouput complete response
    print_r($objEzsignfolderCreateObjectV1Response);
    
}
catch (Exception $e) {
    print_r($e);
}

?>