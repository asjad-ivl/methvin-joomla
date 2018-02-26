<?php
require_once('vertex/cms_core_functions.php');
s5_restricted_access_call();
/*
-----------------------------------------
Charlestown - Shape 5 Club Design
-----------------------------------------
Site:      shape5.com
Email:     contact@shape5.com
@license:  Copyrighted Commercial Software
@copyright (C) 2015 Shape 5 LLC

*/


?>
<!DOCTYPE HTML>
<html <?php s5_language_call(); ?>>
<head>
<?php s5_head_call(); ?>
<?php
require_once("vertex/parameters.php");
require_once("vertex/general_functions.php");
require_once("vertex/module_calcs.php");
require_once("vertex/includes/vertex_includes_header.php");
?>
<?php if ($s5_pos_search == "published") { ?>
<script>
function s5_search_open() {jQuery('#s5_body_padding').addClass('s5_blurred');document.getElementById('s5_search_overlay').className = "s5_search_open";}
function s5_search_close() {jQuery('#s5_body_padding').removeClass('s5_blurred');document.getElementById('s5_search_overlay').className = "s5_search_close";}
</script>
<?php } ?>

<?php if(($s5_fonts_highlight != "Arial") && ($s5_fonts_highlight != "Helvetica") && ($s5_fonts_highlight != "Sans-Serif")) { ?>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=<?php echo str_replace(" ","%20",$s5_fonts_highlight); if ($s5_fonts_highlight_style != "") { echo ":".$s5_fonts_highlight_style; } ?>" />
<?php } ?>

<style type="text/css"> 
.btn-link {
color:#<?php echo $s5_highlightcolor1; ?>;}

::selection {background:#<?php echo $s5_highlightcolor; ?>;color:#fff; /* Safari */	}
::-moz-selection {background:#<?php echo $s5_highlightcolor; ?>;color:#fff; /* Firefox */}
::-webkit-selection {background:#<?php echo $s5_highlightcolor; ?>;color:#fff; /* Firefox */}

.button, .readmore a, .readon, button, .s5_ls_readmore, .dropdown-menu li > a:hover, .dropdown-menu li > a:focus, .dropdown-submenu:hover > a, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-list > .active > a, .nav-list > .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover, .btn-group.open .btn-primary.dropdown-toggle, .btn-primary, .item-page .dropdown-menu li > a:hover, .blog .dropdown-menu li > a:hover, .item .dropdown-menu li > a:hover, .btn, .pagenav a {
background:#<?php echo $s5_highlightcolor1; ?> !important;}

body, .inputbox  {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif ;} 

<?php if ($browser == "ie7" || $browser == "ie8" || $browser == "ie9") { ?>
.s5_lr_tab_inner {writing-mode: bt-rl;filter: flipV flipH;}
<?php } ?>

<?php if($s5_thirdparty == "enabled") { ?>
/* k2 stuff */
div.itemHeader h2.itemTitle, div.catItemHeader h3.catItemTitle, h3.userItemTitle a, #comments-form p, #comments-report-form p, #comments-form span, #comments-form .counter, #comments .comment-author, #comments .author-homepage,
#comments-form p, #comments-form #comments-form-buttons, #comments-form #comments-form-error, #comments-form #comments-form-captcha-holder {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif ;} 
<?php } ?>	
.s5_wrap{width:<?php echo $s5_body_width; echo $s5_fixed_fluid ?>;}	

<?php if ($s5_hidehomeitem == "no") { ?>#s5_nav li:first-child {display:none;}<?php } ?>	 
<?php if ($s5_nosubarrows == "no") { ?>.mainParentBtn a, .s5_wrap_fmfullwidth .mainParentBtn a {background:none;} #s5_nav li.mainParentBtn .s5_level1_span2 a {padding-right: 0;}<?php } ?>	
<?php if ($s5_hidehomeitem == "yes") { ?>#s5_nav li:nth-child(1) span {border-left:none;}<?php } else { ?>#s5_nav li:nth-child(2) span {border-left:none;}<?php } ?>
<?php if ($s5_uppercase == "yes") { ?>	
 .uppercase, .module_round_box-highlight1line h3.s5_mod_h3, .s5_tab_show_slide_button_active, .s5_tab_show_slide_button_inactive, .module_round_box-highlight2line .s5_mod_h3_outer, .s5_masonry_articles li, #s5_pos_custom_4_padding  {text-transform:uppercase;}
<?php } ?>	

<?php if($s5_language_direction == "1") { ?>
<?php if ($s5_hidehomeitem == "yes") { ?>#s5_nav li:nth-child(1) span {border-right:none;}<?php } else { ?>#s5_nav li:nth-child(2) span {border-right:none;}<?php } ?>
<?php } ?>
.button, p.readmore a, a.readon, a.button, p.readmore a.btn, #cboxLoadedContent button, .controls .btn-primary, .btn.btn-primary, .controls .btn-primary, .controls .btn-primary, .btn.btn-primary, .button.btn, a.readon, .btn, .module_round_box-highlight1, .s5_masonry_overlay .s5_masondate {background-color:#<?php echo $s5_highlightcolor; ?>; color:#ffffff;}

.jdGallery .slideInfoZone h2, .s5_masonry_articletitle, .item h2, .page-header h2, .highlightfont, .moduletable-h3largetitle h3, #s5_search_overlay .s5_mod_h3_outer h3, .about_wrapper h3, h1, h2, h3, h4, h5 {font-family: <?php echo $s5_fonts_highlight;?> !important;} 

.-icons .s5_tab_show_slide_button_active, .s5_responsive_mobile_sidebar_sub a.s5_mobile_sidebar_active, .nav > li > a:hover {color:#<?php echo $s5_highlightcolor; ?> !important;}

.module_round_box-highlight2, #s5_pos_custom_4 li a:hover, .s5_iconwrapper:hover, .s5_ls_search_word {background-color:#<?php echo $s5_highlightcolor2; ?> !important; color:#ffffff !important;}

.module_round_box-highlight1line .s5_mod_h3_outer, .s5_tab_show_slide_button_active, .s5_masonry_articles li.s5_masonry_active a, .s5_masonry_articles li a:hover, .code, code {border-color:#<?php echo $s5_highlightcolor2; ?>;}

.module_round_box-highlight2line .s5_mod_h3_outer {border-color:#<?php echo $s5_highlightcolor; ?>;}

.s5_iconwrapper:hover {border-color:#<?php echo $s5_highlightcolor2; ?>;}

#s5_nav li:hover a, .mod-articles-category-date, #s5_footer_area1 a:hover, #s5_bottom_menu_wrap ul.menu li a:hover, #s5_bottom_row3_area2 ul.menu li a:hover, #s5_bottom_row3_area2 ul li a:hover, #s5_search_wrap:hover, #s5_login:hover, #s5_login:hover .loginicon, #subMenusContainer a:hover, #s5_nav li li a:hover {color:#<?php echo $s5_highlightcolor2; ?>;}

<?php if ($s5_pos_right == "published" || $s5_pos_right_inset == "published" || $s5_pos_right_top == "published" || $s5_pos_right_bottom == "published") { ?>
#s5_component_wrap_inner {padding-right:20px;}
@media screen and (max-width: 970px){
#s5_component_wrap_inner {padding-left:10px;padding-right:10px;}}
<?php } ?>

<?php if ($s5_pos_left == "published" || $s5_pos_left_inset == "published" || $s5_pos_left_top == "published" || $s5_pos_left_bottom == "published") { ?>
#s5_component_wrap_inner {padding-left:20px;}
@media screen and (max-width: 970px){
#s5_component_wrap_inner {padding-left:10px;padding-right:1s0px;}}
<?php } ?>

@media screen and (max-width:579px){ ul.s5_masonry_articles li.s5_masonry_active a, ul.s5_masonry_articles li a:hover {border:2px solid #<?php echo $s5_highlightcolor2; ?> !important;} }

 .module_round_box-highlight2line h3.s5_mod_h3, .module_round_box-highlight1line h3.s5_mod_h3 {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif !important;} 

</style>
</head>

<body id="s5_body">

<div id="s5_scrolltotop"></div>

<!-- Top Vertex Calls -->
<?php require_once("vertex/includes/vertex_includes_top.php"); ?>
<?php if ($s5_scrolltotop  == "yes") { $s5_scrolltotop = "override"; } ?>
<!-- Body Padding Div Used For Responsive Spacing -->		
<div id="s5_body_padding" <?php if ($s5_sitewidthstyle != "yes") { ?>class="s5_wrap"<?php } ?>>



	<?php if ($s5_pos_search == "published") { ?>
			<div id="s5_search_overlay" class="s5_search_close">
				<div class="ion-ios-close-empty ion-ios-close-empty icon_search_close" onclick="s5_search_close()"></div>		
				<?php if ($s5_menu_text != "") { ?>
					<span class="s5_menu_overlay_text"><?php echo $s5_menu_text; ?></span>
				<?php } ?>
				<div class="s5_wrap">
					<div id="s5_search_pos_wrap">
					<?php s5_module_call('search','round_box'); ?>
					</div>		
				</div>
		</div>
	<?php } ?>



	<!-- Header -->			
		<header id="s5_header_area1" class="s5_slidesection">		
		<div id="s5_header_area2">	
		<div id="s5_header_area_inner">					
			<div id="s5_header_wrap">
			
			<div id="s5_top_header">
				<?php if($s5_pos_custom_1 == "published") { ?>	
				<div id="s5_socialicons">
					<?php s5_module_call('custom_1','notitle'); ?>
				</div>
				<?php } ?>
				<?php if($s5_pos_custom_2 == "published") { ?>	
				<div id="s5_phonenumber">
					<?php s5_module_call('custom_2','notitle'); ?>
				</div>
				<?php } ?>
				<?php if (($s5_login  != "") || ($s5_register  != "")) { ?>	
					<div id="s5_loginreg">	
						<div id="s5_logregtm">			
							<?php if ($s5_register  != "") { ?>
								<?php if ($s5_user_id) { } else {?>
									<div id="s5_register" class="s5box_register">
										<?php echo $s5_register;?>				
									</div>
								<?php } ?>							
							<?php } ?>					
							<?php if ($s5_login  != "") { ?>
								<div id="s5_login" class="s5box_login">
									<span class="loginicon ion-ios-contact-outline"></span>
									<span class="logintext">
										<?php if ($s5_user_id) { echo $s5_loginout; } else { echo $s5_login; } ?>
									</span>
								</div>						
							<?php } ?>						
						</div>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_search == "published") { ?>
					<div onclick="s5_search_open()" id="s5_search_wrap" class="ion-ios-search-strong ion-ios-search-strong"></div>
				<?php } ?>
				
				<?php if($s5_pos_language == "published") { ?>
					<div id="s5_language_wrap">
						<?php require_once("vertex/language_position.php"); ?>
					</div>
				<?php } ?>
				
				<?php if($s5_font_resizer == "yes") { ?>
					<div id="fontControls"></div>
				<?php } ?>
	
			</div>
			
			<?php if($s5_logo_type != "none") { ?>
				<div id="s5_logo_wrap" class="s5_logo s5_logo_<?php echo $s5_logo_type; ?>">
					<?php if ($s5_logo_type == "css") { ?>
						<img alt="logo" src="<?php echo $s5_directory_path ?>/images/s5_logo.png" onclick="window.document.location.href='<?php echo $LiveSiteUrl; ?>'" />
					<?php } ?>
					<?php if ($s5_logo_type == "image") { 
						if(strrpos($s5_logo_image_file,"ttp://") > 0) { ?>
							<img alt="logo" src="<?php echo $s5_logo_image_file; ?>" onclick="window.document.location.href='<?php echo $LiveSiteUrl ?>'" />
						<?php } else { ?>
							<img alt="logo" src="<?php echo $LiveSiteUrl; echo $s5_logo_image_file; ?>" onclick="window.document.location.href='<?php echo $LiveSiteUrl ?>'" />
						<?php } ?>
					<?php } ?>
					<?php if ($s5_pos_logo == "published" && $s5_logo_type == "module") { ?>
						<div id="s5_logo_text_wrap">
							<?php s5_module_call('logo','notitle'); ?>
							<div style="clear:both;"></div>
						</div>
					<?php } ?>
					<?php if ($s5_logo_type == "text") { ?>
						<div id="s5_logo_text_wrap">
							<?php echo $s5_logo_text; ?>
							<div style="clear:both;"></div>
						</div>
					<?php } ?>
					<div style="clear:both;"></div>
				</div>	
			<?php } ?>

					
			<?php if ($s5_show_menu == "show") { ?>	
				<div id="s5_menu_wrap">
					<nav id="s5_menu_inner" class="s5_wrap_menu">
						<?php include("vertex/s5flex_menu/default.php"); ?>
					</nav>
				</div>
			<?php } ?>
			
			<div style="clear:both;"></div>	
			<script type="text/javascript">	
					var runoncevar = 1;	
					jQuery( document ).ready(function() {		
						if (document.body.offsetWidth >= 1023) {
							jQuery( ".s5_logo" ).clone().appendTo( ".s5_logo_spacer" );
							runoncevar = 2;
						}									
					});					
					jQuery( window ).resize(function() {	
							if (document.body.offsetWidth >= 1023 ) {
								if (runoncevar == 1) {
									runoncevar = 2;						
									jQuery( ".s5_logo" ).clone().appendTo( ".s5_logo_spacer" );									
								}			
							}	
					});	
			</script>				
					
						
			<?php if($s5_pos_custom_3 == "published") { ?>	
				<div id="s5_pos_custom_3">
					<?php if($s5_pos_custom_4 == "published") { ?>	
					<div id="s5_pos_custom_4">
						<div id="s5_pos_custom_4_inner">
							<div id="s5_pos_custom_4_padding" class="mCustomScrollbar sbcontent" data-mcs-theme="minimal" data-mcs-axis="y">
							<?php s5_module_call('custom_4','notitle'); ?>	
							</div>
						</div>
						<script src="<?php echo $s5_directory_path ?>/js/jquery.mCustomScrollbar.concat.min.js"></script>
						<script>					
							jQuery(document).ready(function(){	
								contentTouchScroll: true;
								jQuery.mCustomScrollbar.defaults.axis="yx"; //enable 2 axis scrollbars by default
								jQuery(".sbcontent").mCustomScrollbar();
							});					
						</script>
					</div>
					<?php } ?>	
					
					<?php s5_module_call('custom_3','notitle'); ?>	
				</div>
				<div style="clear:both;"></div>	
			<?php } else { ?>
				<div id="s5_headerbackground"></div>	
			<?php } ?>		
			
				
				<div style="clear:both; height:0px"></div>			
			</div>
		</div>
		</div>
		</header>
	<!-- End Header -->	
	

<div class="s5_inner_padding">


		
	
	<!-- Top Row1 -->	
		<?php if ($s5_pos_top_row1_1 == "published" || $s5_pos_top_row1_2 == "published" || $s5_pos_top_row1_3 == "published" || $s5_pos_top_row1_4 == "published" || $s5_pos_top_row1_5 == "published" || $s5_pos_top_row1_6 == "published") { ?>
			<section id="s5_top_row1_area1"<?php if ($s5_top_row1_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_top_row1_area1_background_color == "FFFFFF" && $s5_top_row1_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_top_row1_area2"<?php if ($s5_top_row1_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_top_row1_area2_background_color == "FFFFFF" && $s5_top_row1_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_top_row1_area_inner" <?php if ($s5_sitewidthstyle == "yes") { ?>class="s5_wrap"<?php } ?>>

				<div id="s5_top_row1_wrap">
				<div id="s5_top_row1">
				<div id="s5_top_row1_inner">
				
					<?php if ($s5_pos_top_row1_1 == "published") { ?>
						<div id="s5_pos_top_row1_1" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_1_width ?>%">
							<?php s5_module_call('top_row1_1','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row1_2 == "published") { ?>
						<div id="s5_pos_top_row1_2" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_2_width ?>%">
							<?php s5_module_call('top_row1_2','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row1_3 == "published") { ?>
						<div id="s5_pos_top_row1_3" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_3_width ?>%">
							<?php s5_module_call('top_row1_3','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row1_4 == "published") { ?>
						<div id="s5_pos_top_row1_4" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_4_width ?>%">
							<?php s5_module_call('top_row1_4','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row1_5 == "published") { ?>
						<div id="s5_pos_top_row1_5" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_5_width ?>%">
							<?php s5_module_call('top_row1_5','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_top_row1_6 == "published") { ?>
						<div id="s5_pos_top_row1_6" class="s5_float_left" style="width:<?php echo $s5_pos_top_row1_6_width ?>%">
							<?php s5_module_call('top_row1_6','round_box'); ?>
						</div>
					<?php } ?>
					
					<div style="clear:both; height:0px"></div>
					
				</div>
				</div>
				</div>

		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Top Row1 -->	
		
		
		
	<!-- Top Row2 -->	
		<?php if ($s5_pos_top_row2_1 == "published" || $s5_pos_top_row2_2 == "published" || $s5_pos_top_row2_3 == "published" || $s5_pos_top_row2_4 == "published" || $s5_pos_top_row2_5 == "published" || $s5_pos_top_row2_6 == "published") { ?>
		<section id="s5_top_row2_area1"<?php if ($s5_top_row2_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_top_row2_area1_background_color == "FFFFFF" && $s5_top_row2_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_top_row2_area2"<?php if ($s5_top_row2_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_top_row2_area2_background_color == "FFFFFF" && $s5_top_row2_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_top_row2_area_inner" <?php if ($s5_sitewidthstyle == "yes") { ?>class="s5_wrap"<?php } ?>>			
		
			<div id="s5_top_row2_wrap">
			<div id="s5_top_row2">
			<div id="s5_top_row2_inner">	
			
				<?php if ($s5_pos_top_row2_1 == "published") { ?>
					<div id="s5_pos_top_row2_1" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_1_width ?>%">
						<?php s5_module_call('top_row2_1','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_top_row2_2 == "published") { ?>
					<div id="s5_pos_top_row2_2" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_2_width ?>%">
						<?php s5_module_call('top_row2_2','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_top_row2_3 == "published") { ?>
					<div id="s5_pos_top_row2_3" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_3_width ?>%">
						<?php s5_module_call('top_row2_3','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_top_row2_4 == "published") { ?>
					<div id="s5_pos_top_row2_4" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_4_width ?>%">
						<?php s5_module_call('top_row2_4','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_top_row2_5 == "published") { ?>
					<div id="s5_pos_top_row2_5" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_5_width ?>%">
						<?php s5_module_call('top_row2_5','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_top_row2_6 == "published") { ?>
					<div id="s5_pos_top_row2_6" class="s5_float_left" style="width:<?php echo $s5_pos_top_row2_6_width ?>%">
						<?php s5_module_call('top_row2_6','round_box'); ?>
					</div>
				<?php } ?>			
				
				<div style="clear:both; height:0px"></div>
				
			</div>
			</div>	
			</div>	
				
		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Top Row2 -->
	
	
	
	<!-- Top Row3 -->	
		<?php if ($s5_pos_top_row3_1 == "published" || $s5_pos_top_row3_2 == "published" || $s5_pos_top_row3_3 == "published" || $s5_pos_top_row3_4 == "published" || $s5_pos_top_row3_5 == "published" || $s5_pos_top_row3_6 == "published") { ?>
		<section id="s5_top_row3_area1"<?php if ($s5_top_row3_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_top_row3_area1_background_color == "FFFFFF" && $s5_top_row3_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>	
		<div id="s5_top_row3_area2"<?php if ($s5_top_row3_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_top_row3_area2_background_color == "FFFFFF" && $s5_top_row3_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_top_row3_area_inner" <?php if ($s5_sitewidthstyle == "yes") { ?>class="s5_wrap"<?php } ?>>
		
			<div id="s5_top_row3_wrap">
			<div id="s5_top_row3">
			<div id="s5_top_row3_inner">
			
				<?php if ($s5_pos_top_row3_1 == "published") { ?>
					<div id="s5_pos_top_row3_1" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_1_width ?>%">
						<?php s5_module_call('top_row3_1','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_top_row3_2 == "published") { ?>
					<div id="s5_pos_top_row3_2" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_2_width ?>%">
						<?php s5_module_call('top_row3_2','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_top_row3_3 == "published") { ?>
					<div id="s5_pos_top_row3_3" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_3_width ?>%">
						<?php s5_module_call('top_row3_3','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_top_row3_4 == "published") { ?>
					<div id="s5_pos_top_row3_4" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_4_width ?>%">
						<?php s5_module_call('top_row3_4','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_top_row3_5 == "published") { ?>
					<div id="s5_pos_top_row3_5" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_5_width ?>%">
						<?php s5_module_call('top_row3_5','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_top_row3_6 == "published") { ?>
					<div id="s5_pos_top_row3_6" class="s5_float_left" style="width:<?php echo $s5_pos_top_row3_6_width ?>%">
						<?php s5_module_call('top_row3_6','round_box'); ?>
					</div>
				<?php } ?>			
				
				<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</div>

		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Top Row3 -->	
		
		
		
	<!-- Center area -->	
		<?php if ($s5_show_component == "yes" || $s5_pos_left_top == "published" || $s5_pos_left == "published" || $s5_pos_left_inset == "published" || $s5_pos_left_bottom == "published" || $s5_pos_right_top == "published" || $s5_pos_right == "published" || $s5_pos_right_inset == "published" || $s5_pos_right_bottom == "published" || $s5_pos_middle_top_1 == "published" || $s5_pos_middle_top_2 == "published" || $s5_pos_middle_top_3 == "published" || $s5_pos_middle_top_4 == "published" || $s5_pos_middle_top_5 == "published" || $s5_pos_middle_top_6 == "published" || $s5_pos_above_body_1 == "published" || $s5_pos_above_body_2 == "published" || $s5_pos_above_body_3 == "published" || $s5_pos_above_body_4 == "published" || $s5_pos_above_body_5 == "published" || $s5_pos_above_body_6 == "published" || $s5_pos_middle_bottom_1 == "published" || $s5_pos_middle_bottom_2 == "published" || $s5_pos_middle_bottom_3 == "published" || $s5_pos_middle_bottom_4 == "published" || $s5_pos_middle_bottom_5 == "published" || $s5_pos_middle_bottom_6 == "published" || $s5_pos_below_body_1 == "published" || $s5_pos_below_body_2 == "published" || $s5_pos_below_body_3 == "published" || $s5_pos_below_body_4 == "published" || $s5_pos_below_body_5 == "published" || $s5_pos_below_body_6 == "published" || $s5_pos_above_columns_1 == "published" ||  $s5_pos_above_columns_2 == "published" ||  $s5_pos_above_columns_3 == "published" ||  $s5_pos_above_columns_4 == "published" ||  $s5_pos_above_columns_5 == "published" ||  $s5_pos_above_columns_6 == "published" ||  $s5_pos_below_columns_1 == "published" ||  $s5_pos_below_columns_2 == "published" ||  $s5_pos_below_columns_3 == "published" ||  $s5_pos_below_columns_4 == "published" ||  $s5_pos_below_columns_5 == "published" ||  $s5_pos_below_columns_6 == "published") { ?>
		<section id="s5_center_area1"<?php if ($s5_center_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_center_area1_background_color == "FFFFFF" && $s5_center_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_center_area2"<?php if ($s5_center_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_center_area2_background_color == "FFFFFF" && $s5_center_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_center_area_inner" <?php if ($s5_sitewidthstyle == "yes") { ?>class="s5_wrap"<?php } ?>>
		
		<!-- Above Columns Wrap -->	
			<?php if ($s5_pos_above_columns_1 == "published" || $s5_pos_above_columns_2 == "published" || $s5_pos_above_columns_3 == "published" || $s5_pos_above_columns_4 == "published" || $s5_pos_above_columns_5 == "published" || $s5_pos_above_columns_6 == "published") { ?>
			<section id="s5_above_columns_wrap1"<?php if ($s5_above_columns_wrap1_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_above_columns_wrap1_background_color == "FFFFFF" && $s5_above_columns_wrap1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>	
			<div id="s5_above_columns_wrap2"<?php if ($s5_above_columns_wrap2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_above_columns_wrap2_background_color == "FFFFFF" && $s5_above_columns_wrap2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_above_columns_inner">

				<?php if ($s5_pos_above_columns_1 == "published") { ?>
					<div id="s5_above_columns_1" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_1_width ?>%">
						<?php s5_module_call('above_columns_1','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_above_columns_2 == "published") { ?>
					<div id="s5_above_columns_2" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_2_width ?>%">
						<?php s5_module_call('above_columns_2','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_above_columns_3 == "published") { ?>
					<div id="s5_above_columns_3" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_3_width ?>%">
						<?php s5_module_call('above_columns_3','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_above_columns_4 == "published") { ?>
					<div id="s5_above_columns_4" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_4_width ?>%">
						<?php s5_module_call('above_columns_4','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_above_columns_5 == "published") { ?>
					<div id="s5_above_columns_5" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_5_width ?>%">
						<?php s5_module_call('above_columns_5','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_above_columns_6 == "published") { ?>
					<div id="s5_above_columns_6" class="s5_float_left" style="width:<?php echo $s5_pos_above_columns_6_width ?>%">
						<?php s5_module_call('above_columns_6','round_box'); ?>
					</div>
				<?php } ?>	
				
				<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</section>
			<?php } ?>
		<!-- End Above Columns Wrap -->			
				
			<!-- Columns wrap, contains left, right and center columns -->	
			<section id="s5_columns_wrap"<?php if ($s5_columns_wrap_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_columns_wrap_background_color == "FFFFFF" && $s5_columns_wrap_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_columns_wrap_inner"<?php if ($s5_columns_wrap_inner_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_columns_wrap_inner_background_color == "FFFFFF" && $s5_columns_wrap_inner_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
				
				<section id="s5_center_column_wrap">
				<div id="s5_center_column_wrap_inner" style="margin-left:<?php echo $s5_center_column_margin_left ?>px; margin-right:<?php echo $s5_center_column_margin_right ?>px;">
					
					<?php if ($s5_pos_middle_top_1 == "published" || $s5_pos_middle_top_2 == "published" || $s5_pos_middle_top_3 == "published" || $s5_pos_middle_top_4 == "published" || $s5_pos_middle_top_5 == "published" || $s5_pos_middle_top_6 == "published") { ?>
			
						<section id="s5_middle_top_wrap">
							
							<div id="s5_middle_top">
							<div id="s5_middle_top_inner">
							
								<?php if ($s5_pos_middle_top_1 == "published") { ?>
									<div id="s5_pos_middle_top_1" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_1_width ?>%">
										<?php s5_module_call('middle_top_1','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_2 == "published") { ?>
									<div id="s5_pos_middle_top_2" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_2_width ?>%">
										<?php s5_module_call('middle_top_2','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_3 == "published") { ?>
									<div id="s5_pos_middle_top_3" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_3_width ?>%">
										<?php s5_module_call('middle_top_3','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_4 == "published") { ?>
									<div id="s5_pos_middle_top_4" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_4_width ?>%">
										<?php s5_module_call('middle_top_4','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_5 == "published") { ?>
									<div id="s5_pos_middle_top_5" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_5_width ?>%">
										<?php s5_module_call('middle_top_5','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_top_6 == "published") { ?>
									<div id="s5_pos_middle_top_6" class="s5_float_left" style="width:<?php echo $s5_pos_middle_top_6_width ?>%">
										<?php s5_module_call('middle_top_6','round_box'); ?>
									</div>
								<?php } ?>		
								
								<div style="clear:both; height:0px"></div>

							</div>
							</div>
						
						</section>

					<?php } ?>
					
					<?php if ($s5_show_component == "yes" || $s5_pos_above_body_1 == "published" || $s5_pos_above_body_2 == "published" || $s5_pos_above_body_3 == "published" || $s5_pos_above_body_4 == "published" || $s5_pos_above_body_5 == "published" || $s5_pos_above_body_6 == "published" || $s5_pos_below_body_1 == "published" || $s5_pos_below_body_2 == "published" || $s5_pos_below_body_3 == "published" || $s5_pos_below_body_4 == "published" || $s5_pos_below_body_5 == "published" || $s5_pos_below_body_6 == "published") { ?>
						
						<section id="s5_component_wrap">
						<div id="s5_component_wrap_inner">
						
							<?php if ($s5_pos_above_body_1 == "published" || $s5_pos_above_body_2 == "published" || $s5_pos_above_body_3 == "published" || $s5_pos_above_body_4 == "published" || $s5_pos_above_body_5 == "published" || $s5_pos_above_body_6 == "published") { ?>
						
								<section id="s5_above_body_wrap">
									
									<div id="s5_above_body">
									<div id="s5_above_body_inner">
									
										<?php if ($s5_pos_above_body_1 == "published") { ?>
											<div id="s5_pos_above_body_1" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_1_width ?>%">
												<?php s5_module_call('above_body_1','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_2 == "published") { ?>
											<div id="s5_pos_above_body_2" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_2_width ?>%">
												<?php s5_module_call('above_body_2','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_3 == "published") { ?>
											<div id="s5_pos_above_body_3" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_3_width ?>%">
												<?php s5_module_call('above_body_3','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_4 == "published") { ?>
											<div id="s5_pos_above_body_4" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_4_width ?>%">
												<?php s5_module_call('above_body_4','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_5 == "published") { ?>
											<div id="s5_pos_above_body_5" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_5_width ?>%">
												<?php s5_module_call('above_body_5','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_above_body_6 == "published") { ?>
											<div id="s5_pos_above_body_6" class="s5_float_left" style="width:<?php echo $s5_pos_above_body_6_width ?>%">
												<?php s5_module_call('above_body_6','round_box'); ?>
											</div>
										<?php } ?>			
										
										<div style="clear:both; height:0px"></div>

									</div>
									</div>
								
								</section>

							<?php } ?>
									
							<?php if ($s5_show_component == "yes") { ?>
							<main>
								<?php s5_component_call(); ?>
								<div style="clear:both;height:0px"></div>
							</main>
							<?php } ?>
							
													
							<?php if ($s5_pos_breadcrumb == "published") { ?>
								<div id="s5_breadcrumb_wrap">
									<?php s5_module_call('breadcrumb','notitle'); ?>
								</div>
								<div style="clear:both;"></div>
							<?php } ?>
							
							
							<?php if ($s5_pos_below_body_1 == "published" || $s5_pos_below_body_2 == "published" || $s5_pos_below_body_3 == "published" || $s5_pos_below_body_4 == "published" || $s5_pos_below_body_5 == "published" || $s5_pos_below_body_6 == "published") { ?>
						
								<section id="s5_below_body_wrap">			
								
									<div id="s5_below_body">
									<div id="s5_below_body_inner">
									
										<?php if ($s5_pos_below_body_1 == "published") { ?>
											<div id="s5_pos_below_body_1" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_1_width ?>%">
												<?php s5_module_call('below_body_1','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_2 == "published") { ?>
											<div id="s5_pos_below_body_2" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_2_width ?>%">
												<?php s5_module_call('below_body_2','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_3 == "published") { ?>
											<div id="s5_pos_below_body_3" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_3_width ?>%">
												<?php s5_module_call('below_body_3','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_4 == "published") { ?>
											<div id="s5_pos_below_body_4" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_4_width ?>%">
												<?php s5_module_call('below_body_4','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_5 == "published") { ?>
											<div id="s5_pos_below_body_5" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_5_width ?>%">
												<?php s5_module_call('below_body_5','round_box'); ?>
											</div>
										<?php } ?>
										
										<?php if ($s5_pos_below_body_6 == "published") { ?>
											<div id="s5_pos_below_body_6" class="s5_float_left" style="width:<?php echo $s5_pos_below_body_6_width ?>%">
												<?php s5_module_call('below_body_6','round_box'); ?>
											</div>
										<?php } ?>		
										
										<div style="clear:both; height:0px"></div>

									</div>
									</div>
								</section>

							<?php } ?>
							
						</div>
						</section>
						
					<?php } ?>
					
					<?php if ($s5_pos_middle_bottom_1 == "published" || $s5_pos_middle_bottom_2 == "published" || $s5_pos_middle_bottom_3 == "published" || $s5_pos_middle_bottom_4 == "published" || $s5_pos_middle_bottom_5 == "published" || $s5_pos_middle_bottom_6 == "published") { ?>
					
						<section id="s5_middle_bottom_wrap">
							
							<div id="s5_middle_bottom">
							<div id="s5_middle_bottom_inner">
							
								<?php if ($s5_pos_middle_bottom_1 == "published") { ?>
									<div id="s5_pos_middle_bottom_1" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_1_width ?>%">
										<?php s5_module_call('middle_bottom_1','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_2 == "published") { ?>
									<div id="s5_pos_middle_bottom_2" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_2_width ?>%">
										<?php s5_module_call('middle_bottom_2','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_3 == "published") { ?>
									<div id="s5_pos_middle_bottom_3" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_3_width ?>%">
										<?php s5_module_call('middle_bottom_3','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_4 == "published") { ?>
									<div id="s5_pos_middle_bottom_4" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_4_width ?>%">
										<?php s5_module_call('middle_bottom_4','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_5 == "published") { ?>
									<div id="s5_pos_middle_bottom_5" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_5_width ?>%">
										<?php s5_module_call('middle_bottom_5','round_box'); ?>
									</div>
								<?php } ?>
								
								<?php if ($s5_pos_middle_bottom_6 == "published") { ?>
									<div id="s5_pos_middle_bottom_6" class="s5_float_left" style="width:<?php echo $s5_pos_middle_bottom_6_width ?>%">
										<?php s5_module_call('middle_bottom_6','round_box'); ?>
									</div>
								<?php } ?>	
								
								<div style="clear:both; height:0px"></div>

							</div>
							</div>
						
						</section>

					<?php } ?>
					
				</div>
				</section>
				<!-- Left column -->	
				<?php if($s5_pos_left == "published" || $s5_pos_left_inset == "published" || $s5_pos_left_top == "published" || $s5_pos_left_bottom == "published") { ?>
					<aside id="s5_left_column_wrap" class="s5_float_left" style="width:<?php echo $s5_left_column_width ?>px">
					<div id="s5_left_column_wrap_inner">
						<?php if($s5_pos_left_top == "published") { ?>
							<div id="s5_left_top_wrap" class="s5_float_left" style="width:<?php echo $s5_left_column_width ?>px">
								<?php s5_module_call('left_top','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_left == "published") { ?>
							<div id="s5_left_wrap" class="s5_float_left" style="width:<?php echo $s5_left_width ?>px">
								<?php s5_module_call('left','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_left_inset == "published") { ?>
							<div id="s5_left_inset_wrap" class="s5_float_left" style="width:<?php echo $s5_left_inset_width ?>px">
								<?php s5_module_call('left_inset','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_left_bottom == "published") { ?>
							<div id="s5_left_bottom_wrap" class="s5_float_left" style="width:<?php echo $s5_left_column_width ?>px">
								<?php s5_module_call('left_bottom','round_box'); ?>
							</div>
						<?php } ?>
						<div style="clear:both;height:0px;"></div>
					</div>
					</aside>
				<?php } ?>
				<!-- End Left column -->	
				<!-- Right column -->	
				<?php if($s5_pos_right == "published" || $s5_pos_right_inset == "published" || $s5_pos_right_top == "published" || $s5_pos_right_bottom == "published") { ?>
					<aside id="s5_right_column_wrap" class="s5_float_left" style="width:<?php echo $s5_right_column_width ?>px; margin-left:-<?php echo $s5_right_column_width + $s5_left_column_width ?>px">
					<div id="s5_right_column_wrap_inner">
						<?php if($s5_pos_right_top == "published") { ?>
							<div id="s5_right_top_wrap" class="s5_float_left" style="width:<?php echo $s5_right_column_width ?>px">
								<?php s5_module_call('right_top','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_right_inset == "published") { ?>
							<div id="s5_right_inset_wrap" class="s5_float_left" style="width:<?php echo $s5_right_inset_width ?>px">
								<?php s5_module_call('right_inset','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_right == "published") { ?>
							<div id="s5_right_wrap" class="s5_float_left" style="width:<?php echo $s5_right_width ?>px">
								<?php s5_module_call('right','round_box'); ?>
							</div>
						<?php } ?>
						<?php if($s5_pos_right_bottom == "published") { ?>
							<div id="s5_right_bottom_wrap" class="s5_float_left" style="width:<?php echo $s5_right_column_width ?>px">
								<?php s5_module_call('right_bottom','round_box'); ?>
							</div>
						<?php } ?>
						<div style="clear:both;height:0px;"></div>
					</div>
					</aside>
				<?php } ?>
				<!-- End Right column -->	
			</div>
			</section>
			<!-- End columns wrap -->	
			
				
			
			
		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Center area -->	

</div>	



<!-- Below Columns Wrap -->	
			<?php if ($s5_pos_below_columns_1 == "published" || $s5_pos_below_columns_2 == "published" || $s5_pos_below_columns_3 == "published" || $s5_pos_below_columns_4 == "published" || $s5_pos_below_columns_5 == "published" || $s5_pos_below_columns_6 == "published") { ?>
			<section id="s5_below_columns_wrap1"<?php if ($s5_below_columns_wrap1_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_below_columns_wrap1_background_color == "FFFFFF" && $s5_below_columns_wrap1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>	
			<div id="s5_below_columns_wrap2"<?php if ($s5_below_columns_wrap2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_below_columns_wrap2_background_color == "FFFFFF" && $s5_below_columns_wrap2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_below_columns_inner" <?php if ($s5_sitewidthstyle == "yes") { ?>class="s5_wrap"<?php } ?>>

						<?php if ($s5_pos_below_columns_1 == "published") { ?>
							<div id="s5_below_columns_1" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_1_width ?>%">
								<?php s5_module_call('below_columns_1','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_2 == "published") { ?>
							<div id="s5_below_columns_2" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_2_width ?>%">
								<?php s5_module_call('below_columns_2','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_3 == "published") { ?>
							<div id="s5_below_columns_3" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_3_width ?>%">
								<?php s5_module_call('below_columns_3','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_4 == "published") { ?>
							<div id="s5_below_columns_4" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_4_width ?>%">
								<?php s5_module_call('below_columns_4','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_5 == "published") { ?>
							<div id="s5_below_columns_5" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_5_width ?>%">
								<?php s5_module_call('below_columns_5','round_box'); ?>
							</div>
						<?php } ?>
						
						<?php if ($s5_pos_below_columns_6 == "published") { ?>
							<div id="s5_below_columns_6" class="s5_float_left" style="width:<?php echo $s5_pos_below_columns_6_width ?>%">
								<?php s5_module_call('below_columns_6','round_box'); ?>
							</div>
						<?php } ?>		
						
						<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</section>
			<?php } ?>
		<!-- End Below Columns Wrap -->		


	<div class="s5_inner_padding">	
	
	<!-- Bottom Row1 -->	
		<?php if ($s5_pos_bottom_row1_1 == "published" || $s5_pos_bottom_row1_2 == "published" || $s5_pos_bottom_row1_3 == "published" || $s5_pos_bottom_row1_4 == "published" || $s5_pos_bottom_row1_5 == "published" || $s5_pos_bottom_row1_6 == "published") { ?>
			<section id="s5_bottom_row1_area1"<?php if ($s5_bottom_row1_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_bottom_row1_area1_background_color == "FFFFFF" && $s5_bottom_row1_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_bottom_row1_area2"<?php if ($s5_bottom_row1_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_bottom_row1_area2_background_color == "FFFFFF" && $s5_bottom_row1_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_bottom_row1_area_inner" <?php if ($s5_sitewidthstyle == "yes") { ?>class="s5_wrap"<?php } ?>>

				<div id="s5_bottom_row1_wrap">
				<div id="s5_bottom_row1">
				<div id="s5_bottom_row1_inner">
				
					<?php if ($s5_pos_bottom_row1_1 == "published") { ?>
						<div id="s5_pos_bottom_row1_1" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_1_width ?>%">
							<?php s5_module_call('bottom_row1_1','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row1_2 == "published") { ?>
						<div id="s5_pos_bottom_row1_2" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_2_width ?>%">
							<?php s5_module_call('bottom_row1_2','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row1_3 == "published") { ?>
						<div id="s5_pos_bottom_row1_3" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_3_width ?>%">
							<?php s5_module_call('bottom_row1_3','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row1_4 == "published") { ?>
						<div id="s5_pos_bottom_row1_4" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_4_width ?>%">
							<?php s5_module_call('bottom_row1_4','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row1_5 == "published") { ?>
						<div id="s5_pos_bottom_row1_5" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_5_width ?>%">
							<?php s5_module_call('bottom_row1_5','round_box'); ?>
						</div>
					<?php } ?>
					
					<?php if ($s5_pos_bottom_row1_6 == "published") { ?>
						<div id="s5_pos_bottom_row1_6" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row1_6_width ?>%">
							<?php s5_module_call('bottom_row1_6','round_box'); ?>
						</div>
					<?php } ?>
					
					<div style="clear:both; height:0px"></div>

				</div>
				</div>
				</div>

		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Bottom Row1 -->	
	</div>
		
	
	<!-- Bottom Row2 -->	
		<?php if ($s5_pos_bottom_row2_1 == "published" || $s5_pos_bottom_row2_2 == "published" || $s5_pos_bottom_row2_3 == "published" || $s5_pos_bottom_row2_4 == "published" || $s5_pos_bottom_row2_5 == "published" || $s5_pos_bottom_row2_6 == "published") { ?>
		<section id="s5_bottom_row2_area1"<?php if ($s5_bottom_row2_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_bottom_row2_area1_background_color == "FFFFFF" && $s5_bottom_row2_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_bottom_row2_area2"<?php if ($s5_bottom_row2_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_bottom_row2_area2_background_color == "FFFFFF" && $s5_bottom_row2_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_bottom_row2_area_inner" <?php if ($s5_sitewidthstyle == "yes") { ?>class="s5_wrap"<?php } ?>>			
		
			<div id="s5_bottom_row2_wrap">
			<div id="s5_bottom_row2">
			<div id="s5_bottom_row2_inner">					
				<?php if ($s5_pos_bottom_row2_1 == "published") { ?>
					<div id="s5_pos_bottom_row2_1" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_1_width ?>%">
						<?php s5_module_call('bottom_row2_1','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_bottom_row2_2 == "published") { ?>
					<div id="s5_pos_bottom_row2_2" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_2_width ?>%">
						<?php s5_module_call('bottom_row2_2','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_bottom_row2_3 == "published") { ?>
					<div id="s5_pos_bottom_row2_3" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_3_width ?>%">
						<?php s5_module_call('bottom_row2_3','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_bottom_row2_4 == "published") { ?>
					<div id="s5_pos_bottom_row2_4" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_4_width ?>%">
						<?php s5_module_call('bottom_row2_4','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_bottom_row2_5 == "published") { ?>
					<div id="s5_pos_bottom_row2_5" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_5_width ?>%">
						<?php s5_module_call('bottom_row2_5','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_bottom_row2_6 == "published") { ?>
					<div id="s5_pos_bottom_row2_6" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row2_6_width ?>%">
						<?php s5_module_call('bottom_row2_6','round_box'); ?>
					</div>
				<?php } ?>		
				
				<div style="clear:both; height:0px"></div>
				
			</div>
			</div>	
			</div>	
				
		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Bottom Row2 -->
	


	<?php if($s5_pos_custom_5 == "published") { ?>	
		<div id="s5_custom_5">
			<div id="s5_custom_6">
				<div id="s5_custom_6_inner">
					<div id="s5_custom_6_padding">
					<?php s5_module_call('custom_6','round_box'); ?>	
					</div>
				</div>
			</div>
			<?php s5_module_call('custom_5','notitle'); ?>	
		</div>
	<?php } ?>

	
<div class="s5_inner_padding">		
	<!-- Bottom Row3 -->	
		<?php if ($s5_pos_bottom_row3_1 == "published" || $s5_pos_bottom_row3_2 == "published" || $s5_pos_bottom_row3_3 == "published" || $s5_pos_bottom_row3_4 == "published" || $s5_pos_bottom_row3_5 == "published" || $s5_pos_bottom_row3_6 == "published") { ?>
		<section id="s5_bottom_row3_area1"<?php if ($s5_bottom_row3_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_bottom_row3_area1_background_color == "FFFFFF" && $s5_bottom_row3_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>	
		<div id="s5_bottom_row3_area2"<?php if ($s5_bottom_row3_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_bottom_row3_area2_background_color == "FFFFFF" && $s5_bottom_row3_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_bottom_row3_area_inner" <?php if ($s5_sitewidthstyle == "yes") { ?>class="s5_wrap"<?php } ?>>
		
			<div id="s5_bottom_row3_wrap">
			<div id="s5_bottom_row3">
			<div id="s5_bottom_row3_inner">
			
				<?php if ($s5_pos_bottom_row3_1 == "published") { ?>
					<div id="s5_pos_bottom_row3_1" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_1_width ?>%">
						<?php s5_module_call('bottom_row3_1','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_bottom_row3_2 == "published") { ?>
					<div id="s5_pos_bottom_row3_2" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_2_width ?>%">
						<?php s5_module_call('bottom_row3_2','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_bottom_row3_3 == "published") { ?>
					<div id="s5_pos_bottom_row3_3" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_3_width ?>%">
						<?php s5_module_call('bottom_row3_3','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_bottom_row3_4 == "published") { ?>
					<div id="s5_pos_bottom_row3_4" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_4_width ?>%">
						<?php s5_module_call('bottom_row3_4','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_bottom_row3_5 == "published") { ?>
					<div id="s5_pos_bottom_row3_5" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_5_width ?>%">
						<?php s5_module_call('bottom_row3_5','round_box'); ?>
					</div>
				<?php } ?>
				
				<?php if ($s5_pos_bottom_row3_6 == "published") { ?>
					<div id="s5_pos_bottom_row3_6" class="s5_float_left" style="width:<?php echo $s5_pos_bottom_row3_6_width ?>%">
						<?php s5_module_call('bottom_row3_6','round_box'); ?>
					</div>
				<?php } ?>	
				
				<div style="clear:both; height:0px"></div>

			</div>
			</div>
			</div>

		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Bottom Row3 -->
	
	
	
	


			<?php if($s5_logo_type != "none") { ?>
				<div id="s5_logo_wrap2" class="s5_logo2 s5_logo_<?php echo $s5_logo_type; ?>">
					<?php if ($s5_logo_type == "css") { ?>
						<img alt="logo" src="<?php echo $s5_directory_path ?>/images/s5_logo.png" onclick="window.document.location.href='<?php echo $LiveSiteUrl; ?>'" />
					<?php } ?>
					<?php if ($s5_logo_type == "image") { 
						if(strrpos($s5_logo_image_file,"ttp://") > 0) { ?>
							<img alt="logo" src="<?php echo $s5_logo_image_file; ?>" onclick="window.document.location.href='<?php echo $LiveSiteUrl ?>'" />
						<?php } else { ?>
							<img alt="logo" src="<?php echo $LiveSiteUrl; echo $s5_logo_image_file; ?>" onclick="window.document.location.href='<?php echo $LiveSiteUrl ?>'" />
						<?php } ?>
					<?php } ?>
					<?php if ($s5_pos_logo == "published" && $s5_logo_type == "module") { ?>
						<div id="s5_logo_text_wrap">
							<?php s5_module_call('logo','notitle'); ?>
							<div style="clear:both;"></div>
						</div>
					<?php } ?>
					<?php if ($s5_logo_type == "text") { ?>
						<div id="s5_logo_text_wrap">
							<?php echo $s5_logo_text; ?>
							<div style="clear:both;"></div>
						</div>
					<?php } ?>
					<div style="clear:both;"></div>
				</div>	
			<?php } ?>
	
		<?php if ($s5_scrolltotop == "override") { ?>
			<div id="s5_scroll_wrap">
				<?php require_once("vertex/page_scroll.php"); ?>                        
			</div>
		<?php } ?>

</div>	
</div>
<!-- End Body Padding -->



<!-- Footer Area -->
		<footer id="s5_footer_area1" class="s5_slidesection">
		<div id="s5_footer_area2">
		<div id="s5_footer_area_inner" class="s5_wrap">
		
			<?php if($s5_pos_bottom_menu == "published") { ?>
				<div id="s5_bottom_menu_wrap">
					<?php s5_module_call('bottom_menu','notitle'); ?>
				</div>	
			<?php } ?>
			
			<?php if($s5_pos_footer == "published") { ?>
				<div id="s5_footer_module">
					<?php s5_module_call('footer','notitle'); ?>
				</div>	
			<?php } else { ?>
				<div id="s5_footer">
					<?php require_once("vertex/footer.php"); ?>
				</div>
			<?php } ?>
			
			<div style="clear:both; height:0px"></div>
			
		</div>
		</div>
		</footer>
	<!-- End Footer Area -->
	
		<?php s5_module_call('debug','round_box'); ?>
	
	<!-- Bottom Vertex Calls -->
	<?php require_once("vertex/includes/vertex_includes_bottom.php"); ?>
	

</body>
</html>