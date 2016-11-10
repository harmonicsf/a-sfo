<?php require($header);?>
<br>
<div class="row small-collapse medium-uncollapse">
  <div class="medium-8 columns">

    <h3 class="small-padding-left">Post manager</h3>
    <div class="callout">
      <table>
        <thead>
          <tr>
            <th width="50">Postid</th>
            <th>Name</th>
            <th width="128">Action</th>
          </tr>
        </thead>
        <?php if($posts): ?>
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
        <?php else: ?>
          <tbody>
            <tr>
              <td colspan="3">
                No post
              </td>
            </tr>
          </tbody>
        <?php endif; ?>
      </table>
    </div>
  </div>
  <div class="medium-4 columns">
    <ul class="menu vertical">
      <li><a href="<?php echo URL;?>admincp/" class="list-group-item active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
      <li><a href="<?php echo URL;?>admincp/category-manager/" class="list-group-item"><i class="fa fa-folder-open-o fa-fw"></i> Category manager</a></li>
      <li class="active"><a href="<?php echo URL;?>admincp/post-manager/" class="list-group-item"><i class="fa fa-list-ol fa-fw"></i> Post manager</a></li>
      <li><a href="<?php echo URL;?>admincp/setting/" class="list-group-item"><i class="fa fa-cog fa-fw"></i> Setting</a></li>
    </ul>
  </div>
</div>
<?php require($footer);?>
