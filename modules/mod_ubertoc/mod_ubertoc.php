<?php

// no direct access
defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once dirname(__FILE__).'/helper.php';

$doc = JFactory::getDocument();

if($params->get('load_jquery',0)){
	$doc->addScript('http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js');
	$doc->addScriptDeclaration('jQuery.noConflict();');
};


$doc->addScript(JURI::base() . 'modules/mod_ubertoc/assets/js/jquery-ui-1.10.2.custom.min.js');
$doc->addScript(JURI::base() . 'modules/mod_ubertoc/assets/js/jquery.tocify.min.js');



require JModuleHelper::getLayoutPath('mod_ubertoc',$params->get('modulelayout','default'));



?>



