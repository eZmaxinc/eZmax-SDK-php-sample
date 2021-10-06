<?php 

/**
 * This sample shows how to get a list of franchise brokers and ids.
 * In this example, we will get a list of franchise brokers and ids for each selector value.
 *
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectFranchisebrokerApi;
use eZmaxAPI\Model\CommonGetAutocompleteV1Response;

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectFranchisebrokerApi $objObjectFranchisebrokerApi
 */
$objObjectFranchisebrokerApi = new ObjectFranchisebrokerApi(new GuzzleHttp\Client(), $objConfiguration);

try {
	// Let's get all active franchise broker
	
	/**
     * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
     */
	$a_objCommonGetAutocompleteV1Response = $objObjectFranchisebrokerApi->franchisebrokerGetAutocompleteV1('Active');
	
	//Output some attributes
	foreach($a_objCommonGetAutocompleteV1Response->getMPayload() AS $objCommonGetAutocompleteV1ResponseMPayload) {
		echo $objCommonGetAutocompleteV1ResponseMPayload->getGroup().PHP_EOL;
		echo $objCommonGetAutocompleteV1ResponseMPayload->getId().PHP_EOL;
		echo $objCommonGetAutocompleteV1ResponseMPayload->getOption().PHP_EOL;
	}

	
	
	
	// Let's get all active franchise broker with either sContactFirstname LIKE 'Jean%' or sContactLastname LIKE 'Jean%' or sFranchisebrokerLicense = 'Jean'
	
	/**
	 * Give an array
	 * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
	 */
	$a_objCommonGetAutocompleteV1Response = $objObjectFranchisebrokerApi->franchisebrokerGetAutocompleteV1('Active', 'Jean');
	
	//Output some attributes
	foreach($a_objCommonGetAutocompleteV1Response->getMPayload() AS $objCommonGetAutocompleteV1ResponseMPayload) {
		echo $objCommonGetAutocompleteV1ResponseMPayload->getGroup().PHP_EOL;
		echo $objCommonGetAutocompleteV1ResponseMPayload->getId().PHP_EOL;
		echo $objCommonGetAutocompleteV1ResponseMPayload->getOption().PHP_EOL;
	}
	
	
	// Let's get all active franchise broker
	
	/**
     * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
     */
	$a_objCommonGetAutocompleteV1Response = $objObjectFranchisebrokerApi->franchisebrokerGetAutocompleteV1('All');
	
	//Output some attributes
	foreach($a_objCommonGetAutocompleteV1Response->getMPayload() AS $objCommonGetAutocompleteV1ResponseMPayload) {
		echo $objCommonGetAutocompleteV1ResponseMPayload->getGroup().PHP_EOL;
		echo $objCommonGetAutocompleteV1ResponseMPayload->getId().PHP_EOL;
		echo $objCommonGetAutocompleteV1ResponseMPayload->getOption().PHP_EOL;
	}
			
	
	// Let's get all franchise broker with either sContactFirstname LIKE 'Jean%' or sContactLastname LIKE 'Jean%' or sFranchisebrokerLicense = 'Jean'
	
	/**
	 * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
	 */
	$a_objCommonGetAutocompleteV1Response = $objObjectFranchisebrokerApi->franchisebrokerGetAutocompleteV1('All', 'Jean');
	
	//Output some attributes
	foreach($a_objCommonGetAutocompleteV1Response->getMPayload() AS $objCommonGetAutocompleteV1ResponseMPayload) {
		echo $objCommonGetAutocompleteV1ResponseMPayload->getGroup().PHP_EOL;
		echo $objCommonGetAutocompleteV1ResponseMPayload->getId().PHP_EOL;
		echo $objCommonGetAutocompleteV1ResponseMPayload->getOption().PHP_EOL;
	}
}
catch (Exception $e) {
    print_r($e);
}

?>