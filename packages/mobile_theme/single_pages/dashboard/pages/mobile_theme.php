<? defined('C5_EXECUTE') or die(_("Access Denied.")); ?>
<h1><span><?php echo t('Mobile Options');?></span></h1>
<div class="ccm-dashboard-inner">
	<form method="post" action="<?php echo $this->action('save');?>">
	<span><strong><?= t('Select theme for mobile browsing');?>:</strong></span>
	<table border="0" cellspacing="0" cellpadding="0" id="ccm-template-list">
	<?php 
	if (count($tArray) == 0) { ?>
	<tr>
		<td colspan="5"><?php echo t('No themes are available.')?></td>
	</tr>
	<?php  } else {
		foreach ($tArray as $t) { ?>
		<tr <?php  if ($mobileThemeID == $t->getThemeID()) { ?> class="ccm-theme-active" <?php  } ?>>
			<td><?php echo $form->radio('mobile_themeID',intval($t->getThemeID()),$mobile_themeID); ?></td>
			<td><?php echo $t->getThemeThumbnail()?></td>
			<td class="ccm-template-content">
			<h2><?php echo $t->getThemeName()?></h2>
			<?php echo $t->getThemeDescription()?>
			<br/><br/>
			<?php echo $concrete_interface->button_js(t("Preview"), "ccm_previewInternalTheme(1, " . intval($t->getThemeID()) . ",'" . addslashes(str_replace(array("\r","\n",'\n'),'',$t->getThemeName())) . "')", "left");?>
			</td>
		</tr>
		<?php  }
	} ?>
	</table> 
	<?php print $concrete_interface->submit(t('Save'), t('Save')); ?>
	<div class="ccm-spacer"></div>
	</form>	
</div>