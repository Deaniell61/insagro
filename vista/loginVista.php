<?php


function Login()
{

    include('app/plantilla/login/Cabecera.php');
    include('app/plantilla/login/Cuerpo.php');
    include('app/plantilla/login/Pie.php');



}

function Valida()
{
	session_start();
	if(isset($_SESSION['SOFT_USER']))
	{
		?>
        <script>
        	location.href='Modulo/?Inicio';
        </script>
        <?php	
	}
	else
	{
		session_destroy();
		Login();
	}
}


















?>