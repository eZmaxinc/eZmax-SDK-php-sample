<?php 

//Load composers packages
require_once (__DIR__ . '/vendor/autoload.php');

//Test

/**
 * Using a global variable is not the best design, you will probably want to wrap this in a class.
 * To have the sample simple to follow, and to reduce duplication of code, we chose to use a global variable
 */
global $objConfiguration;

//You don't need to store the configuration in another file, we use this to simplify sample deployment to github 
if (is_readable(__DIR__ . '/environment.php')) {
    require (__DIR__ . '/environment.php');
}
else {
    /**
     * Create the configuration object that will be passed to the API.
     * Specify your API key to access the API.
     * @var \eZmaxAPI\Configuration $objConfiguration
     */
    $objConfiguration = eZmaxAPI\Configuration::getDefaultConfiguration()
    					->setApiKey('Authorization', 'ThisIsMyAuthorizationKey')
    					->setSecret('ThisIsTheSecretAssociatedToTheAuthorizationKey'); //Add this line if you want to sign your requests (Recommended)
}



?>