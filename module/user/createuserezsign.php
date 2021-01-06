<?php

require_once (__DIR__ . '/../../connector.php');

/**
 * This sample shows how to add an User of type Ezsignuser.
 * In this example, we will create a single Ezsignuser but you can create more than one by adding more objects to the array.
 * 
 */

$objModuleUserApi = new eZmaxAPI\Api\ModuleUserApi(new GuzzleHttp\Client(),$objConfiguration);


// Create a array for each user to create
$a_objUserCreateEzsignuserV1Request = [];

/****************
 * First user
 ***************/
$objEzsigndocumentRequest = new \eZmaxAPI\Model\UserCreateEzsignuserV1Request();

// Language
$objEzsigndocumentRequest->setFkiLanguageID(2); // 1 -> French ~ 2 -> English

// Firstname
$objEzsigndocumentRequest->setSUserFirstname("Jane");

// Lastname
$objEzsigndocumentRequest->setSUserLastname("Doe");

// Email (Needed to activate the User)
$objEzsigndocumentRequest->setSEmailAddress("exemple@domain.com");

//Phone
$objEzsigndocumentRequest->setSPhoneRegion("514");
$objEzsigndocumentRequest->setSPhoneExchange("990");
$objEzsigndocumentRequest->setSPhoneNumber("1516");
$objEzsigndocumentRequest->setSPhoneExtension("999");

// Add the this user to the array
$a_objUserCreateEzsignuserV1Request[] = $objEzsigndocumentRequest;

/*******************
 * Second user
 ******************/
$objEzsigndocumentRequest = new \eZmaxAPI\Model\UserCreateEzsignuserV1Request();

// Language
$objEzsigndocumentRequest->setFkiLanguageID(2); // 1 -> French ~ 2 -> English

// Firstname
$objEzsigndocumentRequest->setSUserFirstname("John");

// Lastname
$objEzsigndocumentRequest->setSUserLastname("Doe");

// Email (Needed to activate the User)
$objEzsigndocumentRequest->setSEmailAddress("exemple@domain.com");

//Phone
$objEzsigndocumentRequest->setSPhoneRegion("514");
$objEzsigndocumentRequest->setSPhoneExchange("990");
$objEzsigndocumentRequest->setSPhoneNumber("1516");
$objEzsigndocumentRequest->setSPhoneExtension("998");

// Add this user to the array
$a_objUserCreateEzsignuserV1Request[] = $objEzsigndocumentRequest;

try {
    $objCreateEzsignuserV1Response = $objModuleUserApi->userCreateEzsignuserV1($userCreateEzsignuserV1Request);
    print_r($objCreateEzsignuserV1Response);
	
} catch (Exception $e) {
    print_r($e);
}

?>