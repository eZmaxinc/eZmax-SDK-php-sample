<?php

require_once (__DIR__ . '/../../connector.php');

/**
 * This sample shows how to send the a link to unlock the user's account.
 */


/**
 * @var \eZmaxAPI\Api\ModuleSsprApi $objModuleSsprApi
 */
$objModuleSsprApi = new eZmaxAPI\Api\ModuleSsprApi(new GuzzleHttp\Client(), $objConfiguration);

$objSsprUnlockAccountRequestV1Request = new \eZmaxAPI\Model\SsprUnlockAccountRequestV1Request();

// The customer code assigned to your account
$objSsprUnlockAccountRequestV1Request->setPksCustomerCode('demo');

// Language of the email to be sent
$objSsprUnlockAccountRequestV1Request->setFkiLanguageID(2);// 1 -> French ~ 2 -> English

// The user type of the User for SSPR
$objSsprUnlockAccountRequestV1Request->setEUserTypeSSPR('Native');

//The user name
$objSsprUnlockAccountRequestV1Request->setSUserLoginname('JohnDoe');

try {
    /**
     * There is no response on this request
     */
    $objModuleSsprApi->ssprUnlockAccountRequestV1 ($objSsprUnlockAccountRequestV1Request);
    	
} catch (Exception $e) {
    print_r($e);
}

?>