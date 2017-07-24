<?php


session_start();


if(isset($_SESSION['SOFT_USER']))
{
    include('configActivado.php');

   if(isset($_GET['codigo']))
{
	
	$_SESSION['codigoBuscaProducto_SOFT']=$_GET['codigo'];
}
else
{
	
	$_SESSION['codigoBuscaProducto_SOFT']="";
}

   
InventarioAdmin();



}
else
{

    header('location: ../');


}



?>