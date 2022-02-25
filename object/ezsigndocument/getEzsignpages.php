<?php

/**
 * This sample shows how to retreive pages from Ezsigndocument
 * 
 */

/*
 * The pkiEzsigndocumentID to which we want to retreive pages.
 */
define ('SAMPLE_pkiEzsigndocumentID', 1131);


require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectEzsigndocumentApi $objObjectEzsigndocumentApi
 */
$objObjectEzsigndocumentApi = new eZmaxAPI\Api\ObjectEzsigndocumentApi(new GuzzleHttp\Client(),$objConfiguration);


try {
    
     /**
	 * We only need to pass the pkiEzsigndocumentID of the ezsign document we want to get.
	 * We got it from a call to a previous ezsigndocumentCreateObject
     * @var \eZmaxAPI\Model\EzsigndocumentEzsignpagesV1Response $objEzsigndocumentEzsignpagesV1Response
     */
    $objEzsigndocumentEzsignpagesV1Response = $objObjectEzsigndocumentApi->ezsigndocumentGetEzsignpagesV1(SAMPLE_pkiEzsigndocumentID);
	
    /**
     * Loop on each pages from the document
     * @var \eZmaxAPI\Model\EzsignpageResponse $objEzsignpageResponse
     */
    foreach($objEzsigndocumentEzsignpagesV1Response->getMPayload()->getAObjEzsignpage() AS $objEzsignpageResponse) {

        // Unique id from the database
        echo "pkiEzsignpageID: ".$objEzsignpageResponse->getPkiEzsignpageID()."\n";
        
        // Width of the image in pixel
        echo "iEzsignpageWidthimage: ".$objEzsignpageResponse->getIEzsignpageWidthimage()."\n";
        
        // Height of the image in pixel
        echo "iEzsignpageHeightimage: ".$objEzsignpageResponse->getIEzsignpageHeightimage()."\n";

        // Width of the image in point PDF
        echo "iEzsignpageWidthpdf: ".$objEzsignpageResponse->getIEzsignpageWidthpdf()."\n";

        // Height of the image in point PDF
        echo "iEzsignpageHeightpdf: ".$objEzsignpageResponse->getIEzsignpageHeightpdf()."\n";

        // Page number
        echo "iEzsignpagePagenumber: ".$objEzsignpageResponse->getIEzsignpagePagenumber()."\n";

        // URL of the image of the page
        echo "sImageUrl: ".$objEzsignpageResponse->getSImageUrl()."\n";
        echo "\n";
    }
} catch (Exception $e) {
    print_r($e);
}