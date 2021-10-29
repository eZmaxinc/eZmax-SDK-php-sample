<?php

/**
 * This sample shows how to get words positions from an Ezsigndocument
 * In this example, we will send words to the API and it will get back with all positions found.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsigndocumentApi;
use eZmaxAPI\Model\EzsigndocumentGetWordsPositionsV1Request;

/*
 * The pkiEzsigndocumentID to which we want to get words positions.
 * This value was returned after a successful Ezsignfolder creation.
 */
define ('SAMPLE_pkiEzsigndocumentID', 43);

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectEzsigndocumentApi $objObjectEzsigndocumentApi
 */
$objObjectEzsigndocumentApi = new ObjectEzsigndocumentApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contains all the objects of words positions.
$a_objEzsigndocumentGetWordsPositionsV1Request = [];

/**
 * This is the object that will contains either a EzsigndocumentGetWordsPositions.
 * @var \eZmaxAPI\Model\EzsigndocumentGetWordsPositionsV1Request $objEzsigndocumentGetWordsPositionsV1Request
 */
$objEzsigndocumentGetWordsPositionsV1Request = new EzsigndocumentGetWordsPositionsV1Request();

// This will check if we are CaseSensitive or not
$objEzsigndocumentGetWordsPositionsV1Request->setBWordCaseSensitive(true);

// This will set if we want specific Words (need to setASword) or All
$objEzsigndocumentGetWordsPositionsV1Request->setEGet('Words');

// List of words that we want the position
$objEzsigndocumentGetWordsPositionsV1Request->setASWord([
    "Signature 1",
    "Signature 2",
    "Signature 3",
    "SignAture 3",
    "SignAture 4"
]);

try {

    /**
    * Now that the object is ready, let's send the request to the server 
    * @var \eZmaxAPI\Model\EzsigndocumentGetWordsPositionsV1Response $objEzsigndocumentGetWordsPositionsV1Response
    */
    $objEzsigndocumentGetWordsPositionsV1Response = $objObjectEzsigndocumentApi->ezsigndocumentGetWordsPositionsV1(SAMPLE_pkiEzsigndocumentID, $objEzsigndocumentGetWordsPositionsV1Request);

    /**
    * Loop on each words from the document
    * @var \eZmaxAPI\Model\CustomWordPositionWordResponse $objCustomWordPositionWordResponse
    */
    foreach ($objEzsigndocumentGetWordsPositionsV1Response->getMPayload() as $objCustomWordPositionWordResponse) {

        echo "---------------------\n";
        echo "Word: {$objCustomWordPositionWordResponse->getSWord()}\n";
        echo "---------------------\n";

        /**
        * Loop on word position occurence from the document
        * @var \eZmaxAPI\Model\WordPositionOccurence $objWordPositionOccurence
        */
        foreach($objCustomWordPositionWordResponse->getAObjWordPositionOccurence() as $objWordPositionOccurence){
            echo "Page: {$objWordPositionOccurence->getIPage()}\n";
            echo "X: {$objWordPositionOccurence->getIX()}\n";
            echo "Y: {$objWordPositionOccurence->getIY()}\n";
            echo "\n";
        }

        if(count($objCustomWordPositionWordResponse->getAObjWordPositionOccurence()) == 0) {
            echo "No Words found for '{$objCustomWordPositionWordResponse->getSWord()}' on the document\n";
        }
    }
    echo "\n";

}
catch(Exception $e) {
    print_r($e);
}