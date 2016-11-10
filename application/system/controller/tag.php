<?php
if($friendlyurl)  $tagid = substr($originalpath, 4);
else  $tagid = substr($path, 4);
$tag = $model_blog->get_tag($tagid);
$title = $tag['name'];

if(!isset($_GET['page']) || empty($_GET['page']) || !preg_match('/^([0-9]+)$/', $_GET['page'])) $page = 1;
else $page = (int) intval($_GET['page']);
$start = 10 * ($page - 1);
$total_post = $model_blog->total_postoftag($tagid);
$total_page = $total_post > 10 ? ceil($total_post/10) : 1;
$next_page = $page == $total_page ? false : $page + 1;
if($access < 5)
  $postlist = $model_blog->postlist(10, "INNER JOIN `tag_link` ON `tag_link`.`postid` = `post`.`postid` WHERE `tag_link`.`tagid` = {$tagid} AND `post`.`public` = 1");
else
  $postlist = $model_blog->postlist(10, "INNER JOIN `tag_link` ON `tag_link`.`postid` = `post`.`postid` WHERE `tag_link`.`tagid` = {$tagid}");
?>
