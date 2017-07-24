<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
    
//-------------- acceso -----------/    
    if($transaccion == 1)
    {
        
        $user = $_POST['user'];
        $pass = $_POST['pass'];
          
        
        login($user, $pass);
        
        
    
    }
//---------- fin acceso -----------/   
  
//------------ gestion --------------/    

    // insertar
    else if($transaccion == 2)
    {
        
          

        
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $rol = $_POST['rol'];
        $empleado = $_POST['empleado'];

        
        insertarUsuario($user, $pass,$rol,$empleado);
        
    
    }
    // eliminar
    else if($transaccion == 3)
    {
        
        $idelim = $_POST['idelim'];
		$pass = $_POST['pass'];
        
        eliminarUsuario($idelim,$pass);
        
        
    }
    
    //editar
    else if($transaccion == 4)
    {
        
        $idedit = $_POST['idedit'];
        
        editarUsuario($idedit);
        
    }
    
    else if($transaccion == 5)
    {

         $user = $_POST['user'];
        $pass = $_POST['pass'];
        $rol = $_POST['rol'];
		 $id = $_POST['id'];
		$empleado = $_POST['empleado'];
        
        actualizarUsuario($user, $pass,$rol,$id,$empleado);

    }
	else if($transaccion == 6)
    {
        
          

        
        $datos[0]=$nombre = $_POST['nombre'];
		$datos[1]=$apellido = $_POST['apellido'];
		$datos[2]=$telefono = $_POST['telefono'];
		$datos[3]=$direccion = $_POST['direccion'];
		$datos[4]=$puesto = $_POST['puesto'];
		$datos[5]=$puesto = $_POST['sueldo'];
		
		
		        
        insertarEmpleado($datos);
        
    
    }
    // eliminar
    else if($transaccion == 7)
    {
        
        $dato[0] = $_POST['idelim'];
		$dato[1] = $_POST['pass'];
        
        
        eliminarEmpleado($dato);
        
        
    }
    
    //editar
    else if($transaccion == 8)
    {
        
        $idedit = $_POST['idedit'];
        
        editarEmpleado($idedit);
        
    }
    
    else if($transaccion == 9)
    {

        $datos[0]= $_POST['nombre'];
		$datos[1]= $_POST['apellido'];
		$datos[2]= $_POST['telefono'];
		$datos[3]= $_POST['direccion'];
		$datos[4]= $_POST['puesto'];
		$datos[5]= $_POST['id'];
		$datos[6]= $_POST['sueldo'];
		
		        
        actualizarEmpleado($datos);

    }
	else if($transaccion == 10)
    {

        cargarModulosIniciales();

    }
	else if($transaccion == 11)
    {

		$datos[0]= $_POST['modul'];
		$datos[1]= $_POST['inser'];
		$datos[2]= $_POST['edit'];
		$datos[3]= $_POST['elim'];
		$datos[4]= $_POST['user'];
        asignarModulos($datos);

    }
	else if($transaccion == 12)
    {

		$datos[0]= $_POST['modul'];
		$datos[1]= $_POST['inser'];
		$datos[2]= $_POST['edit'];
		$datos[3]= $_POST['elim'];
		$datos[4]= $_POST['user'];
        desasignarModulos($datos);

    }
	else if($transaccion == 13)
    {

		$datos[0]= $_POST['contra'];
        contraAdmin($datos);

    }
	else if($transaccion == 14)
    {

		$datos[0]= $_POST['estadoFin'];
		$datos[1]= $_POST['estadoIni'];
        habilitaUsuarios($datos);

    }
	else if($transaccion == 15)
    {

		$datos[0]= $_POST['estadoFin'];
		$datos[1]= $_POST['estadoIni'];
		$datos[2]= $_POST['id'];
        habilitaUsuariosU($datos);

    }
	else if($transaccion == 66)
    {
        
        CerrarSesion();

    }
	else if($transaccion == 67)
    {

		$datos[0]= $_POST['destino'];
		$datos[1]= $_POST['mensaje'];
		$datos[2]= $_POST['copia'];
        compruebaEnvioCorreo($datos);

    }
    
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>