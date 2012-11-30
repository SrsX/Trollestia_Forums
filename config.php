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

	define('DB_HOST', 'localhost');
	define('DB_USER', 'db_user');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'db_name');
	define('DB_TABLE_PREFIX', '');
	define('DB_Character_Set', 'utf8');
	define('Language', 'en');
	define('htaccess_Write', TRUE);

	$system_info = array();

	$system_info['default_protocol'] = "http://";

	$system_info['community_name'] = "Something";
	$system_info['email'] = 'something@something.com';
	$system_info['character_set'] = "utf-8";

	$system_info['root_dir'] = realpath(__DIR__);
	$system_info['languages_dir'] = $system_info['root_dir'] . "/languages/";
	$system_info['include_dir'] = $system_info['root_dir'] . "/include/";

	$system_info['website'] = "";
	$system_info['website_css'] = $system_info['website'] . "include/css/";
	$system_info['website_js'] = $system_info['website'] . "include/js/";
?>
