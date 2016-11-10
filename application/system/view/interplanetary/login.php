<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?php echo $title;?></title>
<link rel="stylesheet" href="<?php echo $themeurl;?>css/foundation.min.css">
<link rel="stylesheet" href="<?php echo $themeurl;?>css/app.css">
<link href="<?php echo $puburl;?>fontawesome/css/font-awesome.css" rel="stylesheet">
<?php echo $extendcss ? $extendcss : ''; ?>
<meta name="description" content="">
<meta name="author" content="">
</head>
<body>
    <div class="medium-6 large-5 small-centered columns" style="margin-top: 32px;">
      <h1><?php echo $header_title;?></h1>
      <div class="callout">
        <h4>Đăng nhập</h4>
        <?php if($error): ?>
          <div class="callout warning">Sai tài khoản hoặc mật khẩu!</div>
        <?php endif;?>
        <form action="" method="post" data-abide novalidate>
          <div data-abide-error class="alert callout" style="display: none;">
            <p><i class="fi-alert"></i> Bạn chưa nhập đúng biểu mẫu</p>
          </div>
          <div class="row small-collapse">
            <div class="small-12 columns">
              <label>Tài khoản
                <input type="text" name="username" placeholder="username" aria-describedby="exampleHelpTex" required pattern="alpha_numeric">
                <span class="form-error">
                  Bạn chưa nhập đúng!
                </span>
              </label>
            </div>
            <div class="small-12 columns">
              <label>Mật khẩu
                <input type="password" name="password" placeholder="password" aria-describedby="exampleHelpText" required>
                <span class="form-error">
                  Bạn chưa nhập đúng!
                </span>
              </label>
            </div>
          </div>
          <div class="row small-collapse">
            <fieldset class="large-12 columns">
              <button name="login" class="expanded button" type="submit" value="Login">Đăng nhập</button>
            </fieldset>
          </div>
        </form>
      </div>
      <a href="<?php echo URL;?>register/">Đăng ký</a><hr>
      <a href="<?php echo URL;?>">Trở về trang chủ</a>
      <br>
      <br>
    </div>

    <script src="<?php echo $themeurl;?>js/vendor/jquery.js"></script>
    <script src="<?php echo $themeurl;?>js/vendor/foundation.js"></script>
    <script src="<?php echo $themeurl;?>js/app.js"></script>
    <?php echo $extendjs ? $extendjs : ''; ?>
    </body>
    </html>
