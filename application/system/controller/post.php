<?php
$postid = substr($originalpath, 5);
$post = $model_blog->getpost($postid);
if(!$post['public'] && $access < 5) noaccess();
$post_user = $model_authentication->getuserbyid($post['userid']);
$post_tag = $model_blog->get_tagofpost($postid);
$title = $post['name'];
?>
