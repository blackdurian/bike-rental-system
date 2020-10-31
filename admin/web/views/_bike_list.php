<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0"> Customer List</h4>
          <div class="card-category"> 
</div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="">
              <th>
                  Index 
                </th>
                <th>
                  ID
                </th>
                <th>
                  Vendor
                </th>
                <th>
                  Category
                </th>
                <th>
                  Current Station
                </th>
                <th>
                  Status
                </th>
                <th>
                Unit Price per Hour
                </th>        
              </thead>
              <tbody>
              <?php
                  if (! empty($result)) {
                    foreach ($result as $k => $v) {
                ?>
                <tr  class='clickable-row'  data-href="bike.php?action=view&id=<?php echo $result[$k]["id"]; ?>">
                  <td>
                  <?php echo $k+1; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["id"]; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["vendor_name"]; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["category_name"]; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["station_name"]; ?>
                  </td>
                  <td>
                  <?php echo ($result[$k]["is_return"])?"available":"booked"; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["unit_price"]; ?>
                  </td>
                </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
            </table>
            <div class="text-right">
                <a href="bike.php?action=add" class="btn btn-primary btn-sm" style="margin-right: 20px;">Add</a>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>