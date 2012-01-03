<?php defined('C5_EXECUTE') or die(_("Access Denied."));

class MobileTheme {

	public static $mobile_agents = array(
		'iphone', 'ipod', 'android', 'webos', 'fennec', 'blackberry', 
		'mobile safari', 'windows ce', 'opera mini', 'symbianos', 'symbian os', 'nokia'
	);
	
	public static function checkLoadTheme($view) {
		if(isset($_COOKIE['mobile_theme_non_mobile']) && $_COOKIE['mobile_theme_non_mobile'] == true) {
			return false; // break out if we've said we don't want the mobiel theme
		}
		
		$page = Page::getCurrentPage();
		if($page instanceof Page && $page->isAdminArea()) {
			return false; // no mobile theme for the dashboard
		}
		
		if(self::isMobileDevice()) {
			define('MOBILE_THEME_IS_ACTIVE',true); // define a constant so developers can base some logic off of it.
			$pkg = Package::getByHandle('mobile_theme');
			$themeId = $pkg->config('MOBILE_THEME_ID');
			$mobileTheme = PageTheme::getByID($themeId);
			if($mobileTheme instanceof PageTheme) {
				$view->setTheme($mobileTheme);
			}
			$view->addHeaderItem(Loader::helper('html')->css('ccm.app.mobile.css','mobile_theme'));
		}
	}
	
	protected static function isMobileDevice() {
		
		$isMobile = false; // set to true to test mobile..
		
		$useragent = strtolower($_SERVER['HTTP_USER_AGENT']);
			
		foreach(self::$mobile_agents as $m) {
			if(strstr($useragent,$m)) {
				$isMobile = true;
				break;
			}
		}
		
		return $isMobile;		
	}
	
}