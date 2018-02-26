<?php die("Access Denied"); ?>#x#a:2:{s:6:"output";s:0:"";s:6:"result";s:7876:"/* ----[ LINKS ]----*/

/* all menu links */
#s5_nav a, #subMenusContainer a{
	text-decoration:none;
}

/* Just main menu links --[for non-javascript users this applies to submenu links as well]*/
#s5_nav a{
	margin:0;	
}

#subMenusContainer ul li {
	padding:0px;
	margin:0px;
}

/* Just sub menu links */
#subMenusContainer a, #s5_nav li li a{
	color:#333333;
	text-align:left;
	font-size:0.9em;
	width:auto;
	white-space: pre;
}

#subMenusContainer a:after, #s5_nav li li a:after {
content:"\a";
}

/* ----[ OLs ULs, LIs, and DIVs ]----*/


/* All ULs and OLs */
#nav, #s5_nav ul, #s5_nav ol, #subMenusContainer ul, #subMenusContainer ol { 
	padding: 0;
	margin: 0;
	list-style: none;
	line-height: 1em;
}

/* All submenu OLs and ULs */
#s5_nav ol, #s5_nav ul, #subMenusContainer ul, #subMenusContainer ol {	
	left:0;
}

#subMenusContainer img {
margin-right:8px;
}

#s5_nav img {
margin-right:6px;
margin-top:2px;
}

/* Submenu Outer Wrapper - each submenu is inside a div with this class - javascript users only */
.s5_sub_wrap, .s5_sub_wrap_lower, .s5_sub_wrap_rtl, .s5_sub_wrap_lower_rtl { 
	display:none; 
	position: absolute; 
	overflow:hidden; 
	padding-right:6px;
	padding-bottom:6px;
	padding-left: 4px;
}

.mainParentBtn a {
	display:block;
	background:url(/templates/charlestown/images/s5_menu_arrow.png) no-repeat right 9px;
	padding-right:24px;
}

.subParentBtn .S5_submenu_item a {
	background:url(/templates/charlestown/images/s5_menu_arrow_subs.png) no-repeat right center;
	display:block;
}

#subMenusContainer div.s5_sub_wrap ul, #subMenusContainer div.s5_sub_wrap_rtl ul {
	-moz-border-radius:0px;
	-webkit-border-radius:0px;
	border-radius:0px;
	-webkit-box-shadow:0 1px 2px 1px rgba(0, 0, 0, 0.1); 
	box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.1);
	-moz-box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.1); 
	border-top:none;
	margin-left: -3px;
	background:#FFFFFF;
	padding-bottom:3px;
}

#subMenusContainer div.s5_sub_wrap_lower ul, #subMenusContainer div.s5_sub_wrap_lower_rtl ul {
	-moz-border-radius:0px;
	-webkit-border-radius:0px;
	border-radius:0px;
	-webkit-box-shadow:0 1px 2px 1px rgba(0, 0, 0, 0.1); 
	box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.1);
	-moz-box-shadow: 0 1px 2px 1px rgba(0, 0, 0, 0.1); 	
	background:#FFFFFF;
}

#subMenusContainer div.s5_sub_wrap ul ul, #subMenusContainer div.s5_sub_wrap_lower ul ul, #subMenusContainer div.s5_sub_wrap_rtl ul ul, #subMenusContainer div.s5_sub_wrap_lower_rtl ul ul {
	padding:0px;
	margin:0px;
	-moz-border-radius:none;
	-webkit-border-radius:none;
	border-radius:none;
	-webkit-box-shadow:none;
	-moz-box-shadow:none;
	box-shadow:none;
	background:none;
	border:none;
	padding:13px 3px 12px;
}

#subMenusContainer li.subParentBtn, #subMenusContainer li.subMenuBtn {
	padding:0 15px 5px;
	clear:both;
	min-width:225px;
}


/* List items in main menu --[for non-javascript users this applies to submenus as well]  */
#s5_nav li { 
	/*great place to use a background image as a divider*/
	display:block;
	list-style:none;
	position:relative;
	float:left;
	height:75px;
	padding-right:0px;
	padding-top:0px;
	padding-bottom:0px;
	margin-right:4px;
	overflow:hidden;
	line-height: 27px;
}

#s5_nav li a {
	color:#2d2d2d;
	font-weight:300;
	font-size:1.0em;	}
	

	
	
#s5_nav li .s5_level1_span2 a {
	padding-left:0px;
	padding-right:0px;
}

#s5_nav li.mainParentBtn .s5_level1_span2 {
	padding-right:0px;
}

#s5_nav li.mainParentBtn .s5_level1_span2 a {
	padding-right:18px;
}

.S5_parent_subtext {
    clear: both;
    color: #a1a1a1;
    cursor: pointer;
    display: block;
    font-size: 0.7em;
    margin-left: 1px;
    margin-top: -6px;
}

#s5_nav li .s5_level1_span1 {
background:none;
height:52px;
display:block;
padding-left: 22px;
padding-right: 22px;
}

#s5_nav li .s5_level1_span2 {
background:none;
height:52px;
display:block;
padding-top:12px;
}

#s5_nav li.active .s5_level1_span1, #s5_nav li.mainMenuParentBtnFocused .s5_level1_span1, #s5_nav li:hover .s5_level1_span1 {
height:40px;
display:block;
}

#s5_nav li.active .s5_level1_span2, #s5_nav li.mainMenuParentBtnFocused .s5_level1_span2, #s5_nav li:hover .s5_level1_span2  {
height:32px;
display:block;
padding-top:12px;
}

#subMenusContainer .moduletable {
padding:8px;
color:#949494;
border-bottom:solid 1px #ffffff;
}

#subMenusContainer .moduletable h3 {
margin-bottom:8px;
}

.S5_submenu_item {
	padding:8px 16px;
	display:block;
	border:1px solid #ffffff;
	-moz-border-radius:0px;
	-webkit-border-radius:0px;
	border-radius:0px;
}



.S5_grouped_child_item .S5_submenu_item {
	padding:4px;
	border:none;
	border:1px solid #ffffff;
	-moz-border-radius:none;
	-webkit-border-radius:none;
	border-radius:none;
}

#subMenusContainer li{
	list-style: none;
}


#subMenusContainer{	display:block; 	position:absolute;	top:0;	left:0;	width:100%;	height:0;	overflow:visible;	z-index:1000000000; }


/* --------------------------[ The below is just for non-javscript users ]--------------------------*/
#s5_nav li li{	float:none; }

#s5_nav li li a{ /* Just submenu links*/	
	position:relative;
	float:none;
}

#s5_nav li ul { /* second-level lists */
	position: absolute;
	width: 10em;
	margin-left: -1000em; /* using left instead of display to hide menus because display: none isn't read by screen readers */
	margin-top:2.2em;
}

/* third-and-above-level lists */
#s5_nav li ul ul { margin: -1em 0 0 -1000em; }
#s5_nav li:hover ul ul {	margin-left: -1000em; }

 /* lists nested under hovered list items */
#s5_nav li:hover ul{	margin-left: 0; }
#s5_nav li li:hover ul {	margin-left: 10em; margin-top:-2.5em;}

/* extra positioning rules for limited noscript keyboard accessibility */
#s5_nav li a:focus + ul {  margin-left: 0; margin-top:2.2em; }
#s5_nav li li a:focus + ul { left:0; margin-left: 1010em; margin-top:-2.2em;}
#s5_nav li li a:focus {left:0;  margin-left:1000em; width:10em;  margin-top:0;}
#s5_nav li li li a:focus {left:0; margin-left: 2010em; width: 10em;  margin-top:-1em;}
#s5_nav li:hover a:focus{ margin-left: 0; }
#s5_nav li li:hover a:focus + ul { margin-left: 10em; }


span.menu_subtext {
	display:block;
	font-weight:normal;
	line-height:10px;
}

.S5_subtext {
display: block;
font-size: 0.8em;
padding-top: 4px;
color:#949494;
cursor:pointer;
}

.S5_grouped_child_item .S5_subtext {
padding-left:20px;
font-size:0.7em;
}

span.menu_title{
	line-height:12px;
	text-align:center;
}


div.has_description{
	height:auto;
}

div.S5_grouped_child_item span{
	font-size:0.9em;
}

div.S5_grouped_child_item {
	padding-top:4px;
	padding-bottom:4px;
}

div.S5_grouped_child_item span span.S5_submenu_item a{
	padding:0px;
	padding-left:12px;
	color:#333333;}

#subMenusContainer a, #s5_nav li li a {outline:none;}

.s5_wrap_fmfullwidth #s5_nav {margin-top:9px !important;}
.s5_wrap_fmfullwidth #s5_nav li {height: 60px;}

.subMenusContainer div.s5_sub_wrap ul, .subMenusContainer div.s5_sub_wrap_rtl ul {
	-moz-border-radius:0px 0px 2px 2px !important;
	-webkit-border-radius:0px 0px 2px 2px !important;
	border-radius:0px 0px 2px 2px !important; }

.s5_wrap_fmfullwidth #s5_logo_wrap {
    margin-top: -19px !important;}
	
#subMenusContainer {letter-spacing:0px;}

.s5_wrap_fmfullwidth .mainParentBtn a {background: url(/templates/charlestown/images/s5_menu_arrow.png) no-repeat right -58px;}    
.s5_wrap_fmfullwidth li.mainMenuParentBtnFocused a { background-position:right 8px;} 
		
.s5_wrap_fmfullwidth #s5_logo_wrap {
        transform:scale(0.7);
		 -ms-transform: scale(.7); /* IE 9 */
		-webkit-transform: scale(.7);		}	
	
#s5_nav {
    float: left;
    left: 50%;
    margin: auto;
	width: auto !important;
    position: relative;
	margin-top:26px;}
	
#s5_nav li {
	
    float: left;
    position: relative;
    right: 50%;}	
		
	#s5_nav li span {
		border-left:1px solid #f2f2f2;}
		
	#s5_nav li span span  {	border:none;}
	
#s5_responsive_mobile_sidebar_menu_wrap h3.s5_logo_spacer {display:none !important;}";}