<?php
setcookie('username', "", 0, "/");
setcookie('password', "", 0, "/");
setcookie('userid', "", 0, "/");
session_destroy();
redirect(URL);
?>
