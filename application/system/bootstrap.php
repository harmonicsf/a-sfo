<?php
// Router
$path = trim($_SERVER['REQUEST_URI'], "/\\");
$path_parsed = parse_url($path);
if(!isset($path_parsed['path'])) $path = null;
else $path = trim($path_parsed['path'], '/');
$currenturl = URL.$path.'/';
if($path == null || $path == 'index.php'){
	$path = 'index';
	$currenturl = URL;
}
$router = array(
"controller" => "404",
"regex" => "^404$",
"app" => "system",
);

foreach($routers as $element){
	if(preg_match("#".$element['regex']."#", $path)) $router = $element;
}

$friendlyurl = $model_common->rawurl_bypath($path);
if($friendlyurl){
 	$originalpath = $friendlyurl['router'];
	foreach($routers as $element){
		if(preg_match("#".$element['regex']."#", $originalpath)) $router = $element;
	}
}
$appname = $router['app'];
$controller = $router['controller'];
?>
