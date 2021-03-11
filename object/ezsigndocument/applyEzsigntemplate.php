<?php

/**
 * This sample shows how to apply an Ezsigntemplate to an Ezsigndocument
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsigndocumentApi;

/*
 * The pkiEzsigndocumentID to which we want to apply the template.
 * This value was returned after a successful Ezsigndocument creation.
 */
define ('SAMPLE_pkiEzsigndocumentID', 43);

/*
 * The fkiEzsigntemplateID is the ID of the template to apply on the document.
 */
define ('SAMPLE_fkiEzsigntemplateID', 5);

/*
 * The array of signers from the template. These values were chosen while anonymizing the template.
 */
$a_sEzsigntemplatesigner = [
	"Signer 1",
	"Signer 2"
];

/*
 * The array of Ezsignfoldersignerassociation corresponding to the array of Ezsigntemplatesigner to apply the proper signers on the Ezsigndocument
 */
$a_pkiEzsignfoldersignerassociationID = [
	19,
	20
];

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectEzsigndocumentApi $objObjectEzsigndocumentApi
 */
$objObjectEzsigndocumentApi = new eZmaxAPI\Api\ObjectEzsigndocumentApi(new GuzzleHttp\Client(),$objConfiguration);

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
    $objEzsigndocumentApplyEzsigntemplateV1Response = $objObjectEzsigndocumentApi->ezsigndocumentApplyEzsigntemplateV1(SAMPLE_pkiEzsigndocumentID, $objEzsigndocumentApplyEzsigntemplateRequest);
	
    print_r($objEzsigndocumentApplyEzsigntemplateV1Response);
} catch (Exception $e) {
    print_r($e);
}

?>