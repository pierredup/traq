<div class="content">
	<h2 id="page_title"><?php echo l('project_settings'); ?></h2>
</div>
<?php View::render('projects/settings/_nav'); ?>
<div class="content">
	<?php echo HTML::link(l('new_repository'), "{$project->slug}/settings/repositories/new", array('class' => 'button_new', 'data-overlay' => true)); ?>
</div>
<div>
	<table class="list">
		<thead>
			<tr>
				<th class="fixed_repo_slug"><?php echo l('slug'); ?></th>
				<th class="type"><?php echo l('type'); ?></th>
				<th class="actions"><?php echo l('actions'); ?></th>
			</tr>
		</thead>
		<tbody>
		<?php foreach ($repos->exec()->fetch_all() as $repo) { ?>
			<tr>
				<td><?php echo HTML::link($repo->slug, $project->href("settings/repositories/{$repo->slug}/edit"), array('data-overlay' => true)); ?></td>
				<td><?php echo $scm_types[$repo->type]; ?></td>
				<td>
					<?php echo HTML::link(l('edit'), $project->href("settings/repositories/{$repo->slug}/edit"), array('title' => l('edit'), 'class' => 'button_edit', 'data-overlay' => true)); ?>
					<?php echo HTML::link(l('delete'), $project->href("settings/repositories/{$repo->slug}/delete"), array('title' => l('delete'), 'class' => 'button_delete', 'data-confirm' => l('confirm.delete_x', $repo->slug))); ?>
				</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>
</div>