<?php
if(!$auth) noaccess();
if(!isset($_GET['postid']) && !preg_match("#([0-9]+)#", $_GET['postid'])) notfound();
$post = $model_blog->getpost($_GET['postid']);
$postid = $post['postid'];
$postrawurl = $model_common->rawurl_byrouter('post-'.$postid);
if(!$post) notfound();
$error = false;
$success = false;
$tags_ofpost = $model_blog->get_tagofpost($postid);
if($tags_ofpost){
  foreach($tags_ofpost as $tag){
    $tagsx[] = $tag['name'];
  }
  $tags_ofpost = implode(",", $tagsx);
}
if(isset($_POST['post'])){
  $error = false;
  if($model_blog->exist_post($_POST['name'], $post['postid'])) $error[] = "Exist post";
  if(strlen($_POST['name']) < 5 || strlen($_POST['name']) > 100) $error[] = 'Lỗi! Độ dài tên bài viết phải từ 5~100 kí tự';
	if(strlen($_POST['description']) > 255) $error[] = 'Lỗi! Description';
	if(strlen($_POST['content']) < 5) $error[] = 'Lỗi! Nội dung phải hơn 5 kí tự';
	if($_FILES['thumb']['error'] != 4  && $_FILES['thumb']['error'] != UPLOAD_ERR_OK) $error[] = "failed to upload";
	if(!$error){
    $data = $post;
    $data['name'] = $_POST['name'];
    $data['description'] = $_POST['description'];
    $data['content'] = $_POST['content'];
    $data['categoryid'] = $_POST['categoryid'];
    $data['rawurl'] = $_POST['rawurl'];
    if(!empty($_POST['timeupdate'])) $data['time'] = time();
		$model_blog->edit_post(array_merge($data));
    $newtags = $model_blog->edit_tag(explode(",", $_POST['tags']), $postid);
    if($newtags){
      foreach ($newtags as $newtag) {
        $tagrawurl = $model_common->rawurl_bypath(rawurl($newtag['name'])) ? 'tag/'.rawurl($newtag['name'].'-'.$newtag['tagid']) : 'tag/'.rawurl($newtag['name']);
        $model_common->new_rawurl("tag-{$newtag['tagid']}", $tagrawurl);
      }
    }
    $model_common->edit_rawurl($postrawurl['router'], rawurl($data['rawurl']));
    if($_FILES['thumb']['error'] != 4){
      if(file_exists(PUB.'upload/thumb/'.$postid.'.jpg')) unlink(PUB.'upload/thumb/'.$postid.'.jpg');
      $image = new system_library_image();
      $image->load($_FILES['thumb']['tmp_name']);
      $image->save(PUB.'upload/thumb/'.$postid.'.jpg');
      $model_blog->thumb_update($postid, 'public/upload/thumb/'.$postid.'.jpg');
    }
    $post = $model_blog->getpost($_GET['postid']);
    $success = true;
	}
}
///////////////////
$extendcss = '
<link rel="stylesheet" href="'.$puburl.'wysibb/theme/default/wbbtheme.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/flick/jquery-ui.css">
<link href="'.$puburl.'tagit/css/jquery.tagit.css" rel="stylesheet" type="text/css">
';
$extendjs = '
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.22/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
<script src="'.$puburl.'tagit/js/tag-it.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">

$(document).ready(function() {
  $.getJSON("http://blog.sf/taglist.php", function(result){
    $("#tags").tagit({
      autocomplete: {
        delay: 0,
        minLength: 2,
        source : result
      },
      allowSpaces: true,
      tagLimit: 10
    });
  });
});
</script>

<script src="'.$puburl.'wysibb/jquery.wysibb.js"></script>
<script>
$(document).ready(function() {
  var wbbOpt = {
    buttons: "bold,italic,underline,|,img,link,video,|,quote,|,justifyleft,justifycenter,justifyright,|,fontcolor,fontsize,fontfamily,|,table,|,removeFormat"
  }
  $("#editor").wysibb(wbbOpt);
});
</script>
';
