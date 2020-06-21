<?php

/**
 * This sample shows how to change the server where to send API requests.
 *
 * There is no reason to do so unless your service aren't located in ca-central-1 region or if you
 * are instructed to do so by Support.
 *
 */

require_once (__DIR__ . '/../connector.php');

/**
 * Retrieve the URL for stg ca-central-1
 * @var String $sNewHost
 */
$sNewHost = $objConfiguration->getHostFromSettings(0, [
    'sInfrastructureenvironmenttypeDescription' => 'stg',
    'sInfrastructureregionCode' => 'ca-central-1'
]);

/*
 * Change the URL to the new host.
 * Make sure to call this function BEFORE you make your API request
 */
$objConfiguration->setHost($sNewHost);

?>