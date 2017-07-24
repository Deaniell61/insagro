<?php



function mostrarInventario($datos)
{
$medidas=array('','KG','LB','OZ','GR');
    $medida['']="";
    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Correlativo</th>
            <th>Codigo</th>
            <th>Producto</th>
            <th>Marca</th>
            <th>Sector</th>
            <th>Presentacion</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Precio General</th>
            
          
           
        </tr>
    </thead>
    <tbody>
        <?php

    $mysql = conexionMysql();
    $sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,p.marca2,p.codigoproducto,i.medida,(select ps.descripcion from presentacion ps where ps.idpresentacion=i.idpresentacion),p.tiporepuesto FROM inventario i inner join productos p on p.idproductos=i.idproducto where  i.cantidad>=0 and p.estado=1  order by p.codigoproducto";
    $tabla="";
	$cont=0;
    	$tipo=array('','Sector Fertilizantes','Sector Herbicidas','Sector Insecticidas','Sector Veterinarios','Sector semillas','Sector Caceros','Sector Concentrados','Sector Equipo Agricola','Sector Foliares','Sector Fungicidas','Sector Adherentes','Sector Bolsas','Sector Plastico','Sector Pintura');

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
$cont++;
                $tabla .= "<tr>";

                $tabla .="<td>"     .$cont.    "</td>";
				$tabla .="<td>"     .$fila["11"].    "</td>";
                $tabla .="<td>" .$fila["0"].      "</td>";
                $tabla .="<td>" .$fila["10"].      "</td>";
				$tabla .="<td>" .$tipo[$fila["14"]].      "</td>";
                $tabla .="<td>" .($fila["13"]).      "</td>";
				 $tabla .="<td>" .($fila["4"]).      "</td>";
				 $tabla .="<td>" .$fila["9"].      " ".$medidas[$fila["12"]]."</td>";
				 $tabla .="<td>" .toMoney($fila["6"]).      "</td>";
				
				 
               

               
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


function mostrarTablaInventarioFragmentar($datos)
{

    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Correlativo</th>
            <th>Codigo</th>
            <th>Producto</th>
            <th>Marca</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>Precio General</th>
            <th>Precio Especial</th>
          
           
        </tr>
    </thead>
    <tbody>
        <?php

    $mysql = conexionMysql();
    $sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,p.marca2,p.codigoproducto FROM inventario i inner join productos p on p.idproductos=i.idproducto where p.idproductos='".$datos[0]."' and i.cantidad>=0 and p.estado=1";
    $tabla="";
	$cont=0;
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
$cont++;
                $tabla .= "<tr>";

                $tabla .="<td>"     .$cont.    "</td>";
				$tabla .="<td>"     .$fila["11"].    "</td>";
                $tabla .="<td>" .$fila["0"].      "</td>";
                $tabla .="<td>" .$fila["10"].      "</td>";
				 $tabla .="<td>" .($fila["4"]).      "</td>";
				 $tabla .="<td>" .$fila["9"].      "</td>";
				 $tabla .="<td>" .toMoney($fila["6"]).      "</td>";
				 $tabla .="<td>" .toMoney($fila["7"]).      "</td>";
				 
               

               
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
?>