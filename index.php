<?php
	define('Permitted_Page', TRUE);

	require_once('config.php');

	require_once('/usr/local/lib/php/Smarty/Smarty.class.php');

	$smarty = new Smarty;
	$smarty->setTemplateDir('templates');
	$smarty->setCompileDir('templates_c');
	$smarty->setCacheDir('cache');
	$smarty->setConfigDir('configs');

	require_once('languages/lang.php');

	$smarty->assign('system_info', array(
	'community_name' => 'Something',
	'system_email' => 'something@something.com',
	'character_set' => Character_Set
	));

	$smarty->display('login.tpl');
?>