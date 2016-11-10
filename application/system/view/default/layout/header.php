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

  <div class="off-canvas-wrapper">
    <div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
      <div class="off-canvas position-left reveal-for-large" id="menuoffcanvas" data-off-canvas data-position="left">
        <?php require($layout.'off-canvas.php');?>
      </div>

      <div class="off-canvas-content" data-off-canvas-content>
        <!-- Page content -->
        <div class="page-header">
            <a id="btn-off-canvas" class="btn-off-canvas hide-for-large" data-toggle="menuoffcanvas"><i class="fa fa-bars"></i></a>
            <a href="<?php echo URL;?>" class="page-title">Sfvn.org</a>
            <div class="right-menu">
                <?php if($auth): ?>
                <a href="<?php echo URL;?>admincp/" class="button"><i class="fa fa-tachometer"></i></a>
                <?php else: ?>
                <a href="<?php echo URL;?>login/" class="button"><i class="fa fa-key" aria-hidden="true"></i></a>
                <?php endif;?>
            </div>
        </div>
