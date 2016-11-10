<?php
class application{
	public $objectlist = array();
	public function run(){
		session_start();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
		spl_autoload_register(array($this, 'loader'));
		require(SYS."function.php");
		require(SYS."model.php");
		require(SYS."config.php");
		require(SYS.'router.php');
		// Connect
		model::connect($dbconfig);
		// Common
		$model_common = new system_model_common;
		require(SYS.'bootstrap.php');
		// Magic Quotes
		if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc())
		{
			deactiveMagicQuotes($_GET);
			deactiveMagicQuotes($_POST);
			deactiveMagicQuotes($_COOKIE);
			deactiveMagicQuotes($_REQUEST);
		}
		// Start Application
		require(APP."$appname/start.php");
	}

	public function loader($classname){
		$this->objectlist[$classname] = $classname;
		if(!isset($objectlist[$classname])){
			$path = explode("_", $classname);
			require(APP.str_ireplace('_', '/', $classname).'.php');
		}
	}
}
?>
