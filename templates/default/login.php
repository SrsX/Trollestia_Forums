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

	require_once($system_info['templates_dir'] . 'header.php');

	echo '
<form class="form-horizontal" name="login_form" onsubmit="login(); return FALSE;">' . PHP_EOL . '
	<div id="login_return"></div>' . PHP_EOL . '
	<label class="control-label" for="inputEmail">' . $_LANG['email'] . '</label>' . PHP_EOL . '
	<div class="controls">' . PHP_EOL . '
		<div class="input-prepend">' . PHP_EOL . '
			<span class="add-on"><i class="icon-envelope"></i></span>' . PHP_EOL . '
			<input class="span2" id="inputEmail" placeholder="' . $_LANG['email'] . '" type="text" />' . PHP_EOL . '
		</div>' . PHP_EOL . '
	</div>' . PHP_EOL . '
	<div class="control-group">' . PHP_EOL . '
		<label class="control-label" for="inputPassword">' . $_LANG['password'] . '</label>' . PHP_EOL . '
		<div class="controls">' . PHP_EOL . '
			<input type="password" id="inputPassword" placeholder="' . $_LANG['password'] . '" name="password" />' . PHP_EOL . '
		</div>' . PHP_EOL . '
	</div>' . PHP_EOL . '
	<div class="control-group">' . PHP_EOL . '
		<div class="controls">' . PHP_EOL . '
			<label class="checkbox" />' . PHP_EOL . '
				<input type="checkbox" name="remember_me" /><span>' . $_LANG['remember_me'] . '</span>' . PHP_EOL . '
			</label>' . PHP_EOL . '
		<button type="submit" class="btn btn-primary">' . $_LANG['login'] . '</button>' . PHP_EOL . '
		</div>' . PHP_EOL . '
	</div>' . PHP_EOL . '
</form>' . PHP_EOL;

	require_once($system_info['templates_dir'] . 'footer.tpl');