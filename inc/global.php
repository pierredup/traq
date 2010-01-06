<?php
/**
 * Traq 2
 * Copyright (c) 2009 Jack Polgar
 * All Rights Reserved
 *
 * $Id$
 */

// Define a few things...
$CACHE = array('settings'=>array());
$breadcrumbs = array();

// Traq Version
require('version.php');

// Fetch core files.
require(TRAQPATH.'inc/db.class.php');
require(TRAQPATH.'inc/user.class.php');
require(TRAQPATH.'inc/fishhook.class.php');
require(TRAQPATH.'inc/uri.class.php');
require(TRAQPATH.'inc/common.php');
require(TRAQPATH.'inc/config.php');

// Start the DB class.
$db = new Database($conf['db']['server'],$conf['db']['user'],$conf['db']['pass'],$conf['db']['dbname']);
define("DBPF",$conf['db']['prefix']);

// Start the other required class
$user = new User;
$uri = new URI;

// Check if Traq is setup to host one proejct.
if(settings('single_project') != 0)
{
	$project = $db->queryfirst("SELECT * FROM ".DBPF."projects WHERE id='".settings('single_project')."' LIMIT 1");
	define("PROJECT_SLUG",$project['slug']);
	$uri->singleproject();
}
else
{
	if(is_project($uri->seg[0])) define("PROJECT_SLUG",$uri->seg[0]);
}

// Fetch locale file...
require('locale/'.settings('locale').'.php');

($hook = FishHook::hook('global')) ? eval($hook) : false;
?>