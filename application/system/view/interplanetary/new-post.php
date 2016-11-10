<?php require($header);?>
<br>
<div class="row small-collapse medium-uncollapse">
  <div class="large-8 medium-8 columns small-centered">
    <h3 class="small-padding-left">New post</h3>
    <div class="callout">
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
          <label>Tag (không dấu)</label>
          <input name="tags" id="tags" value="" />
        </fieldset>

        <fieldset class="form-group">
          <label>File input</label>
          <input name="thumb" type="file" class="form-control-file">
        </fieldset>

        <button name="post" type="submit" class="button expanded">Post</button>
      </form>
    </div>
  </div>
</div>

<?php require($footer);?>
