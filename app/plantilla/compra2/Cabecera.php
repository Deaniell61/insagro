<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Compras <?php echo $_SESSION['notified2'];?></title>
        <?php include('../app/plantilla/general/libCss.php');   ?>
        <link rel="stylesheet" href="../app/css/compra2.css">
    </head>
    <body>

        <!-- ********************************** nav inicio ********************************** -->
		<?php
			$_SESSION['SOFT_NAV']="compras";
		include('../app/plantilla/general/Cabecera.php');   ?>

        <!-- ********************************** nav fin ********************************** -->


        <!-- ********************************** tabs ********************************** -->

			<?php include('../app/plantilla/general/Nav.php');   ?>

        <!-- ********************************** tabs fin ********************************** -->
