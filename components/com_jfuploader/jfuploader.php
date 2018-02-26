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
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import joomla controller library
jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by JFUploader
$controller = JControllerLegacy::getInstance('JFUploader');
 
// Perform the Request task
$controller->execute(JRequest::getCmd('task'));
 
// Redirect if set by the controller
$controller->redirect();
?>