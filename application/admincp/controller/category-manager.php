<?php
if($access < 9) noaccess();
if(isset($_POST['action'])){
  switch ($_POST['action']) {
    case 'new-category':
      $data = $_POST;
      if(isset($data['name']) && !empty($data['name']) && !$model_blog->check_category_exist($data['name'])){
        if(!isset($data['rawurl']) || empty($data['rawurl'])) $data['rawurl'] = rawurl($data['name']);
        else $data['rawurl'] = rawurl($data['rawurl']);
        $categoryid = $model_blog->new_category($data);
        $model_common->new_rawurl("category-{$categoryid}", $data['rawurl']);
        redirect($currenturl);
      }
      break;
    case 'edit-category':
    $data = $_POST;
    if(isset($data['name']) && !empty($data['name']) && !$model_blog->check_category_exist($data['name'], $data['categoryid'])){
      if(!isset($data['rawurl']) || empty($data['rawurl'])) $data['rawurl'] = rawurl($data['name']);
      else $data['rawurl'] = rawurl($data['rawurl']);
      $model_blog->edit_category($data);
      $model_common->edit_rawurl("category-{$data['categoryid']}", $data['rawurl']);
      redirect($currenturl);
    }
      break;
    case 'delete-category':
      if(isset($_POST['categoryid'])){
        $model_blog->delete_category($_POST['categoryid']);
        $model_common->delete_rawurl("category-{$_POST['categoryid']}");
        redirect($currenturl);
      }
      break;
    default:
      # code...
      break;
  }
}
?>
