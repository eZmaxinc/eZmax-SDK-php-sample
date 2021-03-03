<?php

/**
 * This sample shows how to get one Login URL to sign in person.
* In this example, we will get an URL by setting the pki in a constant
*
*/

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsignfoldersignerassociationApi;

/*
 * The pkiEzsigndocumentID we wish to get.
 * This value was returned after a successful ezsigndocumentCreateObject.
 */

define ('SAMPLE_pkiEzsignfoldersignerassociationID', 112);

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectEzsignfoldersignerassociationApi 
 */
$objObjectEzsignfoldersignerassociationApi = new ObjectEzsignfoldersignerassociationApi(new GuzzleHttp\Client(), $objConfiguration);

try {

	/**
	 * We need to pass the pkiID of the ezsign document we want to get and the type of document we want : "Signed" for signed document.
	 * We got it from a call to a previous ezsigndocumentCreateObject
	 * @var \eZmaxAPI\Model\EzsigndocumentGetLoginUrlV1Response $objEzsigndocumentGetLoginUrlV1Response
	 */
	$objEzsigndocumentGetLoginUrlV1Response = $objObjectEzsignfoldersignerassociationApi->ezsignfoldersignerassociationGetInPersonLoginUrlV1(SAMPLE_pkiEzsignfoldersignerassociationID);

	// Let's retrieve some data from the object and display it
	echo 'Url: '.$objEzsigndocumentGetLoginUrlV1Response->getMPayload()->getSLoginUrl().PHP_EOL;

	//Uncomment this line to ouput complete response
	//print_r($objEzsigndocumentGetLoginUrlV1Response);

}
catch (Exception $e) {
	print_r($e);
}

?>