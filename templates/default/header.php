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

echo '
<!DOCTYPE HTML>' . PHP_EOL . '
<HTML lang="' . $_LANG['lang'] . '">' . PHP_EOL . '
	<head>' . PHP_EOL . '
		<title>' . $system_info['title'] . '</title>' . PHP_EOL . '
		<meta http-equiv="Content-Type" content="text/html; charset=' . $system_info['character_set'] . '" />' . PHP_EOL . '
		<meta http-equiv="Content-Style-Type" content="text/css" />' . PHP_EOL . '
		<meta name="copyright" lang="' . $_LANG['lang'] . '" content="&copy; ' . $system_info['community_name'] . '" />' . PHP_EOL . '
		<meta name="author" lang="' . $_LANG['lang'] . '" content="mailto: ' . $system_info['email'] . '" />' . PHP_EOL . '
		<meta name="robots" content="ALL" />' . PHP_EOL . '
		<link rel="icon" href="' . $system_info['website_css'] . 'images/favicon.ico" type="image/x-icon" />' . PHP_EOL . '
		<link rel="shortcut icon" href="' . $system_info['website_css'] . 'images/favicon.ico" type="image/x-icon" />' . PHP_EOL . '
		<link rel="stylesheet" type="text/css" href="' . $system_info['website_css'] . 'style.css" />' . PHP_EOL . '
		<link rel="stylesheet" type="text/css" href="' . $system_info['website_css'] . 'bootstrap.min.css" />' . PHP_EOL . '
		<!--[if lt IE 9]>' . PHP_EOL . '
			<script type="text/javascript" src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>' . PHP_EOL . '
		<![endif]-->' . PHP_EOL . '
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>' . PHP_EOL . '
		<script type="text/javascript" src="' . $system_info['website_js'] . 'bootstrap.min.js"></script>' . PHP_EOL . '
		<script type="text/javascript" src="' . $system_info['website_js'] . 'login.js"></script>' . PHP_EOL . '
	</head>' . PHP_EOL . '
	<body>' . PHP_EOL;
?>