<?php
/**
 * @package	AcySMS for Joomla!
 * @version	3.5.0
 * @author	acyba.com
 * @copyright	(C) 2009-2018 ACYBA S.A.R.L. All rights reserved.
 * @license	GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */
defined('_JEXEC') or die('Restricted access');
?><fieldset id="acysms_export_menu">
	<div class="toolbar" id="acysmstoolbar" style="float: right;">
		<table>
			<tr>
				<td id="acysmsbuttonexport"><a onclick="javascript:<?php if(ACYSMS_J16) echo "Joomla."; ?>submitbutton('doexport'); return false;" href="#"><span title="<?php echo JText::_('SMS_EXPORT'); ?>"><i class="smsicon-export"></i></span><?php echo JText::_('SMS_EXPORT'); ?></a></td>
				<td id="acysmsbuttoncancel"><a onclick="javascript:<?php if(ACYSMS_J16) echo "Joomla."; ?>submitbutton('cancel'); return false;" href="#"><span title="<?php echo JText::_('SMS_CANCEL'); ?>"><i class="smsicon-cancel"></i></span><?php echo JText::_('SMS_CANCEL'); ?></a></td>
			</tr>
		</table>
	</div>
	<div class="acyheader" style="float: left;"><h1><?php echo JText::_('SMS_EXPORT'); ?></h1></div>
</fieldset>
<?php
if(!empty($this->Itemid)) echo '<input type="hidden" name="Itemid" value="'.$this->Itemid.'" />';
include(ACYSMS_BACK.'views'.DS.'data'.DS.'tmpl'.DS.'export.php'); ?>
