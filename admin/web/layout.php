<!DOCTYPE html>
<html lang="en">
<head>
  <?php include($meta); ?>
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="assets/img/favicon.png">
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
    <title><?php echo $title; ?></title>
</head>
<body class="">
  <div class="wrapper ">
    <?php include($sidebar); ?>
    <div class="main-panel">
      <?php include($navbar); ?>
      <?php include($childView); ?>
    </div>
</div>
</body>
</html>