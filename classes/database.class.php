<?php
	if(!defined('Permitted_Page'))
	{
		http_send_status(403);
	}

	class Database
    {
		private function __construct()
		{
			$Database = new Database;
			$Database -> dbConnect();
		}


        private function dbConnect()
        {
			$DB_CONNECTION = mysqli_init();
			@mysqli_real_connect(DB_CONNECTION, DB_HOST, DB_USER, DB_PASSWORD);
			if(mysqli_connect_errno())
			{
				exit(Community_Name . ' could not establish connection to MySQL: ' . mysqli_connect_error());
			}
			@mysqli_select_db(DB_CONNECTION, DB_NAME) OR exit(Community_Name . ' could not select database: ' . mysqli_error());
			@mysqli_set_charset(DB_CONNECTION, DB_Character_Set);
		}

		public function dbQuery($info)
        {
			$info['query_type'] = array('select,insert,create');
			$info['row_factor'] = array('*,something_specific');
			$info['table'];
			$info['limit'];
			$info['order_by'] = array('key_part ASC','key_part DESC');
			$info['where'] = $this -> dbRealEscapeString($info['where']);
            $query = mysqli_query($DB_CONNECTION, $info['query']) OR exit('An error has occurred with the database: ' . mysqli_error());
			if(!$query)
			{
				exit('Invalid query: ' . mysqli_error());
			}
			else
			{
				return $return;
			}
			mysqli_free_result($query);
        }

		public function dbFetchArray($info)
        {
			if($this -> dbNumRows($info))
			{
				$return = mysqli_fetch_array($info);
				return $return;
			}
			else
			{
				exit('Empty resource: ' . mysqli_error());
			}
			mysqli_free_result($return);
        }

		public function dbNumRows($info)
		{
			$return = mysqli_num_rows($info) OR exit('An error has occurred with the database: ' . mysqli_error());
			if(!$return)
			{
	    			exit('Invalid query: ' . mysqli_error());
			}
			else
			{
				return $return;
			}
			mysqli_free_result($return);
        }

		private function dbRealEscapeString($data)
		{
			$return = mysqli_real_escape_string($DB_CONNECTION,stripslashes(trim($data)));
			if(!$return)
			{
				exit('Invalid query: ' . mysqli_error());
			}
			else
			{
				return $return;
			}
			mysqli_free_result($return);
		}

    }
?>