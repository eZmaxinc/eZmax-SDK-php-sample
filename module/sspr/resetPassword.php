<?php

require_once (__DIR__ . '/../../connector.php');

/**
 * This sample shows how to send an email to reset the password of a user's account.
 */

/**
 * @var \eZmaxAPI\Api\ModuleSsprApi $objModuleSsprApi
 */
$objModuleSsprApi = new eZmaxAPI\Api\ModuleSsprApi(new GuzzleHttp\Client(), $objConfiguration);

$objSsprResetPasswordV1Request = new \eZmaxAPI\Model\SsprResetPasswordV1Request();

// The customer code assigned to your account
$objSsprResetPasswordV1Request->setPksCustomerCode('demo');

// Language of the email to be sent
$objSsprResetPasswordV1Request->setFkiLanguageID(2);// 1 -> French ~ 2 -> English

// The user type of the User for SSPR
$objSsprResetPasswordV1Request->setEUserTypeSSPR('Native');

// The user name
$objSsprResetPasswordV1Request->setSUserLoginname('JohnDoe');

// The new Password to configure on the account
$objSsprResetPasswordV1Request->setSPassword('Qwerty1234!');

// The token received by email
$objSsprResetPasswordV1Request->setBinUserSSPRtoken('012345678901234567890123456789012345678901234567890123456789abcd');

try {
    /**
     * There is no response on this request
     */
    $objModuleSsprApi->ssprResetPasswordV1 ($objSsprResetPasswordV1Request);
    	
} catch (Exception $e) {
    print_r($e);
}

?>