<?php
/**
 * Traq
 * Copyright (c) 2009 Rainbird Studios
 * $Id$
 */

require("global.php");

if(!$user->group->isadmin) {
	exit;
}

if($_POST['do'] == "update") {
	$db->query("UPDATE ".DBPREFIX."settings SET value='".$db->escapestring($_POST['title'])."' WHERE setting='title' LIMIT 1");
	header("Location: settings.php?updated");
} else {
	adminheader('Settings');
	?>
	<div id="content">
		<form action="settings.php" method="post">
		<input type="hidden" name="do" value="update" />
		<div class="content-group">
			<div class="content-title">Settings</div>
			<table width="400">
				<tr valign="top">
					<th>Site title</th>
					<td><input type="text" name="title" value="<?=$settings->title?>" /></td>
				</tr>
			</table>
		</div>
		<br />
		<div class="content-group">
			<div align="center" class="content-group-content"><button type="submit">Update</button></div>
		</div>
		</form>
	</div>
	<?
	adminfooter();
}
?>