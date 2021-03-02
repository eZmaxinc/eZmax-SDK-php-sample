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
 * Retrieve the URL for stg ca-central-1
 * @var String $sNewHost
 */
$sNewHost = $objConfiguration->getHostFromSettings(1);

/*
 * Change the URL to the new host.
 * Make sure to call this function BEFORE you make your API request
 */
$objConfiguration->setHost($sNewHost);
 
$objGlobalCustomerApi = new eZmaxAPI\Api\GlobalCustomerApi(new GuzzleHttp\Client(), $objConfiguration);

// string | The customer code assigned to your account
$pksCustomerCode = 'demo1'; 

// string | The infrastructure product Code If undefined, "appcluster01" is assumed
$sInfrastructureproductCode = 'appcluster01'; 

try {
    $objglobalCustomerGetEndpointV1 = $objGlobalCustomerApi->globalCustomerGetEndpointV1($pksCustomerCode, $sInfrastructureproductCode);
    print_r($objglobalCustomerGetEndpointV1);
}
catch (Exception $e) {
    print_r($e);
}

?>