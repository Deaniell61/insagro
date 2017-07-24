<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
  
    if($transaccion == 1)
    {
        $nit = $_POST['nit'];
         
        buscarProveedor($nit);
        
        
    
    }
//------------ gestion --------------/    

    // insertar
    else if($transaccion == 2)
    {
        
          

        
        $idProv = $_POST['prov'];
       

        
        inicioCompra($idProv);
        
    
    }
    // eliminar
    else if($transaccion == 3)
    {
        
        $datos['0'] = $prod = $_POST['prod'];
		$datos['1'] = $cantidad = $_POST['cantidad'];
        
        ingresoCompra($datos);
        
        
    }
    
    //editar
    else if($transaccion == 4)
    {
        
        
        
        guardarCompra();
        
    }
    
    else if($transaccion == 5)
    {

         $user = $_POST['user'];
        $pass = $_POST['pass'];
        $rol = $_POST['rol'];
		 $id = $_POST['id'];

        
        actualizarUsuario($user, $pass,$rol,$id);

    }
	else if($transaccion == 6)
    {
        
          

        
        $datos[0]=$nombre = $_POST['nombre'];
		$datos[1]=$apellido = $_POST['apellido'];
		$datos[2]=$telefono = $_POST['telefono'];
		$datos[3]=$direccion = $_POST['direccion'];
		$datos[4]=$puesto = $_POST['puesto'];
		
		        
        insertarEmpleado($datos);
        
    
    }
    // eliminar
    else if($transaccion == 7)
    {
        
        $idelim = $_POST['idelim'];
        
        eliminarEmpleado($idelim);
        
        
    }
    
    //editar
    else if($transaccion == 8)
    {
        
        $idedit = $_POST['idedit'];
        
        editarEmpleado($idedit);
        
    }
    
    else if($transaccion == 9)
    {

        $datos[0]=$nombre = $_POST['nombre'];
		$datos[1]=$apellido = $_POST['apellido'];
		$datos[2]=$telefono = $_POST['telefono'];
		$datos[3]=$direccion = $_POST['direccion'];
		$datos[4]=$puesto = $_POST['puesto'];
		$datos[5]=$puesto = $_POST['id'];
		
		        
        actualizarEmpleado($datos);

    }
	else if($transaccion == 66)
    {
        
        CerrarSesion();

    }
    
//----------- fin gestion ----------/    
    
}

else
{
    
    //regrsar a index
    echo'regresar al index';
}


?>