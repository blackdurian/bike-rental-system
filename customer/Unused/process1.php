<?php 
   include("conn.php");
   session_start();
   
//to check email existance
   if (isset($_POST['email_check'])) {
  	$email = $_POST['email'];
  	$sql = "SELECT * FROM br_user WHERE email='$email'";
  	$results = mysqli_query($db, $sql);
  	if (mysqli_num_rows($results) > 0) {
  	  echo "not_available";	
  	}else{
  	  echo "available";
  	}
  	exit();
  }
 
 //to register new customer
  if (isset($_POST['save'])) {
	$stmt = $db -> prepare("INSERT INTO users(username, email, password, usertype) VALUES (?,?,?,?) ");
	$stmt->bind_param("ssss",$username, $email,$password, $type);
	
	//set parameters
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = md5($_POST['password']);
	$type = "Customer";
	
	//execute sql & close connection
	$stmt->execute();
	$stmt->close();
	mysqli_close($db);

	//return success message to AJAX call
  	echo "Registered Successfully!";
  	exit();
  }
  
  
//if there is a file selected via file uploader, then execute the below code
	if (isset($_FILES["pI"]["name"])) {
	
	$imagelocation= "images/".basename($_FILES['pI']['name']); //photo will be uploaded into a folder named images
	$extension = pathinfo($imagelocation,PATHINFO_EXTENSION); //obtain file type
	
	if($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg')
	{
		echo"Unrecognized file format. Files with jpg, png and jpeg extension are allowed.";
	}
	else
	{
		if(move_uploaded_file($_FILES['pI']['tmp_name'],$imagelocation) ) //upload image into folder images
		{
			$stmt = $db -> prepare("INSERT INTO products (productName, productPrice, productDesc, productPhoto) VALUES (?,?,?,?) ");
			$stmt->bind_param("ssss",$pName, $pPrice,$pDesc, $imagelocation);

			$pName = $_POST['pN']; //prodName is the name of textbox
			$pPrice = $_POST['pP'];
			$pDesc = $_POST['pD'];
	
			//execute sql & close connection
			$stmt->execute();
			$stmt->close();
			mysqli_close($db);

			echo "Registered Successfully!";
		}
        else 
		{
            echo "Unable to register.";
        }
	}
	}
	
	
//search product name
if (isset($_POST['search_prod'])) {
	$name = $_POST['searchName'];
	$query = "select * from products where productName like '%$name%'";
	$execQuery = mysqli_query($db, $query);
	while ($result = mysqli_fetch_array($execQuery)) 
	{
		?>
		<a onclick='insert("<?php echo $result['productName']; ?>")'>
		<?php echo $result['productName']; ?><br/>
		</a>
		<?php
	}
}

//display product in table
if (isset($_POST['display_product'])) {
  	$name = $_POST['searchName']; 
  	$query = "select * from products where productName= '$name'";
  	$execQuery = mysqli_query($db, $query);
    ?>
    <table class="table table-hover">
        <tr scope="col">
        <th>Name</th>
        <th>Price</th>
        <th>Description</th>
        <th>Photo</th>
        </tr>
    <?php
	while ($result = mysqli_fetch_array($execQuery)) 
	{
		?>
		<tr>
		<td ><?php echo $result['productName']; ?></td>
		<td><?php echo $result['productPrice']; ?></td>
		<td><?php echo $result['productDesc']; ?></td>
		<td><img src="<?php echo $result['productPhoto']; ?>" height="200" width="200"> </td>
		</tr>
		<?php
	}
    ?>
    </table>
    <?php
  	exit();
}



//display product in table for edit
if (isset($_POST['edit_product'])) {
  	$name = $_POST['searchName']; 
  	$query = "select * from products where productName= '$name'";
  	$execQuery = mysqli_query($db, $query);
	while ($result = mysqli_fetch_array($execQuery)) 
	{
		?>
		<table class="table table-hover">
		<tr scope="col">
		<th>Name</th>
		<th>Price</th>
		<th>Description</th>
		</tr>
		<tr>
		<td ><?php echo $result['productName']; ?> </td>
		<td><input type= "text" id="newPrice" value ="<?php echo $result['productPrice']; ?> "></td>
		<td><textarea rows="3" columns="20" id="newDesc"> <?php echo $result['productDesc']; ?> </textarea></td>
		<td></td>
		</tr>
		</table>
		<?php
	}
  	exit();
}


//modify product details
if (isset($_POST['save_edit'])) {
	$stmt = $db -> prepare("update products set productPrice=?,productDesc=? where productName =?");
	$stmt->bind_param("sss",$newPrice, $newDesc,$name);
	
	$newPrice = $_POST['nP'];
	$newDesc = $_POST['nD'];
	$name = $_POST['searchName'];
	
	$stmt->execute();
	$stmt->close();
	mysqli_close($db);
	echo "Updated Successfully!";
  	exit();
}


//delete product details
if (isset($_POST['del'])) {
	$stmt = $db -> prepare("delete from products where productName =?");
	$stmt->bind_param("s",$name);
	
	$name = $_POST['nm'];
	
	$stmt->execute();
	$stmt->close();
	mysqli_close($db);
	echo "Deleted Successfully!";
  	exit();
}



//login
if (isset($_POST['login'])) {
	$stmt = $db -> prepare("select usertype from users where username =? and password =?");
	$stmt->bind_param("ss",$uname,$pword);
	
	$uname = $_POST['uName'];
	$pword = md5($_POST['pWord']);
	
	$stmt->execute();
	$stmt->bind_result($usertype);
	$stmt->store_result();
    if($stmt->fetch()) //fetching the contents of the row
    {
		$_SESSION['name'] = $uname;
		$_SESSION['role'] = $usertype;
		echo $_SESSION['role'];
    }
    else
	{
		echo "Incorrect username/password!";
	}
	$stmt->close();
	mysqli_close($db);
	exit();
}
?>


