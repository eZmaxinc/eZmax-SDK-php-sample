<?php

/**
 * This sample shows how to create one or more Ezsignsignature.
 * In this example, we will create a single Ezsignsignature but you can create more than one by adding more objects to the array.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\EzsignsignatureApi;
use eZmaxAPI\Model\EzsignsignatureCreateObjectV1Request;
use eZmaxAPI\Model\EzsignsignatureRequest;

require_once (__DIR__ . '/../../connector.php');

define ('SAMPLE_fkiEzsigndocumentID', 659);
define ('SAMPLE_fkiEzsignfoldersignerassociationID', 431);

$objEzsignsignatureApi = new EzsignsignatureApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contain all the objects we want to create.
$a_objEzsignsignatureCreateObjectV1Request = [];

/**
 * This is the object that will contain a objEzsignsignature to create
 * @var \eZmaxAPI\Model\EzsignsignatureCreateObjectV1Request $objEzsignsignatureCreateObjectV1Request
 */
$objEzsignsignatureCreateObjectV1Request = new EzsignsignatureCreateObjectV1Request ();

/**
 * For this example, let's create an objEzsignsignature
 * @var \eZmaxAPI\Model\EzsignsignatureRequest $objEzsignsignatureRequest
 */
$objEzsignsignatureRequest = new EzsignsignatureRequest();

// Sets which ezsign document will contain the new ezsign signature
$objEzsignsignatureRequest->setFkiEzsigndocumentID(SAMPLE_fkiEzsigndocumentID);

// Set who will have to sign the ezisgn signature. ID gotten from a previous request on createEzsignfoldersignerassociation
$objEzsignsignatureRequest->setFkiEzsignfoldersignerassociationID(SAMPLE_fkiEzsignfoldersignerassociationID);

// The page number in the ezsign document.
$objEzsignsignatureRequest->setIEzsignpagePagenumber(1);

// Sets the X coordinate of the ezsign signature
$objEzsignsignatureRequest->setIEzsignsignatureX(200);

// Sets the Y coordinate of the ezsign signature
$objEzsignsignatureRequest->setIEzsignsignatureY(300);

// Sets in which step the ezsign signature will be signed. 
$objEzsignsignatureRequest->setIEzsignsignatureStep(1);

// Sets the type of ezsign signature. 
$objEzsignsignatureRequest->setEEzsignsignatureType('Name');

// Sets the objEzsignsignature to the request object
$objEzsignsignatureCreateObjectV1Request->setObjEzsignsignature($objEzsignsignatureRequest);


//Finally push the request to the array of objects to save
$a_objEzsignsignatureCreateObjectV1Request[] = $objEzsignsignatureCreateObjectV1Request;

try {

    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
    //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($a_objEzsignsignatureCreateObjectV1Request), JSON_PRETTY_PRINT).PHP_EOL;

    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server
     * @var \eZmaxAPI\Model\EzsignsignatureCreateObjectV1Response $objEzsignsignatureCreateObjectV1Response
     */
    $objEzsignsignatureCreateObjectV1Response = $objEzsignsignatureApi->ezsignsignatureCreateObjectV1($a_objEzsignsignatureCreateObjectV1Request);

    /*
     * The server will return the unique pkiEzsignsignatureID of each created ezsign signature in the same order they were in the $a_objEzsignsignatureCreateObjectV1Request array.
     * You can keep these values for future requests to check the status or other needs
    */
    foreach ($objEzsignsignatureCreateObjectV1Response->getMPayload()->getAPkiEzsignsignatureID() as $pkiEzsignsignatureID) {
        echo "Ezsignsignature created with pkiEzsignsignatureID = $pkiEzsignsignatureID".PHP_EOL;
    }

    //Uncomment this line to ouput complete response
    //print_r($objEzsignsignatureCreateObjectV1Response);

}
catch (Exception $e) {
    print_r($e);
}