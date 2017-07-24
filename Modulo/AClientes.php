<?php


session_start();


if(isset($_SESSION['SOFT_USER']))
{
    include('configActivado.php');

   
   
    Cliente2();



}
else
{

    header('location: ../');


}



?>
