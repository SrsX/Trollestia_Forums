<?php
	if(!defined('Permitted_Page'))
	{
		http_send_status(403);
	}

	define('Main_Protocol','http'); //change this if needed to
	define('ROOT_DIR', realpath(__DIR__));
	define('CLASSES_DIR', ROOT_DIR . '/include/php/classes/');
	define('PAGES_DIR', ROOT_DIR . '/include/php/pages/');
	define('ADDONS_DIR', ROOT_DIR . '/include/addons/');
	define('CSS_DIR', ROOT_DIR . '/include/css/');
	define('JS_DIR', ROOT_DIR . '/include/js/');
	define('DB_HOST', 'localhost'); //change this if needed to
	define('DB_USER', 'db_user'); //change this
	define('DB_PASSWORD', ''); //change this
	define('DB_NAME', 'db_name'); //change this
	define('DB_TABLE_PREFIX', ''); //change this if needed to
	define('DB_Character_Set','utf8'); //change this if needed to
	define('Character_Set','utf-8'); //change this if needed to
	define('Community_Name','Giantcrabby'); //change to your community's name
	define('Language','en'); //change to your site's language
	define('htaccess_Write', true); //set to false if you do not have .htaccess write access
?>
