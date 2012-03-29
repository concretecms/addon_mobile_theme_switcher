<?php   defined('C5_EXECUTE') or die(_("Access Denied."));

class MobileTheme {
	
	public static function checkLoadTheme() {
		if(isset($_COOKIE['mobile_theme_non_mobile']) && $_COOKIE['mobile_theme_non_mobile'] == true) {
			return false; // break out if we've said we don't want the mobiel theme
		}
		
		$page = Page::getCurrentPage();
		if($page instanceof Page && $page->isAdminArea()) {
			return false; // no mobile theme for the dashboard
		}
		
		if(self::isMobileDevice()) {
			// we add mobile=1 if we detect mobile
			// we then check for it so we don't get
			// a loop
			if($_SERVER['REQUEST_METHOD'] !="POST" && empty($_GET['mobile'])) {
				$urlh = Loader::helper('url');
				$url = $urlh->setVariable('mobile', '1');
				header('Location: ' . $url); exit;
			}
			self::setMobileTheme();
		}
	}

	// this is also attached to the
	// on_page_view event
	protected static function setMobileTheme() {
		define('MOBILE_THEME_IS_ACTIVE',true);
		$pkg = Package::getByHandle('mobile_theme');
		$themeId = $pkg->config('MOBILE_THEME_ID');
		$mobileTheme = PageTheme::getByID($themeId);
		if($mobileTheme instanceof PageTheme) {
			// we have to grab the instance of the view
			// since on_page_view doesn't give it to us
			$view = View::getInstance();
			$view->setTheme($mobileTheme);
		}
		$view->addHeaderItem(Loader::helper('html')->css('ccm.app.mobile.css','mobile_theme'));		
	}

	protected static function isMobileDevice() {
		// use the detectmobilebrowsers.com regex check
		$dmb = Loader::helper('detect_mobile_browsers', 'mobile_theme');
		return $dmb->check($_SERVER['HTTP_USER_AGENT']);
	}
	
}
