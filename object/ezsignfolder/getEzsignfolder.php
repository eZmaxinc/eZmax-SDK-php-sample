<?php

/**
 * This sample shows how to get one Ezsignfolder.
 * In this example, we will get an ezsign folder by setting the pki in a constant
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsignfolderApi;

/*
 * The pkiEzsignfolderID we wish to get.
 * This value was returned after a successful ezsignfolderCreateObject.
 */

define ('SAMPLE_pkiEzsignfolderID', 220);

require_once (__DIR__ . '/../../connector.php');

$objEzsignfolderApi = new ObjectEzsignfolderApi(new GuzzleHttp\Client(), $objConfiguration);

try {
	
	/*
	 * We only need to pass the pkiID of the ezsign folder we want to get.
	 * We got it from a call to a previous ezsignfolderCreateObject
	 */
	$objEzsignfolderGetObjectV1Response = $objEzsignfolderApi->ezsignfolderGetObjectV1(SAMPLE_pkiEzsignfolderID);
	
	// Let's retrieve some data from the object and display it
	echo 'ID: '.$objEzsignfolderGetObjectV1Response->getMPayload()->getPkiEzsignfolderID().PHP_EOL;
	echo 'Description: '.$objEzsignfolderGetObjectV1Response->getMPayload()->getSEzsignfolderDescription().PHP_EOL;
	echo 'Note: '.$objEzsignfolderGetObjectV1Response->getMPayload()->getTEzsignfolderNote().PHP_EOL;
	echo 'Created by user ID: '.$objEzsignfolderGetObjectV1Response->getMPayload()->getObjAudit()->getFkiUserIDCreated().PHP_EOL;
	echo 'Modified by user ID: '.$objEzsignfolderGetObjectV1Response->getMPayload()->getObjAudit()->getFkiUserIDModified().PHP_EOL;
	
	//Uncomment this line to ouput complete response
	//print_r($objEzsignfolderGetObjectV1Response);
	
}
catch (Exception $e) {
    print_r($e);
}

?>