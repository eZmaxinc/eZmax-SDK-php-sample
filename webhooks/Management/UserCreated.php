<?php

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\ObjectSerializer;

require_once (__DIR__ . '/../../connector.php');

// Set timezone
date_default_timezone_set('America/Montreal');

/*
 * Name of log file
 */
define('FILENAME_LOG', './UserCreated.log');

//Create or empty log file
file_put_contents(FILENAME_LOG,"");

/*
 * Function to add text in log file.
 */
function F_LOCAL_WriteToLog($sLogText){
	file_put_contents(FILENAME_LOG,$sLogText. "\n" , FILE_APPEND);
}


//This object contain all objects we receive.
$objWebhookUserCreated =  ObjectSerializer::deserialize(file_get_contents("php://input"), "eZmaxAPI\\Model\\WebhookUserUserCreated");

F_LOCAL_WriteToLog("Webhook received at \"".date('y-m-d H:i:s')."\"");

//This object contain webhook object.
$objWebhook = $objWebhookUserCreated->getObjWebhook();

F_LOCAL_WriteToLog("ID of Webhook : {$objWebhook->getPkiWebhookID()}");

F_LOCAL_WriteToLog("Webhook module name : {$objWebhook->getEWebhookModule()}");

if($objWebhook->getEWebhookModule() == "Management"){
	F_LOCAL_WriteToLog("We received a webhook with the right module.");
}
else{
	F_LOCAL_WriteToLog("We received a webhook for another module. The webhook is misconfigured?");
}

F_LOCAL_WriteToLog("Webhook event name : {$objWebhook->getEWebhookManagementevent()}");

if($objWebhook->getEWebhookManagementevent() == "UserCreated"){
	F_LOCAL_WriteToLog("We received a webhook for the right event.");
}
else{
	F_LOCAL_WriteToLog("We received a webhook for another event. The webhook is misconfigured?");
}

F_LOCAL_WriteToLog("Customer code : {$objWebhook->getPksCustomerCode()}");

F_LOCAL_WriteToLog("URL configured in the webhook : {$objWebhook->getSWebhookUrl()}");

// Get Email configured in the webhook : email used when all attempt failed
F_LOCAL_WriteToLog("Email configured in the webhook : {$objWebhook->getSWebhookEmailfailed()}");

F_LOCAL_WriteToLog("\n" , FILE_APPEND);



//This object contain list of previous attempt.
$a_objAttempt = $objWebhookUserCreated->getAObjAttempt();
if(count($a_objAttempt) == 0){
	F_LOCAL_WriteToLog("We don\'t have previous attempts. Webhook was passed on the first try.");

}
else{
	F_LOCAL_WriteToLog("We have ".count($a_objAttempt)." previous attempts.");

	$iAttemptNumber = 0;

	foreach($a_objAttempt as $objAttempt){

		$iAttemptNumber++;

		F_LOCAL_WriteToLog("Date time of attempt number {$iAttemptNumber} : {$objAttempt->getDtAttemptStart()}");

		F_LOCAL_WriteToLog("Result string of attempt number {$iAttemptNumber} : {$objAttempt->getSAttemptResult()}");

		F_LOCAL_WriteToLog("Duration of attempt number {$iAttemptNumber} : {$objAttempt->getIAttemptDuration()}");
	}
}

F_LOCAL_WriteToLog("\n" , FILE_APPEND);

//This object contain Ezsign User information.
$objUser = $objWebhookUserCreated->getObjUser();

//var_dump(get_class_methods($objUser));exit;

F_LOCAL_WriteToLog("ID of User : ".$objUser->getPkiUserID());
F_LOCAL_WriteToLog("User Loginname of User : ".$objUser->getSUserLoginname());


// If everything went well, send HTTP status code 204 so the calling server everything was successful and no more attempts should be made
header("HTTP/1.1 204");

?>