<?php

/**
 * This sample shows how to create one or more Ezsignfoldersignerassociation.
 * Ezsignfoldersignerassociation allows to add a user of the system to the list of Signatories, or an an external Ezsignsigner.
 * In this example, we will create a single Ezsignfoldersignerassociation but you can create more than one by adding more objects to the array.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\EzsignfoldersignerassociationApi;
use eZmaxAPI\Model\EzsignfoldersignerassociationCreateObjectV1Request;
use eZmaxAPI\Model\EzsignfoldersignerassociationRequest;
use eZmaxAPI\Model\EzsignfoldersignerassociationRequestCompound;

/*
 * The pkiEzsignfolderID to which we want to attach the document.
 * This value was returned after a successful Ezsignfolder creation.
 */

define ('SAMPLE_pkiEzsignfolderID', 615);
define ('SAMPLE_pkiUserID', 4);

require_once (__DIR__ . '/../../connector.php');

$objEzsignfoldersignerassociationApi = new EzsignfoldersignerassociationApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contain all the objects we want to create.
$a_objEzsignfoldersignerassociationCreateObjectV1Request = [];

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user in the office (Begin) **********************************/

/**
 * This is the object that will contain either a objEzsignfoldersignerassociation or a objEzsignfoldersignerassociationCompound
 * depending on the type of object you want to create.
 * @var \eZmaxAPI\Client\Model\EzsignfoldersignerassociationCreateObjectV1Request $objEzsignfoldersignerassociationCreateObjectV1Request
 */
$objEzsignfoldersignerassociationCreateObjectV1Request = new EzsignfoldersignerassociationCreateObjectV1Request ();

/**
 * For this example, let's create an objEzsignfoldersignerassociation 
 * @var \eZmaxAPI\Client\Model\EzsignfoldersignerassociationRequest $objEzsignfoldersignerassociationRequest
 */
$objEzsignfoldersignerassociationRequest = new EzsignfoldersignerassociationRequest();

//This will link the Ezsignfoldersignerassociation to an existing Ezsignfolder. This value was returned after a successful Ezsignfolder creation.
$objEzsignfoldersignerassociationRequest->setFkiEzsignfolderID(SAMPLE_pkiEzsignfolderID);

//This will link the Ezsignfoldersignerassociation to an existing User in the system. This user will be able to be used as a signatory in the document
$objEzsignfoldersignerassociationRequest->setFkiUserID(SAMPLE_pkiUserID);

// Since we created a objEzsignfoldersignerassociation, set the proper value in the EzsignfoldersignerassociationCreateObjectV1Request object
$objEzsignfoldersignerassociationCreateObjectV1Request->setObjEzsignfoldersignerassociation($objEzsignfoldersignerassociationRequest);

//Finally push the request to the array of objects to save
$a_objEzsignfoldersignerassociationCreateObjectV1Request [] = $objEzsignfoldersignerassociationCreateObjectV1Request;

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user in the office (End) **********************************/

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with SMS/Phone Validation (Begin) **********************************/

/**
 * This is the object that will contain either a objEzsignfoldersignerassociation or a objEzsignfoldersignerassociationCompound
 * depending on the type of object you want to create.
 * @var \eZmaxAPI\Client\Model\EzsignfoldersignerassociationCreateObjectV1Request $objEzsignfoldersignerassociationCreateObjectV1Request
 */
$objEzsignfoldersignerassociationCreateObjectV1Request = new EzsignfoldersignerassociationCreateObjectV1Request ();

/**
 * For this example, let's create an objEzsignfoldersignerassociationCompound
 * @var \eZmaxAPI\Client\Model\EzsignfoldersignerassociationRequestCompound $objEzsignfoldersignerassociationRequestCompound
 */
$bjEzsignfoldersignerassociationRequestCompound = new EzsignfoldersignerassociationRequestCompound();

//This will link the Ezsignfoldersignerassociation to an existing Ezsignfolder. This value was returned after a successful Ezsignfolder creation.
$bjEzsignfoldersignerassociationRequestCompound->setFkiEzsignfolderID(SAMPLE_pkiEzsignfolderID);





$objEzsignfoldersignerassociationRequestCompoundContact = new EzsignfoldersignerassociationRequestCompoundContact();

$objEzsignfoldersignerassociationRequestCompoundContact->



// Since we created a objEzsignfoldersignerassociation, set the proper value in the EzsignfoldersignerassociationCreateObjectV1Request object
$objEzsignfoldersignerassociationCreateObjectV1Request->setObjEzsignfoldersignerassociationCompound($bjEzsignfoldersignerassociationRequestCompound);

//Finally push the request to the array of objects to save
$a_objEzsignfoldersignerassociationCreateObjectV1Request [] = $objEzsignfoldersignerassociationCreateObjectV1Request;

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with SMS/Phone Validation (End) **********************************/





try {
    
    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
    //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($a_objEzsignfoldersignerassociationCreateObjectV1Request), JSON_PRETTY_PRINT).PHP_EOL;

    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server 
     * @var \eZmaxAPI\Client\Model\EzsignfoldersignerassociationCreateObjectV1Response $objEzsignfoldersignerassociationCreateObjectV1Response
     */
    $objEzsignfoldersignerassociationCreateObjectV1Response = $objEzsignfoldersignerassociationApi->EzsignfoldersignerassociationCreateObjectV1($a_objEzsignfoldersignerassociationCreateObjectV1Request);
    
    /*
     * The server will return the unique pkiEzsignfoldersignerassociationID of each created Ezsignfoldersignerassociation in the same order they were in the $a_objEzsignfoldersignerassociationCreateObjectV1Request array.
     * You can keep these values for future requests to check the status or other needs
     */
    foreach ($objEzsignfoldersignerassociationCreateObjectV1Response->getMPayload()->getAPkiEzsignfoldersignerassociationID() as $pkiEzsignfoldersignerassociationID) {
        echo "Ezsignfoldersignerassociation created with pkiEzsignfoldersignerassociationID = $pkiEzsignfoldersignerassociationID".PHP_EOL;
    }
    
    //Uncomment this line to ouput complete response
    //print_r($objEzsignfoldersignerassociationCreateObjectV1Response);
    
}
catch (Exception $e) {
    print_r($e);
}

?>