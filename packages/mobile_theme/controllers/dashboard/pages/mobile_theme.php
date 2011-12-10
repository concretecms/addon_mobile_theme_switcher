<?php   defined('C5_EXECUTE') or die(_("Access Denied."));

class DashboardPagesMobileThemeController extends Controller {
	public $helpers = array('form','concrete/interface');
	
	public function view() {
		$tArray = PageTheme::getList();
		$this->set('tArray',$tArray);
		$pkg = Package::getByHandle('mobile_theme');
		$this->set('mobile_themeID',$pkg->config('MOBILE_THEME_ID'));
	}

	public function save() {
		$pkg = Package::getByHandle('mobile_theme');
		$pkg->saveConfig('MOBILE_THEME_ID',$this->post('mobile_themeID'));
		$this->redirect('/dashboard/pages/mobile_theme','success',t('Mobile theme settings saved'));
	}

	public function success($msg) {
		$this->set('message',$msg);
		$this->view();
	}
}
