<?php
	$error = false;
	if($auth) redirect(URL);
	if(isset($_POST['login'])){
		$auth = $model_authentication->login($_POST);
		if($auth) {
			redirect(URL);
			$_SESSION['userid'] = $auth['userid'];
		}
		else $error = true;
	}
