<?php
class model{
	public static $db = false;
	public static function db(){
		return self::$db;
	}
	public static function connect($dbconfig){
		self::$db = new mysqli(
			$dbconfig['db_host'],
			$dbconfig['db_user'],
			$dbconfig['db_pass'],
			$dbconfig['db_name']
		);
		if(self::$db->connect_error) exit("Cant Connect Database");
		self::$db->set_charset("utf8mb4");
	}
}
