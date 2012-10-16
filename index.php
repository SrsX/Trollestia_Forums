<?php
	define('Permitted_Page', TRUE)

	include('Smarty.class.php');
	include('config.php');

	$smarty = new Smarty;

	$smarty->assign('system_info', array(
	'community_name' => 'Something',
	'system_email' => 'something@something.com'
	));

	include('lang.php');

	$smarty->display('templates/login.tpl');