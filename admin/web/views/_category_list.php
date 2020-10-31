<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 col-md-12">
      <div class="card">
        <div class="card-header card-header-tabs card-header-primary">
          <div class="nav-tabs-navigation">
            <div class="nav-tabs-wrapper">
              <span class="nav-tabs-title">Categorys:</span>

              <p id="respond-msg" style="float: right;"></p>



            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="profile">
              <table class="table" id="category-table">
                <thead class="">
                  <th>
                    Index
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Address
                  </th>
                  <th>

                  </th>
                </thead>
                <tbody>
                  <?php
                  if (!empty($result)) {
                    foreach ($result as $k => $v) {
                  ?>
                      <tr id="tr-<?php echo $result[$k]["id"]; ?>">
                        <td>
                        <?php echo $k+1; ?>
                        </td>
                        <td>
                          <input class="input-<?php echo $result[$k]["id"]; ?>  col-md-12" id="name-input-<?php echo $result[$k]["id"]; ?>" type="text" value="<?php echo $result[$k]["name"]; ?>" disabled></td>
                        <td>
                          <input class="input-<?php echo $result[$k]["id"]; ?>  col-md-12" id="description-input-<?php echo $result[$k]["id"]; ?>" type="text" value="<?php echo $result[$k]["description"]; ?>" disabled>
                        </td>
                        <td class="td-actions text-right">
                          <button type="button" title="Save" class="btn btn-success btn-link btn-sm" id="btn-save-<?php echo $result[$k]["id"]; ?>" style="display: none;" onclick="<?php echo 'save(\'' . $result[$k]["id"] . '\')'; ?>">
                            <i class="material-icons">save</i>
                          </button>
                          <button type="button" title="Cancel" class="btn btn-danger btn-link btn-sm" id="btn-cancel-<?php echo $result[$k]["id"]; ?>" style="display: none;" onclick="<?php echo 'btnToggle(\'' . $result[$k]["id"] . '\')'; ?>">
                            <i class="material-icons">cancel</i>
                          </button>
                          <button type="button" title="Edit" class="btn btn-primary btn-link btn-sm" id="btn-edit-<?php echo $result[$k]["id"]; ?>" onclick="<?php echo 'btnToggle(\'' . $result[$k]["id"] . '\')'; ?>">
                            <i class="material-icons">edit</i>
                          </button>
                          <button type="button" title="Delete" class="btn btn-danger btn-link btn-sm" onclick="<?php echo 'deleteCategory(\'' . $result[$k]["id"] . '\')'; ?>">
                            <i class="material-icons">close</i>
                          </button>
                        </td>
                      </tr>
                  <?php
                    }
                  }
                  ?>
                </tbody>
              </table>
              <div class="text-right">
                <button type="button" class="btn btn-primary btn-sm" style="margin-right: 20px;" onclick="addRow()">Add</button>
              </div>

            </div>


          </div>
        </div>
      </div>
    </div>

  </div>

</div>