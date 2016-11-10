<?php
$q = $_GET['q'];
if(empty($q) || strlen($q) < 2) {
  $q_html = htmlspecialchars($q);
  $postlist = false;
}
else {
  $q_html = htmlspecialchars($q);
  $q_sql = system_model_blog::$db->real_escape_string($q);
  $title = $q_html;
  if($access < 5)
  $postlist = $model_blog->postlist("100", "WHERE `post`.`name` LIKE '%{$q_sql}%' AND `post`.`public` = 1");
  else
  $postlist = $model_blog->postlist("100", "WHERE `post`.`name` LIKE '%{$q_sql}%'");
  //  $postlist = $model_blog->postlist("100", "WHERE MATCH(name,content) AGAINST('{$q_sql}')");
}
?>
