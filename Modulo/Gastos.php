<?php


session_start();


if(isset($_SESSION['SOFT_USER']))
{
    include('configActivado.php');

    //rol isset($_SESSION['SOF_USER']=='usuario')    

   
  Gatos();



}
else
{

    header('location: ../');


}



?>