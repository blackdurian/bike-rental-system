<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title ">Order detail</h4>
          <p class="card-category"> </p>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <tr>
                <th>ID:</th>
                <td><?php echo $result[0]["rental_id"]; ?></td>
              </tr>
              <tr>
                <th>Customer ID:</th>
                <td><?php echo $result[0]["customer_id"]; ?></td>
                <th>Vendor ID:</th>
                <td><?php echo $result[0]["vendor_id"]; ?></td>
              </tr>
              <tr>
                <th>Bike ID:</th>
                <td><?php echo $result[0]["bike_id"]; ?></td>
              </tr>
              <tr>
                <th>Check in time:</th>
                <td><?php echo $result[0]["check_in_time"]; ?></td>
                <th>Check out time:</th>
                <td><?php echo $result[0]["check_out_time"]; ?></td>
              </tr>
              <tr>
                <th>Check in station:</th>
                <td><?php echo $result[0]["check_in_station"]; ?></td>
                <th>Check out station:</th>
                <td><?php echo $result[0]["check_out_station"]; ?></td>
              </tr>
              <tr>
                <th>Status:</th>
                <td><?php echo ($result[0]["is_complete"])?"Completed":"In progress"; ?></td>
                <th>Total price:</th>
                <td>Rm <?php echo $result[0]["total_price"]; ?></td>
              </tr>
              <tr>
                <th>Rate by customer:</th>
                <td><?php echo $result[0]["rating"]; ?></td>
              
              </tr>
              <tr>
              <th>Feedback :</th>
                <td><?php echo $result[0]["description"]; ?></td>  
            </tr>
            </table>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>