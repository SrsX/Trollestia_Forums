<?php
	define('Permitted_Page', TRUE);

	require_once('config.php');
	require_once($system_info['languages_dir'] . 'lang.php');

	echo '
<!DOCTYPE HTML>
<HTML lang="' . $_LANG['lang'] . '">
	<head>
		<title>' . $system_info['community_name'] . ' - ' . $_LANG['home'] . '</title>
		<meta http-equiv="Content-Type" content="text/html; charset=' . $system_info['character_set'] . '" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<meta name="copyright" lang="' . $_LANG['lang'] . '" content="&copy; ' . $system_info['community_name'] . '" />
		<meta name="author" lang="' . $_LANG['lang'] . '" content="mailto: ' . $system_info['email'] . '" />
		<meta name="robots" content="ALL" />
		<link rel="icon" href="' . $system_info['website_css'] . 'images/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" type="image/x-icon" href="' . $system_info['website_css'] . 'images/favicon.ico" />
		<link rel="stylesheet" type="text/css" href="//ajax.aspnetcdn.com/ajax/jquery.mobile/1.2.0/jquery.mobile-1.2.0.min.css" />
		<link rel="stylesheet" type="text/css" href="' . $system_info['website_css'] . 'style.css" />
		<!--[if lt IE 9]><script type="text/javascript" src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script type="text/javascript" src="//ajax.aspnetcdn.com/ajax/jquery.mobile/1.2.0/jquery.mobile-1.2.0.min.js"></script>
	</head>
	<body>
		<div data-role="page" id="home">
			<div data-theme="a" data-role="header">
				<h3>' . $_LANG['home'] . '</h3>
				<div data-role="navbar">
					<ul>
						<li><a href="index.php" class="ui-btn-active ui-state-persist">Home</a></li>
						<li><a href="login.php#login" data-rel="dialog" data-transition="pop">Login</a></li>
						<li><a href="register.php#register" data-rel="dialog" data-transition="pop">Register</a></li>
					</ul>
				</div>
			</div>
			<div data-role="content">
				<div>Welcome to home.</div>
			</div>
			<div data-theme="d" data-role="footer">
				<h3>' . $system_info['community_name'] . ' &copy;</h3>
			</div>
		</div>
	</body>
</HTML>';
?>