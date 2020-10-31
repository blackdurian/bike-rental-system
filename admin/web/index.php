<?php
include('session.php');
header("Location: rental.php");
    $title = 'Home';
    $meta = 'partials/meta.php';
    $sidebar = 'partials/sidebar.php';
    $navbar = 'partials/navbar.php';
    $footer = 'partials/footer.php';
    $childView = 'views/_index.php';
    $customJs = 'assets/js/custom.js';
    include('partials/layout.php');
?>