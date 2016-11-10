<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title><?php echo $title;?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.4/foundation.min.css">
<link rel="stylesheet" href="<?php echo $themeurl;?>css/app.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<?php echo $extendcss ? $extendcss : ''; ?>
<meta name="description" content="">
<meta name="author" content="">

</head>
<body>
  <header>
    <div class="top-bar stacked-for-small">
      <div class="row">
        <div class="medium-12 columns">
          <div class="top-bar-title">
            <a href="<?php echo URL;?>" class="menu-text">Interplanetary</a>
          </div>
          <div class="top-bar-left">
            <ul class="dropdown menu main-menu hide">
              <li><a><i class="fa fa-comment"></i> Chat</a></li>
            </ul>
          </div>
          <div class="top-bar-right">
            <ul class="dropdown menu main-menu" data-dropdown-menu data-autoclose="false" data-disable-hover="true" data-click-open="true">
              <li class="hide-for-medium"><a href="javascript:void()" data-toggle="reveal-menu"><i class="fa fa-bars"></i> Menu</a></li>
              <?php if($auth): ?>
                <li class="show-for-medium"><a data-toggle="reveal-usercp"><i class="fa fa-user"></i>  [<?php echo $user['username'];?>]</a></li>
                <?php if($access > 0): ?>
                  <li class="show-for-medium"><a href="<?php echo URL;?>new-post/" class="button"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Post</a></li>
                <?php endif;?>
              <?php else: ?>
                <li class="show-for-medium"><a data-toggle="reveal-login"><i class="fa fa-key"></i> Đăng nhập</a></li>
              <?php endif;?>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- reveal header -->
    <div class="reveal" style="background:#F2F2F2" id="reveal-menu" data-reveal>
      <?php require($layout.'sidebar.php');?>
      <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
      </button>
    </div>
    <?php if($auth): ?>
      <div class="reveal" style="background:#F2F2F2" id="reveal-usercp" data-reveal>
        <div class="media-object">
          <div class="media-object-section">
            <div class="thumbnail">
              <img src= "<?php echo $puburl;?>avatar.jpg">
            </div>
          </div>
          <div class="media-object-section main-section">
            <h4><?php echo $user['fullname'];?></h4>
            @<?php echo $user['username'];?>
          </div>
        </div>
        <button class="close-button" data-close aria-label="Close modal" type="button">
          <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
        </button>
        <h4 class="small-padding-left hide-for-small-only">Menu</h4>
        <div class="callout clearpam">
          <ul class="menu vertical category">
            <?php if($access > 5): ?>
              <li><a href="<?php echo URL;?>admincp/"><span class="alert badge"><i class="fa fa-dashboard fa-fw"></i></span> Control Panel</a></li>
            <?php endif; ?>
            <li><a href="<?php echo URL;?>logout/"><span class="warning badge"><i class="fa fa-sign-out fa-fw"></i></span> Logout</a></li>
          </ul>
        </div>
      </div>
    <?php else: ?>
      <div class="reveal" style="background:#F2F2F2" id="reveal-login" data-reveal>
        <h4 class="small-padding-left">Đăng nhập</h4>
        <button class="close-button" data-close aria-label="Close modal" type="button">
          <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
        </button>
        <div class="callout">
          <form action="<?php echo URL;?>login/" method="post">
            <div class="row">
              <div class="large-12 columns">
                <input type="text" name="username" placeholder="Tên đăng nhập" />
              </div>
            </div>
            <div class="row">
              <div class="large-12 columns">
                <input type="password" name="password" placeholder="Mật khẩu" />
              </div>
            </div>
            <div class="row">
              <div class="large-12 large-centered columns">
                <input type="submit" class="button expanded" name="login" value="Đăng nhập"/>
              </div>
            </div>
          </form>
        </div>
        <div class="">
          <a href="<?php echo URL;?>register/">Chưa có tài khoản? Đăng ký.</a>
        </div>
      </div>
    <?php endif; ?>
    <!-- end reveal -->
  </header>
