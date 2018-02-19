<?php
/**
 * @package	AcySMS for Joomla!
 * @version	3.5.0
 * @author	acyba.com
 * @copyright	(C) 2009-2018 ACYBA S.A.R.L. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
?><?php
include(ACYSMS_BACK.'views'.DS.'message'.DS.'view.html.php');

class FrontmessageViewFrontmessage extends MessageViewMessage{
	var $ctrl = 'frontmessage';

	function display($tpl = null){
		JHTML::_('behavior.tooltip');

		global $Itemid;
		$this->assignRef('Itemid', $Itemid);

		parent::display($tpl);
	}

	function listing(){

		if(empty($_POST) && !JRequest::getInt('start') && !JRequest::getInt('limitstart')){
			JRequest::setVar('limitstart', 0);
		}

		return parent::listing();
	}
}

