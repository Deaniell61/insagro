<?php


function mostrarFragmentar()
{

    //creacion de la tabla
?>

<table id='tablaPro' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Correlativo</th>
            <th>Codigo</th>
            <th>Producto</th>
            <th>Laboratorio</th>
            <th>Presentacion</th>
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
    $sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,p.marca2,p.tiporepuesto,i.cantidad,i.idpresentacion,(select ppp.idpresentacion from presentacion ppp where ppp.descripcion='Quintales' and ppp.estado=1),(select ppp.descripcion from presentacion ppp where ppp.idpresentacion=i.idpresentacion) FROM inventario i inner join productos p on p.idproductos=i.idproducto where i.cantidad>0  order by p.codigoproducto";
    
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
				$tabla .="<td>" .$fila["14"].      "</td>";
				$tabla .="<td>" .$fila["4"].      "</td>";
				$tabla .="<td>" .$fila["11"].  "</td>";
				$tabla .="<td>" .$fila["1"].      "</td>";

                $tabla .="<td class='anchoC'>  <a id='modalnuevoP' onClick=\"abrirFragmentar('" .$fila["2"]."','".(($fila["12"]==$fila["13"])?"1":$fila["2"])."');\" class='waves-effect waves-light btn blue lighten-1 modal-trigger botonesm' ><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/editar.png' /></i></a>";
                $tabla .="<a class='waves-effect waves-light btn green lighten-1 modal-trigger botonesm editar' onclick=\"imprimirCuentaPagar11('".$fila["2"]."','mensajeccV');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/imprimir.png' /></i></a></td>";
                
      


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


function mostrarDetalleFragmentar($datos)
{

    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Cantidad Acreditada</th>
            

        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $cont=0;
    $sql = "SELECT fecha,descripcion,retirado,precioventa FROM detalleFragmentar where  idinventario=(select i.idinventario from inventario i where i.idproducto='".$datos[0]."')";
    
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

                $tabla .="<td>" .$fila["0"]." </td>";
                $tabla .="<td>" .$fila["1"].      "</td>";
				$tabla .="<td>" .$fila["2"].      "</td>";
                


                $tabla .= "</tr>";

            }

            $resultado->free();//librerar variable


            $respuesta = $tabla;
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>".$sql;

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

function mostrarDetalleFragmentarEntrada($datos)
{

    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Cantidad Acreditada</th>
            <th>Precio Venta</th>
            

        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $cont=0;
    $sql = "SELECT fecha,descripcion,retirado,precioventa FROM detalleFragmentarEntr where  idinventario=(select i.idinventario from inventarioFrag i where i.idproducto='".$datos[0]."')";
    
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

                $tabla .="<td>" .$fila["0"]." </td>";
                $tabla .="<td>" .$fila["1"].      "</td>";
				$tabla .="<td>" .$fila["2"].      "</td>";
				$tabla .="<td>" .toMoney($fila["3"]).      "</td>";
                


                $tabla .= "</tr>";

            }

            $resultado->free();//librerar variable


            $respuesta = $tabla;
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>".$sql;

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

function mostrarFragmentarEntrada()
{

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
            <th>Presentacion</th>
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
    $sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,p.marca2,p.tiporepuesto,i.cantidad,i.medida,(select ppp.descripcion from presentacion ppp where ppp.idpresentacion=p.idpresentacion) FROM inventarioFrag i inner join productos p on p.idproductos=i.idproducto ";
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
				$tabla .="<td>" .$fila["13"].      "</td>";
				$tabla .="<td>" .$fila["11"].     "</td>";
				$tabla .="<td>" .$fila["1"].      "</td>";

                $tabla .="<td class='anchoC'>  <a id='modalnuevoP' onClick=\"abrirFragmentar('" .$fila["2"]."');\" class='waves-effect waves-light btn blue lighten-1 modal-trigger botonesm' ><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/editar.png' /></i></a>";
                $tabla .="<a class='waves-effect waves-light btn green lighten-1 modal-trigger botonesm editar' onclick=\"imprimirCuentaPagar11('".$fila["2"]."','mensajeccV');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/imprimir.png' /></i></a></td>";
                
      


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

function comboProductos2($datos){
	
    $mysql = conexionMysql();
    $mas="";
    if($datos[0]=='1')
    {
        $mas="idpresentacion=3 and ";
    }

    $sql = "SELECT nombre,codigoProducto,idproductos FROM productos WHERE $mas Estado=1 order by codigoproducto";
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

               

                $tabla .="<option value=\"".$fila["2"]."\">".$fila["1"]." --- ".$fila["0"]."</option>";
                
				
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
   
    <?php
}

?>