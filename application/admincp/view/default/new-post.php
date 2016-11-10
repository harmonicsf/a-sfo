<?php require($header);?>
<div class="row">

  <div class="medium-9 columns top-fix-space">
    <h3>New post</h3>
    <hr>
    <?php if($success): ?>
      <div class="callout success">
        <strong>Well done!</strong> You successfully post.
      </div>
    <?php endif;?>
    <?php if($error): ?>
      <div class="callout warning">
    <?php foreach($error as $el): ?>
      <?php echo $el;?>
    <?php endforeach; ?>
      </div>
    <?php endif; ?>
            <form method="post" enctype="multipart/form-data">
              <fieldset class="form-group">
                <label>Title</label>
                <input name="name" type="text" placeholder="Title">
              </fieldset>

              <fieldset class="form-group">
                <label>Description</label>
                <textarea name="description" placeholder="Description"></textarea>
              </fieldset>

              <fieldset class="form-group">
                <label>Content</label>
                <textarea id="editor" name="content" placeholder="Content" rows="5"></textarea>
              </fieldset>


              <fieldset>
                  <label>Category</label>
                      <select name="categoryid" class="form-control">
    <?php foreach($categories as $cat): ?>
                           <option value="<?php echo $cat['categoryid'];?>">
                              <?php echo $cat['name'];?>
                               </option>
    <?php endforeach; ?>
                      </select>
              </fieldset>

              <fieldset class="form-group">
                <label>File input</label>
                <input name="thumb" type="file" class="form-control-file">
              </fieldset>

              <button name="post" type="submit" class="button expanded">Post</button>
            </form>
  </div>

  <div class="medium-3 columns top-fix-space">
    <ul class="menu vertical">
      <li><a href="<?php echo URL;?>admincp/" class="list-group-item active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
      <li class="active"><a href="<?php echo URL;?>admincp/new-post/" class="list-group-item"><i class="fa fa-pencil-square-o fa-fw"></i> New post</a></li>
      <li><a href="<?php echo URL;?>admincp/category-manager/" class="list-group-item"><i class="fa fa-folder-open-o fa-fw"></i> Category manager</a></li>
      <li><a href="<?php echo URL;?>admincp/post-manager/" class="list-group-item"><i class="fa fa-list-ol fa-fw"></i> Post manager</a></li>
      <li><a href="<?php echo URL;?>admincp/setting/" class="list-group-item"><i class="fa fa-cog fa-fw"></i> Setting</a></li>
    </ul>
  </div>

</div>

<?php require($footer);?>
