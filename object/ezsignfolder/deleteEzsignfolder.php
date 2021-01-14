<?php

/**
 * This sample shows how to delete one Ezsignfolder.
 * In this example, we will delete an ezsign folder by setting the pki in a constant
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsignfolderApi;

/*
 * The pkiEzsignfolderID we wish to delete.
 * This value was returned after a successful ezsignfolderCreateObject.
 */

define ('SAMPLE_pkiEzsignfolderID', 643);

require_once (__DIR__ . '/../../connector.php');

$objEzsignfolderApi = new ObjectEzsignfolderApi(new GuzzleHttp\Client(), $objConfiguration);

try {
	
	/*
	 * We only need to pass the pkiID of the ezsign folder we want to destroy.
	 * We got it from a call to a previous ezsignfolderCreateObject
	 */
	$objEzsignfolderDeleteObjectV1Response = $objEzsignfolderApi->ezsignfolderDeleteObjectV1(SAMPLE_pkiEzsignfolderID);
	
	//Uncomment this line to ouput complete response
	//print_r($objEzsignfolderDeleteObjectV1Response);
	
}
catch (Exception $e) {
    print_r($e);
}

?>