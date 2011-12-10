<?php   defined('C5_EXECUTE') or die(_("Access Denied.")); 
/* if the cookie is already set, remove it 
 * really for testing since the cookie has a long lifetime
*/
if(isset($_COOKIE['mobile_theme_non_mobile']) && $_COOKIE['mobile_theme_non_mobile'] == true) { 
	setcookie('mobile_theme_non_mobile', NULL, -1);
	unset($_COOKIE['mobile_theme_non_mobile']);
} else {
	setcookie('mobile_theme_non_mobile',true,strtotime('+6 months'),DIR_REL . '/');
}

if($_REQUEST['rcID']) {
	$c = Page::getByID($_REQUEST['rcID']);
	$path = View::url($c->getCollectionPath());
} else {
	$path = View::url('/');
}
header("Location: ".$path);
?>