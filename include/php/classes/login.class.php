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
			header('Status-Code: 403 Forbidden');
		}
		exit();
	}

	class Login
	{
		public function userLogin($data)
		{
			require_once($system_info['include_dir'] . 'php/classes/encrypt.class.php');
			require_once($system_info['include_dir'] . 'php/classes/database.class.php');

			$Encrypt = new Encrypt;
			$Database = new Database;

			$Database -> dbRealEscapeString($Encrypt -> htmlClean($data['email']));
			$Database -> dbRealEscapeString($Encrypt -> htmlClean($data['password']));

			$query = array();
			$query['query_type'] = 'SELECT';
			$query['row_factor'] = '*';
			$query['table'] = 'UserData';
			$query['where'] = '`UserEmail` = "' . $data['email'] . '"';
			$query_result = $Database -> dbQuery($query);

			if($Database -> dbNumRows($query_result) == '1')
			{
				$query_array = $Database -> dbFetchArray($query_result);
				$user_hash_key = $query_array['UserHashKey'];

				$data_2 = array();
				$data_2['object_1'] = $data['password'];
				$data_2['object_2'] = $user_hash_key;
				$data['encrypted_password'] = $Encrypt -> universalEncrypt($data_2);

				$query_2 = array();
				$query_2['query_type'] = 'SELECT';
				$query_2['row_factor'] = '*';
				$query_2['table'] = 'UserData';
				$query_2['where'] = '`UserEmail` = "' . $data['email'] . '" AND `UserPassword` = "' . $data['encrypted_password'] . '"';
				$query_2_result = $Database -> dbQuery($query_2);

				if($Database -> dbNumRows($query_2_result) == '1')
				{
					$return = TRUE;
				}
				else
				{
					$return = FALSE;
				}
			}
			else
			{
				$return = FALSE;
			}
			return $return;
		}

		public function adminLogin($data)
		{
		}

		private function detectLoginType($data)
		{
		}
	}
?>