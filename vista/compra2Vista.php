<?php


function mostrarCompras($datos)
{
session_start();

$busca="";

	if($_SESSION['SOFT_ROL']!='1' && $_SESSION['SOFT_ROL']!='0')
	{
		$busca="and c.idusuario='".$_SESSION['SOFT_USER_ID']."'";
	}

    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>No. Factura</th>
            <th>Nit</th>
            <th>Proveedor</th>
            <th>Total</th>
            <th>Tipo de Compra</th>
              <th></th>

        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombreempresa,c.total,(select tv.Descripcion from tipocompra tv where tv.idtipo=c.tipocompra),c.idcompras FROM compras c inner join proveedor p on p.idproveedor=c.iddistribuidor inner join compradetalle cd on cd.idcompras=c.idcompras inner join productos pd on pd.idproductos=cd.idproductos where c.estado=1 and cd.estado=1 $busca group by c.idcompras order by c.fecha desc";
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

                $tabla .= "<tr>";

                $tabla .="<td>"     .substr($fila["0"],0,10).    "</td>";
                $tabla .="<td>" .$fila["1"].      "</td>";
                $tabla .="<td>" .$fila["2"].      "</td>";
				$tabla .="<td>" .$fila["3"].      "</td>";
				$tabla .="<td>" .toMoney($fila["4"]).      "</td>";

				$tabla .="<td>" .$fila["5"].      "</td>";
				$tabla .="<td class='anchoC'>";
				
				if($_SESSION['SOFT_ACCESOElimina'.'compras']=='1')
				{
                $tabla .="<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm ' onClick=\"anularCompra('".$fila["6"]."');\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a>";
				}
				else
				{
					
				}


                $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm modalver'  onClick=\"buscarCompra('".$fila["6"]."');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a></td>";
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

function mostrarDetallesCompras($id)
{
$medida=array('','KG','LB','OZ','GR');
$medida['']="";
$total=0;
    //creacion de la tabla
?>

<table id='tabla22' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
        	
            <th>ID</th>
            <th>Producto</th>
            <th>Tipo</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Presentacion</th>
            <th hidden class="ocultar" style="display:none;">Presentacion</th>
            <th>SubTotal</th>
            <th></th>
            <th hidden class="ocultar" style="display:none;"></th>
            <th hidden class="ocultar" style="display:none;"></th>
            <th hidden class="ocultar" style="display:none;"></th>
            <th hidden class="ocultar" style="display:none;"></th>
            <th hidden class="ocultar" style="display:none;"></th>


        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
    $sql = "SELECT cd.idcompradetalle,(select p.nombre from productos p where p.idproductos=cd.idproductos),cd.costo,cd.cantidad,cd.subtotal,(select p.tiporepuesto from productos p where p.idproductos=cd.idproductos),cd.idproductos,(select p.codigoproducto from productos p where p.idproductos=cd.idproductos),cd.precioE,cd.precioM,cd.costo,cd.precio,cd.idpresentacion,(select ps.descripcion from presentacion ps where cd.idpresentacion=ps.idpresentacion) FROM compradetalle cd where (cd.estado=2 or cd.estado=1 or cd.estado=0) and cd.idcompras='".$id."'";
    $tabla="";
	$tipo=array('','Sector Fertilizantes','Sector Herbicidas','Sector Insecticidas','Sector Veterinarios','Sector semillas','Sector Caceros','Sector Concentrados','Sector Equipo Agricola','Sector Foliares','Sector Fungicidas','Sector Adherentes','Sector Bolsas','Sector Plastico','Sector Pintura');
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay Compras BD vacia</div>";
        }

        else
        {
$contaId=0;
            while($fila = $resultado->fetch_row())
            {
				

                $tabla .= "<tr>";
				

                $tabla .="<td>"     .$fila["7"].    "</td>";
                $tabla .="<td>" .$fila["1"].      "</td>";
				$tabla .="<td>" .$tipo[$fila["5"]].      "</td>";
                $tabla .="<td >" .toMoney($fila["2"]).      "</td>";
				$tabla .="<td id=\"Cantidad$contaId\">" .$fila["3"].      "</td>";
                $tabla .="<td >" .($fila["13"]).      "</td>";
                $tabla .="<td hidden class=\"ocultar\" style=\"display:none;\" id=\"Presentacion$contaId\">" .$fila["12"].      "</td>";
				$tabla .="<td>" .toMoney($fila["4"]).      "</td>";
                $tabla .="<td class='anchoC'>
				<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm ' onClick=\"anularDetalleCompra('".$fila["0"]."');\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a><td>";
				$tabla .="<td hidden class=\"ocultar\" style=\"display:none;\" id=\"Codigo$contaId\">"     .$fila["6"].    "</td>";
				$tabla .="<td hidden class=\"ocultar\" style=\"display:none;\" id=\"PrecioE$contaId\">"     .$fila["8"].    "</td>";
				$tabla .="<td hidden class=\"ocultar\" style=\"display:none;\" id=\"PrecioM$contaId\">"     .$fila["9"].    "</td>";
				$tabla .="<td hidden class=\"ocultar\" style=\"display:none;\" id=\"Costo$contaId\">"     .$fila["10"].    "</td>";
				$tabla .="<td hidden class=\"ocultar\" style=\"display:none;\" id=\"PrecioG$contaId\">"     .$fila["11"].    "</td>";
                $tabla .= "</tr>";
$contaId++;
				$total=$total+$fila["4"];
            }

            $resultado->free();//librerar variable

			$tabla .= "<script>

	document.getElementById('totalCompra').innerHTML='Total de esta Compra: <strong>".toMoney($total)."</strong>';
</script>";
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


function mostrarComprasPorFecha($datos)
{
session_start();

$busca="";

	if($_SESSION['SOFT_ROL']!='1' && $_SESSION['SOFT_ROL']!='0')
	{
		$busca="and c.idusuario='".$_SESSION['SOFT_USER_ID']."'";
	}

    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>No. Factura</th>
            <th>Nit</th>
            <th>Proveedor</th>
            <th>Total</th>
            <th>Tipo de Compra</th>
              <th></th>

        </tr>
    </thead>
    <tbody>
        <?php
	$extra="";
    $mysql = conexionMysql();
     $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombreempresa,c.total,(select tv.Descripcion from tipocompra tv where tv.idtipo=c.tipocompra),c.idcompras FROM compras c inner join proveedor p on p.idproveedor=c.iddistribuidor inner join compradetalle cd on cd.idcompras=c.idcompras inner join productos pd on pd.idproductos=cd.idproductos where (c.fecha<='".$datos[2]."' and c.fecha>='".$datos[1]."') and c.estado=1 and cd.estado=1 and pd.tiporepuesto='".$datos[0]."' $busca group by c.idcompras order by c.fecha desc";
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

                $tabla .= "<tr>";

                $tabla .="<td>"     .substr($fila["0"],0,10).    "</td>";
                $tabla .="<td>" .$fila["1"].      "</td>";
                $tabla .="<td>" .$fila["2"].      "</td>";
				$tabla .="<td>" .$fila["3"].      "</td>";
				$tabla .="<td>" .toMoney($fila["4"]).      "</td>";

				$tabla .="<td>" .$fila["5"].      "</td>";
				$tabla .="<td class='anchoC'>";
				
				

                $tabla .="
				</td>";
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


function comboPresentacion()
{
	
//creacion de la tabla
	?>
     

	<?php
	
    $mysql = conexionMysql();
    $sql = "SELECT idpresentacion,descripcion,estado FROM presentacion WHERE Estado=1";
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

               

                $tabla .="<option value=\"".$fila["0"]."\">".utf8_encode($fila["1"])."</option>";
                
				
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


function tagsPresentacion($puntos)
{
	
    $mysql = conexionMysql();
    
    $res="";
	$squery="select idpresentacion,Descripcion from presentacion where estado=1";
		$ejecutar=$mysql->query($squery);
				if($ejecutar)
				{
					
					while($row=$ejecutar->fetch_row())
					{
						$res=$res."\"".$row['0']." ".utf8_encode($row['1'])."\",\n";
					}
				}
				else
				{
					$res=$squery;
				}
				
			return substr($res,0,(strlen($res)-2));
}
?>
