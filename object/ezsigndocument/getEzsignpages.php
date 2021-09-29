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
     * Now that all the objects are ready in the array to save, let's send the request to the server 
     * @var \eZmaxAPI\Model\EzsigndocumentEzsignpagesV1Response $objEzsigndocumentEzsignpagesV1Response
     */
    $objEzsigndocumentEzsignpagesV1Response = $objObjectEzsigndocumentApi->ezsigndocumentGetEzsignpagesV1(SAMPLE_pkiEzsigndocumentID);
	
    /**
     * Loop on each pages from the document
     * @var \eZmaxAPI\Model\EzsignpageResponse $objEzsignpageResponse
     */
    foreach($objEzsigndocumentEzsignpagesV1Response->getMPayload()->getAObjEzsignpage() AS $objEzsignpageResponse) {

        // Unique id from the database
        echo "getPkiEzsignpageID: ".$objEzsignpageResponse->getPkiEzsignpageID()."\n";
        
        // Width of the image in pixel
        echo "getIEzsignpageWidthimage: ".$objEzsignpageResponse->getIEzsignpageWidthimage()."\n";
        
        // Height of the image in pixel
        echo "getIEzsignpageHeightimage: ".$objEzsignpageResponse->getIEzsignpageHeightimage()."\n";

        // Width of the image in point PDF
        echo "getIEzsignpageWidthpdf: ".$objEzsignpageResponse->getIEzsignpageWidthpdf()."\n";

        // Height of the image in point PDF
        echo "getIEzsignpageHeightpdf: ".$objEzsignpageResponse->getIEzsignpageHeightpdf()."\n";

        // Page number
        echo "getIEzsignpagePagenumber: ".$objEzsignpageResponse->getIEzsignpagePagenumber()."\n";

        // URL of the image of the page
        echo "getSImageUrl: ".$objEzsignpageResponse->getSImageUrl()."\n";
        echo "\n";
    }
} catch (Exception $e) {
    print_r($e);
}