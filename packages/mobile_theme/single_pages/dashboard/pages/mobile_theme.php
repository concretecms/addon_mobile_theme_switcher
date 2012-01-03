<?php defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<?=Loader::helper('concrete/dashboard')->getDashboardPaneHeaderWrapper(t('Mobile Options'), false, false, false);?>
<form method="post" action="<?php   echo $this->action('save');?>">
<div class="ccm-pane-body">
	<h3><?php  echo  t('Select theme for mobile browsing');?>:</h3>
	<table border="0" cellspacing="0" cellpadding="0" id="ccm-template-list">
	<?php   
	if (count($tArray) == 0) { ?>
	<tr>
		<td colspan="5"><?php   echo t('No themes are available.')?></td>
	</tr>
	<?php    } else {
		foreach ($tArray as $t) { ?>
		<tr <?php    if ($mobileThemeID == $t->getThemeID()) { ?> class="ccm-theme-active" <?php    } ?>>
			<td><?php   echo $form->radio('mobile_themeID',intval($t->getThemeID()),$mobile_themeID); ?></td>
			<td><?php   echo $t->getThemeThumbnail()?></td>
			<td class="ccm-template-content">
			<h2><?php   echo $t->getThemeName()?></h2>
			<?php   echo $t->getThemeDescription()?>
			<br/><br/>
			<?php   echo $concrete_interface->button_js(t("Preview"), "ccm_previewInternalTheme(1, " . intval($t->getThemeID()) . ",'" . addslashes(str_replace(array("\r","\n",'\n'),'',$t->getThemeName())) . "')", "left");?>
			</td>
		</tr>
		<?php    }
	} ?>
	</table> 
</div>
<div class="ccm-pane-footer">
	<?php echo $concrete_interface->submit(t('Save'),'Save','right', 'primary')?>
</div>
</form>	
<?=Loader::helper('concrete/dashboard')->getDashboardPaneFooterWrapper(false);?>