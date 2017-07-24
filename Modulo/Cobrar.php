<?php


session_start();


if(isset($_SESSION['SOFT_USER']))
{
    include('configActivado.php');



    //rol isset($_SESSION['SOF_USER']=='usuario')    
	if(isset($_GET['fd']))
	{
		
		$_SESSION['codigoBuscaCobrar_SOFT']=$_GET['fd'];
	}
	else
	{
		
		$_SESSION['codigoBuscaCobrar_SOFT']="";
	}


    Cobrar();



}
else
{

    header('location: ../');


}



?>