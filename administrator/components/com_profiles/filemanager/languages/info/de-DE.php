<?php
/**
 * @package		Profiles
 * @subpackage	filemanger
 * @copyright	Copyright (C) 2013 - 2013 Mad4Media - Dipl. Informatiker(FH) Fahrettin Kutyol. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @license		Libraries can be under a different license in other environments
 * @license		Media files owned and created by Mad4Media such as
 * @license 	Javascript / CSS / Shockwave or Images are licensed under GFML (GPL Friendly Media License). See GFML.txt.
 * @license		3rd party scripts are under the license of the copyright holder. See source header or license text file which is included in the appropriate folders
 * @version		1.0
 * @link		http://www.mad4media.de
 * Creation date 2013/02
 */

//CUSTOMPLACEHOLDER
//CUSTOMPLACEHOLDER2

defined('_JEXEC') or die;

$imagePath = _FM_HOME_FOLDER . "/images/";
$imagesLangPath = $imagePath . "languages/de-DE/";
$isRoot = MRights::userIsRoot();
$advice = '<span style="color:red; font-weight: bold;">Nur für Super Administratoren</span>';
?>
							<!-- INFO STARTS HERE -->
<div style="margin: 10px;">
	<table cellpadding="0" cellspacing="0" border="0" style="width:100%;" class="infoTable"><tbody><tr>
	<td align="left" valign="top" colspan="2">
	<h1 style="padding-left:50px;">Vielen Dank, dass Sie sich für ProFiles entschieden haben.</h1><br/>
	</td>
	</tr><tr>
	<td align="left" valign="top" style="width:300px;"><img src="<?php echo $imagePath;?>cover.png" /></td>
	<td align="left" valign="top">
		<ul style="font-size: 16px;">
		<li>Version: <b><?php echo $isRoot ? MVersion::getFull() : $advice; ?></b></li>
		<li>Author: <?php echo MVersion::getAuthor(); ?></li>
		<li>Erstveröffentlicht: <?php echo MVersion::getFirstRelease();?></li>
		<li>Diese Version veröffentlicht: <?php echo $isRoot ? MVersion::thisReleaseDate() : $advice; ?></li>
		<li>Supportstatus: Paket- abhängig</li>
		<li><?php echo MVersion::getCopyright(); ?></li>
		<li>Lizenz: <b>GNU/GPL V2.0 &amp; GPL Friendly Media License (GFML)</b></li>
		<li>Diese Software bindet freie Bibliotheken und Applikationen von Drittanbietern ein.<br/>Die Lizenzen der etwaigen Komponenten sind in den Ordnern als Textdateien abgelegt.</li>
		</ul>
		<span style="font-size: 12px;">
		Bitte beachten Sie, dass Sie diese Software unendlich oft nutzen und ändern können aber aufgrund der GPL Friendly Media License
		nur weitergeben,<br/>veröffentlichen oder forken dürfen, wenn sämtliche Media-Dateien die unter der GFML stehen entfernt wurden.
		<br/>Lesen Sie hierzu bitte: <a href="http://www.mooj.org/de/lizenzen/gfml.html" target="_blank" onclick="javascript: window.open(this.href);">GFML Lizenzbestimmungen</a>
		</span>
	</td></tr>
	<tr>
	<?php if (isset($isWelcome) && $isWelcome){?>
	<td colspan="2">
	<a href="<?php echo _FM_HOME_URL ; ?>"
	   class="askButton"  
	   style="float:right; width:auto; padding-left:10px; padding-right: 10px; cursor:pointer; margin-top: 20px; margin-right:50px;"
	   onclick="window.location.href = this.href; " >Weiter zu ProFiles</a>
	<?php }else{?>
	<td align="left" valign="top" style="width: 275px;">
	<div style="display:block; padding-left:30px;">
	<fieldset class="normal" style="width:230px; float:left;  margin-bottom:20px;">
	<legend>Browser-Kompatibilität</legend>
	<div style="margin:10px; font-size: 18px; line-height: 32px;">
		<span style="margin-right: 10px;">
			<img title="Microsoft Internet Explorer" src="<?php echo $imagePath?>ie.png" align="top"/>9+
		</span>
		<span style=" margin-right: 10px;">
			<img title="Mozilla Firefox" src="<?php echo $imagePath?>ff.png" align="top"/>19+
		</span>
		<span style=" margin-right: 10px;">
			<img title="Chrome" src="<?php echo $imagePath?>chrome.png" align="top"/>24+<br/>
		</span>
		<span style="margin-right: 10px;">
			<img title="Safari" src="<?php echo $imagePath?>safari.png" align="top"/>5+
		</span>
		<span style="">
			<img title="Opera" src="<?php echo $imagePath?>opera.png" align="top"/>12+
		</span>
	</div>
	</fieldset><br/>
	<div style="font-size: 12px;"><?php echo MText::_("olderbrowsernotice");?></div><br/>
	<a href="http://www.mooj.org/de/erweiterungen/komponenten/mooj-proforms.html" target="_blank"  onclick="window.open(this.href);">
		<img title="Mehr Informationen über Mooj Proforms" src="<?php echo $imagesLangPath?>proforms.png"/>
	</a>
	
	</div>
	</td>
	<td align="left" valign="top">
			<?php if(isset($jed) && $jed){?>
			<span style="cursor:pointer; "><a onclick="showFrame();">Besuchen Sie ProFiles auf der Joomla Extensions Directory&trade; </a></span>
			<?php }?>
		  <iframe id="versioncheck" frameborder="0" style="display:block;width: 100%; height: 2000px;" src="<?php echo $version; ?>"></iframe> 	
	<?php }?>
	</td></tr>
	</tbody></table>
	
	
	
</div>							
							
							
							<!-- END OF INFO -->