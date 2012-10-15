<?php
	if(!defined('Permitted_Page'))
	{
		http_send_status(403);
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
		public function universalEncrypt($obj,$obj2)
		{
			$obj = $this -> dataSerialize($obj);
			$obj2 = $this -> dataSerialize($obj2);
			$return = md5(crypt(md5($obj),md5($obj2)));
			return $return;
		}
		public function htmlClean($obj)
		{
		    $return = htmlentities($obj, ENT_QUOTES | ENT_IGNORE, Character_Set);
			return $return;
		}
		public function clientCookieHash($data,$ip)
		{
			$return = $this -> universalEncrypt($data,$ip);
			return $return;
		}
		public function serverCookieHash($id,$password,$hash)
		{
		    $id_return = $this -> universalEncrypt($id,$hash);
			$password_return = $this -> universalEncrypt($password,$hash);
			$return = $this -> universalEncrypt($id_return,$password_return);
			return $return;
		}
		public function generateHashKey()
		{
			$data1 = mt_rand().mt_rand();
			$data2 = mt_rand().mt_rand();
		    $return = $this -> universalEncrypt($data1,$data2);
			return $return;
		}
	}
?>
