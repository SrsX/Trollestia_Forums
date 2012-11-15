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

	class Download
	{
		function downloadFile($file)
		{
			if (!file_exists($file))
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
					header('Status-Code: 404 Not Found');
				}
				exit('File Not Found');
			}

			if (ini_get('zlib.output_compression'))
			{
				ini_set('zlib.output_compression', 'Off');
			}

			$file_parts = pathinfo($file);
			if(function_exists('http_response_code'))
			{
				http_response_code(203);
			}
			elseif(function_exists('http_send_status'))
			{
				http_send_status(203);
			}
			else
			{
				header("Status-Code: 203 Partial Information" . PHP_EOL);
			}
			header("Pragma: public" . PHP_EOL);
			header("Expires: -1" . PHP_EOL); 
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0" . PHP_EOL);
			header("Cache-Control: private" . PHP_EOL, false);
			header("Content-Type: " . mime_content_type($file) . PHP_EOL);
			header("Content-Disposition: attachment; filename=\"" . $file_parts['basename'] . "\"" . PHP_EOL);
			header("Content-Transfer-Encoding: binary" . PHP_EOL);
			header("Content-Description: File Transfer" . PHP_EOL);
			header("Content-Length: " . filesize($file) . PHP_EOL);
			$file = @fopen($file,"rb");
			if($file)
			{
				while(!feof($file))
				{
					print(fread($file, 1024*8));
					flush();
					if(connection_status()!=0)
					{
						@fclose($file);
						exit();
					}
				}
				@fclose($file);
			}
			exit();
		}
	}
?>