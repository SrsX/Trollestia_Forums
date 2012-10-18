<?php
	define('Permitted_Page', TRUE)

	require_once('config.php');

	require_once('Smarty.class.php');

	$smarty = new Smarty;

	require_once('lang.php');

	$smarty->assign('system_info', array(
	'community_name' => 'Something',
	'system_email' => 'something@something.com'
	));

	$smarty->display('templates/header.tpl');
	$smarty->display('templates/login.tpl');
	$smarty->display('templates/footer.tpl');
?>