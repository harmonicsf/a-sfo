<?php
class system_model_authentication extends model{
	public function getuserbyid($id){
		$query = self::$db->query("SELECT * FROM `user` WHERE `userid` = '{$id}' LIMIT 1");
		return $query->num_rows > 0 ? $query->fetch_assoc() : false;
	}
	public function login($data){
		$query = self::$db->query("SELECT * FROM `user` WHERE `username` = '".strtolower($data['username'])."' AND `password` = '".md5($data['password'])."' LIMIT 1");
		return $query->num_rows > 0 ? $query->fetch_assoc() : false;
	}
	public function logout(){
		setcookie('username', "", 0, "/");
		setcookie('password', "", 0, "/");
		setcookie('userid', "", 0, "/");
		session_destroy();
	}
	public function register($data){
		self::$db->query("INSERT INTO `user` (`username`, `password`, `fullname`) values('".self::$db->real_escape_string($data['username'])."', '".md5($data['password'])."', '".self::$db->real_escape_string($data['fullname'])."')");
		return self::$db->insert_id;
	}
	public function checkregister($data){
		$error = false;
		if(self::$db->query("SELECT `username` FROM `user` WHERE `username` = '".self::$db->real_escape_string($data['username'])."'")->num_rows > 0)
			$error[] = 'Tên đăng nhập đã có người sử dụng';
			if(self::$db->query("SELECT `fullname` FROM `user` WHERE `fullname` = '".self::$db->real_escape_string($data['fullname'])."'")->num_rows > 0)
				$error[] = 'Tên đầy đủ đã có người sử dụng';
		if (!empty($data['username']) && !preg_match('#^([A-z0-9-\._]+)$#ui', $data['username']))
			$error[] = 'Username chứa kí tự đặc biệt';
		if(strlen($data['username']) > 15)
			$error[] = 'Tên đăng nhập quá dài';
		if(strlen($data['username']) < 3)
			$error[] = 'Tên đăng nhập quá ngắn';
		if(strlen($data['fullname']) > 30)
			$error[] = 'Tên đầy đủ quá dài';
		if(strlen($data['fullname']) < 3)
			$error[] = 'Tên đầy đủ quá ngắn';
		if (preg_match('/['.preg_quote('!@#$%^&*()+=`~[];:|\,/\'"?<>', '/').']/', $data['fullname']))
			$error[] = 'Tên đầy đủ chứa kí tự đặc biệt';
		if(strlen($data['password']) > 15)
			$error[] = 'Mật khẩu quá dài';
		if(strlen($data['password']) < 5)
			$error[] = 'Mật khẩu quá ngắn';
		if($data['password'] != $data['password-confirm'])
			$error[] = 'Xác nhận mật khẩu sai';
		if ($data['captcha'] != $_SESSION['captcha'])
			$error[]='Sai Captcha!';
		return $error;
	}
}
