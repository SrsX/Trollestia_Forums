<?php
	define('Permitted_Page', TRUE);

	require_once('config.php');
	require_once($system_info['languages_dir'] . 'lang.php');

	if($_GET['p'])
	{
		$system_info['current_page'] = $_GET['p'] . ".php";
		$system_info['current_page_name'] = $_GET['p'];
	}
	elseif($system_info['current_page'] == "")
	{
		$system_info['current_page'] = $system_info['default_page'];
		$system_info['current_page_name'] = preg_replace("/\\.[^.\\s]{3,4}$/", "", $system_info['current_page']);
	}
	$system_info['title'] = $system_info['community_name'] . " - " . $system_info['current_page_name'];

	$display_page = $system_info['templates_dir'] . $system_info['current_page'];

	if(!file_exists($display_page))
	{
		$display_page = $system_info['404_page'];

		if(!file_exists($display_page))
		{
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
			error_log("The default 404 page could not be found.");
			exit("Oh no! Page not found!");
		}
	}

	require_once($display_page);
?>