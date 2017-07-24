<?php


function mostrarFragmentar()
{
echo "<script>
	if(document.getElementById('tipoVenta'))
	{
		$('#tipoVenta').material_select('destroy');
	}
	</script>";


    //creacion de la tabla
?>

<table id='tablaPro' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Correlativo</th>
            <th>Codigo</th>
            <th>Producto</th>
            <th>Laboratorio</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Precio</th>

            <th></th>


        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT  FROM cliente ";
    $cont=0;
    $sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,p.marca2,p.tiporepuesto,i.cantidad,i.medida FROM inventario i inner join productos p on p.idproductos=i.idproducto where i.idpresentacion=1";
    $medidas=array('','KG','LB','OZ','GR');
    $medida['']="";
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay Compras BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {
                $cont++;

                $tabla .= "<tr>";

                $tabla .="<td>"     .$cont.    "</td>";
                $tabla .="<td>" .$fila["3"]." </td>";
                $tabla .="<td>" .$fila["0"].      "</td>";
				$tabla .="<td>" .$fila["9"].      "</td>";
				$tabla .="<td>" .$fila["4"].      "</td>";
				$tabla .="<td>" .$fila["11"].      " " .$medidas[$fila["12"]].      "</td>";
				$tabla .="<td>" .$fila["1"].      "</td>";

                $tabla .="<td class='anchoC'>  <a id='modalnuevoP' onClick=\"abrirFragmentar('" .$fila["2"]."');\" class='waves-effect waves-light btn blue lighten-1 modal-trigger botonesm' ><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/seleccion.png' /></i></a>";

      


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
    echo ($respuesta);
        ?>
    </tbody>
</table>
<?php

}

function comboProductos2(){
	
    $mysql = conexionMysql();
    $sql = "SELECT nombre,codigoProducto,idproductos FROM productos WHERE idpresentacion=3 and Estado=1 order by codigoproducto";
	$tabla="";
    if($resultado = $mysql->query($sql))
    {
        $tabla .="<option value=\"\" selected>El producto en libras no existe</option>";

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

               

                $tabla .="<option value=\"".$fila["2"]."\">".$fila["1"]." ".$fila["0"]."</option>";
                
				
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
