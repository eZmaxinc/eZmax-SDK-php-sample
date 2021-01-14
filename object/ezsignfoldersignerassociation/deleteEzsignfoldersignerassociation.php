<?php

/**
 * This sample shows how to delete one Ezsignfoldersignerassociation.
 * In this example, we will delete a single Ezsignfoldersignerassociation.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsignfoldersignerassociationApi;

/*
 * The pkiEzsignfoldersignerassociationID we wish to delete.
 * This value was returned after a successful ezsignfoldersignerassociationCreateObject.
 */

define ('SAMPLE_pkiEzsignfoldersignerassociationID', 460);

require_once (__DIR__ . '/../../connector.php');

$objEzsignfoldersignerassociationApi = new ObjectEzsignfoldersignerassociationApi(new GuzzleHttp\Client(), $objConfiguration);

try {

    /*
     * We only need to pass the pkiID of the ezsignfoldersignerassociation we want to destroy.
     * We got it from a call to a previous ezsignfoldersignerassociationCreateObject
     */
    $objEzsignfoldersignerassociationDeleteObjectV1Response = $objEzsignfoldersignerassociationApi->ezsignfoldersignerassociationDeleteObjectV1(SAMPLE_pkiEzsignfoldersignerassociationID);

    //Uncomment this line to ouput complete response
    //print_r($objEzsignfoldersignerassociationDeleteObjectV1Response);

}
catch (Exception $e) {
    print_r($e);
}

?>