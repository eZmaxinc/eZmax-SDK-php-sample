<?php

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectActivesessionApi;

/**
 * This sample shows how to query the current session of the API key currently in use.
 * 
 * It gives various details about the session like user name, permissions, registered modules, etc.
 * 
 */

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectActivesessionApi $objObjectActivesessionApi
 */
$objObjectActivesessionApi = new ObjectActivesessionApi(new GuzzleHttp\Client(), $objConfiguration);

try {
    
    /**
     * @var \eZmaxAPI\Model\ActivesessionGetCurrentV1Response $ActivesessionGetCurrentV1Response
     */
    $objActivesessionGetCurrentV1Response = $objObjectActivesessionApi->activesessionGetCurrentV1();
    
    //Output some attributes
    echo $objActivesessionGetCurrentV1Response->getMPayload()->getSCompanyNameX().PHP_EOL;
    echo $objActivesessionGetCurrentV1Response->getMPayload()->getSDepartmentNameX().PHP_EOL;
    
    //Output registered modules
    print_r($objActivesessionGetCurrentV1Response->getMPayload()->getARegisteredModules());
    
    //Uncomment this line to ouput complete response
    //print_r($objActivesessionGetCurrentV1Response);
}
catch (Exception $e) {
    print_r($e);
}

?>