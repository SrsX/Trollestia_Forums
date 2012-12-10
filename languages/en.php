<?php
	if(!defined('Permitted_Page'))
	{
		if(function_exists('http_response_code'))
		{
			http_response_code(403);
		}
		elseif(function_exists('http_send_status'))
		{
			http_send_status(403);
		}
		else
		{
			header('Status-Code: 403 Forbidden');
		}
		exit();
	}

$_LANG = array();
$_LANG['lang'] = "en";
$_LANG['home'] = "Home";
$_LANG['login'] = "Login";
$_LANG['register'] = "Register";
$_LANG['email'] = "Email";
$_LANG['password'] = "Password";
$_LANG['remember_me'] = "Remember Me";
?>