<?php
	class Download
	{
		function downloadFile($file)
		{
			if (!file_exists($file))
			{
				if(function_exists('http_send_status'))
				{
					http_send_status(404);
				}
				else
				{
					header('Status-Code: 404');
				}
				exit('File Not Found');
			}

			if (ini_get('zlib.output_compression'))
			{
				ini_set('zlib.output_compression', 'Off');
			}

			$file_parts = pathinfo($file);
			header("Pragma: public" . PHP_EOL);
			header("Expires: -1" . PHP_EOL); 
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0" . PHP_EOL);
			header("Cache-Control: private", false);
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