
<?php


if($_POST)
{

    require('../configCore.php');

    $transaccion = $_POST['trasDato'];


    //------------- gestion compras --------------/

    // insertar
    else if($transaccion == 1)
    {

        // insertarlos en mysql

    }
    // eliminar
    else if($transaccion == 2)
    {

        // eliminar en mysql
    }

    //editar
    else if($transaccion == 3)
    {
        // update en mysql

    }
    //------------- fin gestion --------------/
    
    
    
    //------------- gestion Ventas --------------/

    // insertar
    else if($transaccion == 4)
    {

        // insertarlos en mysql

    }
    // eliminar
    else if($transaccion == 5)
    {

        // eliminar en mysql
    }

    //editar
    else if($transaccion == 6)
    {
        // update en mysql

    }
    //------------- fin gestion --------------/
    
    
}

else
{

    //regrsar a index


}
?>