<?php
	if(!defined('Permitted_Page'))
	{
		http_send_status(403);
	}
	
	class Register
	{
		public function userRegister($data)
		{
			$Encrypt = new Encrypt;
			$Database = new Database;
			$Email = new Email;

			$Encrypt -> htmlClean($data['email']);
			$Encrypt -> htmlClean($data['password']);
			$Encrypt -> htmlClean($data['username']);
			
			if($Email -> checkEmail($data['email']))
			{
				$query = array();
				$query['query_type'] = 'SELECT';
				$query['row_factor'] = '*';
				$query['table'] = 'UserData';
				$query['where'] = '`Username` = "' . $data['username'] . '" OR `UserEmail` = "' . $data['email'] . '"';
				$query_result = $Database -> dbQuery($query);

				if($Database -> dbNumRows($query_result))
				{
					$return = array();
					$return['result'] = FALSE;
					$return['message'] = 'User already registered.';
					return $return;
				}
				else
				{
					$data['hash_key'] = $Encrypt -> generateHashKey();
					$data_2 = array();
					$data_2['object_1'] = $data['password'];
					$data_2['object_2'] = $data['hash_key'];
					$data['encrypted_password'] = $Encrypt -> universalEncrypt($data_2);

					$query['query_type'] = 'INSERT';
					$query['table'] = 'UserData';
					$query['row_factor'] = '`UserEmail` = "' . $data['email'] . '",
					`UserPassword` = "' . $data['encrypted_password'] . '",
					`UserName` = "' . $data['username'] . '",
					`UserHashKey` = "' . $data['hash_key'] . '"';
					$query_result = $Database -> dbQuery($query);
				}
			}
		}
	}
?>