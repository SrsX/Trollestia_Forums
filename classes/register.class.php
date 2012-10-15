<?php
	if(!defined('Permitted_Page'))
	{
		http_send_status(403);
	}
	
	class Register
	{
		public function userRegister($data)
		{
			$data['email'];
			$data['password'];
			$data['username'];
		}
	}
?>