<?php
$model_authentication = new system_model_authentication;
$auth = false;
$user  = array('userid' => 0, 'username' => 'guest', 'password' => '', 'fullname' => 'Guest', 'access' => 0);
if(isset($_SESSION['userid'])){
  $user = $model_authentication->getuserbyid($_SESSION['userid']);
  $auth = true;
}
elseif(isset($_COOKIE['username'])){
  $login = $model_authentication->login($_COOKIE);
  if($login){
    $_SESSION['userid'] = $login['userid'];
    $user = $login;
    $auth = true;
  }
}
$access = $user['access'];
?>
