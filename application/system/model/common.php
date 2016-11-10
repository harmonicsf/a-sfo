<?php
class system_model_common extends model{
	public function new_rawurl($router, $path){
		self::$db->query("INSERT INTO `rawurl` (`path`, `router`) VALUES ('{$path}', '{$router}')");
	}
	public function edit_rawurl($router, $path){
		self::$db->query("UPDATE `rawurl` SET `path` = '{$path}' WHERE `router` = '{$router}'");
	}
	public function delete_rawurl($router){
		self::$db->query("DELETE FROM `rawurl` WHERE `router` = '{$router}'");
	}
	public function rawurl_byrouter($router){
		$query=self::$db->query("SELECT * FROM `rawurl` WHERE `router` = '{$router}'");
		return $query->num_rows > 0 ? $query->fetch_assoc() : false;
	}
	public function rawurl_bypath($path){
		$query=self::$db->query("SELECT * FROM `rawurl` WHERE `path` = '{$path}'");
		return $query->num_rows > 0 ? $query->fetch_assoc() : false;
	}
	public function setting(){
		$query=self::$db->query("SELECT * FROM `setting`");
		if($query->num_rows > 0){
			while($result = $query->fetch_assoc()){
				$key = $result['key'];
				$settings[$key] = $result['variable'];
			}
			return $settings;
		}
		else
			return false;

	}
	public function change_setting($key, $variable){
		self::$db->query("
		UPDATE `setting` SET  `variable` =  '".self::$db->real_escape_string($variable)."' WHERE  `key` =  '{$key}';");
	}
}
?>
