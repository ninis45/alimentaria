<?php
Asset::js('bootstrap.min.js');
?>
<script type="text/javascript">
	pyro = { 'lang' : {} };
	var APPPATH_URI					= "<?php echo APPPATH_URI;?>";
	var SITE_URL					= "<?php echo rtrim(site_url(), '/').'/';?>";
	var BASE_URL					= "<?php echo BASE_URL;?>";
	var BASE_URI					= "<?php echo BASE_URI;?>";
	var UPLOAD_PATH					= "<?php echo UPLOAD_PATH;?>";
	var DEFAULT_TITLE				= "<?php echo addslashes($this->settings->site_name); ?>";
	pyro.admin_theme_url			= "<?php echo BASE_URL . $this->admin_theme->path; ?>";
	pyro.apppath_uri				= "<?php echo APPPATH_URI; ?>";
	pyro.base_uri					= "<?php echo BASE_URI; ?>";
	pyro.lang.remove				= "<?php echo lang('global:remove'); ?>";
	pyro.lang.dialog_message 		= "<?php echo lang('global:dialog:delete_message'); ?>";
	pyro.csrf_cookie_name			= "<?php echo config_item('cookie_prefix').config_item('csrf_cookie_name'); ?>";
</script>
<?php //Asset::css(array('bootstrap.min.css')); ?>

<?php echo Asset::render(); ?>
<?php echo $template['metadata']; ?>