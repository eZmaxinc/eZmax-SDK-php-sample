<?php

/**
 * This sample shows how to get one Ezsigndocument.
 * In this example, we will get an ezsign document by setting the pki in a constant
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\EzsigndocumentApi;

/*
 * The pkiEzsigndocumentID we wish to get.
 * This value was returned after a successful ezsigndocumentCreateObject.
 */

define ('SAMPLE_pkiEzsigndocumentID', 680);

require_once (__DIR__ . '/../../connector.php');

$objEzsigndocumentApi = new EzsigndocumentApi(new GuzzleHttp\Client(), $objConfiguration);

try {
	
	/*
	 * We only need to pass the pkiID of the ezsign document we want to get.
	 * We got it from a call to a previous ezsigndocumentCreateObject
	 */
	$objEzsigndocumentGetObjectV1Response = $objEzsigndocumentApi->ezsigndocumentGetObjectV1(SAMPLE_pkiEzsigndocumentID);
	
	// Let's retrieve some data from the object and display it
	echo 'ID: '.$objEzsigndocumentGetObjectV1Response->getMPayload()->getPkiEzsigndocumentID().PHP_EOL;
	echo 'Document name: '.$objEzsigndocumentGetObjectV1Response->getMPayload()->getSEzsigndocumentName().PHP_EOL;
	echo 'User created by ID: '.$objEzsigndocumentGetObjectV1Response->getMPayload()->getFkiUserIDCreated().PHP_EOL;
	echo 'User modified by ID: '.$objEzsigndocumentGetObjectV1Response->getMPayload()->getFkiUserIDModified().PHP_EOL;
	
	//Uncomment this line to ouput complete response
	//print_r($objEzsigndocumentGetObjectV1Response);
}
catch (Exception $e) {
    print_r($e);
}

?>