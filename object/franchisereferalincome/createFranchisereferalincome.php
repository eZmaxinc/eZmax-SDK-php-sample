<?php 

/**
 * This sample shows how to create one or more Franchisereferalincome.
 * In this example, we will create a single Franchisereferalincome but you can create more than one by adding more objects to the array.
 *
 */

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectFranchisereferalincomeApi;
use eZmaxAPI\Model\FranchisereferalincomeCreateObjectV1Request;
use eZmaxAPI\Model\FranchisereferalincomeRequestCompound;
use eZmaxAPI\Model\ContactRequestCompound;
use eZmaxAPI\Model\ContactinformationsRequestCompound;
use eZmaxAPI\Model\AddressRequest;
use eZmaxAPI\Model\EmailRequest;
use eZmaxAPI\Model\PhoneRequest;
use eZmaxAPI\Model\WebsiteRequest;

require_once (__DIR__ . '/../../connector.php');

define ('SAMPLE_fkiAddresstypeID', 1); // Office
define ('SAMPLE_fkiProvinceID', 11); // Quebec
define ('SAMPLE_fkiCountryID', 1); // Canada 
define ('SAMPLE_fkiFranchisebrokerID', 1);
define ('SAMPLE_fkiFranchisereferalincomeprogramID', 1);
define ('SAMPLE_fkiPeriodID', 420);
define ('SAMPLE_fkiContacttitleID', 2); // Mr.
define ('SAMPLE_fkiLanguageID', 2); // English
define ('SAMPLE_fkiPhonetypeID', 1); // Office
define ('SAMPLE_fkiEmailtypeID', 1); // Office
define ('SAMPLE_fkiWebsitetypeID', 1); // Website

$objFranchisereferalincomeApi = new ObjectFranchisereferalincomeApi(new GuzzleHttp\Client(), $objConfiguration);

//This array will contain all the objects we want to create.
$a_objFranchisereferalincomeCreateObjectV1Request = [];

/**
 * This is the object that will contain a objFranchisereferalincomeCreateObjectV1Request to create
 * @var \eZmaxAPI\Model\FranchisereferalincomeCreateObjectV1Request $objFranchisereferalincomeCreateObjectV1Request
*/
$objFranchisereferalincomeCreateObjectV1Request = new FranchisereferalincomeCreateObjectV1Request ();

/**
 * For this example, let's create an objFranchisereferalincome
 * @var \eZmaxAPI\Model\FranchisereferalincomeRequestCompound $objFranchisereferalincomeRequestCompound
 */
$objFranchisereferalincomeRequestCompound = new FranchisereferalincomeRequestCompound();

/**
 * Let's create an objAddressRequest
 * @var \eZmaxAPI\Model\AddressRequest $objAddressRequest
 */
$objAddressRequest = new AddressRequest();

/**
 * Sets the address type
 */
$objAddressRequest->setFkiAddresstypeID(SAMPLE_fkiAddresstypeID);

/**
 * Sets the address civic
 */
$objAddressRequest->setSAddressCivic('2540');

/**
 * Sets the address street
 */
$objAddressRequest->setSAddressStreet('Daniel-Johnson Blvd.');

/**
 * Sets the address suite
 */
$objAddressRequest->setSAddressSuite('610');

/**
 * Sets the address city
 */
$objAddressRequest->setSAddressCity('Laval');

/**
 * Sets the address province
 */
$objAddressRequest->setFkiProvinceID(SAMPLE_fkiProvinceID);

/**
 * Sets the address country
 */
$objAddressRequest->setFkiCountryID(SAMPLE_fkiCountryID);

/**
 * Sets the address zip code
 */
$objAddressRequest->setSAddressZip('H7T2S3');

/**
 * Sets the address to the request
 */
$objFranchisereferalincomeRequestCompound->setObjAddress($objAddressRequest);

/**
 * Sets the franchise broker.
 */
$objFranchisereferalincomeRequestCompound->setFkiFranchisebrokerID(SAMPLE_fkiFranchisebrokerID);

/**
 * Sets the program.
 */
$objFranchisereferalincomeRequestCompound->setFkiFranchisereferalincomeprogramID(SAMPLE_fkiFranchisereferalincomeprogramID);

/**
 * Sets the period.
 */
$objFranchisereferalincomeRequestCompound->setFkiPeriodID(SAMPLE_fkiPeriodID);

/**
 * Sets the loan amount
 */
$objFranchisereferalincomeRequestCompound->setDFranchisereferalincomeLoan(500275.62);

/**
 * Sets the franchise amount
 */
$objFranchisereferalincomeRequestCompound->setDFranchisereferalincomeFranchiseamount(275.00);

/**
 * Sets the franchisor amount
 */
$objFranchisereferalincomeRequestCompound->setDFranchisereferalincomeFranchisoramount(385.00);

/**
 * Sets the agent amount
 */
$objFranchisereferalincomeRequestCompound->setDFranchisereferalincomeAgentamount(800.00);

/**
 * Sets the disbursement date
 */
$objFranchisereferalincomeRequestCompound->setDtFranchisereferalincomeDisbursed('2020-12-31');

/**
 * Sets the comment
 */
$objFranchisereferalincomeRequestCompound->setTFranchisereferalincomeComment('This is a comment');

/**
 * Let's create a contact list 
 */
$a_objContactRequestCompound = [];

/**
 * Let's create an ContactRequestCompound
 * @var \eZmaxAPI\Model\ContactRequestCompound $objContactRequestCompound
 */
$objContactRequestCompound = new ContactRequestCompound();

/**
 * Sets the first name
 */
$objContactRequestCompound->setSContactFirstname('John');

/**
 * Sets the last name
 */
$objContactRequestCompound->setSContactLastname('Doe');

/**
 * Sets the company
 */
$objContactRequestCompound->setSContactCompany('eZmax Solutions Inc.');

/**
 * Sets the birth date
 */
$objContactRequestCompound->setDtContactBirthdate('1980-01-01');

/**
 * Sets the contact title
 */
$objContactRequestCompound->setFkiContacttitleID(SAMPLE_fkiContacttitleID);

/**
 * Sets the language
 */
$objContactRequestCompound->setFkiLanguageID(SAMPLE_fkiLanguageID);

/**
 * Let's create an objContactinformationsRequestCompound
 * @var \eZmaxAPI\Model\ContactinformationsRequestCompound $objContactinformationsRequestCompound
 */
$objContactinformationsRequestCompound = new ContactinformationsRequestCompound();

/**
 * Let's create an address list for the contact
 */
$a_objAddressRequestContact = [];

/**
 * Let's create an objAddressRequest
 * @var \eZmaxAPI\Model\AddressRequest $objAddressRequestContact
 */
$objAddressRequestContact = new AddressRequest();
/**
 * Sets the address type
 */
$objAddressRequestContact->setFkiAddresstypeID(SAMPLE_fkiAddresstypeID);

/**
 * Sets the address civic
 */
$objAddressRequestContact->setSAddressCivic('2540');

/**
 * Sets the address street
 */
$objAddressRequestContact->setSAddressStreet('Daniel-Johnson Blvd.');

/**
 * Sets the address suite
 */
$objAddressRequestContact->setSAddressSuite('610');

/**
 * Sets the address city
 */
$objAddressRequestContact->setSAddressCity('Laval');

/**
 * Sets the address province
 */
$objAddressRequestContact->setFkiProvinceID(SAMPLE_fkiProvinceID);

/**
 * Sets the address country
 */
$objAddressRequestContact->setFkiCountryID(SAMPLE_fkiCountryID);

/**
 * Sets the address zip code
 */
$objAddressRequestContact->setSAddressZip('H7T2S3');

/**
 * Adds the address to the address list
 */
$a_objAddressRequestContact[] = $objAddressRequestContact;

/**
 * Creates an email list
 */
$a_objEmailRequestContact = [];

/**
 * Creates a new email object
 */
$objEmailRequestContact = new EmailRequest();

/**
 * Sets the email type
 */
$objEmailRequestContact->setFkiEmailtypeID(SAMPLE_fkiEmailtypeID);

/**
 * Sets the email address
 */
$objEmailRequestContact->setSEmailAddress('example@domain.com');

/**
 * Let's add the email to the email list
 */
$a_objEmailRequestContact[] = $objEmailRequestContact;

/**
 * Creates a phone list
 */
$a_objPhoneRequestContact = [];

/**
 * Creates a new phone object
 */
$objPhoneRequestContact = new PhoneRequest();

/**
 * Sets the phone type
 */
$objPhoneRequestContact->setFkiPhonetypeID(SAMPLE_fkiPhonetypeID);

/**
 * Sets the phone type location
 */
$objPhoneRequestContact->setEPhoneType('Local');

/**
 * Sets the phone region
 */
$objPhoneRequestContact->setSPhoneRegion('514');

/**
 * Sets the phone exchange
 */
$objPhoneRequestContact->setSPhoneExchange('990');

/**
 * Sets the phone number
 */
$objPhoneRequestContact->setSPhoneNumber('1516');

/**
 * Sets the phone number if international
 */
$objPhoneRequestContact->setSPhoneInternational('442071838750');

/**
 * Sets the phone extension
 */
$objPhoneRequestContact->setSPhoneExtension('123');

/**
 * Let's add the phone to the phone list
 */
$a_objPhoneRequestContact[] = $objPhoneRequestContact;

/**
 * Creates a website list 
 */
$a_objWebsiteRequest = [];
/**
 * Create a new website object
 */
$objWebsiteRequestContact = new WebsiteRequest();

/**
 * Sets the website type
 */
$objWebsiteRequestContact->setFkiWebsitetypeID(SAMPLE_fkiWebsitetypeID);

/**
 * Sets the website address
 */
$objWebsiteRequestContact->setSWebsiteAddress('https://www.domain.com');

/**
 * Let's add the website to the website list
 */
$a_objWebsiteRequest[] = $objWebsiteRequestContact;

/**
 * Let's add the array containing all the addresses
 */
$objContactinformationsRequestCompound->setAObjAddress($a_objAddressRequestContact);

/**
 * Let's indicate the first address is the default one
 */
$objContactinformationsRequestCompound->setIAddressDefault(0);

/**
 * Let's add the array containing all the phones
 */
$objContactinformationsRequestCompound->setAObjPhone($a_objPhoneRequestContact);
/**
 * Let's indicate the first phone is the default one
 */
$objContactinformationsRequestCompound->setIPhoneDefault(0);

/**
 * Let's add the array containing all the emails
 */
$objContactinformationsRequestCompound->setAObjEmail($a_objEmailRequestContact);

/**
 * Let's indicate the first email is the default one
 */
$objContactinformationsRequestCompound->setIEmailDefault(0);

/**
 * Let's add the array containing all the websites
 */
$objContactinformationsRequestCompound->setAObjWebsite($a_objWebsiteRequest);

/**
 * Let's indicate the first website is the default one
 */
$objContactinformationsRequestCompound->setIWebsiteDefault(0);

/**
 * Sets the contact informations
 */
$objContactRequestCompound->setObjContactinformations($objContactinformationsRequestCompound);

/**
 * Let's add the newly created contact to the list of contacts
 */
$a_objContactRequestCompound[] = $objContactRequestCompound;

/**
 * Set the contact list to the object
 */
$objFranchisereferalincomeRequestCompound->setAObjContact($a_objContactRequestCompound);

// Sets the objFranchisereferalincome to the request object
$objFranchisereferalincomeCreateObjectV1Request->setObjFranchisereferalincomeCompound($objFranchisereferalincomeRequestCompound);


//Finally push the request to the array of objects to save
$a_objFranchisereferalincomeCreateObjectV1Request[] = $objFranchisereferalincomeCreateObjectV1Request;

try {

    /*
     * Uncomment this line if you want to see the actual request's body that will be sent to the server
     */
    //echo json_encode(eZmaxAPI\ObjectSerializer::sanitizeForSerialization ($a_objFranchisereferalincomeCreateObjectV1Request), JSON_PRETTY_PRINT).PHP_EOL;

    /**
     * Now that all the objects are ready in the array to save, let's send the request to the server
     * @var \eZmaxAPI\Model\FranchisereferalincomeCreateObjectV1Response $objFranchisereferalincomeCreateObjectV1Response
     */
    $objFranchisereferalincomeCreateObjectV1Response = $objFranchisereferalincomeApi->franchisereferalincomeCreateObjectV1($a_objFranchisereferalincomeCreateObjectV1Request);
    
    /*
     * The server will return the unique pkiFranchisereferalincomeID of each created franchise referal income in the same order they were in the $a_objFranchisereferalincomeCreateObjectV1Request array.
     * You can keep these values for future requests to check the status or other needs
    */
    foreach ($objFranchisereferalincomeCreateObjectV1Response->getMPayload()->getAPkiFranchisereferalincomeID() as $pkiFranchisereferalincomeID) {
        echo "Franchisereferalincome created with pkiFranchisereferalincomeID = $pkiFranchisereferalincomeID".PHP_EOL;
    }

    //Uncomment this line to ouput complete response
    //print_r($objFranchisereferalincomeCreateObjectV1Response);

}
catch (Exception $e) {
    print_r($e);
}

?>