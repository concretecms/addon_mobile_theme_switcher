<? /* xml version="1.0" */ ?>
<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN"
"http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<!--  Fone v1.0, an XHTML template for mobile web pages  www.QRdvark.com/templates/fone/  -->
<!--  Copyright 2011 Azalea Software, Inc. 20mar11 -->
<!-- 'Fone' by Azalea Software, Inc. is licensed under the Creative Commons Attribution 3.0 Unported License (CC BY 3.0) -->

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0" />
<meta name="HandheldFriendly" content="true"/>
<meta name="MobileOptimized" content="320"/>
<meta http-equiv="cleartype" content="on" />
<meta http-equiv="Cache-Control" content="no-cache" />

<link href="<?=$this->getThemePath()?>/main.css" rel="stylesheet" type="text/css"/>
<link href="<?=$this->getThemePath()?>/typography.css" rel="stylesheet" type="text/css" />

<!--  the favicon & iOS home screen icon are both 57x57 PNG's. Use a full URL file path for Android devices.  -->
<!--  <link rel="apple-touch-icon-precomposed" href="http://yoursite.com/apple-touch-icon.png"/>  -->
<!--  <link rel="icon" type="image/vnd.microsoft.icon" href="http://yoursite.com/favicon.png" />  -->
<!--  make a site map for your mobile site, even if you have a computer browser site too.  www.xml-sitemaps.com  -->
<!--  <link rel="alternate" type="application/rss+xml" title="ROR" href="ror.xml" /> -->

<?php Loader::element('header_required'); ?>

</head>

<body>

<div class="content">
	
	<?php
	$u = new User;
	if ($u->isLoggedIn ()) { ?>
	<div style="padding-top:20px;"></div>
	<?php  } ?>

	<div id="navButtons">
		<?php
			$bt = BlockType::getByHandle('autonav');
			$bt->controller->displayPages = 'top';
			$bt->controller->orderBy = 'display_asc';
			$bt->render('templates/header_menu'); 
		?>
	</div>
	<p class="site-title"><a href="<?=$this->url('');?>"><?php echo SITE; ?></a></p>