<?php
define ('PROJECT_ROOT', getcwd());
//init
require_once "main.php";
require_once PROJECT_ROOT . '/classes/util/common.php';
require_once PROJECT_ROOT . '/classes/db/mysql.php';
require_once PROJECT_ROOT . '/classes/db/Customer.php';
require_once PROJECT_ROOT . '/classes/db/product.php';
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <?php 
            require_once "menu.php";?>
          <div class="main-container">
            <?php
              $page = get_page();
              require_once $page;
            ?>
          </div>

          

        </div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/moment.js"></script>
    <script type="text/javascript" src="js/transition.js"></script>
    <script type="text/javascript" src="js/collapse.js"></script>
    <script type="text/javascript" src="js/bootstrap-datetimepicker.min.js"></script>
    <script src="js/main.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!--[if eq IE 10]>
      <script src="js/ie10-viewport-bug-workaround.js"></script>
    <![endif]-->
  

</body></html>
<?php ob_end_flush(); ?>;