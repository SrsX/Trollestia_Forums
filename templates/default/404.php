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

	if(function_exists('http_response_code'))
	{
		http_response_code(404);
	}
	elseif(function_exists('http_send_status'))
	{
		http_send_status(404);
	}
	else
	{
		header('Status-Code: 404 Not Found' . PHP_EOL);
	}

	require_once($system_info['templates_dir'] . 'header.php');

	echo 'The page you requested could not be found!' . PHP_EOL;

	require_once($system_info['templates_dir'] . 'footer.tpl');