<div class="hide-for-medium">
  <h4>Menu</h4>
  <div class="callout clearpam">
    <ul class="menu vertical category">
      <?php if(!$auth): ?>
        <li><a href="<?php echo URL;?>login/"><span class="alert badge"><i class="fa fa-dashboard fa-fw"></i></span> Đăng nhập</a></li>
      <?php else: ?>
        <?php if($access > 5): ?>
          <li><a href="<?php echo URL;?>admincp/"><span class="alert badge"><i class="fa fa-dashboard fa-fw"></i></span> Control Panel</a></li>
        <?php endif; ?>
        <li><a href="<?php echo URL;?>logout/"><span class="warning badge"><i class="fa fa-sign-out fa-fw"></i></span> Logout</a></li>
      <?php endif;?>
    </ul>
  </div>
  <br>
</div>
<h4>Tìm kiếm</h4>
<form action="<?php echo URL;?>search" method="get">
  <div class="input-group">
    <input class="input-group-field" name="q" type="text" placeholder="Từ khóa...">
    <div class="input-group-button">
      <input type="submit" class="button" value="Search">
    </div>
  </div>
</form>
<h4>Categories</h4>
<div class="callout clearpam">
  <ul class="menu vertical category">
    <?php require($layout.'category.php');?>
  </ul>
</div>
<br>
