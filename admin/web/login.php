<?php
$title = 'Bike overflow-login';
$meta = 'partials/meta.php';
$footer = 'partials/footer.php';


// Get Current date, time
$current_time = time();
$current_date = date("Y-m-d H:i:s", $current_time);

// Set Cookie expiration for 1 month
$cookie_expiration_time = $current_time + (30 * 24 * 60 * 60);  // for 1 month

$isLoggedIn = false;

// Check if loggedin session and redirect if session exists
if (!empty($_SESSION["user_id"])) {
    $isLoggedIn = true;
}

if ($isLoggedIn) {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include($meta); ?>
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>
        .tab {
            background-color: #b2dfdb;
            padding: 20px 20px;
            margin-top: -15px;
            padding-right: 40px;
            text-align: center;
            text-decoration: none;

        }

        .panel {
            background-color: #b2dfdb;
        }

        .active,
        .tab:hover {
            background-color: #004d40;
            color: white;
        }
    </style>
    <title><?php echo $title; ?></title>
</head>

<body class="">
    <div class="wrapper ">


        <div class="container ">

            <div class="row">
                <div class="  col-md-6 col-md-offset-3 col card  " style="padding-top:20%;">
                    <h2>Bike Rental System</h2>
                    <div class="panel panel-login">
                        <div class="panel-heading">

                            <div class="row">
                                <div class="tab col-xs-6 active" id="login-form-link">Login</div>
                                <div class="tab col-xs-6 " id="register-form-link">Register</div>
                                <p id="message"></p>
                            </div>

                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="login-form">
                                        <div class="form-group">
                                            <label for="username"> Username</label>
                                            <input type="text" id="login-username" tabindex="1" class="form-control" placeholder="Username" value="">

                                        </div>
                                        <div class="form-group">
                                            <label for="password"> Password</label>
                                            <input type="password" id="login-password" tabindex="2" class="form-control" placeholder="Password">

                                        </div>
                                        <div class="form-group text-center">
                                            <input type="checkbox" tabindex="3" name="remember" id="remember">
                                            <label for="remember"> Remember Me</label>
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="button" name="btn-login" id="btn-login" tabindex="4" class="form-control btn btn-primary" value="Log In">
                                                </div>
                                            </div>
                                        </div>
                                        <!--	<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
													<a href="https://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
												</div>
											    </div>
										    </div>
                                        </div>
                            -->

                                    </form>
                                    <form id="register-form" enctype="multipart/form-data" method="post"hidden>
                                        <div class="form-group">
                                            <label for="username"> Username</label>
                                            <input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" pattern="^(?!.*\.\.)(?!.*\.$)[^\W][\w.]{0,29}$" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" id="email" tabindex="2" class="form-control" placeholder="Email Address" value="" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" tabindex="3" class="form-control" placeholder="Password" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="confirm-password">Confirm password</label>
                                            <input type="password" name="confirm-password" id="confirm-password" tabindex="4" class="form-control" placeholder="Retype Password"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="birthday"> Birthday</label><br>
                                            <input type="date" id="birthday" name="birthday" tabindex="5"/>
                                        </div>
                                        <div class="form-group">
                                            <label for="role"> Role</label><br>
                                            <select id="role" name="role" tabindex="6" >
                                                <option value="customer">Customer</option>
                                                <option value="vendor">Vendor</option>
                                                <option value="admin">Admin</option> 
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="profile-photo">Profile photo</label><br>
                                            <input type="file" id="profile-photo" name="profile-photo" tabindex="7" />
                                        </div>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-sm-6 col-sm-offset-3">
                                                    <input type="submit" name="register-submit" id="btn-register-submit" tabindex="8" class="form-control btn btn-primary" value="Register Now"/>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">

        </footer>

    </div>

    <!--   Core JS Files   -->
    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <!-- Plugin for the momentJs  -->
    <script src="assets/js/plugins/moment.min.js"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="assets/js/plugins/sweetalert2.js"></script>
    <!-- Forms Validations Plugin -->
    <script src="assets/js/plugins/jquery.validate.min.js"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="assets/js/plugins/arrive.min.js"></script>
    <script src="assets/js/login.js"></script>
</body>

</html>