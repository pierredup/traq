<?php
/**
 * Traq 2
 * Copyright (c) 2009 Jack Polgar
 * All Rights Reserved
 *
 * $Id$
 */

$project = $db->queryfirst("SELECT * FROM ".DBPF."projects WHERE slug='".$db->res($uri->seg[0])."' LIMIT 1");
$project['managers'] = explode(',',$project['managers']);

($hook = FishHook::hook('handler_project')) ? eval($hook) : false;

if($uri->seg[1] == '')
{	
	require(template('project_info'));
}
elseif(preg_match('/ticket-(?<id>\d+)/',$uri->seg[1],$matches))
{
	require(TRAQPATH.'handlers/ticket.php');
}
elseif(preg_match('/milestone-(?<slug>.*)/',$uri->seg[1],$matches))
{
	require(TRAQPATH.'handlers/milestone.php');
}
elseif($uri->seg[1] == 'roadmap')
{
	require(TRAQPATH.'handlers/roadmap.php');
}
elseif($uri->seg[1] == 'tickets')
{
	require(TRAQPATH.'handlers/tickets.php');
}
elseif($uri->seg[1] == 'newticket')
{
	require(TRAQPATH.'handlers/newticket.php');
}
elseif($uri->seg[1] == 'timeline')
{
	require(TRAQPATH.'handlers/timeline.php');
}
elseif($uri->seg[1] == 'changelog')
{
	require(TRAQPATH.'handlers/changelog.php');
}
elseif(preg_match('/attachment-(?<id>\d+)/',$uri->seg[1],$matches))
{
	require(TRAQPATH.'handlers/attachment.php');
}
?>