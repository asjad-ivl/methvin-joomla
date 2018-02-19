<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.beez3
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$doc = JFactory::getDocument();
$app = JFactory::getApplication();                            

$doc->addStyleDeclaration('
       .ubertoc.nav.nav-list ul{
            display: none;
      }

      /* styles for responsive */
      .tinynav { display: none; max-width: 100%;}
');

if ($params->get('useCSS',1)) {

      $doc->addStyleDeclaration('                 

      @media screen and (max-width: 600px) {
          .tinynav-js .tinynav { display: block; max-width: 100%; }
          .tinynav-js .mobile-hide { display: none }
      }');
}



?>

<ul id="mod_ubertoc_<?php echo $module->id; ?>" class="ubertoc menu nav nav-list"></ul>


<script type="text/javascript" language="javascript">
jQuery(document).ready(function($){
	$('#mod_ubertoc_<?php echo $module->id; ?>').tocify({
	    // **context**: Accepts String: Any jQuery selector
            // The container element that holds all of the elements used to generate the table of contents
            context: "<?php echo $params->get('context','body');?>",

            // **selectors**: Accepts an Array of Strings: Any jQuery selectors
            // The element's used to generate the table of contents.  The order is very important since it will determine the table of content's nesting structure
            selectors: "<?php echo $params->get('selectors','h3,h4,h5');?>",

            // **showAndHide**: Accepts a boolean: true or false
            // Used to determine if elements should be shown and hidden
            showAndHide: <?php if($params->get('showAndHide',1)) echo 'true'; else echo 'false';?>,

            // **showEffect**: Accepts String: "none", "fadeIn", "show", or "slideDown"
            // Used to display any of the table of contents nested items
            showEffect: "slideDown",

            // **showEffectSpeed**: Accepts Number (milliseconds) or String: "slow", "medium", or "fast"
            // The time duration of the show animation
            showEffectSpeed: "medium",

            // **hideEffect**: Accepts String: "none", "fadeOut", "hide", or "slideUp"
            // Used to hide any of the table of contents nested items
            hideEffect: "slideUp",

            // **hideEffectSpeed**: Accepts Number (milliseconds) or String: "slow", "medium", or "fast"
            // The time duration of the hide animation
            hideEffectSpeed: "medium",

            // **smoothScroll**: Accepts a boolean: true or false
            // Determines if a jQuery animation should be used to scroll to specific table of contents items on the page
            smoothScroll: <?php if($params->get('smoothScroll',1)) echo 'true'; else echo 'false';?>,

            // **smoothScrollSpeed**: Accepts Number (milliseconds) or String: "slow", "medium", or "fast"
            // The time duration of the smoothScroll animation
            smoothScrollSpeed: "medium",

            // **scrollTo**: Accepts Number (pixels)
            // The amount of space between the top of page and the selected table of contents item after the page has been scrolled
            scrollTo: <?php echo $params->get('offset','0');?>,

            // **showAndHideOnScroll**: Accepts a boolean: true or false
            // Determines if table of contents nested items should be shown and hidden while scrolling
            showAndHideOnScroll: true,

            // **highlightOnScroll**: Accepts a boolean: true or false
            // Determines if table of contents nested items should be highlighted (set to a different color) while scrolling
            highlightOnScroll: true,

            // **highlightOffset**: Accepts a number
            // The offset distance in pixels to trigger the next active table of contents item
            highlightOffset: <?php echo $params->get('offset','0');?>+5,

            // **theme**: Accepts a string: "twitterBootstrap", "jqueryUI", or "none"
            // Determines if Twitter Bootstrap, jQueryUI, or Tocify classes should be added to the table of contents
            theme: "twitterBootstrap",

            // **extendPage**: Accepts a boolean: true or false
            // If a user scrolls to the bottom of the page and the page is not tall enough to scroll to the last table of contents item, then the page height is increased
            extendPage: true,

            // **extendPageOffset**: Accepts a number: pixels
            // How close to the bottom of the page a user must scroll before the page is extended
            extendPageOffset: true,

            // **history**: Accepts a boolean: true or false
            // Adds a hash to the page url to maintain history
            history: true,

            // **addRule**: Accepts a boolean: true or false
            // Adds a horizontal rule (<hr/>) between each section to enhance readability.
            addRule: <?php if($params->get('addHorizontalRule',1)) echo 'true'; else echo 'false';?>,

            // **hashGenerator**: How the hash value (the anchor segment of the URL, following the
            // # character) will be generated.
            //
            // "compact" (default) - #CompressesEverythingTogether
            // "pretty" - #looks-like-a-nice-url-and-is-easily-readable
            // function(text, element){} - Your own hash generation function that accepts the text as an
            // argument, and returns the hash value.
            hashGenerator: "compact"
	}).data("tocify");
});
</script>
<?php
if ($params->get('use_tinynav',1)) {
      $doc->addScript(JURI::base() . 'modules/mod_ubertoc/assets/js/tinynav.min.js');
?>
<script type="text/javascript">
      jQuery(document).ready(function($){
            $('#mod_ubertoc_<?php echo $module->id; ?>').addClass('mobile-hide').tinyNav();
            $('body').addClass('tinynav-js');
      });
</script>
<?php
}