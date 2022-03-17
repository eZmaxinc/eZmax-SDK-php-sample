<?php

/**
 * This sample shows how to get the autocomplete for the eEzsignfoldertype list.
 *
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsignfoldertypeApi;

require_once __DIR__ . '/../../connector.php';

/**
 * @var \eZmaxAPI\Api\ObjectEzsignfoldertypeApi
 */
$objObjectEzsignfoldertypeApi = new ObjectEzsignfoldertypeApi(new GuzzleHttp\Client(), $objConfiguration);

try {
    /**
     * We only need to pass the selector for the Ezsignfoldertype we want.
     * In this case we request 'All' Ezsignfoldertypes
     * @var \eZmaxAPI\Model\EzsignfoldertypeGetAutocompleteV1Response $objEzsignfoldertypeGetAutocompleteV1Response
     */
    $objEzsignfoldertypeGetAutocompleteV1Response = $objObjectEzsignfoldertypeApi->ezsignfoldertypeGetAutocompleteV1('All');

    /**
     * Let's print all Ezsignfoldertype we received from the call ezsignfoldertypeGetAutocompleteV1('All');
     */
    foreach ($objEzsignfoldertypeGetAutocompleteV1Response->getMPayload() as $objCommonGetAutocompleteV1ResponseMPayload) {
        echo 'sCategory: ' . $objCommonGetAutocompleteV1ResponseMPayload->getSCategory() . PHP_EOL;
        echo 'sLabel: ' . $objCommonGetAutocompleteV1ResponseMPayload->getSLabel() . PHP_EOL;
        echo 'sValue: ' . $objCommonGetAutocompleteV1ResponseMPayload->getSValue() . PHP_EOL;
        echo '--------------------------------------------------------------------------------' . PHP_EOL;
    }

    /**
     * We only need to pass the selector for the Ezsignfoldertype we want.
     * In this case we request 'Active' Ezsignfoldertypes
     * @var \eZmaxAPI\Model\EzsignfoldertypeGetAutocompleteV1Response $objEzsignfoldertypeGetAutocompleteV1Response
     */
    $objEzsignfoldertypeGetAutocompleteV1Response = $objObjectEzsignfoldertypeApi->ezsignfoldertypeGetAutocompleteV1('Active');

    /**
     * Let's print all Ezsignfoldertype we received from the call ezsignfoldertypeGetAutocompleteV1('Active');
     */
    foreach ($objEzsignfoldertypeGetAutocompleteV1Response->getMPayload() as $objCommonGetAutocompleteV1ResponseMPayload) {
        echo 'sCategory: ' . $objCommonGetAutocompleteV1ResponseMPayload->getSCategory() . PHP_EOL;
        echo 'sLabel: ' . $objCommonGetAutocompleteV1ResponseMPayload->getSLabel() . PHP_EOL;
        echo 'sValue: ' . $objCommonGetAutocompleteV1ResponseMPayload->getSValue() . PHP_EOL;
        echo '--------------------------------------------------------------------------------' . PHP_EOL;
    }
} catch (Exception $e) {
    print_r($e);
}
