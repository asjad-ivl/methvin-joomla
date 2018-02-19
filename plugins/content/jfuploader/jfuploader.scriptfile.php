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

/**
 * Script file of JFUploader plugin
 */
class plgContentJFUploaderInstallerScript
{ 

 function update($parent) { 
     $this->install($parent);
 }
 
  function install($parent) { 
     // I activate the plugin
	   $db = JFactory::getDbo();
     $tableExtensions = $db->quoteName("#__extensions");
     $columnElement   = $db->quoteName("element");
     $columnType      = $db->quoteName("type");
     $columnEnabled   = $db->quoteName("enabled");
     
     // Enable plugin
     $db->setQuery("UPDATE $tableExtensions SET $columnEnabled=1 WHERE $columnElement='jfuploader' AND $columnType='plugin'");
     $db->query();
     
     echo '<br /><p>'. JText::_('JFU_PLUGIN_ENABLED') .'</p><br />';    
  } 
}
?>