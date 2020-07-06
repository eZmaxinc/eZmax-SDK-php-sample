<?php

/**
 * This sample shows how to send the Ezsignfolder to the signatories for signature
 * In this example, we will send the ezsign folder by setting the pki in a constant
 * 
 */

// Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\EzsignfolderApi;
use eZmaxAPI\Model\EzsignfolderSendV1Request;

/*
 * The pkiEzsignfolderID we wish to send.
 * This value was returned after a successful ezsignfolderCreateObject.
 */

define('SAMPLE_pkiEzsignfolderID', 639);

require_once (__DIR__ . '/../../connector.php');

$objEzsignfolderApi = new EzsignfolderApi(new GuzzleHttp\Client(), $objConfiguration);

/**
 * This is the request content
 * 
 * @var \eZmaxAPI\Model\EzsignfolderSendV1Request $objEzsignfolderSendV1Request
 */
$objEzsignfolderSendV1Request = new EzsignfolderSendV1Request();

// Set the Extra message you want to send to the signatories. You can pass an empty string to have only the generic message content
$objEzsignfolderSendV1Request->setTExtraMessage('Hi John,

This is the document I need you to sign.

Could you sign it before monday please.

Best Regards.

Mary');

try {
    
    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
    //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization($objEzsignfolderSendV1Request), JSON_PRETTY_PRINT) . PHP_EOL;
    
    /*
     * We only need to pass the pkiEzsignfolderID of the ezsign folder we want to send and the request containing the message if you want to send one
     * We got the pkiEzsignfolderID from a call to a previous ezsignfolderCreateObject.
     */
    $objEzsignfolderSendV1Response = $objEzsignfolderApi->ezsignfolderSendV1(SAMPLE_pkiEzsignfolderID, $objEzsignfolderSendV1Request);
    
    // Uncomment this line to ouput complete response
    print_r($objEzsignfolderSendV1Response);
} catch (Exception $e) {
    print_r($e);
}

?>