<?php

	if(!defined('Permitted_Page'))
	{
		http_send_status(403);
	}


	class Database
	{

		private function __construct()
		{
			$this -> dbConnect();
		}


		private function dbConnect()
		{
			$DB_CONNECTION = mysqli_init();
			@mysqli_real_connect(DB_CONNECTION, DB_HOST, DB_USER, DB_PASSWORD);
			if(mysqli_connect_errno())
			{
				error_log(Community_Name . ' could not establish connection to MySQL: ' . mysqli_connect_error());
				exit();
			}
			@mysqli_select_db(DB_CONNECTION, DB_NAME) OR error_log('System could not select database: ' . mysqli_error($DB_CONNECTION)) AND exit();
			@mysqli_set_charset(DB_CONNECTION, DB_Character_Set);
		}

		public function dbQuery($info)
		{
			$info['table'] = DB_TABLE_PREFIX.$info['table'];

			if($info['query_type'] == 'SELECT')
			{
				$info['query'] = 'SELECT ' . $info['row_factor'] . ' FROM `' . $info['table'] . '`';
			}
			elseif($info['query_type'] == 'INSERT')
			{
				$info['query'] = 'INSERT INTO `' . $info['table'] . '` SET (' . $info['row_factor'] . ')';
			}
			elseif($info['query_type'] == 'UPDATE')
			{
				$info['query'] = 'UPDATE `' . $info['table'] . '` SET (' . $info['row_factor'] . ')';
			}
			else
			{
				error_log('Invalid query detected.');
				exit();
			}

			if($info['where'])
			{
				$this -> dbRealEscapeString($info['where']);
				$info['query'] = $info['query'] . ' WHERE ' . $info['where'];
			}
			if($info['order_by'])
			{
				$info['query'] = $info['query'] . ' ORDER BY ' . $info['order_by'];
			}
			if($info['limit'])
			{
				$info['query'] = $info['query'] . ' LIMIT ' . $info['limit'];
			}

            $query = @mysqli_query($DB_CONNECTION, $info['query']) OR error_log('An error has occurred with the database: ' . mysqli_error($DB_CONNECTION)) AND exit();
			if(!$query)
			{
				error_log('Invalid query: ' . mysqli_error());
				exit();
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
				error_log('Empty resource: ' . mysqli_error($DB_CONNECTION));
				exit();
			}
			mysqli_free_result($return);
		}

		public function dbNumRows($info)
		{
			$return = @mysqli_num_rows($info) OR error_log('An error has occurred with the database: ' . mysqli_error($DB_CONNECTION)) AND exit();
			if(!$return)
			{
				error_log('Invalid query: ' . mysqli_error());
				exit();
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
				error_log('Invalid query: ' . mysqli_error());
				exit();
			}
			else
			{
				return $return;
			}
			mysqli_free_result($return);
		}

		private function dbBuildQuery($data)
		{
			
		}
	}
?>
