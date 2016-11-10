<?php require($header);?>
<br>
<div class="row small-collapse medium-uncollapse">
  <div class="medium-8 columns">
    <div class="callout success">
      <h1>This is settings</h1>
    </div>
  </div>
  <div class="medium-4 columns">
    <ul class="menu vertical">
      <li><a href="<?php echo URL;?>admincp/" class="list-group-item active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
      <li><a href="<?php echo URL;?>admincp/category-manager/" class="list-group-item"><i class="fa fa-folder-open-o fa-fw"></i> Category manager</a></li>
      <li><a href="<?php echo URL;?>admincp/post-manager/" class="list-group-item"><i class="fa fa-list-ol fa-fw"></i> Post manager</a></li>
      <li class="active"><a href="<?php echo URL;?>admincp/setting/" class="list-group-item"><i class="fa fa-cog fa-fw"></i> Setting</a></li>
    </ul>
  </div>
</div>
<?php require($footer);?>
