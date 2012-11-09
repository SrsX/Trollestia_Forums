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
			header('Status-Code: 403 Forbidden' . PHP_EOL);
		}
		exit();
	}

	if(Language == 'en')
	{
		require_once('en.php');
	}
	else
	{
		error_log(Language . '" is not a supported language code.');
		exit();
	}