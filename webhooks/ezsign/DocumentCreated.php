<?php

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\ObjectSerializer;


// Set timezone
date_default_timezone_set('America/Montreal');

/*
 * Name of log file
 */
define('FILENAME_LOG', './DocumentCreated.log');

//Create or empty log file
file_put_contents(FILENAME_LOG,"");

/*
 * Function to add text in log file.
 */
function F_LOCAL_WriteToLog($sLogText){
	file_put_contents(FILENAME_LOG,$sLogText. "\n" , FILE_APPEND);
}


//This object contain all objects we receive.
$objWebhookEzsignDocumentCompleted =  ObjectSerializer::deserialize(file_get_contents("php://input"), "eZmaxAPI\\Model\\WebhookEzsignDocumentCompleted");

F_LOCAL_WriteToLog("Webhook received at \"".date('y-m-d H:i:s')."\"");

//This object contain webhook object.
$objWebhook = $objWebhookEzsignDocumentCompleted->getObjWebhook();

F_LOCAL_WriteToLog("ID of Webhook : {$objWebhook->getPkiWebhookID()}");

F_LOCAL_WriteToLog("Webhook module name : {$objWebhook->getEWebhookModule()}");

if($objWebhook->getEWebhookModule() == "Ezsign"){
	F_LOCAL_WriteToLog("We received a webhook with the right module.");
}
else{
	F_LOCAL_WriteToLog("We received a webhook for another module. The webhook is misconfigured?");
}

F_LOCAL_WriteToLog("Webhook event name : {$objWebhook->getEWebhookEzsignevent()}");

if($objWebhook->getEWebhookEzsignevent() == "DocumentCompleted"){
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
$a_objAttempt = $objWebhookEzsignDocumentCompleted->getAObjAttempt();
if(count($a_objAttempt) == 0){
	F_LOCAL_WriteToLog("We don\'t have previous attempts. Webhook was passed on the first try.");

}else{
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



//This object contain EzsignDocument information.
$objEzsigndocument = $objWebhookEzsignDocumentCompleted->getObjEzsigndocument();

F_LOCAL_WriteToLog("ID of document : ".$objEzsigndocument->getPkiEzsigndocumentID());
F_LOCAL_WriteToLog("ID of folder : ".$objEzsigndocument->getFkiEzsignfolderID());
F_LOCAL_WriteToLog("Document due date : ".$objEzsigndocument->getDtEzsigndocumentDuedate());
F_LOCAL_WriteToLog("ID of language : ".$objEzsigndocument->getFkiLanguageID());
F_LOCAL_WriteToLog("File name of document : ".$objEzsigndocument->getSEzsigndocumentFilename());
F_LOCAL_WriteToLog("Document name : ".$objEzsigndocument->getSEzsigndocumentName());

// If everything went well, send HTTP status code 204 so the calling server everything was successful and no more attempts should be made
header("HTTP/1.1 204");

?>