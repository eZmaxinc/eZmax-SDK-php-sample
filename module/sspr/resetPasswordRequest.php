<?php

require_once (__DIR__ . '/../../connector.php');

/**
 * This sample shows how to send an email to reset the password of a user's account.
 */

/**
 * @var \eZmaxAPI\Api\ModuleSsprApi $objModuleSsprApi
 */
$objModuleSsprApi = new eZmaxAPI\Api\ModuleSsprApi(new GuzzleHttp\Client(), $objConfiguration);

$objSsprResetPasswordRequestV1Request = new \eZmaxAPI\Model\SsprResetPasswordRequestV1Request();

// The customer code assigned to your account
$objSsprResetPasswordRequestV1Request->setPksCustomerCode('demo');

// Language of the email to be sent
$objSsprResetPasswordRequestV1Request->setFkiLanguageID(2);// 1 -> French ~ 2 -> English

// The user type of the User for SSPR
$objSsprResetPasswordRequestV1Request->setEUserTypeSSPR('Native');

// The user name
$objSsprResetPasswordRequestV1Request->setSUserLoginname('JohnDoe');

try {
    /**
     * There is no response on this request
     */
    $objModuleSsprApi->ssprResetPasswordRequestV1 ($objSsprResetPasswordRequestV1Request);
    	
} catch (Exception $e) {
    print_r($e);
}

?>