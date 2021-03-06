<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title ">Order detail</h4>
                    <p class="card-category"> </p>
                </div>
                <div class="card-body">
                    <form id="bike-form" action="bike.php?action=update" enctype="multipart/form-data" method="post">
                    <input type="hidden" id="bike-id" name="id" value="<?php echo $result[0]["id"]; ?>">
                        <div class="form-group">
                            <label for="name">Bike name</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $result[0]["name"]; ?>">
                        </div>
                        <div class="form-group">
                            <label for="vendor">Vendor</label><br>
                            <select id="vendor" name="vendor" class="input-field col s12" required>
                            <option value="">Choose vendor</option>
                                <?php
                                if (!empty($vendor)) {
                                    foreach ($vendor as $k => $v) {
                                ?>
                                        <option value="<?php echo $vendor[$k]["id"]; ?>"
                                        <?php echo ($vendor[$k]["id"]==$result[0]["vendor_id"])?'selected':''; ?>
                                        ><?php echo $vendor[$k]["username"]; ?></option>

                                <?php
                                    }
                                }
                                ?>
                            </select>

                        </div>
                        <div class="form-group">
                            <label for="category">Category</label><br>
                            <select id="category" name="category" class="input-field col s12"required>
                            <option value="">Choose category</option>
                            <?php
                                if (!empty($category)) {
                                    foreach ($category as $k => $v) {
                                ?>
                                        <option value="<?php echo $category[$k]["id"]; ?>"
                                        <?php echo ($category[$k]["id"]==$result[0]["category"])?'selected':''; ?>
                                        ><?php echo $category[$k]["name"]; ?></option>

                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="station">Current Station</label><br>
                            <select id="station" name="station" class="input-field col s12"required>
                            <option value="">Choose station</option>
                            <?php
                                if (!empty($station)) {
                                    foreach ($station as $k => $v) {
                                ?>
                                        <option value="<?php echo $station[$k]["id"]; ?>" 
                                        <?php echo ($station[$k]["id"]==$result[0]["current_station"])?'selected':''; ?>                                        
                                        ><?php echo $station[$k]["name"]; ?></option>

                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                     
                                        <div class="form-group">
                            <label for="bike-photo">Bike photo</label><br>  
                        </div>

                        <div class="btn">
                            <span>Upload Bike photo</span>
                            <input type="file" id="bike-photo" name="bike-photo" class="form-control" value="<?php echo $result[0]["photo"]; ?>" />
                        </div>
                        <div class="form-group">
                            <label for="status">Is Return</label>
                            <input type="checkbox" name="status" value="true"<?php echo ($result[0]["is_return"])?"checked":""; ?>>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label><br>
                            <textarea name="description" id="description" form="bike-form" class="col-sm-6 col-sm-offset-3"><?php echo $result[0]["description"]; ?></textarea>
                        </div>
                        <div class="form-group">
                            <label for="price">Unit Price</label>
                            <input type="text" name="price" id="price" class="form-control" value="<?php echo $result[0]["unit_price"]; ?>" pattern="^\d+\.\d{0,2}$" require>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-2 col-sm-offset-3 text-right">
                                    <input type="submit" name="update" id="btn-bike-submit" class="form-control btn btn-primary" value="Update" />
                                </div>
                                <div class="col-sm-2 col-sm-offset-3 text-right">
                                    <a class="form-control btn btn-danger" href="bike.php?action=delete&id=<?php echo $result[0]["id"]; ?>">Delete</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>