<?php require($header);?>

      <div class="row">

        <div class="medium-9 columns top-fix-space">
          <h3>Dashboard</h3>
          <hr>
          <table>
            <thead>
              <tr>
                <th width="50">Postid</th>
                <th>Name</th>
                <th width="128">Action</th>
              </tr>
            </thead>
            <tbody>
<?php foreach($posts as $el): ?>
              <tr>
                <td><?php echo $el['postid'];?></td>
                <td><?php echo $el['name'];?></td>
                <td>
                  <a href="<?php echo URL.'admincp/edit-post/?postid='.$el['postid'];?>">Edit</a> •
                  <a data-open="delete-<?php echo $el['postid'];?>">Delete</a>
                </td>
              </tr>
              <!-- reveal delete -->
              <div class="reveal" id="delete-<?php echo $el['postid'];?>" data-reveal data-animation-in="slide-in-down">
                <h5>Delete post: <?php echo $el['name'];?>?</h5>
                <button class="close-button" data-close aria-label="Close reveal" type="button">
                    <span aria-hidden="true">&times;</span>
                </button>
                <hr>
                <div class="text-center">
                  <form action="" method="post">
                    <input type="hidden" name="postid" value="<?php echo $el['postid'];?>">
                    <div class="text-center">
                      <button type="submit" class="button alert" name="action" value="delete-post">Delete!</button>
                      <a class="button" data-close>Cancel</a>
                    </div>
                  </form>
                </div>
              </div>
<?php endforeach; ?>
            </tbody>
          </table>
        </div>

        <div class="medium-3 columns top-fix-space">
          <ul class="menu vertical">
            <li><a href="<?php echo URL;?>admincp/" class="list-group-item active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
            <li><a href="<?php echo URL;?>admincp/new-post/" class="list-group-item"><i class="fa fa-pencil-square-o fa-fw"></i> New post</a></li>
            <li><a href="<?php echo URL;?>admincp/category-manager/" class="list-group-item"><i class="fa fa-folder-open-o fa-fw"></i> Category manager</a></li>
            <li class="active"><a href="<?php echo URL;?>admincp/post-manager/" class="list-group-item"><i class="fa fa-list-ol fa-fw"></i> Post manager</a></li>
            <li><a href="<?php echo URL;?>admincp/setting/" class="list-group-item"><i class="fa fa-cog fa-fw"></i> Setting</a></li>
          </ul>
        </div>

      </div>


<?php require($footer);?>
