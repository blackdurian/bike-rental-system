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
                  Username
                </th>
                <th>
                Email
                </th>
                <th>
                Birthday
                </th>
                <th>
                Register Date
                </th>        
              </thead>
              <tbody>
              <?php
                  if (! empty($result)) {
                    foreach ($result as $k => $v) {
                ?>
                <tr  class='clickable-row'  data-href="customer.php?action=view&id=<?php echo $result[$k]["id"]; ?>">
                  <td>
                  <?php echo $k+1; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["id"]; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["username"]; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["email"]; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["dob"]; ?>
                  </td>
                  <td>
                  <?php echo $result[$k]["date_created"]; ?>
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