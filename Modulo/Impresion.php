<?php
if(!isset($_GET['div'])){
    ?>
    <script>
        window.close();
    </script>
    <?php
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>.</title>
    <link type="text/css" rel="stylesheet" href="../app/css/lib/datatable.css"  />
<link type="text/css" rel="stylesheet" href="../app/css/lib/materialize.css"  />
<link type="text/css" rel="stylesheet" href="../app/css/lib/nav.css"  />

<link rel="shortcut icon" href="../app/img/ico/Dawe.ico">
</head>
<body>
    <div id="impresion"></div>
    <script>
        document.getElementById('impresion').innerHTML=opener.document.getElementById(<?php echo "'".$_GET['div']."'"?>).innerHTML;
       window.print();
        opener.document.getElementById(<?php echo "'".$_GET['div']."'"?>).innerHTML='';
       location.href="Impresion.php";
    </script>
</body>
</html>