<h3><?php echo l('edit_status'); ?></h3>
<form action="<?php echo Request::full_uri(); ?>" method="post" class="overlay_thin">
	<?php show_errors($status->errors); ?>
	<div class="tabular box">
		<?php View::render('admin/statuses/_form'); ?>
	</div>
	<div class="actions">
		<input type="submit" value="<?php echo l('save'); ?>" />
		<input type="button" value="<?php echo l('cancel'); ?>" onclick="close_overlay();" />
	</div>
</form>