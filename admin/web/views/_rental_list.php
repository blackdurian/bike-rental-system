<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0"> Rental Orders List</h4>
          <div class="card-category"> 
          <!-- 
            TODO: filtering table
          <form action="#">
          <label>
        <input type="checkbox" class="filled-in" checked="checked" />
        <span>show completed</span>
      </label>
      <label>
        <input type="checkbox" class="filled-in" checked="checked" />
        <span>show processing</span>
      </label>
          </form> -->

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
                  Check In Time
                </th>
                <th>
                Check Out Time
                </th>
                <th>
                Check In Station
                </th>
                <th>
                Check Out Station
                </th>
                <th>
                Total Pay
                </th>
              </thead>
              <tbody>
              <?php
                  if (! empty($result)) {
                    foreach ($result as $k => $v) {
                ?>
                <tr  class='clickable-row'  data-href="rental.php?action=view&id=<?php echo $result[$k]["id"]; ?>">
                  <td>
                 
                  <?php echo $k+1; ?>
                 
                  </td>
                  <td>
                  <?php echo $result[$k]["id"]; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["check_in_time"]; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["check_out_time"]; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["check_in_station"]; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["check_out_station"]; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["total_price"]; ?>
                  </td>
                  
                </tr>
                <?php
                    }
                  }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>