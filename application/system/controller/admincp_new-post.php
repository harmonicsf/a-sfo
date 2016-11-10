<?php
if(!$auth) noaccess();
$error = false;
$success = false;
$extendcss = '<link rel="stylesheet" href="'.$puburl.'wysibb/theme/default/wbbtheme.css" type="text/css" />';
$extendjs = '<script src="'.$puburl.'wysibb/jquery.wysibb.js"></script>
<script>
$(document).ready(function() {
var wbbOpt = {
buttons: "bold,italic,underline,|,img,link,video,|,quote,|,justifyleft,justifycenter,justifyright,|,fontcolor,fontsize,fontfamily,|,table,|,removeFormat"
}
$("#editor").wysibb(wbbOpt);
});
</script>
';
if(isset($_POST['post'])){
    $error = false;
    if($model_blog->existpost($_POST['name'])) $error[] = "Exist post";
    if(strlen($_POST['name']) < 5 || strlen($_POST['name']) > 100) $error[] = 'Lỗi! Độ dài tên bài viết phải từ 5~100 kí tự';
    if(strlen($_POST['description']) > 255) $error[] = 'Lỗi! Description';
    if(strlen($_POST['content']) < 5) $error[] = 'Lỗi! Nội dung phải hơn 5 kí tự';
    if($_FILES['thumb']['error'] != UPLOAD_ERR_OK) $error[] = "failed to upload";
    print_r($error);
	if(!$error){
		$postid = $model_blog->newpost($_POST);
        $image = new library_image();
        $image->load($_FILES['thumb']['tmp_name']);
        $image->save(PUB.'upload/thumb/'.$postid.'.jpg');
        $success = true;
	}
}
?>
