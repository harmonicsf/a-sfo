<?php
if(!isset($_GET['page']) || empty($_GET['page']) || !preg_match('/^([0-9]+)$/', $_GET['page'])) $page = 1;
else $page = (int) intval($_GET['page']);
$start = 10 * ($page - 1);
$total_post = $model_blog->total_post();
$total_page = $total_post > 10 ? ceil($total_post/10) : 1;
$next_page = $page == $total_page ? false : $page + 1;
if($access < 5)
  $recent = $model_blog->recent("{$start}, 10", 'WHERE `public` = 1 AND `categoryid` != 0');
else
  $recent = $model_blog->recent("{$start}, 10");

?>
