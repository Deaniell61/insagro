<?php


session_start();


if(isset($_SESSION['SOFT_USER']))
{
    include('configActivado.php');
   
    Inicio();

}
else
{

    header('location: ../');


}



?>