<?php

require_once (__DIR__ . '/../../connector.php');

/**
 * This sample shows how to unlock the user's account.
 */

/**
 * @var \eZmaxAPI\Api\ModuleSsprApi $objModuleSsprApi
 */
$objModuleSsprApi = new eZmaxAPI\Api\ModuleSsprApi(new GuzzleHttp\Client(), $objConfiguration);

$objSsprUnlockAccountV1Request = new \eZmaxAPI\Model\SsprUnlockAccountV1Request();

// The customer code assigned to your account
$objSsprUnlockAccountV1Request->setPksCustomerCode('demo');

// Language of the email to be sent
$objSsprUnlockAccountV1Request->setFkiLanguageID(2);// 1 -> French ~ 2 -> English

// The user type of the User for SSPR
$objSsprUnlockAccountV1Request->setEUserTypeSSPR('Native');

// The user name
$objSsprUnlockAccountV1Request->setSUserLoginname('JohnDoe');

// The token received by email
$objSsprUnlockAccountV1Request->setBinUserSSPRtoken('012345678901234567890123456789012345678901234567890123456789abcd');

try {
    /**
     * There is no response on this request
     */
    $objModuleSsprApi->ssprUnlockAccountV1 ($objSsprUnlockAccountV1Request);
    	
} catch (Exception $e) {
    print_r($e);
}

?>