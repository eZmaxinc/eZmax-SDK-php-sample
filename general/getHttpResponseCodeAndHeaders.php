<?php

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ActivesessionApi;

/**
 * This sample shows how to retrieve the HTTP status code and the Response Headers when issuing a request.
 * 
 * It all the samples, we use the simplified version of the api call, but you can easily swap the function in all samples.
 * 
 */

require_once (__DIR__ . '/../connector.php');

$objActivesessionApi = new ActivesessionApi(new GuzzleHttp\Client(), $objConfiguration);

try {

    /*
     * In most of the samples, we used the simplified version which returns only the response.
     * You'll notice the response is returned directly so you can set your variable to the return of the function;
     * You'll also notice the function DOESN'T have the "WithHttpInfo" as a suffix.
     * Below, you can see in comment, the simplified line.
     * 
     */
     //$objActivesessionGetCurrentV1Response = $objActivesessionApi->activesessionGetCurrentV1();
    
    /**
     * Here you have the version with "WithHttpInfo" as a suffix.
     * You'll notice the function returns an array that we map to distinct values
     * All the api functions can be called with "WithHttpInfo" if needed.
     * @var \eZmaxAPI\Client\Model\ActivesessionGetCurrentV1Response $ActivesessionGetCurrentV1Response
     */
    list($objActivesessionGetCurrentV1Response, $iHttpCode, $a_Headers) = $objActivesessionApi->activesessionGetCurrentV1WithHttpInfo();
    
    //Output the HTTP return code
    echo "Http return code: $iHttpCode".PHP_EOL;
    
    //Output the Content-Type
    echo "Content-Type: {$a_Headers['Content-Type'][0]}".PHP_EOL;
    
    //Output all Response headers
    print_r($a_Headers);
    
}
catch (Exception $e) {
    print_r($e);
}

?>