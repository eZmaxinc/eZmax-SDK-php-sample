<?php

require_once (__DIR__ . '/../../connector.php');

/**
 * This sample shows how to validate if a SSPR token is still valid
 */

/**
 * @var \eZmaxAPI\Api\ModuleSsprApi $objModuleSsprApi
 */
$objModuleSsprApi = new eZmaxAPI\Api\ModuleSsprApi(new GuzzleHttp\Client(), $objConfiguration);

$objSsprValidateTokenV1Request = new \eZmaxAPI\Model\SsprValidateTokenV1Request();

// The customer code assigned to your account
$objSsprValidateTokenV1Request->setPksCustomerCode('demo');

// Language of the email to be sent
$objSsprValidateTokenV1Request->setFkiLanguageID(2);// 1 -> French ~ 2 -> English

// The user type of the User for SSPR
$objSsprValidateTokenV1Request->setEUserTypeSSPR('Native');

// The user name
$objSsprValidateTokenV1Request->setSUserLoginname('JohnDoe');

// The token received by email
$objSsprValidateTokenV1Request->setBinUserSSPRtoken('012345678901234567890123456789012345678901234567890123456789abcd');

try {
    /**
     * There is no response on this request
     */
    $objModuleSsprApi->ssprValidateTokenV1 ($objSsprValidateTokenV1Request);
    	
} catch (Exception $e) {
    print_r($e);
}

?>