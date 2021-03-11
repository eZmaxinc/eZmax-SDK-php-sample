<?php

/**
 * This sample shows how to add an Ezsigndocument to an Ezsigndocument
 * In this example, we will create a single Ezsigndocument but you can create more than one by adding more objects to the array.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsigndocumentApi;
use eZmaxAPI\Model\EzsigndocumentCreateObjectV1Request;
use eZmaxAPI\Model\EzsigndocumentRequest;


/*
 * The pkiEzsignfolderID to which we want to attach the document.
 * This value was returned after a successful Ezsignfolder creation.
 */
 
define ('SAMPLE_pkiEzsignfolderID', 656);

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectEzsigndocumentApi $objObjectEzsigndocumentApi
 */
$objObjectEzsigndocumentApi = new ObjectEzsigndocumentApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contains all the objects we want to create.
$a_objEzsigndocumentCreateObjectV1Request = [];

/********************************** EXAMPLE Ezsigndocument Only Base64 Pdf (Begin) **********************************/

/**
 * This is the object that will contains either a objEzsigndocument or a objEzsigndocumentCompound
 * depending on the type of object you want to create.
 * @var \eZmaxAPI\Model\EzsigndocumentCreateObjectV1Request $objEzsigndocumentCreateObjectV1Request
 */
$objEzsigndocumentCreateObjectV1Request = new EzsigndocumentCreateObjectV1Request ();

/**
 * For this example, let's create an objEzsigndocument 
 * @var \eZmaxAPI\Model\EzsigndocumentRequest $objEzsigndocumentRequest
 */
$objEzsigndocumentRequest = new EzsigndocumentRequest();

//This will link the Ezsigndocument to an existing Ezsignfolder. This value was returned after a successful Ezsignfolder creation. 
$objEzsigndocumentRequest->setFkiEzsignfolderID(SAMPLE_pkiEzsignfolderID);

/*
 * The language in which the evidence file will be. Each signer will still receive emails and see interface in their own language.
 */
$objEzsigndocumentRequest->setFkiLanguageID(2);

//Set the Ezsigndocument name. The name of the document that will be presented to Ezsignsigners
$objEzsigndocumentRequest->setSEzsigndocumentName('Important contract');

//The Ezsignsigners will have up to that specific date/time to sign the documents. In this example, we'll give them 5 days from now
$dtEzsigndocumentDuedate = date('Y-m-d H:i:s', strtotime("+5 days"));
$objEzsigndocumentRequest->setDtEzsigndocumentDuedate($dtEzsigndocumentDuedate);

//For this sample, we'll take a file from the hard disk, encode it in base64 and send it with the request
$objEzsigndocumentRequest->setEEzsigndocumentFormat('Pdf');
$objEzsigndocumentRequest->setEEzsigndocumentSource('Base64');
$objEzsigndocumentRequest->setSEzsigndocumentBase64(base64_encode(file_get_contents(__DIR__ . '/../../_resources/documents/Sample Document.pdf')));


// Since we created a objEzsigndocument, set the proper value in the EzsigndocumentCreateObjectV1Request object
$objEzsigndocumentCreateObjectV1Request->setObjEzsigndocument($objEzsigndocumentRequest);

//Finally push the request to the array of objects to save
$a_objEzsigndocumentCreateObjectV1Request [] = $objEzsigndocumentCreateObjectV1Request;

/********************************** EXAMPLE Ezsigndocument Only Base64 Pdf (End) **********************************/

try {
	
    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
    //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($a_objEzsigndocumentCreateObjectV1Request), JSON_PRETTY_PRINT).PHP_EOL;
    
    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server 
     * @var \eZmaxAPI\Model\EzsigndocumentCreateObjectV1Response $objEzsigndocumentCreateObjectV1Response
     */
    $objEzsigndocumentCreateObjectV1Response = $objObjectEzsigndocumentApi->ezsigndocumentCreateObjectV1($a_objEzsigndocumentCreateObjectV1Request);
    
    /*
     * The server will return the unique pkiEzsigndocumentID of each created Ezsigndocument in the same order they were in the $a_objEzsigndocumentCreateObjectV1Request array.
     * You can keep these values for future requests to check the status or other needs
     */
    foreach ($objEzsigndocumentCreateObjectV1Response->getMPayload()->getAPkiEzsigndocumentID() as $pkiEzsigndocumentID) {
        echo "Ezsigndocument created with pkiEzsigndocumentID = $pkiEzsigndocumentID".PHP_EOL;
    }
    
    //Uncomment this line to ouput complete response
    //print_r($objEzsigndocumentCreateObjectV1Response);
    
}
catch (Exception $e) {
    print_r($e);
}

?>