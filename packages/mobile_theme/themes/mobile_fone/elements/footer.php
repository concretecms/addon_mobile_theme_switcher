<?php   defined('C5_EXECUTE') or die("Access Denied."); 

$concrete_urls = Loader::helper('concrete/urls');
$non_mobile_url = $concrete_urls->getToolsURL('non_mobile', 'mobile_theme').($c instanceof Page?"?rcID=".$c->getCollectionID():"");
?>

<div class="footer">
	<p>&copy; <?php   echo date('Y')?> <a href="<?php   echo DIR_REL?>/"><?php   echo SITE?></a> &nbsp;&nbsp; <?php   echo t('All rights reserved.')?></p>
	<p>
		<?php   
			$u = new User();
				if ($u->isRegistered()) { ?>
					<?php    
					if (Config::get("ENABLE_USER_PROFILES")) {
						$userName = '<a href="' . $this->url('/profile') . '">' . $u->getUserName() . '</a>';
					} else {
						$userName = $u->getUserName();
					}
					?>
				<span class="sign-in"><?php   echo t('Currently logged in as <b>%s</b>.', $userName)?> <a href="<?php   echo $this->url('/login', 'logout')?>"><?php   echo t('Sign Out')?></a></span>
			<?php    } ?>
	</p>
	<p class="powered-by"><a href="<?php   echo $non_mobile_url ?>"><?php   echo t('non-mobile site')?></a></p>
	<p class="powered-by"><a href="http://www.concrete5.org" title="<?php   echo t('concrete5 - open source content management system for PHP and MySQL')?>"><?php   echo t('concrete5 - open source CMS')?></a></p>
	<p>template by <a href="http://www.QRdvark.com/templates/"><em>QRdvark</em></a> (CC BY 3.0)</p>
</div>

</div>
<?php Loader::element('footer_required'); ?>
</body>
</html>