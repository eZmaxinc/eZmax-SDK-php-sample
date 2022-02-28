<?php

/**
 * This sample shows how to add an Ezsigndocument to an Ezsigndocument
 * In this example, we will create a single Ezsigndocument but you can create more than one by adding more objects to the array.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsigndocumentApi;
use eZmaxAPI\Model\EzsigndocumentCreateObjectV2Request;
use eZmaxAPI\Model\EzsigndocumentRequestCompound;


/*
 * The pkiEzsignfolderID to which we want to attach the document.
 * This value was returned after a successful Ezsignfolder creation.
 */
 
define ('SAMPLE_pkiEzsignfolderID', 1034);

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectEzsigndocumentApi $objObjectEzsigndocumentApi
 */
$objObjectEzsigndocumentApi = new ObjectEzsigndocumentApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contains all the objects we want to create.
$a_objEzsigndocumentRequestCompound = [];

/********************************** EXAMPLE Ezsigndocument Only Base64 Pdf (Begin) **********************************/

/**
 * This is the object that will contains an array of objEzsigndocumentRequestCompound you want to create.
 * @var \eZmaxAPI\Model\EzsigndocumentCreateObjectV2Request $objEzsigndocumentCreateObjectV2Request
 */
$objEzsigndocumentCreateObjectV2Request = new EzsigndocumentCreateObjectV2Request ();

/**
 * For this example, let's create an objEzsigndocument 
 * @var \eZmaxAPI\Model\EzsigndocumentRequestCompound $objEzsigndocumentRequestCompound
 */
$objEzsigndocumentRequestCompound = new EzsigndocumentRequestCompound();

//This will link the Ezsigndocument to an existing Ezsignfolder. This value was returned after a successful Ezsignfolder creation. 
$objEzsigndocumentRequestCompound->setFkiEzsignfolderID(SAMPLE_pkiEzsignfolderID);

/*
 * The language in which the evidence file will be. Each signer will still receive emails and see interface in their own language.
 */
$objEzsigndocumentRequestCompound->setFkiLanguageID(2);

//Set the Ezsigndocument name. The name of the document that will be presented to Ezsignsigners
$objEzsigndocumentRequestCompound->setSEzsigndocumentName('Important contract');

//The Ezsignsigners will have up to that specific date/time to sign the documents. In this example, we'll give them 5 days from now
$dtEzsigndocumentDuedate = date('Y-m-d H:i:s', strtotime("+5 days"));
$objEzsigndocumentRequestCompound->setDtEzsigndocumentDuedate($dtEzsigndocumentDuedate);

//For this sample, we'll take a file from the hard disk, encode it in base64 and send it with the request
$objEzsigndocumentRequestCompound->setEEzsigndocumentFormat('Pdf');
$objEzsigndocumentRequestCompound->setEEzsigndocumentSource('Base64');
$objEzsigndocumentRequestCompound->setSEzsigndocumentBase64(base64_encode(file_get_contents(__DIR__ . '/../../_resources/documents/Sample Document.pdf')));

//Finally push the objEzsigndocument to the array of objects to save
$a_objEzsigndocumentRequestCompound [] = $objEzsigndocumentRequestCompound;

// Set the array containing all objEzsigndocumentRequestCompound in the EzsigndocumentCreateObjectV2Request object
$objEzsigndocumentCreateObjectV2Request->setAObjEzsigndocument($a_objEzsigndocumentRequestCompound);

/********************************** EXAMPLE Ezsigndocument Only Base64 Pdf (End) **********************************/

try {
	
    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
    //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($objEzsigndocumentCreateObjectV2Request), JSON_PRETTY_PRINT).PHP_EOL;
    
    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server 
     * @var \eZmaxAPI\Model\EzsigndocumentCreateObjectV2Response $objEzsigndocumentCreateObjectV2Response
     */
    $objEzsigndocumentCreateObjectV2Response = $objObjectEzsigndocumentApi->ezsigndocumentCreateObjectV2($objEzsigndocumentCreateObjectV2Request);
    
    /*
     * The server will return the unique pkiEzsigndocumentID of each created Ezsigndocument in the same order they were in the $a_objEzsigndocumentRequestCompound array.
     * You can keep these values for future requests to check the status or other needs
     */
    foreach ($objEzsigndocumentCreateObjectV2Response->getMPayload()->getAPkiEzsigndocumentID() as $pkiEzsigndocumentID) {
        echo "Ezsigndocument created with pkiEzsigndocumentID = $pkiEzsigndocumentID".PHP_EOL;
    }
    
    //Uncomment this line to ouput complete response
    //print_r($objEzsigndocumentCreateObjectV2Response);
    
}
catch (Exception $e) {
    print_r($e);
}

?>