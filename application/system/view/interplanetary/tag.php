<?php require($header);?>
<br>
<div class="row small-collapse medium-uncollapse">
  <div class="large-8 medium-8 columns">
    <h1 class="small-padding-left">Tag: <?php echo $tag['name'];?></h1>
    <div class="post-list">
      <?php if($postlist): ?>
        <?php foreach($postlist as $el): ?>
          <div class="callout post-item">
            <div class="row collapse">
              <div class="large-4 columns">
                <img src="<?php echo URL.$el['thumb'];?>" alt="<?php echo $el['name'];?>" style="width:100%">
              </div>
              <div class="large-8 columns">
                <div class="post-item-text">
                  <a href="<?php echo URL.$el['path'].'/';?>" class="post-item-title"><?php echo tohtml($el['name']);?></a>
                  <div class="post-item-meta">
                    <span><i class="fa fa-folder"></i> <?php $elcatid = $el['categoryid']; echo $categories[$elcatid]['name'];?>&nbsp;</span>
                    <span><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo display_time($el['time']);?>&nbsp;</span>
                    <span><i class="fa fa-user" aria-hidden="true"></i> <?php echo $el['fullname'];?></span>
                  </div>
                  <div class="post-item-description">
                    <?php echo tohtml($el['description']);?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        <div class="s-m-x">
          <?php if($next_page): ?>
            <a class="expanded button s-m-x" href="<?php echo $currenturl.'?page='.$next_page;?>">Xem thêm</a>
          <?php else: ?>
            <a class="expanded button hollow s-m-x">END POST LIST</a>
          <?php endif;?>
        </div>
      <?php else: ?>
        <div class="callout warning">
          <h5>Không có bài viết</h5>
          <a href="<?php echo URL;?>">Trở về trang chủ</a>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <div class="large-4 medium-4 columns">
    <h4 class="small-padding-left hide-for-small-only">Categories</h4>
    <div class="callout clearpam hide-for-small-only">
      <ul class="menu vertical category">
        <?php require($layout.'category.php');?>
      </ul>
    </div>
  </div>

</div>

<?php require($footer);?>
