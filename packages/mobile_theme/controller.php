<?php    
defined('C5_EXECUTE') or die(_("Access Denied."));
class MobileThemePackage extends Package {

	protected $pkgHandle = 'mobile_theme';
	protected $appVersionRequired = '5.4.1';
	protected $pkgVersion = '1.0';
	
	public function getPackageName() {
		return t("Mobile Theme Switcher");
	}
	
	public function getPackageDescription() {
		return t("Loads a mobile theme based on the user's browser");
	}
	
	public function install() {
		$pkg = parent::install();
		
		Loader::model('single_page');
		
		$dm = SinglePage::add('/dashboard/pages/mobile_theme', $pkg);
		$dm->update(array('cName'=>t('Mobile'), 'cDescription'=>t('Set a special theme for mobile devices')));
		$mobileTheme = PageTheme::add('mobile_fone', $pkg);
		$pkg->saveConfig('MOBILE_THEME_ID',$mobileTheme->getThemeID());
	}
	
	public function on_start() { 
		if($_SESSION['mobile_theme_non_mobile'] != true) {
			$pkg = Package::getByHandle($this->pkgHandle);
			Events::extend('on_start',
				'MobileTheme',
				'checkLoadTheme',
				'packages/'.$this->pkgHandle.'/models/mobile_theme.php'
				);
		}
	}
	
} 
