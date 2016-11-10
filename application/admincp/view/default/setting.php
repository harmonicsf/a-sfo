<?php require($header);?>

      <div class="row">

        <div class="medium-9 columns top-fix-space">
          <h3>Dashboard</h3>
          <hr>
          <table>
            <thead>
              <tr>
                <th width="200">Table Header</th>
                <th>Table Header</th>
                <th width="150">Table Header</th>
                <th width="150">Table Header</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Content Goes Here</td>
                <td>This is longer content Donec id elit non mi porta gravida at eget metus.</td>
                <td>Content Goes Here</td>
                <td>Content Goes Here</td>
              </tr>
              <tr>
                <td>Content Goes Here</td>
                <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                <td>Content Goes Here</td>
                <td>Content Goes Here</td>
              </tr>
              <tr>
                <td>Content Goes Here</td>
                <td>This is longer Content Goes Here Donec id elit non mi porta gravida at eget metus.</td>
                <td>Content Goes Here</td>
                <td>Content Goes Here</td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="medium-3 columns top-fix-space">
          <ul class="menu vertical">
            <li><a href="<?php echo URL;?>admincp/" class="list-group-item active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a></li>
            <li><a href="<?php echo URL;?>admincp/new-post/" class="list-group-item"><i class="fa fa-pencil-square-o fa-fw"></i> New post</a></li>
            <li><a href="<?php echo URL;?>admincp/category-manager/" class="list-group-item"><i class="fa fa-folder-open-o fa-fw"></i> Category manager</a></li>
            <li><a href="<?php echo URL;?>admincp/post-manager/" class="list-group-item"><i class="fa fa-list-ol fa-fw"></i> Post manager</a></li>
            <li class="active"><a href="<?php echo URL;?>admincp/setting/" class="list-group-item"><i class="fa fa-cog fa-fw"></i> Setting</a></li>
          </ul>
        </div>

      </div>


<?php require($footer);?>
