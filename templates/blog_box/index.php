<?php
require_once('vertex/cms_core_functions.php');
s5_restricted_access_call();
/*
-----------------------------------------
Blog Box - Shape 5 Club Design
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

<?php if ($s5_scrolltotop  == "yes") { $s5_scrolltotop = "override"; } ?>

<?php if(($s5_fonts_highlight1 != "Arial") && ($s5_fonts_highlight1 != "Helvetica") && ($s5_fonts_highlight1 != "Sans-Serif")) { ?>
<link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=<?php echo str_replace(" ","%20",$s5_fonts_highlight1); if ($s5_fonts_highlight1_style != "") { echo ":".$s5_fonts_highlight1_style; } ?>" />
<?php } ?>

<style type="text/css"> 
.highlight_font, .iacf_title, .newsflash-title-highlight1line, .news_title, #cboxLoadedContent .module_round_box h3, #s5_bottom_row3 .s5_mod_h3, .about_area_title, .item-page .page-header h2, .item-title, .item .page-header h2, ul.category h3, .guest_author h3, .s5_masonry_articletitle, h3.s5_demo_h3, .about_wrapper h3, .pages_highlight_box h3, .about_bottom_item1 h3, .about_bottom_item2 h3, .faq_wrap h3 {
font-family: <?php echo $s5_fonts_highlight1; ?>;
}

body, .inputbox {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif ;} 

.btn-link, a, .highlight1 {
color:#<?php echo $s5_highlightcolor1; ?>;
}

.module_round_box ul.menu ul a:hover, .module_round_box ul.menu ul span:hover, .module_round_box ul.menu li ul li.current a, #s5_bottom_row3_area1 .module_round_box_outer ul li a:hover, #s5_bottom_row3_area1 .module_round_box_outer ul.menu a:hover, h2 a:hover, .star_active, .s5_accordion_menu_element #current a, #s5_accordion_menu #current ul a:hover, .current a, ul.menu li.current a, .s5_am_innermenu a:hover, #s5_bottom_menu_wrap a:hover, .s5_masonry_articletitle:hover a {
color:#<?php echo $s5_highlightcolor1; ?> !important;
}

#s5_nav li.active span, #s5_nav li.active a, #s5_nav li.mainMenuParentBtnFocused a, #s5_nav li.mainMenuParentBtnFocused span, #s5_nav li.mainMenuParentBtn:hover a, #s5_nav li.mainMenuParentBtn:hover span, #subMenusContainer li.subParentBtn span:hover a, #subMenusContainer li.subMenuParentBtn span:hover a, #subMenusContainer li.subMenuParentBtn span:hover span.s5_sub_a_span, #s5_login, .iacf_subtext {
color:#<?php echo $s5_highlightcolor1; ?> !important;
}

.button, button, .s5_ls_readmore, .dropdown-menu li > a:hover, .dropdown-menu li > a:focus, .dropdown-submenu:hover > a, .dropdown-menu .active > a, .dropdown-menu .active > a:hover, .nav-list > .active > a, .nav-list > .active > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover, .btn-group.open .btn-primary.dropdown-toggle, .btn-primary, .item-page .dropdown-menu li > a:hover, .blog .dropdown-menu li > a:hover, .item .dropdown-menu li > a:hover, .btn, .pagenav a, .ac-container label:hover, .ac-container2 label:hover, .jdGallery .carousel .carouselInner .active, .readon:hover, p.readmore a:hover, .s5_is_css_10 .s5_is_slide_css_plus_circle:hover, .tagspopular a, .s5_tab_show_slide_button_active, .about_area_right, .module_round_box-highlight1, .module_round_box-highlight1_title .s5_mod_h3, .pagination .pagination a, .s5_masonry_active {
background:#<?php echo $s5_highlightcolor1; ?> !important;
}

.s5_tab_show_slide_button_active {
border:solid 2px #<?php echo $s5_highlightcolor1; ?> !important;
}

.btn:hover, .button:hover, button:hover, .tagspopular a:hover, .pagination .pagination a:hover {
background:#<?php echo change_Color($s5_highlightcolor1,'+35'); ?> !important;
}

.pagination .pagination a:hover {
border:solid 1px #<?php echo change_Color($s5_highlightcolor1,'+35'); ?> !important;
}

.module_round_box-highlight1_border {
border:solid 4px #<?php echo $s5_highlightcolor1; ?>;
}

.module_round_box-highlight1_title, .pagination .pagination a {
border:solid 1px #<?php echo $s5_highlightcolor1; ?>;
}

.s5_is_css_10 .s5_is_slide_css {
background:#<?php echo $s5_highlightcolor1; ?>;
}

.readmore a, .readon {
border:solid 1px #<?php echo $s5_highlightcolor1; ?> !important;
}

<?php if ($s5_hide_subarrows == "yes") { ?>
.mainParentBtn a {
background:none !important;
}
#s5_nav li.mainParentBtn .s5_level1_span2 a {
padding:0px;
}
<?php } ?>

<?php if ($s5_pos_custom_1 == "published") { ?>
#s5_pos_custom_1 {
background:url("<?php if(strrpos($s5_custom1_image_url,"/") <= 0) {echo $LiveSiteUrl; echo "images/";} echo $s5_custom1_image_url; ?>") no-repeat top center;
background-size:cover;
}
<?php } ?>

<?php if ($s5_pos_custom_3 == "published" && ($s5_pos_bottom_row2_1 == "published" || $s5_pos_bottom_row2_2 == "published" || $s5_pos_bottom_row2_3 == "published" || $s5_pos_bottom_row2_4 == "published" || $s5_pos_bottom_row2_5 == "published" || $s5_pos_bottom_row2_6 == "published" || $s5_pos_bottom_row1_1 == "published" || $s5_pos_bottom_row1_2 == "published" || $s5_pos_bottom_row1_3 == "published" || $s5_pos_bottom_row1_4 == "published" || $s5_pos_bottom_row1_5 == "published" || $s5_pos_bottom_row1_6 == "published")) { ?>
#s5_pos_custom_3 {
margin-bottom:30px;
}
<?php } ?>

<?php if ($s5_uppercase == "yes") { ?>
.uppercase, button, .button, .readon, .readmore a, .pagenav a, .btn, .iacf_subtext, .s5_mod_h3, #s5_accordion_menu h3 {
text-transform:uppercase;
}
<?php } ?>

<?php if (($s5_login  != "") || ($s5_register  != "")) { ?>	
#s5_register {
border-left:solid 1px #B6B6B6;
padding-left:10px;
margin-left:10px;
}
<?php } ?>

<?php if ($s5_column_side == "left") { ?>
#s5_split_layout_main_wrap { direction:rtl; }
#s5_split_layout_body_wrap_outer, #s5_split_layout_column_wrap_outer { direction:ltr; }
<?php } ?>

<?php if ($s5_pos_bottom_row3_1 == "published" || $s5_pos_bottom_row3_2 == "published" || $s5_pos_bottom_row3_3 == "published" || $s5_pos_bottom_row3_4 == "published" || $s5_pos_bottom_row3_5 == "published" || $s5_pos_bottom_row3_6 == "published") { ?>
#s5_bottom_menu_wrap {
padding-top:44px;
}
@media screen and (max-width: 750px){
#s5_bottom_menu_wrap {
padding-top:20px;
}
}
<?php } ?>

<?php if ($browser == "ie7" || $browser == "ie8" || $browser == "ie9") { ?>
.s5_lr_tab_inner {writing-mode: bt-rl;filter: flipV flipH;}
<?php } ?>

<?php if($s5_thirdparty == "enabled") { ?>
/* k2 stuff */
div.itemHeader h2.itemTitle, div.catItemHeader h3.catItemTitle, h3.userItemTitle a, #comments-form p, #comments-report-form p, #comments-form span, #comments-form .counter, #comments .comment-author, #comments .author-homepage,
#comments-form p, #comments-form #comments-form-buttons, #comments-form #comments-form-error, #comments-form #comments-form-captcha-holder {font-family: '<?php echo $s5_fonts;?>',Helvetica,Arial,Sans-Serif ;} 
<?php } ?>	
.s5_wrap{width:<?php echo $s5_body_width; echo $s5_fixed_fluid ?>;}	
</style>
</head>

<body id="s5_body" class="s5_body_bg_<?php echo $s5_bg_style; ?>">

<div id="s5_scrolltotop"></div>

<!-- Top Vertex Calls -->
<?php require_once("vertex/includes/vertex_includes_top.php"); ?>

<!-- Body Padding Div Used For Responsive Spacing -->		
<div id="s5_body_padding">

	<div id="s5_content_body_wrap" class="s5_wrap">
	
	<!-- Header -->			
		<header id="s5_menu_wrap">	
			<div id="s5_menu_wrap_inner1">	
			<div id="s5_menu_wrap_inner2">	
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
						<nav id="s5_menu_inner" class="s5_wrap_menu">
							<?php include("vertex/s5flex_menu/default.php"); ?>
							<div style="clear:both;"></div>
						</nav>
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
									<?php if ($s5_user_id) { echo $s5_loginout; } else { echo $s5_login; } ?>
								</div>						
							<?php } ?>						
						</div>
					</div>
				<?php } ?>
				
				<div style="clear:both; height:0px"></div>	
			</div>
			</div>
		</header>
	<!-- End Header -->	
	
	
	<!-- If Custom_1 Custom_2 Body Wrap -->
	<div id="s5_split_layout_main_wrap">
		<div id="s5_split_layout_body_wrap_outer">
		<div id="s5_split_layout_body_wrap_inner">
		<div id="s5_split_layout_body_wrap_inner2">


		<!-- Top Row1 -->	
			<?php if ($s5_pos_top_row1_1 == "published" || $s5_pos_top_row1_2 == "published" || $s5_pos_top_row1_3 == "published" || $s5_pos_top_row1_4 == "published" || $s5_pos_top_row1_5 == "published" || $s5_pos_top_row1_6 == "published") { ?>
				<section id="s5_top_row1_area1"<?php if ($s5_top_row1_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_top_row1_area1_background_color == "FFFFFF" && $s5_top_row1_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
				<div id="s5_top_row1_area2"<?php if ($s5_top_row1_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_top_row1_area2_background_color == "FFFFFF" && $s5_top_row1_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
				<div id="s5_top_row1_area_inner">

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
			<div id="s5_top_row2_area_inner">			
			
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
			<div id="s5_top_row3_area_inner">
			
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
			<div id="s5_center_area_inner">
			
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
						
						<?php if ($s5_negative_margins == "yes") { ?>
						<script type="text/javascript">
						function s5_add_negative_class() {
							if (document.getElementById("s5_component_wrap_inner")) {
								var s5_component_inner_html = document.getElementById("s5_component_wrap_inner").innerHTML;
								if (s5_component_inner_html.indexOf('class="blog') >= 1 && s5_component_inner_html.indexOf('cols-1') >= 1){
									document.getElementById("s5_component_wrap_inner").className = "s5_negative_margin_content";
								}
							}
						}
						s5_add_negative_class();
						</script>
						<?php } ?>
						<script type="text/javascript">
						function s5_add_disqus_class() {
							if (document.getElementById("s5_component_wrap")) {
								var s5_component_inner_html = document.getElementById("s5_component_wrap").innerHTML;
								if (s5_component_inner_html.indexOf('class="blog') >= 1 && s5_component_inner_html.indexOf('cols-1') >= 1 && s5_component_inner_html.indexOf('s5_disqus_comment_link') >= 1){
									document.getElementById("s5_component_wrap").className = "s5_disqus_comments_present";
								}
							}
						}
						s5_add_disqus_class();
						</script>
						
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
				
			<!-- Below Columns Wrap -->	
				<?php if ($s5_pos_below_columns_1 == "published" || $s5_pos_below_columns_2 == "published" || $s5_pos_below_columns_3 == "published" || $s5_pos_below_columns_4 == "published" || $s5_pos_below_columns_5 == "published" || $s5_pos_below_columns_6 == "published") { ?>
				<section id="s5_below_columns_wrap1"<?php if ($s5_below_columns_wrap1_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_below_columns_wrap1_background_color == "FFFFFF" && $s5_below_columns_wrap1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>	
				<div id="s5_below_columns_wrap2"<?php if ($s5_below_columns_wrap2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_below_columns_wrap2_background_color == "FFFFFF" && $s5_below_columns_wrap2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
				<div id="s5_below_columns_inner">

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
				
				
			</div>
			</div>
			</section>
			<?php } ?>
		<!-- End Center area -->	

		
		<?php if ($s5_pos_custom_3 == "published") { ?>
			<div id="s5_pos_custom_3">
				<?php s5_module_call('custom_3','round_box'); ?>
				<div style="clear:both; height:0px"></div>
			</div>
		<?php } ?>
		
		
		<!-- Bottom Row1 -->	
			<?php if ($s5_pos_bottom_row1_1 == "published" || $s5_pos_bottom_row1_2 == "published" || $s5_pos_bottom_row1_3 == "published" || $s5_pos_bottom_row1_4 == "published" || $s5_pos_bottom_row1_5 == "published" || $s5_pos_bottom_row1_6 == "published") { ?>
				<section id="s5_bottom_row1_area1"<?php if ($s5_bottom_row1_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_bottom_row1_area1_background_color == "FFFFFF" && $s5_bottom_row1_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
				<div id="s5_bottom_row1_area2"<?php if ($s5_bottom_row1_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_bottom_row1_area2_background_color == "FFFFFF" && $s5_bottom_row1_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
				<div id="s5_bottom_row1_area_inner">

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
			
			
		<!-- Bottom Row2 -->	
			<?php if ($s5_pos_bottom_row2_1 == "published" || $s5_pos_bottom_row2_2 == "published" || $s5_pos_bottom_row2_3 == "published" || $s5_pos_bottom_row2_4 == "published" || $s5_pos_bottom_row2_5 == "published" || $s5_pos_bottom_row2_6 == "published") { ?>
			<section id="s5_bottom_row2_area1"<?php if ($s5_bottom_row2_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_bottom_row2_area1_background_color == "FFFFFF" && $s5_bottom_row2_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_bottom_row2_area2"<?php if ($s5_bottom_row2_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_bottom_row2_area2_background_color == "FFFFFF" && $s5_bottom_row2_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
			<div id="s5_bottom_row2_area_inner">			
			
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
		

		</div>
		</div>
		</div>
		<?php if ($s5_pos_custom_1 == "published" || $s5_pos_custom_2 == "published") { ?>
			<div id="s5_split_layout_column_wrap_outer">
			<div id="s5_split_layout_column_wrap_inner">
				<?php if ($s5_pos_custom_1 == "published") { ?>
					<div id="s5_pos_custom_1">
						<?php s5_module_call('custom_1','round_box'); ?>
						<div style="clear:both; height:0px"></div>
					</div>
				<?php } ?>
				<?php if ($s5_pos_custom_2 == "published") { ?>
					<div id="s5_pos_custom_2">
						<?php s5_module_call('custom_2','round_box'); ?>
						<div style="clear:both; height:0px"></div>
					</div>
				<?php } ?>
			</div>
			</div>
			<div style="clear:both; height:0px"></div>
		<?php } ?>
	</div>
	<!-- End If Custom_1 Custom_2 Body Wrap -->


	
	<!-- Bottom Row3 -->	
		<?php if ($s5_pos_bottom_menu == "published" || $s5_pos_bottom_row3_1 == "published" || $s5_pos_bottom_row3_2 == "published" || $s5_pos_bottom_row3_3 == "published" || $s5_pos_bottom_row3_4 == "published" || $s5_pos_bottom_row3_5 == "published" || $s5_pos_bottom_row3_6 == "published") { ?>
		<section id="s5_bottom_row3_area1"<?php if ($s5_bottom_row3_area1_background == "no") { ?> class="s5_slidesection s5_no_custom_bg"<?php } else { ?> class="s5_slidesection s5_yes_custom_bg<?php if ($s5_bottom_row3_area1_background_color == "FFFFFF" && $s5_bottom_row3_area1_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>	
		<div id="s5_bottom_row3_area2"<?php if ($s5_bottom_row3_area2_background == "no") { ?> class="s5_no_custom_bg"<?php } else { ?> class="s5_yes_custom_bg<?php if ($s5_bottom_row3_area2_background_color == "FFFFFF" && $s5_bottom_row3_area2_background_image == "") { ?> s5_yes_custom_bg_white<?php } ?>"<?php } ?>>
		<div id="s5_bottom_row3_area_inner">
		
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
				
				<?php if($s5_pos_bottom_menu == "published") { ?>
					<div id="s5_bottom_menu_wrap">
						<?php s5_module_call('bottom_menu','notitle'); ?>
					</div>	
				<?php } ?>
			
			</div>
			</div>
			</div>

		</div>
		</div>
		</section>
		<?php } ?>
	<!-- End Bottom Row3 -->
	
	
	<?php if($s5_pos_breadcrumb == "published") { ?>
		<div id="s5_bread_wrap">
		<div id="s5_bread_wrap_inner">
		<div id="s5_bread_wrap_inner2">
			<?php if ($s5_pos_breadcrumb == "published") { ?>
				<div id="s5_breadcrumb_wrap">
					<?php s5_module_call('breadcrumb','notitle'); ?>
				</div>
				<div style="clear:both;"></div>
			<?php } ?>
		<div style="clear:both;height:0px;"></div>
		</div>
		</div>
		</div>
	<?php } ?>
	
	<!-- Footer Area -->
		<footer id="s5_footer_area1" class="s5_slidesection">
		<div id="s5_footer_area2">
		<div id="s5_footer_area_inner">
		
			<?php if($s5_font_resizer == "yes") { ?>
				<div id="fontControls"></div>
			<?php } ?>
			
			<?php if($s5_pos_language == "published") { ?>
				<div id="s5_language_wrap">
					<?php require_once("vertex/language_position.php"); ?>
				</div>
			<?php } ?>
			
			<?php if ($s5_scrolltotop == "override") { ?>
				<div id="s5_scroll_wrap">
					<?php require_once("vertex/page_scroll.php"); ?>                        
				</div>
			<?php } ?>
		
			<div id="s5_footer_text_wrap">
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

			<div style="clear:both; height:0px"></div>
			
		</div>
		</div>
		</footer>
	<!-- End Footer Area -->
	
	<?php s5_module_call('debug','round_box'); ?>
	
	<!-- Bottom Vertex Calls -->
	<?php require_once("vertex/includes/vertex_includes_bottom.php"); ?>
	
	</div>
	
</div>
<!-- End Body Padding -->


</body>
</html>