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

			$data['email'] = $Encrypt -> htmlClean($data['email']);
			$data['password'] = $Encrypt -> htmlClean($data['password']);
			$data['username'] = $Encrypt -> htmlClean($data['username']);
			
			if($Email -> checkEmail($data['email']))
			{
				$query = array();
				$query['query_type'] = 'SELECT';
				$query['row_factor'] = '*';
				$query['table'] = 'UserData';
				$query['where'] = '`Username` = "' . $data['username'] . '"';
				dbQuery($query);
			}
		}
	}
?>