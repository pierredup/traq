<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=buildtitle(array($project['name']))?></title>
<? include(template('headerinc')); ?> 
</head>
<body>
<? include(template('header')); ?>
	<? include(template('project_nav')); ?>
	<div id="content">
		<? include(template("breadcrumbs")); ?>
		<h1><?=$project['name']?></h1>
		<div id="sidebar">
			<h3><?=l('tickets')?></h3>
			<?=l('active_tickets')?>: <?=$project['tickets']['active']?><br />
			<?=l('closed_tickets')?>: <?=$project['tickets']['closed']?><br />
			<?=l('total_tickets')?>: <?=$project['tickets']['total']?>
		</div>
		<p>
			<?=$project['desc']?>
		</p>
		<div class="clear"></div>
	</div>
<? include(template('footer')); ?>
</body>
</html>