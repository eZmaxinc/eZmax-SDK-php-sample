<?php

/**
 * This sample shows how to create one or more Ezsignfoldersignerassociation.
 * Ezsignfoldersignerassociation allows to add a user of the system to the list of Signatories, or an an external Ezsignsigner.
 * In this example, we will create a single Ezsignfoldersignerassociation but you can create more than one by adding more objects to the array.
 * 
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectEzsignfoldersignerassociationApi;
use eZmaxAPI\Model\EzsignfoldersignerassociationCreateObjectV2Request;
use eZmaxAPI\Model\EzsignfoldersignerassociationRequestCompound;
use eZmaxAPI\Model\EzsignsignerRequestCompound;
use eZmaxAPI\Model\EzsignsignerRequestCompoundContact;

/*
 * The pkiEzsignfolderID to which we want to attach the document.
 * This value was returned after a successful Ezsignfolder creation.
 */

define ('SAMPLE_pkiEzsignfolderID', 1105);
define ('SAMPLE_pkiUserID', 3);

require_once (__DIR__ . '/../../connector.php');

/**
 * @var \eZmaxAPI\Api\ObjectEzsignfoldersignerassociationApi $objObjectEzsignfoldersignerassociationApi
 */
$objObjectEzsignfoldersignerassociationApi = new ObjectEzsignfoldersignerassociationApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contains all the objects we want to create.
$a_objEzsignfoldersignerassociationRequestCompound = [];

/**
 * This is the object that will contains an array of objEzsignfoldersignerassociationCompound you want to create.
 * @var \eZmaxAPI\Model\EzsignfoldersignerassociationCreateObjectV2Request $objEzsignfoldersignerassociationCreateObjectV2Request
 */
$objEzsignfoldersignerassociationCreateObjectV2Request = new EzsignfoldersignerassociationCreateObjectV2Request ();

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user in the office (Begin) **********************************/

/**
 * For this example, let's create an objEzsignfoldersignerassociation 
 * @var \eZmaxAPI\Model\EzsignfoldersignerassociationRequestCompound $objEzsignfoldersignerassociationRequestCompound
 */
$objEzsignfoldersignerassociationRequestCompound = new EzsignfoldersignerassociationRequestCompound();

//This will link the Ezsignfoldersignerassociation to an existing Ezsignfolder. This value was returned after a successful Ezsignfolder creation.
$objEzsignfoldersignerassociationRequestCompound->setFkiEzsignfolderID(SAMPLE_pkiEzsignfolderID);

//This will link the Ezsignfoldersignerassociation to an existing User in the system. This user will be able to be used as a signatory in the document
$objEzsignfoldersignerassociationRequestCompound->setFkiUserID(SAMPLE_pkiUserID);

// If this flag is true. The signatory will receive a copy of every signed Ezsigndocument even if it ain't required to sign the document.
// Default is false
$objEzsignfoldersignerassociationRequestCompound->setBEzsignfoldersignerassociationReceivecopy(true);

//Finally push the request to the array of objects to save
$a_objEzsignfoldersignerassociationRequestCompound [] = $objEzsignfoldersignerassociationRequestCompound;

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user in the office (End) **********************************/


/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with Email Validation (Begin) **********************************/

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

/** 
 * Let's create the object containing the informations of the contact of the signer
 * @var \eZmaxAPI\Model\EzsignsignerRequestCompoundContact $objEzsignsignerRequestCompoundContact
 **/
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

//Finally push the request to the array of objects to save
$a_objEzsignfoldersignerassociationRequestCompound [] = $objEzsignfoldersignerassociationRequestCompound;

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with Email Validation (End) **********************************/


/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with SMS/Phone + Email Validation (Begin) **********************************/

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

/**
 * Let's create the object containing the informations of the contact of the signer
 * @var \eZmaxAPI\Model\EzsignsignerRequestCompoundContact $objEzsignsignerRequestCompoundContact
 */
$objEzsignsignerRequestCompoundContact = new EzsignsignerRequestCompoundContact();

// Sets the first name
$objEzsignsignerRequestCompoundContact->setSContactFirstname('Kye');

// Sets the last name
$objEzsignsignerRequestCompoundContact->setSContactLastname('Mcguire');

// Sets the language of the contact
$objEzsignsignerRequestCompoundContact->setFkiLanguageID(1);

// Sets the email
$objEzsignsignerRequestCompoundContact->setSEmailAddress('test@domain.ca');

// Sets the phone number - DEPRECATED
//$objEzsignsignerRequestCompoundContact->setSPhoneNumber('5149901516');

// Sets the phone number
$objEzsignsignerRequestCompoundContact->setSPhoneE164('+15149901516');

// Sets the cell phone number - DEPRECATED
//$objEzsignsignerRequestCompoundContact->setSPhoneNumberCell('5149901516');

// Sets the cell phone number
$objEzsignsignerRequestCompoundContact->setSPhoneE164Cell('+15149901516');

// Let's add the contact to the signer object
$objEzsignsignerRequestCompound->setObjContact($objEzsignsignerRequestCompoundContact);

// Let's set the objEzsignsigner we want to add to the folder
$objEzsignfoldersignerassociationRequestCompound->setObjEzsignsigner($objEzsignsignerRequestCompound);

//Finally push the request to the array of objects to save
$a_objEzsignfoldersignerassociationRequestCompound [] = $objEzsignfoldersignerassociationRequestCompound;

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with SMS/Phone + Email Validation (End) **********************************/


/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with Secret question Validation (Begin) **********************************/

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
 
  /**
  * Let's create the object containing the informations of the contact of the signer
  * @var \eZmaxAPI\Model\EzsignsignerRequestCompoundContact $objEzsignsignerRequestCompoundContact
  */
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

 //Finally push the request to the array of objects to save
 $a_objEzsignfoldersignerassociationRequestCompound [] = $objEzsignfoldersignerassociationRequestCompound;

/********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with Secret question Validation (End) **********************************/



 /********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with SMS/Phone (Begin) **********************************/
  
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
 $objEzsignsignerRequestCompound->setEEzsignsignerLogintype('InPersonPhone');
 
 
 /**
  * Let's create the object containing the informations of the contact of the signer
  * @var \eZmaxAPI\Model\EzsignsignerRequestCompoundContact $objEzsignsignerRequestCompoundContact
  */
 $objEzsignsignerRequestCompoundContact = new EzsignsignerRequestCompoundContact();
 
 // Sets the first name
 $objEzsignsignerRequestCompoundContact->setSContactFirstname('Paolo');
 
 // Sets the last name
 $objEzsignsignerRequestCompoundContact->setSContactLastname('Simpson');
 
 // Sets the language of the contact
 $objEzsignsignerRequestCompoundContact->setFkiLanguageID(1);
 
// Sets the phone number - DEPRECATED
//$objEzsignsignerRequestCompoundContact->setSPhoneNumber('5149901516');

// Sets the phone number
$objEzsignsignerRequestCompoundContact->setSPhoneE164('+15149901516');

// Sets the cell phone number - DEPRECATED
//$objEzsignsignerRequestCompoundContact->setSPhoneNumberCell('5149901516');

// Sets the cell phone number
$objEzsignsignerRequestCompoundContact->setSPhoneE164Cell('+15149901516');
 
 // Let's add the contact to the signer object
 $objEzsignsignerRequestCompound->setObjContact($objEzsignsignerRequestCompoundContact);
 
 // Let's set the objEzsignsigner we want to add to the folder
 $objEzsignfoldersignerassociationRequestCompound->setObjEzsignsigner($objEzsignsignerRequestCompound);
 
 //Finally push the request to the array of objects to save
 $a_objEzsignfoldersignerassociationRequestCompound [] = $objEzsignfoldersignerassociationRequestCompound;
 
 /********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office with SMS/Phone + Email Validation (End) **********************************/
 
 
 
 /********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office without SMS/Phone (Begin) **********************************/
 
 /**
  * For this example, let's create an objEzsignfoldersignerassociationCompound
  * @var \eZmaxAPI\Model\EzsignfoldersignerassociationRequestCompound $objEzsignfoldersignerassociationRequestCompound
 */
 $objEzsignfoldersignerassociationRequestCompound = new EzsignfoldersignerassociationRequestCompound();
 
 //This will link the Ezsignfoldersignerassociation to an existing Ezsignfolder. This value was returned after a successful Ezsignfolder creation.
 $objEzsignfoldersignerassociationRequestCompound->setFkiEzsignfolderID(SAMPLE_pkiEzsignfolderID);

// If this flag is true. The signatory will receive a copy of every signed Ezsigndocument even if it ain't required to sign the document.
// Default is false
$objEzsignfoldersignerassociationRequestCompound->setBEzsignfoldersignerassociationReceivecopy(true);

 
 /**
  * Let's create an EzsignsignerRequestCompound since we will be adding an object contact in our signer
  * @var \eZmaxAPI\Model\EzsignsignerRequestCompound $objEzsignsignerRequestCompound
 */
 $objEzsignsignerRequestCompound = new EzsignsignerRequestCompound();
 
 // This will set the tax assignment for the ezsign signer. To let the system know which taxes he uses.
 // This value is important when we will later ask the Ezsignsigner to pay an amount using a credit card
 $objEzsignsignerRequestCompound->setFkiTaxassignmentID(1);
 
 // This will set the authentification method of the signer.
 $objEzsignsignerRequestCompound->setEEzsignsignerLogintype('InPerson');
 
 /**
  * Let's create the object containing the informations of the contact of the signer
  * @var \eZmaxAPI\Model\EzsignsignerRequestCompoundContact $objEzsignsignerRequestCompoundContact
  */
 $objEzsignsignerRequestCompoundContact = new EzsignsignerRequestCompoundContact();
 
 // Sets the first name
 $objEzsignsignerRequestCompoundContact->setSContactFirstname('James');
 
 // Sets the last name
 $objEzsignsignerRequestCompoundContact->setSContactLastname('Brown');
 
 // Sets the language of the contact
 $objEzsignsignerRequestCompoundContact->setFkiLanguageID(1);
 
 // Let's add the contact to the signer object
 $objEzsignsignerRequestCompound->setObjContact($objEzsignsignerRequestCompoundContact);
 
 // Let's set the objEzsignsigner we want to add to the folder
 $objEzsignfoldersignerassociationRequestCompound->setObjEzsignsigner($objEzsignsignerRequestCompound);
 
 //Finally push the request to the array of objects to save
 $a_objEzsignfoldersignerassociationRequestCompound [] = $objEzsignfoldersignerassociationRequestCompound;
 
 /********************************** EXAMPLE Ezsignfoldersignerassociation for a user outside of the office without SMS/Phone + Email Validation (End) **********************************/

 // Set the array containing all objEzsignfoldersignerassociationCompound in the objEzsignfoldersignerassociationCreateObjectV2Request object
 $objEzsignfoldersignerassociationCreateObjectV2Request->setAObjEzsignfoldersignerassociation($a_objEzsignfoldersignerassociationRequestCompound);


try {
    
    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
    //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($objEzsignfoldersignerassociationCreateObjectV2Request), JSON_PRETTY_PRINT).PHP_EOL;

    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server 
     * @var \eZmaxAPI\Model\EzsignfoldersignerassociationCreateObjectV2Response $objEzsignfoldersignerassociationCreateObjectV2Response
     */
    $objEzsignfoldersignerassociationCreateObjectV2Response = $objObjectEzsignfoldersignerassociationApi->EzsignfoldersignerassociationCreateObjectV2($objEzsignfoldersignerassociationCreateObjectV2Request);
    
    /*
     * The server will return the unique pkiEzsignfoldersignerassociationID of each created Ezsignfoldersignerassociation in the same order they were in the $a_objEzsignfoldersignerassociationRequestCompound array.
     * You can keep these values for future requests to check the status or other needs
     */
    foreach ($objEzsignfoldersignerassociationCreateObjectV2Response->getMPayload()->getAPkiEzsignfoldersignerassociationID() as $pkiEzsignfoldersignerassociationID) {
        echo "Ezsignfoldersignerassociation created with pkiEzsignfoldersignerassociationID = $pkiEzsignfoldersignerassociationID".PHP_EOL;
    }
    
    //Uncomment this line to ouput complete response
    //print_r($objEzsignfoldersignerassociationCreateObjectV2Response);
    
}
catch (Exception $e) {
    print_r($e);
}

?>