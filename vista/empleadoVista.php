<?php



function mostrarEmpeados()
{

 //creacion de la tabla
	?>
     
<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
          <thead>
          <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Direccion</th>
          <th>Telefono</th>
          <th>Puesto</th>
          <th>Usuario</th>
          <th></th>
          </tr>
          </thead>
       <tbody>
	<?php
	
    $mysql = conexionMysql();
    $sql = "SELECT u.idEmpleados, u.Nombre, u.Apellido, u.Telefono, u.Direccion,(SELECT r.Descripcion FROM puestos r WHERE r.idPuestos=u.Puesto ),(SELECT r.user FROM usuarios r WHERE r.idEmpleados=u.idEmpleados limit 1) FROM empleados u WHERE estado=1";
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
				$tabla .="<td>" .$fila["4"].      "</td>";
				$tabla .="<td>" .$fila["3"].      "</td>";
				$tabla .="<td>" .$fila["5"].      "</td>";
				$tabla .="<td>" .$fila["6"].      "</td>";
				$tabla .="<td class='anchoC'>";
				if($_SESSION['SOFT_ACCESOModifica'.'usuario']=='1')
				{
                $tabla .="<a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm editar' onclick=\"editar('".$fila["0"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>";
				}
				if($_SESSION['SOFT_ACCESOElimina'.'usuario']=='1')
				{
                $tabla .="<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm modaleliminar' data-elim='".$fila["0"]."'><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a>";
				}
                $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm ver' data-ver='".$fila["0"]."'><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a></td>";
                $tabla .= "</tr>";

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



function comboPuestosEmpleado()
{
	
//creacion de la tabla
	?>
     

	<?php
	
    $mysql = conexionMysql();
    $sql = "SELECT descripcion,idPuestos FROM puestos";
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