<?php require($header);?>
<br>
<div class="row small-collapse medium-uncollapse">
  <div class="large-8 medium-8 columns small-centered">
    <h3>Sửa bài viết</h3>
    <div class="callout">
      <?php if($success): ?>
        <div class="callout success">
          <strong>Saved!</strong>
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
          <input name="name" type="text" placeholder="Title" value="<?php echo $post['name'];?>">
        </fieldset>

        <fieldset class="form-group">
          <label>Description</label>
          <textarea name="description" placeholder="Description"><?php echo $post['description'];?></textarea>
        </fieldset>

        <fieldset class="form-group">
          <label>Content</label>
          <textarea id="editor" name="content" placeholder="Content" rows="5"><?php echo $post['content'];?></textarea>
        </fieldset>


        <fieldset>
          <label>Category</label>
          <select name="categoryid" class="form-control">
            <?php foreach($categories as $cat): ?>
              <?php if($cat['categoryid'] == $post['categoryid']): ?>
                <option value="<?php echo $cat['categoryid'];?>" selected>
                <?php else: ?>
                  <option value="<?php echo $cat['categoryid'];?>">
                  <?php endif;?>
                  <?php echo $cat['name'];?>

                </option>
              <?php endforeach; ?>
            </select>
          </fieldset>

          <fieldset class="form-group">
            <label>Tag (không dấu)</label>
            <input name="tags" id="tags" value="<?php echo $tags_ofpost;?>">
          </fieldset>

          <fieldset class="form-group">
            <label>Rawurl</label>
            <input name="rawurl" type="text" placeholder="rawurl" value="<?php echo $postrawurl['path'];?>">
          </fieldset>

          <fieldset class="form-group">
            <label>File input</label>
            <input name="thumb" type="file" class="form-control-file">
          </fieldset>

          <fieldset class="form-group">
            <input type="checkbox" name="timeupdate" value="yes">
            <label>Time update? (<?php echo display_time($post['time']);?>)</label>
          </fieldset>
          <br>
          <button name="post" type="submit" class="button expanded">Save!</button>
        </form>
      </div>
      <a href="<?php echo URL.$postrawurl['path'];?>">Trở về bài viết</a><br>
      <a href="<?php echo URL;?>admincp/post-manager">Trở về post manager</a><br><br>
    </div>
  </div>

  <?php require($footer);?>
