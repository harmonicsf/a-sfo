<?php
	$routers[] = array(
	"controller" => "index",
	"regex" => "index",
	"app" => "system",
	);
	$routers[] = array(
	"controller" => "login",
	"regex" => "login",
	"app" => "system",
	);
	$routers[] = array(
	"controller" => "register",
	"regex" => "register",
	"app" => "system",
	);
	$routers[] = array(
	"controller" => "logout",
	"regex" => "logout",
	"app" => "system",
	);
	$routers[] = array(
	"controller" => "noaccess",
	"regex" => "noaccess",
	"app" => "system",
	);
	$routers[] = array(
	"controller" => "post",
	"regex" => "post-([0-9]+)",
	"app" => "system",
	);
	$routers[] = array(
	"controller" => "search",
	"regex" => "search",
	"app" => "system",
	);
	$routers[] = array(
	"controller" => "category",
	"regex" => "category-([0-9]+)",
	"app" => "system",
	);
	$routers[] = array(
	"controller" => "category",
	"regex" => "category-([0-9]+)",
	"app" => "system",
	);
	$routers[] = array(
	"controller" => "tag",
	"regex" => "tag-([0-9]+)",
	"app" => "system",
	);
	$routers[] = array(
	"controller" => "usercp",
	"regex" => "^usercp",
	"app" => "system",
	);
	$routers[] = array(
	"controller" => "admincp",
	"regex" => "^admincp$",
	"app" => "admincp",
	);
	$routers[] = array(
	"controller" => "new-post",
	"regex" => "^new-post$",
	"app" => "system",
	);
	$routers[] = array(
	"controller" => "category-manager",
	"regex" => "^admincp/category-manager$",
	"app" => "admincp",
	);
	$routers[] = array(
	"controller" => "post-manager",
	"regex" => "^admincp/post-manager$",
	"app" => "admincp",
	);
	$routers[] = array(
	"controller" => "edit-post",
	"regex" => "^admincp/edit-post$",
	"app" => "admincp",
	);
	$routers[] = array(
	"controller" => "setting",
	"regex" => "^admincp/setting$",
	"app" => "admincp",
	);
/* */
/*
	$routers[] = array(
	"controller" => "",
	"regex" => "",
	);
*/
