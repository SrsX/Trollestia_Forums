<?php
	if(!defined('Permitted_Page'))
	{
		http_send_status(403);
		exit();
	}
	
	class Email
	{
		public function sendEmail($data)
		{
			$validEmail = $this -> checkEmail($data['to_email']);
			if($validEmail == TRUE)
			{
				$final_data = $this -> buildEmail($data);
				require_once 'PEAR/Info.php';
				if(PEAR_Dependency::checkPackage('Mail'))
				{
					include('Mail.php');
					$mail_object =& Mail::factory('sendmail',$final_data['params']);
					$return = $mail_object->send($final_data['to_email'],$final_data['email_headers'],$final_data['email_content']);
				}
				else
				{
					$return = @mail($final_data['to_email'],$final_data['email_subject'],$final_data['email_content'],$final_data['email_headers']);
				}
			}
			else
			{
				$return = FALSE;
			}
			return $return;
		}

		public function checkEmail($data)
		{
			$valid = (
					function_exists('filter_var') and filter_var($data['email'], FILTER_VALIDATE_EMAIL)
				) || (
					strlen($email) <= 320 
					and preg_match_all(
						'/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?))'. 
						'{255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?))'.
						'{65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|'.
						'(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))'.
						'(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|'.
						'(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|'.
						'(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})'.
						'(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126})'.'{1,}'.
						'(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|'.
						'(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|'.
						'(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::'.
						'(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|'.
						'(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|'.
						'(?:(?!(?:.*[a-f0-9]:){5,})'.'(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::'.
						'(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|'.
						'(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|'.
						'(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD',
					$data['email'])
				);

			if(!$valid)
			{
				return FALSE;
			}

			list($data['prefix'], $data['domain']) = split("@",$data['email']);

			if(function_exists("checkdnsrr") && checkdnsrr($data['domain'] . '.', 'MX'))
			{
				return TRUE;
			}
			elseif(function_exists("getmxrr") && getmxrr($data['domain'], $mxhosts))
			{
				return TRUE;
			}
			elseif(@fsockopen($data['domain'], 25, $errno, $errstr, 5))
			{
				return TRUE;
			}
			else
			{
				return FALSE;
			}
		}
		
		private buildEmail($data)
		{
			$headers = array();
			$headers['MIME-Version'] = 'MIME-Version: 1.0';
			$headers['Content-type'] = 'Content-type: text/html; charset=utf-8';
			$headers['To'] = 'To: "' . $data['to_name'] . '" <'.$data['to_email'].'>';
			$headers['From'] = 'From: "' . $data['from_name'] . '" <'.$data['from_email'].'>';
			$headers['Subject'] = 'Subject: ' . $data['email_subject'];
			$headers['Sensitivity'] = 'Sensitivity: Personal';
			$headers[] = "\r\n";
			
			$data['email_headers'] = implode(PHP_EOL, $headers);

			$data['params'] = array();
			$data['params']['sendmail_path'] = '/usr/lib/sendmail';

			$data['email_content'] = '
<html lang="' . Language . '">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>' . $data['email_subject'] . '</title>
</head>
<body>
	<p>Dear ' . $data['to_name'] . ',</p>
	<p>' . $data['email_content'] . '</p>
	<p>Yours Faithfully,<br />' . Community_Name . '</p>
</body>
</html>';
			return $data;
		}
	}
?>