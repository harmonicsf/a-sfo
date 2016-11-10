<?php
if($access < 7) noaccess();
if(isset($_POST['action'])){
  switch ($_POST['action']) {
    case 'optimize-tag':
      if(isset($_POST['optimize-tag'])){
        $tags = $model_blog->get_alltag($_POST['postid']);
        
      }
      break;

    default:
      # code...
      break;
  }
}
?>
