<?php

//Load composers packages
require_once (__DIR__ . '../../../vendor/autoload.php');

/**
 * This sample shows how to retrieve the customer's specific server endpoint where to send requests.
 * This will help locate the proper region (ie: sInfrastructureregionCode) and the proper environment 
 * (ie: sInfrastructureenvironmenttypeDescription) where the customer's data is stored.
 * 
 */
 
//This function is not on the same URL than other functions in the API (ie: on the global/non regional servers). So we need to define the configuration manually.
$objConfiguration = eZmaxAPI\Configuration::getDefaultConfiguration();

/**
 * Retrieve the URL endpoint where to send your global API requests.
 * @var String $sNewHost
 */
$sNewHost = $objConfiguration->getHostFromSettings(1);

/*
 * Change the URL to the new host.
 * Make sure to call this function BEFORE you make your API request
 */
$objConfiguration->setHost($sNewHost);
 
/**
 * The global Customer API
 * @var \eZmaxAPI\Api\GlobalCustomerApi $objGlobalCustomerApi
 */
$objGlobalCustomerApi = new eZmaxAPI\Api\GlobalCustomerApi(new GuzzleHttp\Client(), $objConfiguration);

/**
 * The customer code assigned to your account
 * @var String $pksCustomerCode
 */
$pksCustomerCode = 'demo1'; 

/**
 * The infrastructure product Code If undefined, "appcluster01" is assumed
 * @var String $sInfrastructureproductCode
 */
$sInfrastructureproductCode = 'appcluster01'; 

try {
    /**
     * The global customer response
     * @var \eZmaxAPI\Api\Model\GlobalCustomerGetEndpointV1Response $objGlobalCustomerGetEndpointV1Response
     */
    $objGlobalCustomerGetEndpointV1Response = $objGlobalCustomerApi->globalCustomerGetEndpointV1($pksCustomerCode, $sInfrastructureproductCode);
    print_r($objGlobalCustomerGetEndpointV1Response);
}
catch (Exception $e) {
    print_r($e);
}

?>