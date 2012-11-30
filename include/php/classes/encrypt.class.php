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

	class Encrypt
	{
		public function dataSerialize($obj)
		{
			$return = base64_encode(bzcompress(serialize($obj)));
			return $return;
		}

		public function dataUnserialize($obj)
		{
			$return = unserialize(bzuncompress(base64_decode($obj)));
			return $return;
		}

		public function universalEncrypt($data)
		{
			$data['object_1'] = $this -> dataSerialize($data['object_1']);
			$data['object_2'] = $this -> dataSerialize($data['object_2']);
			$return = md5(crypt(md5($data['object_1']),md5($data['object_2'])));
			return $return;
		}

		public function htmlClean($obj)
		{
			$return = htmlentities($obj, ENT_QUOTES | ENT_IGNORE, Character_Set);
			return $return;
		}

		public function clientCookieHash($data)
		{
			$return = $this -> universalEncrypt($data['object'],$data['ip_address']);
			return $return;
		}

		public function serverCookieHash($data)
		{
			$data['object_id'] = $this -> universalEncrypt($data['object_id'],$data['object_hash']);
			$data['object_password'] = $this -> universalEncrypt($data['object_password'],$data['object_hash']);
			$return = $this -> universalEncrypt($data['object_id'],$data['object_password']);
			return $return;
		}

		public function generateHashKey()
		{
			$data = array();

			$data['object_1'] = mt_rand().mt_rand();
			$data['object_2'] = mt_rand().mt_rand();
			$return = $this -> universalEncrypt($data['object_1'],$data['object_2']);
			return $return;
		}
	}
?>
