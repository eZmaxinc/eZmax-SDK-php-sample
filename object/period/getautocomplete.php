<?php 

/**
 * This sample shows how to get a list of periods and ids.
 * In this example, we will get a list of periods and ids for each selector value.
 *
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\PeriodApi;
use eZmaxAPI\Model\CommonGetAutocompleteV1Response;

require_once (__DIR__ . '/../../connector.php');

$objPeriodApi = new PeriodApi(new GuzzleHttp\Client(), $objConfiguration);

try {
	// Let's get all active periods of type Normal
	
	/**
     * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
     */
	$objCommonGetAutocompleteV1Response = $objPeriodApi->periodGetAutocompleteV1('ActiveNormal');
	
	//Output some attributes
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getGroup().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getId().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getOption().PHP_EOL;

	
	
	
	
	
	// Let's get all active periods of type Normal and EndOfYear
	
	/**
     * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
     */
	$objCommonGetAutocompleteV1Response = $objPeriodApi->periodGetAutocompleteV1('ActiveNormalAndEndOfYear');
	
	//Output some attributes
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getGroup().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getId().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getOption().PHP_EOL;
	
	
	
	
	
	
	// Let's get all periods of type Normal
	/**
     * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
     */
	$objCommonGetAutocompleteV1Response = $objPeriodApi->periodGetAutocompleteV1('AllNormal');
	
	//Output some attributes
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getGroup().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getId().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getOption().PHP_EOL;
	
	
	
	
	
	
	// Let's get all periods of type Normal and EndOfYear
	
	/**
     * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
     */
	$objCommonGetAutocompleteV1Response = $objPeriodApi->periodGetAutocompleteV1('AllNormalAndEndOfYear');
	
	//Output some attributes
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getGroup().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getId().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getOption().PHP_EOL;
}
catch (Exception $e) {
    print_r($e);
}

?>