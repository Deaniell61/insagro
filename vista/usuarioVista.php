<?php



function mostrarUsuarios()
{

//creacion de la tabla
	?>
     
<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
          <thead>
          <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Rol</th>
          <th>Empleado</th>
          <th></th>
          
          </tr>
          </thead>
       <tbody>
	<?php
	
    $mysql = conexionMysql();
    $sql = "SELECT u.idUsuarios, u.user,(SELECT r.Descripcion FROM roles r WHERE r.idRol=u.idRol ),(SELECT r.nombre FROM empleados r WHERE r.idEmpleados=u.idEmpleados limit 1),(SELECT r.apellido FROM empleados r WHERE r.idEmpleados=u.idEmpleados limit 1) FROM usuarios u WHERE Estado=1 and u.idusuarios!=0";
	$tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

                $tabla .= "<tr>";

                $tabla .="<td>"     .$fila["0"].    "</td>";
                $tabla .="<td>" .$fila["1"].      "</td>";
                $tabla .="<td>" .$fila["2"].      "</td>";
				$tabla .="<td>" .$fila["3"].      " " .$fila["4"].      "</td>";
				 $tabla .="<td class='anchoC'>";
				if($_SESSION['SOFT_ACCESOModifica'.'usuario']=='1')
				{
                $tabla .="<a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm editar' onclick=\"editar('".$fila["0"]."')\")\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>";
				}
				if($_SESSION['SOFT_ACCESOElimina'.'usuario']=='1')
				{
                $tabla .="<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm modaleliminar' onclick=\"eliminar('".$fila["0"]."')\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a>";
				}
				
                $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm ver' onclick=\"ver('".$fila["0"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>";
				$tabla .="<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm modaleliminar' onclick=\"deshabilitarUsuariosTurnoU('5','1','".$fila["0"]."');\" title=\"Deshabilitar\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/deshabilitado.png' /></i></a>";
                $tabla .= "</td></tr>";
            }

            $resultado->free();//librerar variable
            
            
            $respuesta = $tabla;
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }

    //cierro la conexion
    $mysql->close();

    //debuelvo la variable resultado
    return printf($respuesta);
	?>
    </tbody>
            </table>
    <?php

}

function comboEmpleados()
{
	
//creacion de la tabla
	?>
     

	<?php
	
    $mysql = conexionMysql();
    $sql = "SELECT e.nombre,e.apellido,e.idempleados FROM empleados e WHERE Estado=1";
	$tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

               

                $tabla .="<option value=\"".$fila["2"]."\">".$fila["0"]." ".$fila["1"]."</option>";
                
				
            }

            $resultado->free();//librerar variable
            
            
            $respuesta = $tabla;
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }

    //cierro la conexion
    $mysql->close();

    //debuelvo la variable resultado
    return printf($respuesta);
	?>
   
    <?php
}

function comboRolesUsuarios()
{
	
//creacion de la tabla
	?>
     

	<?php
	
    $mysql = conexionMysql();
    $sql = "SELECT descripcion,idRol FROM roles where estado=1";
	$tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

               

                $tabla .="<option value=\"".$fila["1"]."\">".$fila["0"]."</option>";
                
				
            }

            $resultado->free();//librerar variable
            
            
            $respuesta = $tabla;
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }

    //cierro la conexion
    $mysql->close();

    //debuelvo la variable resultado
    return printf($respuesta);
	?>
   
    <?php
}







?>
