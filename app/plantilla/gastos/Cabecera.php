<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Gastos Varios <?php echo $_SESSION['notified2'];?></title>
        <link type="text/css" rel="stylesheet" href="../app/css/lib/datatable.css"  />
        <link type="text/css" rel="stylesheet" href="../app/css/cuentas.css"  />
         <link type="text/css" rel="stylesheet" href="../app/css/lib/materialize.css"  />
        <link type="text/css" rel="stylesheet" href="../app/css/lib/nav.css"  />
         <link type="text/css" rel="stylesheet" href="../app/css/gastos.css"  />

    </head>
    <body>




        <!-- ********************************** nav inicio ********************************** -->

        <?php
		$_SESSION['SOFT_NAV']="pagos";
		include('../app/plantilla/general/Cabecera.php');   ?>
        <!-- ********************************** nav fin ********************************** -->


        <!-- ********************************** tabs ********************************** -->


        <?php include('../app/plantilla/general/Nav.php');   ?>
        <!-- ********************************** tabs fin ********************************** -->
