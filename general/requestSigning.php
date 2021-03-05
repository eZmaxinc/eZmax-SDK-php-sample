<?php

//Specifying namespaces we are using below to make the creation of objects easier to read.
use eZmaxAPI\Api\ObjectActivesessionApi;

define ('SECRET', 'ThisIsTheSecretAssociatedToTheAuthorizationKey');

/**
 * This sample shows how to sign requests. We use the activesession Get Current function in this example.
 *
 * OpenAPI currently don't have a way to sign the request automatically. eZmax will improve the OpenAPI generator to allow request signing and try to have the
 * code incorporated in the main distribution. In the meantime, this example, creates a guzzle request instead of using the API directly.
 *
 */

require_once (__DIR__ . '/../connector.php');

class CLASS_Signature {

	public static function getFingerprintV1 ($sAuthorization, $dtDate, $sMethod, $sURL, $sBody = '') {
		$sContentToHash = "$sMethod\n$sURL\n$sBody\n$sAuthorization\n$dtDate";
		return 'v1='.hash('sha256', $sContentToHash);
	}

	public static function getSignatureV1 ($sAuthorization, $dtDate, $sFingerprint, $sSecret) {
		$sContentToSign = "$sFingerprint$sAuthorization$dtDate";
		return 'v1='.hash_hmac('sha512/256', $sContentToSign, $sSecret);
	}

	public static function getHeadersV1 ($sAuthorization, $dtDate, $sSecret, $sMethod, $sURL, $sBody = '') {
		$sFingerprint = self::getFingerprintV1 ($sAuthorization, $dtDate, $sMethod, $sURL, $sBody);
		$sSignature = self::getSignatureV1 ($sAuthorization, $dtDate, $sFingerprint, $sSecret);
		
		return [
			'Ezmax-Date' => $dtDate,
			'Ezmax-Fingerprint' => $sFingerprint,
			'Ezmax-Signature' => $sSignature
		];
	}
	
	public static function signRequestV1 (\GuzzleHttp\Psr7\Request $objRequest) {
		
		$dtDate = gmdate('Y-m-d\TH:i:s\Z');
	
		$a_Headers = self::getHeadersV1 ($objRequest->getHeader('Authorization')[0], $dtDate, SECRET, $objRequest->getMethod(), $objRequest->getUri(), $objRequest->getBody());

		foreach ($a_Headers as $sHeader => $sValue) {
			$objRequest = $objRequest->withAddedHeader($sHeader, $sValue);
		}
		
		return $objRequest;
	}
}

class ObjectActivesessionApiSigned extends ObjectActivesessionApi {
	 public function activesessionGetCurrentV1Request() {
		$objRequest = parent::activesessionGetCurrentV1Request();
		return CLASS_Signature::signRequestV1($objRequest);
	 }
}

$objObjectActivesessionApiSigned = new ObjectActivesessionApiSigned(new GuzzleHttp\Client(), $objConfiguration);

try {
    
    /**
     * @var \eZmaxAPI\Model\ObjectActivesessionGetCurrentV1Response $objActivesessionGetCurrentV1Response
     */
    $objActivesessionGetCurrentV1Response = $objObjectActivesessionApiSigned->activesessionGetCurrentV1();
    
	//Dump complete response
    print_r($objActivesessionGetCurrentV1Response);
}
catch (Exception $e) {
    print_r($e);
}

?>