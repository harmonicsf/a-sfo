<li><a href="<?php echo URL;?>category-1"><span class="badge"><i class="fa fa-leaf fa-fw"></i></span> Category 1</a></li>
<li><a href="<?php echo URL;?>category-2"><span class="warning badge"><i class="fa fa-book fa-fw"></i></span> Category 2</a></li>
<li><a href="<?php echo URL;?>category-3"><span class="alert badge"><i class="fa fa-rocket fa-fw"></i></span> Category 3</a></li>
<?php if($access > 5): ?>
<li><a href="<?php echo URL;?>category-0"><span class="success badge"><i class="fa fa-video-camera fa-fw"></i></span> Uncategorized</a></li>
<?php endif; ?>
