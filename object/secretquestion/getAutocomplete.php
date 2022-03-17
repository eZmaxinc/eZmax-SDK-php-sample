<?php

/**
 * This sample shows how to get the autocomplete for the secretquestion list.
 *
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectSecretquestionApi;

require_once __DIR__ . '/../../connector.php';

/**
 * @var \eZmaxAPI\Api\ObjectSecretquestionApi
 */
$objObjectSecretquestionApi = new ObjectSecretquestionApi(new GuzzleHttp\Client(), $objConfiguration);

try {
    /**
     * We only need to pass the selector for the Secretquestion we want.
     * In this case we request 'All' Secretquestions
     * @var \eZmaxAPI\Model\SecretquestionGetAutocompleteV1Response $objSecretquestionGetAutocompleteV1Response
     */
    $objSecretquestionGetAutocompleteV1Response = $objObjectSecretquestionApi->secretquestionGetAutocompleteV1('All');

    /**
     * Let's print all Secretquestion we received from the call secretquestionGetAutocompleteV1('All');
     */
    foreach ($objSecretquestionGetAutocompleteV1Response->getMPayload() as $objCommonGetAutocompleteV1ResponseMPayload) {
        echo 'sCategory: ' . $objCommonGetAutocompleteV1ResponseMPayload->getSCategory() . PHP_EOL;
        echo 'sLabel: ' . $objCommonGetAutocompleteV1ResponseMPayload->getSLabel() . PHP_EOL;
        echo 'sValue: ' . $objCommonGetAutocompleteV1ResponseMPayload->getSValue() . PHP_EOL;
        echo '--------------------------------------------------------------------------------' . PHP_EOL;
    }
} catch (Exception $e) {
    print_r($e);
}
