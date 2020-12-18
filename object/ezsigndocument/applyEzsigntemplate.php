<?php

/**
 * This sample shows how to add an Ezsigndocument to an Ezsigndocument
 * In this example, we will create a single Ezsigndocument but you can create more than one by adding more objects to the array.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\EzsigndocumentApi;
use eZmaxAPI\Model\UserCreateEzsignuserV1Request;
use eZmaxAPI\Model\EzsigndocumentRequest;


/*
 * The pkiEzsigndocumentID to which we want to apply the template.
 * This value was returned after a successful apply.
 */
define ('SAMPLE_pkiEzsigndocumentID', 43);

/*
 * The fkiEzsigntemplateID is the ID of the template to apply to document.
 */
define ('SAMPLE_fkiEzsigntemplateID', 5); // Must be a template from a shared folder

/*
 * The array of signer from the template
 */
$a_sEzsigntemplatesigner = [
	"Signer 1",
	"Signer 2"
];

/*
 * The array to which will be associated with the template
 */
$a_pkiEzsignfoldersignerassociationID = [
	19,
	20
];

require_once (__DIR__ . '/../../connector.php');


$objEzsigndocumentApi = new eZmaxAPI\Api\ObjectEzsigndocumentApi(new GuzzleHttp\Client(),$objConfiguration);

$pkiEzsigndocumentID = SAMPLE_pkiEzsigndocumentID; // int | The unique ID of the Ezsigndocument

/**
 * For this example, let's create an objEzsigndocumentApplyEzsigntemplate 
 * @var \eZmaxAPI\Model\EzsigndocumentApplyEzsigntemplateV1Request $objEzsigndocumentApplyEzsigntemplateRequest
 */
$objEzsigndocumentApplyEzsigntemplateRequest = new \eZmaxAPI\Model\EzsigndocumentApplyEzsigntemplateV1Request(); // \eZmaxAPI\Model\EzsigndocumentApplyEzsigntemplateV1Request

// The Template ID to apply
$objEzsigndocumentApplyEzsigntemplateRequest->setFkiEzsigntemplateID(SAMPLE_fkiEzsigntemplateID);

// Array String[] of the signer in the template
$objEzsigndocumentApplyEzsigntemplateRequest->setASEzsigntemplatesigner($a_sEzsigntemplatesigner);

// Array int[] of the Ezsignfoldersignerassociation
$objEzsigndocumentApplyEzsigntemplateRequest->setAPkiEzsignfoldersignerassociationID($a_pkiEzsignfoldersignerassociationID);

try {
    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
    //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($objEzsigndocumentApplyEzsigntemplateRequest), JSON_PRETTY_PRINT).PHP_EOL;
    
    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server 
     * @var \eZmaxAPI\Model\EzsigndocumentApplyEzsigntemplateV1Response $objEzsigndocumentApplyEzsigntemplateV1Response
     */
    $objEzsigndocumentApplyEzsigntemplateV1Response = $objEzsigndocumentApi->ezsigndocumentApplyEzsigntemplateV1($pkiEzsigndocumentID, $objEzsigndocumentApplyEzsigntemplateRequest);
	
    print_r($objEzsigndocumentApplyEzsigntemplateV1Response);
} catch (Exception $e) {
    print_r($e);
}

?>