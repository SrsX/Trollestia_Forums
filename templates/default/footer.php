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
		<footer>' . PHP_EOL . '
		</footer>' . PHP_EOL . '
	</body>' . PHP_EOL . '
</HTML>' . PHP_EOL;