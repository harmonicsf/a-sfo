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
        <h4>Đăng ký</h4>
        <?php if($error): ?>
          <div class="callout warning">
            <?php foreach ($error as $el): ?>
              <?php echo $el;?><br>
            <?php endforeach; ?>
          </div>
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
              <p class="help-text" id="exampleHelpTex">Tài khoản chỉ bao gồm chữ hoặc/và số</p>
            </div>
            <div class="small-12 columns">
              <label>Mật khẩu
                <input type="password" name="password" id="password" placeholder="yeti4preZ" aria-describedby="exampleHelpText" required>
                <span class="form-error">
                  Bạn chưa nhập đúng!
                </span>
              </label>
            </div>
            <div class="small-12 columns">
              <label>Nhập lại mật khẩu
                <input type="password" name="password-confirm" placeholder="yeti4preZ" aria-describedby="exampleHelpText2" required data-equalto="password">
                <span class="form-error">
                  Bạn chưa nhập đúng!
                </span>
              </label>
            </div>
            <div class="small-12 columns">
              <label>Tên đầy đủ
                <input type="text" name="fullname" placeholder="username" aria-describedby="exampleHelpTex" required>
                <span class="form-error">
                  Bạn chưa nhập đúng!
                </span>
                <p class="help-text" id="exampleHelpTex">Tên hiển thị trên bài viết, trang cá nhân,...</p>
              </label>
            </div>
            <div class="small-12 columns">
              <label>Captcha
                <img src="<?php echo URL;?>captcha.php" alt="Captcha">
                <input type="text" name="captcha" placeholder="Captcha" aria-describedby="exampleHelpTex" required pattern="alpha_numeric">
                <span class="form-error">
                  Bạn chưa nhập đúng!
                </span>
                <p class="help-text" id="exampleHelpTex">Nhập lại chữ/số trên hình ảnh</p>
              </label>
            </div>
          </div>
          <div class="row small-collapse">
            <fieldset class="large-12 columns">
              <button name="register" class="expanded button" type="submit" value="register">Đăng ký</button>
            </fieldset>
          </div>
        </form>
      </div>
      <a href="<?php echo URL;?>login/">Đăng nhập</a><hr>
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
