<?php
if($friendlyurl)  $categoryid = substr($originalpath, 9);
else  $categoryid = substr($path, 9);
$category = $categories[$categoryid];
$title = $category['name'];
if($categoryid == 0 && $access < 5) noaccess();

if(!isset($_GET['page']) || empty($_GET['page']) || !preg_match('/^([0-9]+)$/', $_GET['page'])) $page = 1;
else $page = (int) intval($_GET['page']);
$start = 10 * ($page - 1);
$total_post = $model_blog->total_post("WHERE `categoryid` = {$categoryid}");
$total_page = $total_post > 10 ? ceil($total_post/10) : 1;
$next_page = $page == $total_page ? false : $page + 1;
if($access < 5)
  $postlist = $model_blog->postlist(10, "WHERE `categoryid` = {$categoryid} AND `public` = 1");
else
  $postlist = $model_blog->postlist(10, "WHERE `categoryid` = {$categoryid}");
?>
