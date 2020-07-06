<?php

/**
 * This sample shows how to delete one Ezsigndocument from a Ezsignfolder.
 * In this example, we will delete an ezsign document by setting the pki in a constant
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\EzsigndocumentApi;

/*
 * The pkiEzsigndocumentID we wish to destroy.
 * This value was returned after a successful ezsigndocumentCreateObject.
 */

define ('SAMPLE_pkiEzsigndocumentID', 2144);

require_once (__DIR__ . '/../../connector.php');

$objEzsigndocumentApi = new EzsigndocumentApi(new GuzzleHttp\Client(), $objConfiguration);

try {
	
	/*
	 * We only need to pass the pkiID of the ezsign document we want to destroy.
	 * We got it from a call to a previous ezsigndocumentCreateObject
	 */
	$objEzsigndocumentDeleteObjectV1Response = $objEzsigndocumentApi->ezsigndocumentDeleteObjectV1(SAMPLE_pkiEzsigndocumentID);
	
	//Uncomment this line to ouput complete response
	//print_r($objEzsigndocumentDeleteObjectV1Response);
}
catch (Exception $e) {
    print_r($e);
}

?>