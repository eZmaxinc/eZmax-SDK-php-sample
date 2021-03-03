<?php 

/**
 * This sample shows how to get a list of periods and ids.
 * In this example, we will get a list of periods and ids for each selector value.
 *
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectPeriodApi;
use eZmaxAPI\Model\CommonGetAutocompleteV1Response;

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectPeriodApi $objObjectPeriodApi
 */
$objObjectPeriodApi = new ObjectPeriodApi(new GuzzleHttp\Client(), $objConfiguration);

try {
	// Let's get all active periods of type Normal
	
	/**
     * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
     */
	$objCommonGetAutocompleteV1Response = $objObjectPeriodApi->periodGetAutocompleteV1('ActiveNormal');
	
	//Output some attributes
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getGroup().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getId().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getOption().PHP_EOL;

	
	
	
	
	
	// Let's get all active periods of type Normal and EndOfYear
	
	/**
     * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
     */
	$objCommonGetAutocompleteV1Response = $objObjectPeriodApi->periodGetAutocompleteV1('ActiveNormalAndEndOfYear');
	
	//Output some attributes
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getGroup().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getId().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getOption().PHP_EOL;
	
	
	
	
	
	
	// Let's get all periods of type Normal
	/**
     * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
     */
	$objCommonGetAutocompleteV1Response = $objObjectPeriodApi->periodGetAutocompleteV1('AllNormal');
	
	//Output some attributes
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getGroup().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getId().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getOption().PHP_EOL;
	
	
	
	
	
	
	// Let's get all periods of type Normal and EndOfYear
	
	/**
     * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
     */
	$objCommonGetAutocompleteV1Response = $objObjectPeriodApi->periodGetAutocompleteV1('AllNormalAndEndOfYear');
	
	//Output some attributes
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getGroup().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getId().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getOption().PHP_EOL;
	
	
	
	
	
	
	// Let's get all active periods of type Normal with option starting with 2020
	
	/**
	 * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
	 */
	$objCommonGetAutocompleteV1Response = $objObjectPeriodApi->periodGetAutocompleteV1('ActiveNormal', '2020');
	
	//Output some attributes
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getGroup().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getId().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getOption().PHP_EOL;
	
	
	
	
	
	
	// Let's get all active periods of type Normal with option equals to 2020-05
	
	/**
	 * @var \eZmaxAPI\Model\CommonGetAutocompleteV1Response $objCommonGetAutocompleteV1Response
	 */
	$objCommonGetAutocompleteV1Response = $objObjectPeriodApi->periodGetAutocompleteV1('ActiveNormal', '2020-05');
	
	//Output some attributes
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getGroup().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getId().PHP_EOL;
	echo $objCommonGetAutocompleteV1Response->getMPayload()[0]->getOption().PHP_EOL;
}
catch (Exception $e) {
    print_r($e);
}

?>