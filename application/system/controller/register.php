<?php
$error = false;
if($auth) redirect(URL);
if(isset($_POST['register'])){
  $error = $model_authentication->checkregister($_POST);
  if(!$error){
    $userregisterid = $model_authentication->register($_POST);
    $auth = $model_authentication->getuserbyid($userregisterid);
    $_SESSION['userid'] = $auth['userid'];
    redirect(URL);
  }
}
