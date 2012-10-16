<?php
	if(!defined('Permitted_Page'))
	{
		http_send_status(403);
		exit();
	}
	
	class Login
	{
		public function userLogin($data)
		{
		}

		public function adminLogin($data)
		{
		}

		private function detectLoginType($data)
		{
		}
	}
?>