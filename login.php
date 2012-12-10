<?php
	define('Permitted_Page', TRUE);

	require_once('config.php');
	require_once($system_info['languages_dir'] . 'lang.php');
	require_once($system_info['include_dir'] . 'php/classes/login.class.php');

	if($_POST['login_email'] && $_POST['login_password'] && $_POST['login_submit'])
	{
		$data = array();
		$data['email'] = $_POST['login_email'];
		$data['password'] = $_POST['login_password'];

		$Login = new Login;
		$return = $Login -> userLogin($data);
		if($return)
		{
			if(function_exists('http_response_code'))
			{
				http_response_code(HTTP_REDIRECT_TEMP);
			}
			elseif(function_exists('http_send_status'))
			{
				http_send_status(HTTP_REDIRECT_TEMP);
			}
			else
			{
				header('Status-Code: ' . HTTP_REDIRECT_TEMP . ' Found', TRUE, HTTP_REDIRECT_TEMP);
			}

			if(function_exists('http_redirect'))
			{
				http_redirect($system_info['website'] . 'index.php', '', TRUE, HTTP_REDIRECT_TEMP);
			}
			else
			{
				header('Location: ' . $system_info['website'] . 'index.php', TRUE, HTTP_REDIRECT_TEMP);
			}
			exit();
		}
		else
		{
			$message = '<div class="error">Failed to login, please try again.</div>';
		}
	}

	echo '
<!DOCTYPE html>
<html lang="' . $_LANG['lang'] . '">
	<head>
		<title>' . $system_info['community_name'] . ' - ' . $_LANG['login'] . '</title>
		<meta http-equiv="Content-Type" content="text/html; charset=' . $system_info['character_set'] . '" />
		<meta name="viewport" content="width=device-width, initial-scale=1"> 
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
				<h3>' . $_LANG['login'] . '</h3>
				<div data-role="navbar">
					<ul>
						<li><a href="index.php">' . $_LANG['home'] . '</a></li>
						<li><a href="login.php" data-rel="dialog" data-transition="pop" class="ui-btn-active ui-state-persist">' . $_LANG['login'] . '</a></li>
						<li><a href="register.php" data-rel="dialog" data-transition="pop">' . $_LANG['register'] . '</a></li>
					</ul>
				</div>
			</div>
			<div data-role="content">
				<div class="login">
					' . $message . '
					<form action="login.php" method="post">
						<ul data-role="listview" data-inset="true" data-theme="c">
							<li data-role="fieldcontain">
								<label for="login_email">' . $_LANG['email'] . ':</label>
								<input type="email" name="login_email" id="login_email" value="" placeholder="' . $_LANG['email'] . '" data-mini="true" />
							</li>
							<li data-role="fieldcontain">
								<label for="login_password">' . $_LANG['password'] . ':</label>
								<input type="password" name="login_password" id="login_password" value="" placeholder="' . $_LANG['password'] . '" data-mini="true" />
							</li>
							<li data-role="fieldcontain">
								<label for="remember_me">' . $_LANG['remember_me'] . '</label>
								<input type="checkbox" name="remember_me" id="remember_me" data-mini="true" />
							</li>
							<li>
								<fieldset class="ui-grid-a">
									<div class="ui-block-a"><div data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="b" aria-disabled="false"><input type="submit" name="login_submit" id="login_submit" value="' . $_LANG['login'] . '" data-mini="true" data-theme="b" /></div></div>
									<div class="ui-block-b"><div data-corners="true" data-shadow="true" data-iconshadow="true" data-wrapperels="span" data-theme="a" aria-disabled="false"><a href="register.php" data-role="button" data-theme="a" aria-disabled="false" data-mini="true">Register</a></div></div>
								</fieldset>
							</li>
						</ul>
					</form>
				</div>
			</div>
			<div data-theme="d" data-role="footer">
				<h3>' . $system_info['community_name'] . ' &copy;</h3>
			</div>
		</div>
	</body>
</html>';
?>