<?php
// Path
$view          = $controller;
$puburl        = URL.'public/';
$is_mobile     = mobile_detect();
// Theme
$theme         = $theme ? $theme : 'default';
$theme_desktop = $theme_desktop ? $theme_desktop : 'default';
// Layout
$layout        = SYS."view/{$theme}/layout/";
$header        = $layout.'header.php';
$footer        = $layout.'footer.php';
// Variable
$title         = $title ? $title : "Title";
$themeurl      = $puburl.'theme/'.$theme.'/';
// Model Initlize
$model_blog    = new system_model_blog;
// Categories
$categories    = $model_blog->categories();
$extendcss     = false;
$extendjs      = false;
$setting       = $model_common->setting();
// Authentication
require(SYS."authentication.php");
// Messenger

// Next Step
if($controller) require(SYS.'controller/'.$controller.'.php');
if($is_mobile)  require(SYS.'view/'.$theme.'/'.$view.'.php');
else            require(SYS.'view/'.$theme.'/'.$view.'.php');
// print_r(array_keys(get_defined_vars()));
