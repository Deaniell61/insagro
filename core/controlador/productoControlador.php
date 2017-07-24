<?php


if($_POST)
{
    require('../configCore.php');
    
    $transaccion = $_POST['trasDato'];
    
    
//-------------- acceso -----------/    
    if($transaccion == 1)
    {
        $datos[0]=$_POST['id'];
		$datos[1]=$_POST['nombre'];
		$datos[2]=$_POST['codigoproducto'];
		$datos[3]=$_POST['marca'];
		$datos[4]=$_POST['descripcion'];
		$datos[5]=$_POST['tipoRepuesto'];
		$datos[6]=$_POST['compra'];
		$datos[7]=$_POST['medida'];
		$datos[8]=$_POST['presentacion'];
		$datos[9]=$_POST['idpresentacion'];
		
        insertarProducto($datos);
        
        
    
    }
//---------- fin acceso -----------/   
  
//------------ gestion --------------/    

    // insertar
    else if($transaccion == 2)
    {
        
          

        $datos[0]=$nombre = $_POST['tipo'];
		$datos[1]=$puesto = $_POST['id'];
		
		        
        cambiarTipoProducto($datos);
        
    
    }
    // eliminar
    else if($transaccion == 3)
    {
        $datos[0]=$_POST['id'];
		$datos[1]=$_POST['nombre'];
		$datos[2]=$_POST['codigoproducto'];
		$datos[3]=$_POST['marca'];
		$datos[4]=$_POST['descripcion'];
		$datos[5]=$_POST['tipoRepuesto'];
		$datos[6]=$_POST['compra'];
		$datos[7]=$_POST['medida'];
		$datos[8]=$_POST['presentacion'];
		$datos[9]=$_POST['idpresentacion'];
		$datos[10]=0;
		
        insertarProducto($datos);
        
        
    
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