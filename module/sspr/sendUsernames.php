<?php

require_once (__DIR__ . '/../../connector.php');

/**
 * This sample shows how to send the list of Ssprs associated with an email address for account recovery.
 */

/**
 * @var \eZmaxAPI\Api\ModuleSsprApi $objModuleSsprApi
 */
$objModuleSsprApi = new eZmaxAPI\Api\ModuleSsprApi(new GuzzleHttp\Client(), $objConfiguration);

$objSsprSendUsernamesV1Request = new \eZmaxAPI\Model\SsprSendUsernamesV1Request();

// The customer code assigned to your account
$objSsprSendUsernamesV1Request->setPksCustomerCode('demo');

// Language of the email to be sent
$objSsprSendUsernamesV1Request->setFkiLanguageID(2);// 1 -> French ~ 2 -> English

// The user type of the User for SSPR
$objSsprSendUsernamesV1Request->setEUserTypeSSPR('Native');

//The email address.
$objSsprSendUsernamesV1Request->setSEmailAddress('example@domain.com');

try {
    /**
     * There is no response on this request
     */
    $objModuleSsprApi->ssprSendUsernamesV1 ($objSsprSendUsernamesV1Request);
    	
} catch (Exception $e) {
    print_r($e);
}

?>