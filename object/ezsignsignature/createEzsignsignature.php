<?php

/**
 * This sample shows how to create one or more Ezsignsignature.
 * In this example, we will create a single Ezsignsignature but you can create more than one by adding more objects to the array.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsignsignatureApi;
use eZmaxAPI\Model\EzsignsignatureCreateObjectV2Request;
use eZmaxAPI\Model\EzsignsignatureRequestCompound;

require_once (__DIR__ . '/../../connector.php');

define ('SAMPLE_fkiEzsigndocumentID', 3719);
define ('SAMPLE_fkiEzsignfoldersignerassociationID', 1723);

/**
 * @var \eZmaxAPI\Api\ObjectEzsignsignatureApi $objObjectEzsignsignatureApi
 */
$objObjectEzsignsignatureApi = new ObjectEzsignsignatureApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contain all the objects we want to create.
$a_objEzsignsignatureRequestCompound = [];

/**
 * This is the object that will contains an array of objEzsignsignatureCompound you want to create.
 * @var \eZmaxAPI\Model\EzsignsignatureCreateObjectV2Request $objEzsignsignatureCreateObjectV2Request
 */
$objEzsignsignatureCreateObjectV2Request = new EzsignsignatureCreateObjectV2Request ();

/**
 * For this example, let's create an objEzsignsignature type of Name
 * @var \eZmaxAPI\Model\EzsignsignatureRequestCompound $objEzsignsignatureRequestCompound
 */
$objEzsignsignatureRequestCompound = new EzsignsignatureRequestCompound();

// Sets which ezsign document will contain the new ezsign signature
$objEzsignsignatureRequestCompound->setFkiEzsigndocumentID(SAMPLE_fkiEzsigndocumentID);

// Set who will have to sign the ezisgn signature. ID gotten from a previous request on createEzsignfoldersignerassociation
$objEzsignsignatureRequestCompound->setFkiEzsignfoldersignerassociationID(SAMPLE_fkiEzsignfoldersignerassociationID);

// The page number in the ezsign document.
$objEzsignsignatureRequestCompound->setIEzsignpagePagenumber(1);

// Sets the X coordinate of the ezsign signature
$objEzsignsignatureRequestCompound->setIEzsignsignatureX(200);

// Sets the Y coordinate of the ezsign signature
$objEzsignsignatureRequestCompound->setIEzsignsignatureY(300);

// Sets in which step the ezsign signature will be signed. 
$objEzsignsignatureRequestCompound->setIEzsignsignatureStep(1);

// Sets the type of ezsign signature. 
$objEzsignsignatureRequestCompound->setEEzsignsignatureType('Name');

//Finally push the request to the array of objects to save
$a_objEzsignsignatureRequestCompound[] = $objEzsignsignatureRequestCompound;



/**
 * For this example, let's create an objEzsignsignature type of City
 * @var \eZmaxAPI\Model\EzsignsignatureRequestCompound $objEzsignsignatureRequestCompound
 */
$objEzsignsignatureRequestCompound = new EzsignsignatureRequestCompound();

// Sets which ezsign document will contain the new ezsign signature
$objEzsignsignatureRequestCompound->setFkiEzsigndocumentID(SAMPLE_fkiEzsigndocumentID);

// Set who will have to sign the ezisgn signature. ID gotten from a previous request on createEzsignfoldersignerassociation
$objEzsignsignatureRequestCompound->setFkiEzsignfoldersignerassociationID(SAMPLE_fkiEzsignfoldersignerassociationID);

// The page number in the ezsign document.
$objEzsignsignatureRequestCompound->setIEzsignpagePagenumber(1);

// Sets the X coordinate of the ezsign signature
$objEzsignsignatureRequestCompound->setIEzsignsignatureX(200);

// Sets the Y coordinate of the ezsign signature
$objEzsignsignatureRequestCompound->setIEzsignsignatureY(250);

// Sets in which step the ezsign signature will be signed. 
$objEzsignsignatureRequestCompound->setIEzsignsignatureStep(1);

// Sets the type of ezsign signature. 
$objEzsignsignatureRequestCompound->setEEzsignsignatureType('City');

//Finally push the request to the array of objects to save
$a_objEzsignsignatureRequestCompound[] = $objEzsignsignatureRequestCompound;



/**
 * For this example, let's create an objEzsignsignature type of Initials
 * @var \eZmaxAPI\Model\EzsignsignatureRequestCompound $objEzsignsignatureRequestCompound
 */
$objEzsignsignatureRequestCompound = new EzsignsignatureRequestCompound();

// Sets which ezsign document will contain the new ezsign signature
$objEzsignsignatureRequestCompound->setFkiEzsigndocumentID(SAMPLE_fkiEzsigndocumentID);

// Set who will have to sign the ezisgn signature. ID gotten from a previous request on createEzsignfoldersignerassociation
$objEzsignsignatureRequestCompound->setFkiEzsignfoldersignerassociationID(SAMPLE_fkiEzsignfoldersignerassociationID);

// The page number in the ezsign document.
$objEzsignsignatureRequestCompound->setIEzsignpagePagenumber(1);

// Sets the X coordinate of the ezsign signature
$objEzsignsignatureRequestCompound->setIEzsignsignatureX(200);

// Sets the Y coordinate of the ezsign signature
$objEzsignsignatureRequestCompound->setIEzsignsignatureY(200);

// Sets in which step the ezsign signature will be signed. 
$objEzsignsignatureRequestCompound->setIEzsignsignatureStep(1);

// Sets the type of ezsign signature. 
$objEzsignsignatureRequestCompound->setEEzsignsignatureType('Initials');

//Finally push the request to the array of objects to save
$a_objEzsignsignatureRequestCompound[] = $objEzsignsignatureRequestCompound;



/**
 * For this example, let's create an objEzsignsignature type of Acknowledgement
 * @var \eZmaxAPI\Model\EzsignsignatureRequestCompound $objEzsignsignatureRequestCompound
 */
$objEzsignsignatureRequestCompound = new EzsignsignatureRequestCompound();

// Sets which ezsign document will contain the new ezsign signature
$objEzsignsignatureRequestCompound->setFkiEzsigndocumentID(SAMPLE_fkiEzsigndocumentID);

// Set who will have to sign the ezisgn signature. ID gotten from a previous request on createEzsignfoldersignerassociation
$objEzsignsignatureRequestCompound->setFkiEzsignfoldersignerassociationID(SAMPLE_fkiEzsignfoldersignerassociationID);

// The page number in the ezsign document.
$objEzsignsignatureRequestCompound->setIEzsignpagePagenumber(1);

// Sets the X coordinate of the ezsign signature
$objEzsignsignatureRequestCompound->setIEzsignsignatureX(200);

// Sets the Y coordinate of the ezsign signature
$objEzsignsignatureRequestCompound->setIEzsignsignatureY(150);

// Sets in which step the ezsign signature will be signed. 
$objEzsignsignatureRequestCompound->setIEzsignsignatureStep(1);

// Sets the type of ezsign signature. 
$objEzsignsignatureRequestCompound->setEEzsignsignatureType('Acknowledgement');

//Finally push the request to the array of objects to save
$a_objEzsignsignatureRequestCompound[] = $objEzsignsignatureRequestCompound;



// Set the array containing all objEzsignfolderRequestCompound in the EzsignsignatureCreateObjectV2Request object
$objEzsignsignatureCreateObjectV2Request->setAObjEzsignsignature($a_objEzsignsignatureRequestCompound);

try {

    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
    //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($objEzsignsignatureCreateObjectV2Request), JSON_PRETTY_PRINT).PHP_EOL;

    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server
     * @var \eZmaxAPI\Model\EzsignsignatureCreateObjectV2Response $objEzsignsignatureCreateObjectV2Response
     */
    $objEzsignsignatureCreateObjectV2Response = $objObjectEzsignsignatureApi->ezsignsignatureCreateObjectV2($objEzsignsignatureCreateObjectV2Request);

    /*
     * The server will return the unique pkiEzsignsignatureID of each created ezsign signature in the same order they were in the $a_objEzsignsignatureRequestCompound array.
     * You can keep these values for future requests to check the status or other needs
    */
    foreach ($objEzsignsignatureCreateObjectV2Response->getMPayload()->getAPkiEzsignsignatureID() as $pkiEzsignsignatureID) {
        echo "Ezsignsignature created with pkiEzsignsignatureID = $pkiEzsignsignatureID".PHP_EOL;
    }

    //Uncomment this line to ouput complete response
    //print_r($objEzsignsignatureCreateObjectV2Response);

}
catch (Exception $e) {
    print_r($e);
}