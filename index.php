<?php
define('ROOT',getcwd().DIRECTORY_SEPARATOR);
define('APP', ROOT.'application/');
define('SYS', APP.'system/');
define('PUB', ROOT.'public/');
if($_SERVER['HTTP_HOST'] == 'localhost')
	define("URL", 'http://localhost/');
else
	define("URL", 'http://'.$_SERVER['HTTP_HOST'].'/');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require(SYS."run.php");
$application = new application();
$application->run();
?>
