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

class TOOLBAR_jfuploader {

public static function _EDIT() {
  $canDo = JFUHelper::getActions();
  JToolBarHelper::title('JFUploader', 'jfu_toolbar_title' );
			if ($canDo->get('core.edit')) {
          JToolBarHelper::apply('saveConfig');
          JToolBarHelper::save('saveConfigClose');
      }
			JToolBarHelper::cancel('config');
			JToolBarHelper::divider();
			JToolBarHelper::help('tfu',true);	
  }
        
public static function _USER() {   
  $canDo = JFUHelper::getActions(); 
  JToolBarHelper::title('JFUploader', 'jfu_toolbar_title' );                       
  if ($canDo->get('core.admin')) {
    JToolBarHelper::preferences('com_jfuploader', '550','850', 'JACTION_ADMIN_JFU_PERMISSIONS' );
    JToolBarHelper::divider();
  }
  JToolBarHelper::help('tfu',true);	
}
        
public static function _HELP() {
  $canDo = JFUHelper::getActions();
  JToolBarHelper::title('JFUploader', 'jfu_toolbar_title' );
 	if ($canDo->get('core.admin')) {
    JToolBarHelper::preferences('com_jfuploader', '550','850', 'JACTION_ADMIN_JFU_PERMISSIONS' );
    JToolBarHelper::divider();
  }
	JToolBarHelper::help('tfu',true);		
}     
        
public static function _PLUGINS() {
  $canDo = JFUHelper::getActions();
  JToolBarHelper::title('JFUploader', 'jfu_toolbar_title' );

	if ($canDo->get('core.admin')) {
    JToolBarHelper::preferences('com_jfuploader', '550','850', 'JACTION_ADMIN_JFU_PERMISSIONS' );
    JToolBarHelper::divider();
  }
	JToolBarHelper::help('tfu',true);		
}    
        
public static function _UPLOAD() {
  $canDo = JFUHelper::getActions();
	JToolBarHelper::title('JFUploader', 'jfu_toolbar_title' );
                   
	if ($canDo->get('core.admin')) {
    JToolBarHelper::preferences('com_jfuploader', '550','850', 'JACTION_ADMIN_JFU_PERMISSIONS' );
    JToolBarHelper::divider();
  }
	JToolBarHelper::help('tfu',true);
}

public static function _CONFIG() {
  $canDo = JFUHelper::getActions();
  JToolBarHelper::title('JFUploader', 'jfu_toolbar_title' );
  if ($canDo->get('core.manage')) {
	  JToolBarHelper::apply('saveMainConfig');
	} 
  if ($canDo->get('core.admin')) {
    if ($canDo->get('core.create')) {
      JToolBarHelper::addNew('newConfig');
    }
    if ($canDo->get('core.edit')) {
      JToolBarHelper::editList('edit');
    }
    if ($canDo->get('core.create')) {
      JToolBarHelper::custom( 'copyConfig', 'copy', 'copy', 'T_COPY', true );
    }
	  if ($canDo->get('core.delete')) {
      JToolBarHelper::deleteList('','deleteConfig');
    }
  }
	JToolBarHelper::divider();
	if ($canDo->get('core.admin')) {
    JToolBarHelper::preferences('com_jfuploader', '550','850', 'JACTION_ADMIN_JFU_PERMISSIONS' );
    JToolBarHelper::divider();
  }
	JToolBarHelper::help('tfu',true);	
}
}
?>