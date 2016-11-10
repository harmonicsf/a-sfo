<?php require($header);?>
<br>
<div class="row small-collapse medium-uncollapse">
  <div class="large-8 medium-8 columns small-centered">
    <div class="single-post">
      <!--<img class="orbit-image" src="thumb/1.jpg" alt="Space">-->
      <div class="single-post-text">
        <div class="single-post-title"><?php echo $post['name'];?></div>
        <div class="single-post-meta">
          <span><i class="fa fa-user" aria-hidden="true"></i> <?php echo $post_user['fullname'];?> &nbsp;&nbsp;</span>
          <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo date("F j, Y, g:i a",$post['time']);?> &nbsp;&nbsp;</span>
          <span><i class="fa fa-folder"></i> <?php $elcatid = $post['categoryid']; echo $categories[$elcatid]['name'];?></span>
        </div>
        <hr>
        <content class="single-post-content">
          <?php echo bbcode(tohtml($post['content']));?>

        </content>
        <?php if($post_tag): ?>
          <div class="taglist">
            Tag:
            <?php foreach ($post_tag as $tag): ?>
              <a href="<?php echo URL.$tag['path'];?>"><?php echo $tag['name'];?></a><?php echo ($tag === end($post_tag)) ? "" : ", "; ?>
            <?php endforeach; ?>
          </div>
        <?php endif;?>
        <?php if($access > 7): ?>
          <hr>
          <a href="<?php echo URL.'admincp/edit-post/?postid='.$postid;?>">Sửa bài viết</a>
        <?php endif;?>
      </div>
    </div>
    <br>
    <div class="callout">
      <div id="fb-root"></div>
      <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>
      <div class="fb-comments" data-href="<?php echo URL.$path;?>" data-numposts="5" 	data-order-by="reverse_time"></div>
    </div>
  </div>
</div>
<?php require($footer);?>
