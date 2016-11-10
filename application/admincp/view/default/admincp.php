<?php require($header);?>

      <div class="row">

        <div class="medium-9 columns top-fix-space">
          <h3>Dashboard</h3>
          <hr>
          <div class="callout">
            <h5>META link</h5>
            <form action="" method="post">
              <textarea rows="5" name="meta-link-content"><?php echo htmlspecialchars($setting['meta-link']);?></textarea>
              <input class="button" type="submit" name="meta-link-edit" value="Save!">
            </form>
          </div>
        </div>

        <div class="medium-3 columns top-fix-space">
          <ul class="menu vertical">
            <li class="active"><a href="<?php echo URL;?>admincp/" class="list-group-item active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
            <li><a href="<?php echo URL;?>admincp/new-post/" class="list-group-item"><i class="fa fa-pencil-square-o fa-fw"></i> New post</a></li>
            <li><a href="<?php echo URL;?>admincp/category-manager/" class="list-group-item"><i class="fa fa-folder-open-o fa-fw"></i> Category manager</a></li>
            <li><a href="<?php echo URL;?>admincp/post-manager/" class="list-group-item"><i class="fa fa-list-ol fa-fw"></i> Post manager</a></li>
            <li><a href="<?php echo URL;?>admincp/setting/" class="list-group-item"><i class="fa fa-cog fa-fw"></i> Setting</a></li>
          </ul>
        </div>

      </div>


<?php require($footer);?>
