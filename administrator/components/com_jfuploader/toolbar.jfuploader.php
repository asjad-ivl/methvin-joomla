<?php
/**
 * JFUploader 3.2.x Freeware - for Joomla 3.x
 *
 * Copyright (c) 2004-2016 TinyWebGallery
 * written by Michael Dempfle
 *
 * @license GNU / GPL 
 *   
 * For the latest version please go to http://jfu.tinywebgallery.com
**/

/** ensure this file is being included by a parent file */
defined( '_JEXEC' ) or die( 'Restricted access' );

require_once( JPATH_COMPONENT_ADMINISTRATOR . '/toolbar.jfuploader.html.php'  );

$view = JRequest::getVar('view','');
$task = JRequest::getVar('task','');
if ($task != '') {
    $view = $task;
}

switch ( $view ) {
	case "edit":
	case "edituser":
	case "newConfig":
		TOOLBAR_jfuploader::_EDIT();
		break;
	case "config":   
    TOOLBAR_jfuploader::_CONFIG();	
		break;
	case "user":
		TOOLBAR_jfuploader::_USER();	
		break;	
	case "upload":
		TOOLBAR_jfuploader::_UPLOAD();	
		break;
		case "plugins":
		TOOLBAR_jfuploader::_PLUGINS();	
		break;
	case "help":
		TOOLBAR_jfuploader::_HELP();	
		break;
	default:
		TOOLBAR_jfuploader::_UPLOAD();
		break;
}
?>