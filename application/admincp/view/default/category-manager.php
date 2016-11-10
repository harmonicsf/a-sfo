<?php require($header);?>

      <div class="row">

        <div class="medium-9 columns top-fix-space">
          <!-- Triggers the modals -->
          <h3>Category Manager</h3>
          <hr>
          <a class="button" data-open="new-category">New category</a>
          <div class="reveal" id="new-category" data-reveal data-animation-in="slide-in-down">
            <h5>New category</h5>
            <button class="close-button" data-close aria-label="Close reveal" type="button">
                <span aria-hidden="true">&times;</span>
              </button>
            <hr>
            <form action="" method="post">
              <div class="row">
                <div class="small-3 columns">
                  <label for="middle-label" class="text-right middle">Name</label>
                </div>
                <div class="small-9 columns">
                  <input name="name" type="text" id="middle-label">
                </div>
              </div>
              <div class="row">
                <div class="small-3 columns">
                  <label for="middle-label" class="text-right middle">Rawurl</label>
                </div>
                <div class="small-9 columns">
                  <input name="rawurl" type="text" id="middle-label">
                </div>
              </div>
              <div class="text-center"><button type="submit" class="button" name="action" value="new-category">Create!</button></div>
            </form>
          </div>

          <!-- Reveal Modals end -->
          <table>
            <thead>
              <tr>
                <th width="50">ID</th>
                <th>Name</th>
                <th width="150">rawurl</th>
                <th width="150">Action</th>
              </tr>
            </thead>
<?php if($categories): ?>
            <tbody>
<?php array_shift($categories); foreach($categories as $el): ?>
              <tr>
                <td><?php echo $el['categoryid'];?></td>
                <td><?php echo $el['name'];?></td>
                <td><?php echo $el['rawurl'];?></td>
                <td>
                  <a data-open="edit-<?php echo $el['categoryid'];?>">Edit</a> •
                  <a data-open="delete-<?php echo $el['categoryid'];?>">Delete</a>
                </td>
              </tr>
              <!-- reveal edit -->
              <div class="reveal" id="edit-<?php echo $el['categoryid'];?>" data-reveal data-animation-in="slide-in-down">
                <h5>Edit category: <?php echo $el['name'];?></h5>
                <button class="close-button" data-close aria-label="Close reveal" type="button">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <hr>
                <form action="" method="post">
                  <div class="row">
                    <div class="small-3 columns">
                      <label for="middle-label" class="text-right middle">Name</label>
                    </div>
                    <div class="small-9 columns">
                      <input type="text" name="name" id="middle-label" value="<?php echo $el['name'];?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="small-3 columns">
                      <label for="middle-label" class="text-right middle">Rawurl</label>
                    </div>
                    <div class="small-9 columns">
                      <input type="text" name="rawurl" id="middle-label" value="<?php echo $el['rawurl'];?>">
                    </div>
                  </div>
                  <input type="hidden" name="categoryid" value="<?php echo $el['categoryid'];?>">
                  <div class="text-center"><button type="submit" class="button" name="action" value="edit-category">Save!</button></div>
                </form>
              </div>
              <!-- reveal delete -->
              <div class="reveal" id="delete-<?php echo $el['categoryid'];?>" data-reveal data-animation-in="slide-in-down">
                <h5>Delete category: <?php echo $el['name'];?>?</h5>
                <button class="close-button" data-close aria-label="Close reveal" type="button">
                    <span aria-hidden="true">&times;</span>
                  </button>
                <hr>
                <div class="text-center">
                  <form action="" method="post">
                    <input type="hidden" name="categoryid" value="<?php echo $el['categoryid'];?>">
                    <div class="text-center">
                      <button type="submit" class="button alert" name="action" value="delete-category">Delete!</button>
                      <a class="button" data-close>Cancel</a>
                    </div>
                  </form>
                </div>
              </div>
<?php endforeach; ?>
            </tbody>
<?php endif; ?>
          </table>
        </div>

        <div class="medium-3 columns top-fix-space">
          <ul class="menu vertical">
            <li><a href="<?php echo URL;?>admincp/" class="list-group-item active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
            <li><a href="<?php echo URL;?>admincp/new-post/" class="list-group-item"><i class="fa fa-pencil-square-o fa-fw"></i> New post</a></li>
            <li class="active"><a href="<?php echo URL;?>admincp/category-manager/" class="list-group-item"><i class="fa fa-folder-open-o fa-fw"></i> Category manager</a></li>
            <li><a href="<?php echo URL;?>admincp/post-manager/" class="list-group-item"><i class="fa fa-list-ol fa-fw"></i> Post manager</a></li>
            <li><a href="<?php echo URL;?>admincp/setting/" class="list-group-item"><i class="fa fa-cog fa-fw"></i> Setting</a></li>
          </ul>
        </div>

      </div>


<?php require($footer);?>
