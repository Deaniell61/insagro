<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Ayuda  <?php echo $_SESSION['notified2'];?></title>
        <?php include('../app/plantilla/general/libCss.php');   ?>
        <link type="text/css" rel="stylesheet" href="../app/css/ayuda.css"  />
    </head>
    <body>
    <body>


        <!-- ********************************** nav inicio ********************************** -->

      <?php 
	  $_SESSION['SOFT_NAV']="ayuda";
	  include('../app/plantilla/general/Cabecera.php');   ?>
        <!-- ********************************** nav fin ********************************** -->


        <!-- ********************************** tabs ********************************** -->


        <?php include('../app/plantilla/general/Nav.php');   ?>
        <!-- ********************************** tabs fin ********************************** -->



