<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>Foundation | Welcome</title>
<link rel="stylesheet" href="<?php echo $themeurl;?>css/foundation.min.css">
<link rel="stylesheet" href="<?php echo $themeurl;?>css/app.css">
<link href="<?php echo $puburl;?>fontawesome/css/font-awesome.css" rel="stylesheet">
<?php echo $extendcss ? $extendcss : ''; ?>
<meta name="description" content="">
<meta name="author" content="">
</head>
<body>
    <div class="large-3 large-centered columns" style="margin-top: 32px;">
      <div class="callout">
        <div class="row">
          <div class="large-12 columns">
            <form action="" method="post">
              <div class="row">
                <div class="large-12 columns">
                    <input type="text" name="username" placeholder="Username" />
                </div>
              </div>
              <div class="row">
                <div class="large-12 columns">
                    <input type="password" name="password" placeholder="Password" />
                </div>
              </div>
              <div class="row">
               <div class="large-12 large-centered columns">
                 <input type="submit" class="button expanded" name="post" value="Log In"/>
               </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



      <script src="<?php echo $themeurl;?>js/vendor/jquery.js"></script>
      <script src="<?php echo $themeurl;?>js/vendor/foundation.js"></script>
      <script>
            $(document).foundation();
          </script>
      </body>
      </html>
