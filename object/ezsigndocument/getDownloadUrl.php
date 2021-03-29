<?php

/**
 * This sample shows how to get proof or sign dopcument for one document signed.
* In this example, we put the pki and document type in constant. We will get three files :
* 1) signed ezsign document by setting the pki in a constant
* 2) complete proof in an zip
* 2) proof document in pdf
*
*/

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsigndocumentApi;
use eZmaxAPI\Model\EzsigndocumentGetDownloadUrlV1Response;
use eZmaxAPI\Model\EzsigndocumentRequest;


/*
 * The pkiEzsigndocumentID we wish to get.
 * This value was returned after a successful ezsigndocumentCreateObject.
 */

define ('SAMPLE_pkiEzsigndocumentID', 243);

/*
 * The type of document we wish to get.
 * This values was defined in documentation.
 */

define ('SAMPLE_sDocumentTypeSigned', 'Signed');
define ('SAMPLE_sDocumentTypeProof', 'Proof');
define ('SAMPLE_sDocumentTypeProofdocument', 'Proofdocument');

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectEzsigndocumentApi $objObjectEzsigndocumentApi
 */
$objObjectEzsigndocumentApi = new ObjectEzsigndocumentApi(new GuzzleHttp\Client(), $objConfiguration);

try {

	/*
	 * We need to pass the pkiID of the ezsign document we want to get and the type of document we want : "Signed" for signed document.
	 * We got it from a call to a previous ezsigndocumentCreateObject
	 */
	$objEzsigndocumentGetDownloadUrlV1Response = $objObjectEzsigndocumentApi->ezsigndocumentGetDownloadUrlV1(SAMPLE_pkiEzsigndocumentID,SAMPLE_sDocumentTypeSigned);

	// Let's retrieve some data from the object and display it
	//echo 'Url: '.$objEzsigndocumentGetDownloadUrlV1Response->getMPayload()->getSDownloadUrl().PHP_EOL;

	// Download and save file to disk. File is transmit in gzip format. We use wrapper "compress.zlib://" to uncompress it.
	file_put_contents(__DIR__ . '/document.pdf', file_get_contents('compress.zlib://'.$objEzsigndocumentGetDownloadUrlV1Response->getMPayload()->getSDownloadUrl()));


	/**
	 * We need to pass the pkiID of the ezsign document we want to get and the type of document we want : "Proof" for the complete proof.
	 * We got it from a call to a previous ezsigndocumentCreateObject
	 * @var \eZmaxAPI\Model\EzsigndocumentGetDownloadUrlV1Response $objEzsigndocumentGetDownloadUrlV1Response
	 */
	$objEzsigndocumentGetDownloadUrlV1Response = $objObjectEzsigndocumentApi->ezsigndocumentGetDownloadUrlV1(SAMPLE_pkiEzsigndocumentID,SAMPLE_sDocumentTypeProof);

	// Let's retrieve some data from the object and display it
	//echo 'Url: '.$objEzsigndocumentGetDownloadUrlV1Response->getMPayload()->getSDownloadUrl().PHP_EOL;

	//Uncomment this line to ouput complete response
	//print_r($objEzsigndocumentGetDownloadUrlV1Responsee);

	// Download and save file to disk. File is transmit in gzip format. We use wrapper "compress.zlib://" to uncompress it.
	file_put_contents(__DIR__ . '/proof.zip', file_get_contents('compress.zlib://'.$objEzsigndocumentGetDownloadUrlV1Response->getMPayload()->getSDownloadUrl()));


	/**
	 * We need to pass the pkiID of the ezsign document we want to get and the type of document we want : "Proof" for the proof pdf document.
	 * We got it from a call to a previous ezsigndocumentCreateObject
	 * @var \eZmaxAPI\Model\EzsigndocumentGetDownloadUrlV1Response $objEzsigndocumentGetDownloadUrlV1Response
	 */
	$objEzsigndocumentGetDownloadUrlV1Response = $objObjectEzsigndocumentApi->ezsigndocumentGetDownloadUrlV1(SAMPLE_pkiEzsigndocumentID,SAMPLE_sDocumentTypeProofdocument);

	// Let's retrieve some data from the object and display it
	//echo 'Url: '.$objEzsigndocumentGetDownloadUrlV1Response->getMPayload()->getSDownloadUrl().PHP_EOL;

	// Download and save file to disk. File is transmit in gzip format. We use wrapper "compress.zlib://" to uncompress it.
	file_put_contents(__DIR__ . '/proofdocument.pdf', file_get_contents('compress.zlib://'.$objEzsigndocumentGetDownloadUrlV1Response->getMPayload()->getSDownloadUrl()));


	echo 'File downloaded to '.__DIR__ . '/document.pdf'.PHP_EOL;
	echo 'Proof archive downloaded to '.__DIR__ . '/proof.zip'.PHP_EOL;
	echo 'Proof document downloaded to '.__DIR__ . '/proofdocument.pdf'.PHP_EOL;
}
catch (Exception $e) {
	print_r($e);
}

?>