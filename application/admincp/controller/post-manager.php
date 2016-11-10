<?php
if($access < 5) noaccess();

$posts = $model_blog->postlist();
if(isset($_POST['action'])){
  switch ($_POST['action']) {
    case 'delete-post':
      if(isset($_POST['postid'])){
        $model_blog->delete_post($_POST['postid']);
        $model_blog->unlink_tagofpost($_POST['postid']);
        redirect($currenturl);
      }
      break;

    default:
      # code...
      break;
  }
}
?>
