<?php
	if(!defined('Permitted_Page'))
	{
		http_send_status(403);
		exit();
	}

	if(Language == 'en')
	{
		$smarty->assign('system_lang', array(
		'login' => 'Login',
		'email' => 'Email',
		'password' => 'Password',
		'remember_me' => 'Remember Me'
		));
	}
	else
	{
		error_log(Language . '" is not a supported language code.');
		exit();
	}