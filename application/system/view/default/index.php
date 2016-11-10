<?php require($header);?>

    <div class="row top-fix-space" id="content">
        <div class="medium-8 columns">
        <?php if($recent): ?>
        <?php foreach($recent as $el): ?>
            <div class="row collapse">
                <div class="small-5 columns">
                    <img src="<?php echo URL.$el['thumb'];?>" alt="">
                </div>
                <div class="small-7 columns" style="padding-left:16px">
                    <a href="<?php echo URL.$el['path'].'/';?>">
                        <div class="post-list-header"><?php echo $el['name'];?></div>
                    </a>
                    <div class="text-muted">
                        <i class="fa fa-folder"></i> <?php $elcatid = $el['categoryid']; echo $categories[$elcatid]['name'];?>
                    </div>
                    <div style="font-size: 13px;">Praesent id metus massa, ut blandit odio. Proin quis tortor orci.</div>
                </div>
             </div>
             <hr>
        <?php endforeach; ?>
          <a class="expanded button hollow" href="#">Load more</a>
        <?php else: ?>
          <div class="display-4 text-center">NO POST</div>
        <?php endif; ?>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        <div class="display-4 text-center">NO POST</div>
        </div>

        <div class="medium-4 columns hide-for-small-only">
          <aside>
            <?php require($layout.'sidebar.php');?>
          </aside>
        </div>
      </div>

<?php require($footer);?>
