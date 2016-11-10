<?php require($header);?>
<br>
<div class="row small-collapse medium-uncollapse">
  <div class="large-4 medium-4 columns small-centered">
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
    <h4 class="small-padding-left hide-for-small-only">Categories</h4>
    <div class="callout clearpam">
        <a href="#" class="block-link"><span class="badge"><i class="fa fa-leaf fa-fw"></i></span> Anime</a>
        <a href="#" class="block-link"><span class="badge"><i class="fa fa-book fa-fw"></i></span> Manga</a>
    </div>
  </div>

</div>

<?php require($footer);?>
