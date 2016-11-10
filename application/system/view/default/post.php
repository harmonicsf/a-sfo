<?php require($header);?>

      <div class="row top-fix-space" id="content">
        <div class="medium-8 columns">
          <h2><?php echo $post['name'];?></h2>
          <div class="text-muted">
                  <i class="fa fa-clock-o"></i> <?php echo date("F j, Y, g:i a",$post['time']);?><wbr>
                  <i class="fa fa-user"></i> Harmonic<wbr>
                  <i class="fa fa-folder"></i> <?php $elcatid = $post['categoryid']; echo $categories[$elcatid]['name'];?><wbr>
                  <i class="fa fa-tags"></i>
                  <span class="label label-pill label-primary">Cosplay</span>
                  <span class="label label-pill label-danger">Art</span>
          </div>

          <hr>
          <content>
            <?php echo tohtml($post['content']);?>
          </content>
          <hr>
          <div id="fb-root"></div>
          <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
          fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-comments" data-href="http://sfvn.org" data-numposts="5" 	data-order-by="reverse_time"></div>

        </div>

        <div class="medium-4 columns hide-for-small-only">
          <aside>
            <?php require($layout.'sidebar.php');?>
          </aside>
        </div>
      </div>
    </div>
  </div>
</div>
<?php require($footer);?>
