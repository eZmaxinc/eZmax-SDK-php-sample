<?php

/**
 * This sample shows how to create one or more Ezsignfoldersignerassociation.
 * Ezsignfoldersignerassociation allows to add a user of the system to the list of Signatories, or an an external Ezsignsigner.
 * In this example, we will create a single Ezsignfoldersignerassociation but you can create more than one by adding more objects to the array.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\EzsignfoldersignerassociationApi;
use eZmaxAPI\Model\EzsignfoldersignerassociationCreateObjectV1Request;
use eZmaxAPI\Model\EzsignfoldersignerassociationRequest;
use eZmaxAPI\Model\EzsignfoldersignerassociationRequestCompound;
use eZmaxAPI\Model\EzsignsignerRequestCompound;
use eZmaxAPI\Model\EzsignsignerRequestCompoundContact;

/*
 * The pkiEzsignfolderID to which we want to attach the document.
 * This value was returned after a successful Ezsignfolder creation.
 */

define ('SAMPLE_pkiEzsignfolderID', 629);
define ('SAMPLE_pkiUserID', 4);

require_once (__DIR__ . '/../../connector.php');

$objEzsignfoldersignerassociationApi = new EzsignfoldersignerassociationApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contain all the objects we want to create.
$a_objEzsignfoldersignerassociationCreateObjectV1Request = [];

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user in the office (Begin) **********************************/

/**
 * This is the object that will contain either a objEzsignfoldersignerassociation or a objEzsignfoldersignerassociationCompound
 * depending on the type of object you want to create.
 * @var \eZmaxAPI\Model\EzsignfoldersignerassociationCreateObjectV1Request $objEzsignfoldersignerassociationCreateObjectV1Request
 */
$objEzsignfoldersignerassociationCreateObjectV1Request = new EzsignfoldersignerassociationCreateObjectV1Request ();

/**
 * For this example, let's create an objEzsignfoldersignerassociation 
 * @var \eZmaxAPI\Model\EzsignfoldersignerassociationRequest $objEzsignfoldersignerassociationRequest
 */
$objEzsignfoldersignerassociationRequest = new EzsignfoldersignerassociationRequest();

//This will link the Ezsignfoldersignerassociation to an existing Ezsignfolder. This value was returned after a successful Ezsignfolder creation.
$objEzsignfoldersignerassociationRequest->setFkiEzsignfolderID(SAMPLE_pkiEzsignfolderID);

//This will link the Ezsignfoldersignerassociation to an existing User in the system. This user will be able to be used as a signatory in the document
$objEzsignfoldersignerassociationRequest->setFkiUserID(SAMPLE_pkiUserID);

// Since we created a objEzsignfoldersignerassociation, set the proper value in the EzsignfoldersignerassociationCreateObjectV1Request object
$objEzsignfoldersignerassociationCreateObjectV1Request->setObjEzsignfoldersignerassociation($objEzsignfoldersignerassociationRequest);

//Finally push the request to the array of objects to save
$a_objEzsignfoldersignerassociationCreateObjectV1Request [] = $objEzsignfoldersignerassociationCreateObjectV1Request;

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user in the office (End) **********************************/



/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with Email Validation (Begin) **********************************/

/**
 * This is the object that will contain either a objEzsignfoldersignerassociation or a objEzsignfoldersignerassociationCompound
 * depending on the type of object you want to create.
 * @var \eZmaxAPI\Model\EzsignfoldersignerassociationCreateObjectV1Request $objEzsignfoldersignerassociationCreateObjectV1Request
 */
$objEzsignfoldersignerassociationCreateObjectV1Request = new EzsignfoldersignerassociationCreateObjectV1Request ();

/**
 * For this example, let's create an objEzsignfoldersignerassociationCompound
 * @var \eZmaxAPI\Model\EzsignfoldersignerassociationRequestCompound $objEzsignfoldersignerassociationRequestCompound
*/
$objEzsignfoldersignerassociationRequestCompound = new EzsignfoldersignerassociationRequestCompound();

//This will link the Ezsignfoldersignerassociation to an existing Ezsignfolder. This value was returned after a successful Ezsignfolder creation.
$objEzsignfoldersignerassociationRequestCompound->setFkiEzsignfolderID(SAMPLE_pkiEzsignfolderID);

/**
 * Let's create an EzsignsignerRequestCompound since we will be adding an object contact in our signer
 * @var \eZmaxAPI\Model\EzsignsignerRequestCompound $objEzsignsignerRequestCompound
*/
$objEzsignsignerRequestCompound = new EzsignsignerRequestCompound();

// This will set the tax assignment for the ezsign signer. To let the system know which taxes he uses.
// This value is important when we will later ask the Ezsignsigner to pay an amount using a credit card 
$objEzsignsignerRequestCompound->setFkiTaxassignmentID(1);

// This will set the authentification method of the signer.
$objEzsignsignerRequestCompound->setEEzsignsignerLogintype('Password');

// Let's create the object containing the informations of the contact of the signer
$objEzsignsignerRequestCompoundContact = new EzsignsignerRequestCompoundContact();

// Sets the first name
$objEzsignsignerRequestCompoundContact->setSContactFirstname('Araséèëàâ');

// Sets the last name
$objEzsignsignerRequestCompoundContact->setSContactLastname('Robertson');

// Sets the language of the contact
$objEzsignsignerRequestCompoundContact->setFkiLanguageID(1);

// Sets the email
$objEzsignsignerRequestCompoundContact->setSEmailAddress('test@domain.ca');

// Let's add the contact to the signer object
$objEzsignsignerRequestCompound->setObjContact($objEzsignsignerRequestCompoundContact);

// Let's set the objEzsignsigner we want to add to the folder
$objEzsignfoldersignerassociationRequestCompound->setObjEzsignsigner($objEzsignsignerRequestCompound);

// Since we created a objEzsignfoldersignerassociation, set the proper value in the EzsignfoldersignerassociationCreateObjectV1Request object
$objEzsignfoldersignerassociationCreateObjectV1Request->setObjEzsignfoldersignerassociationCompound($objEzsignfoldersignerassociationRequestCompound);

//Finally push the request to the array of objects to save
$a_objEzsignfoldersignerassociationCreateObjectV1Request [] = $objEzsignfoldersignerassociationCreateObjectV1Request;

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with Email Validation (End) **********************************/


/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with SMS/Phone + Email Validation (Begin) **********************************/

/**
 * This is the object that will contain either a objEzsignfoldersignerassociation or a objEzsignfoldersignerassociationCompound
 * depending on the type of object you want to create.
 * @var \eZmaxAPI\Model\EzsignfoldersignerassociationCreateObjectV1Request $objEzsignfoldersignerassociationCreateObjectV1Request
 */
$objEzsignfoldersignerassociationCreateObjectV1Request = new EzsignfoldersignerassociationCreateObjectV1Request ();

/**
 * For this example, let's create an objEzsignfoldersignerassociationCompound
 * @var \eZmaxAPI\Model\EzsignfoldersignerassociationRequestCompound $objEzsignfoldersignerassociationRequestCompound
*/
$objEzsignfoldersignerassociationRequestCompound = new EzsignfoldersignerassociationRequestCompound();

//This will link the Ezsignfoldersignerassociation to an existing Ezsignfolder. This value was returned after a successful Ezsignfolder creation.
$objEzsignfoldersignerassociationRequestCompound->setFkiEzsignfolderID(SAMPLE_pkiEzsignfolderID);

/**
 * Let's create an EzsignsignerRequestCompound since we will be adding an object contact in our signer
 * @var \eZmaxAPI\Model\EzsignsignerRequestCompound $objEzsignsignerRequestCompound
 */
$objEzsignsignerRequestCompound = new EzsignsignerRequestCompound();

// This will set the tax assignment for the ezsign signer. To let the system know which taxes he uses.
// This value is important when we will later ask the Ezsignsigner to pay an amount using a credit card
$objEzsignsignerRequestCompound->setFkiTaxassignmentID(1);

// This will set the authentification method of the signer.
$objEzsignsignerRequestCompound->setEEzsignsignerLogintype('PasswordPhone');

// Let's create the object containing the informations of the contact of the signer
$objEzsignsignerRequestCompoundContact = new EzsignsignerRequestCompoundContact();

// Sets the first name
$objEzsignsignerRequestCompoundContact->setSContactFirstname('Kye');

// Sets the last name
$objEzsignsignerRequestCompoundContact->setSContactLastname('Mcguire');

// Sets the language of the contact
$objEzsignsignerRequestCompoundContact->setFkiLanguageID(1);

// Sets the email
$objEzsignsignerRequestCompoundContact->setSEmailAddress('test@domain.ca');

// Sets the phone number
$objEzsignsignerRequestCompoundContact->setSPhoneNumber('5149901516');

// Sets the cell phone number
$objEzsignsignerRequestCompoundContact->setSPhoneNumberCell('5149901516');

// Let's add the contact to the signer object
$objEzsignsignerRequestCompound->setObjContact($objEzsignsignerRequestCompoundContact);

// Let's set the objEzsignsigner we want to add to the folder
$objEzsignfoldersignerassociationRequestCompound->setObjEzsignsigner($objEzsignsignerRequestCompound);

// Since we created a objEzsignfoldersignerassociation, set the proper value in the EzsignfoldersignerassociationCreateObjectV1Request object
$objEzsignfoldersignerassociationCreateObjectV1Request->setObjEzsignfoldersignerassociationCompound($objEzsignfoldersignerassociationRequestCompound);

//Finally push the request to the array of objects to save
$a_objEzsignfoldersignerassociationCreateObjectV1Request [] = $objEzsignfoldersignerassociationCreateObjectV1Request;

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with SMS/Phone + Email Validation (End) **********************************/


/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with Secret question Validation (Begin) **********************************/

/**
 * This is the object that will contain either a objEzsignfoldersignerassociation or a objEzsignfoldersignerassociationCompound
 * depending on the type of object you want to create.
 * @var \eZmaxAPI\Model\EzsignfoldersignerassociationCreateObjectV1Request $objEzsignfoldersignerassociationCreateObjectV1Request
 */
 $objEzsignfoldersignerassociationCreateObjectV1Request = new EzsignfoldersignerassociationCreateObjectV1Request ();

/**
 * For this example, let's create an objEzsignfoldersignerassociationCompound
 * @var \eZmaxAPI\Model\EzsignfoldersignerassociationRequestCompound $objEzsignfoldersignerassociationRequestCompound
 */
 $objEzsignfoldersignerassociationRequestCompound = new EzsignfoldersignerassociationRequestCompound();

 //This will link the Ezsignfoldersignerassociation to an existing Ezsignfolder. This value was returned after a successful Ezsignfolder creation.
 $objEzsignfoldersignerassociationRequestCompound->setFkiEzsignfolderID(SAMPLE_pkiEzsignfolderID);

 /**
  * Let's create an EzsignsignerRequestCompound since we will be adding an object contact in our signer
  * @var \eZmaxAPI\Model\EzsignsignerRequestCompound $objEzsignsignerRequestCompound
  */
 $objEzsignsignerRequestCompound = new EzsignsignerRequestCompound();
 
 // This will set the tax assignment for the ezsign signer. To let the system know which taxes he uses.
 // This value is important when we will later ask the Ezsignsigner to pay an amount using a credit card
  $objEzsignsignerRequestCompound->setFkiTaxassignmentID(1);
 
 // This will set which question the user will have to answer when logging in.
 $objEzsignsignerRequestCompound->setFkiSecretquestionID(1);
 
 // This will set the answer to provide to the question. If you set a question you must provide an answer. 
 $objEzsignsignerRequestCompound->setSEzsignsignerSecretanswer('MYSECRETANSWER');
 
 // This will set the authentification method of the signer.
 $objEzsignsignerRequestCompound->setEEzsignsignerLogintype('PasswordQuestion');
 
 // Let's create the object containing the informations of the contact of the signer
 $objEzsignsignerRequestCompoundContact = new EzsignsignerRequestCompoundContact();
 
 // Sets the first name
 $objEzsignsignerRequestCompoundContact->setSContactFirstname('Kira');
 
 // Sets the last name 
 $objEzsignsignerRequestCompoundContact->setSContactLastname('Sharples');
 
 // Sets the language of the contact
 $objEzsignsignerRequestCompoundContact->setFkiLanguageID(1);
 
 // Sets the email
 $objEzsignsignerRequestCompoundContact->setSEmailAddress('test@domain.ca');
 
 // Let's add the contact to the signer object
 $objEzsignsignerRequestCompound->setObjContact($objEzsignsignerRequestCompoundContact);

 // Let's set the objEzsignsigner we want to add to the folder
 $objEzsignfoldersignerassociationRequestCompound->setObjEzsignsigner($objEzsignsignerRequestCompound);

 // Since we created a objEzsignfoldersignerassociation, set the proper value in the EzsignfoldersignerassociationCreateObjectV1Request object
 $objEzsignfoldersignerassociationCreateObjectV1Request->setObjEzsignfoldersignerassociationCompound($objEzsignfoldersignerassociationRequestCompound);

 //Finally push the request to the array of objects to save
 $a_objEzsignfoldersignerassociationCreateObjectV1Request [] = $objEzsignfoldersignerassociationCreateObjectV1Request;

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with Secret question Validation (End) **********************************/

 
 
 /********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with SMS/Phone (Begin) **********************************/
 
 /**
  * This is the object that will contain either a objEzsignfoldersignerassociation or a objEzsignfoldersignerassociationCompound
  * depending on the type of object you want to create.
  * @var \eZmaxAPI\Model\EzsignfoldersignerassociationCreateObjectV1Request $objEzsignfoldersignerassociationCreateObjectV1Request
  */
 $objEzsignfoldersignerassociationCreateObjectV1Request = new EzsignfoldersignerassociationCreateObjectV1Request ();
 
 /**
  * For this example, let's create an objEzsignfoldersignerassociationCompound
  * @var \eZmaxAPI\Model\EzsignfoldersignerassociationRequestCompound $objEzsignfoldersignerassociationRequestCompound
 */
 $objEzsignfoldersignerassociationRequestCompound = new EzsignfoldersignerassociationRequestCompound();
 
 //This will link the Ezsignfoldersignerassociation to an existing Ezsignfolder. This value was returned after a successful Ezsignfolder creation.
 $objEzsignfoldersignerassociationRequestCompound->setFkiEzsignfolderID(SAMPLE_pkiEzsignfolderID);
 
 /**
  * Let's create an EzsignsignerRequestCompound since we will be adding an object contact in our signer
  * @var \eZmaxAPI\Model\EzsignsignerRequestCompound $objEzsignsignerRequestCompound
 */
 $objEzsignsignerRequestCompound = new EzsignsignerRequestCompound();
 
 // This will set the tax assignment for the ezsign signer. To let the system know which taxes he uses.
 // This value is important when we will later ask the Ezsignsigner to pay an amount using a credit card
 $objEzsignsignerRequestCompound->setFkiTaxassignmentID(1);
 
 // This will set the authentification method of the signer.
 $objEzsignsignerRequestCompound->setEEzsignsignerLogintype('Phone');
 
 // Let's create the object containing the informations of the contact of the signer
 $objEzsignsignerRequestCompoundContact = new EzsignsignerRequestCompoundContact();
 
 // Sets the first name
 $objEzsignsignerRequestCompoundContact->setSContactFirstname('Paolo');
 
 // Sets the last name
 $objEzsignsignerRequestCompoundContact->setSContactLastname('Simpson');
 
 // Sets the language of the contact
 $objEzsignsignerRequestCompoundContact->setFkiLanguageID(1);
 
 // Sets the phone number
 $objEzsignsignerRequestCompoundContact->setSPhoneNumber('5149901516');
 
 // Sets the cell phone number
 $objEzsignsignerRequestCompoundContact->setSPhoneNumberCell('5149901516');
 
 // Let's add the contact to the signer object
 $objEzsignsignerRequestCompound->setObjContact($objEzsignsignerRequestCompoundContact);
 
 // Let's set the objEzsignsigner we want to add to the folder
 $objEzsignfoldersignerassociationRequestCompound->setObjEzsignsigner($objEzsignsignerRequestCompound);
 
 // Since we created a objEzsignfoldersignerassociation, set the proper value in the EzsignfoldersignerassociationCreateObjectV1Request object
 $objEzsignfoldersignerassociationCreateObjectV1Request->setObjEzsignfoldersignerassociationCompound($objEzsignfoldersignerassociationRequestCompound);
 
 //Finally push the request to the array of objects to save
 $a_objEzsignfoldersignerassociationCreateObjectV1Request [] = $objEzsignfoldersignerassociationCreateObjectV1Request;
 
 /********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with SMS/Phone + Email Validation (End) **********************************/




try {
    
    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
    //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($a_objEzsignfoldersignerassociationCreateObjectV1Request), JSON_PRETTY_PRINT).PHP_EOL;

    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server 
     * @var \eZmaxAPI\Model\EzsignfoldersignerassociationCreateObjectV1Response $objEzsignfoldersignerassociationCreateObjectV1Response
     */
    $objEzsignfoldersignerassociationCreateObjectV1Response = $objEzsignfoldersignerassociationApi->EzsignfoldersignerassociationCreateObjectV1($a_objEzsignfoldersignerassociationCreateObjectV1Request);
    
    /*
     * The server will return the unique pkiEzsignfoldersignerassociationID of each created Ezsignfoldersignerassociation in the same order they were in the $a_objEzsignfoldersignerassociationCreateObjectV1Request array.
     * You can keep these values for future requests to check the status or other needs
     */
    foreach ($objEzsignfoldersignerassociationCreateObjectV1Response->getMPayload()->getAPkiEzsignfoldersignerassociationID() as $pkiEzsignfoldersignerassociationID) {
        echo "Ezsignfoldersignerassociation created with pkiEzsignfoldersignerassociationID = $pkiEzsignfoldersignerassociationID".PHP_EOL;
    }
    
    //Uncomment this line to ouput complete response
    //print_r($objEzsignfoldersignerassociationCreateObjectV1Response);
    
}
catch (Exception $e) {
    print_r($e);
}

?>