  <?php


  function mostrarVentas($datos)
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
              <th>No. Comprobante</th>
              <th>Nit</th>
              <th>Cliente</th>
              <th>Total</th>
              <th>Tipo de Venta</th>
              <?php
			  if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
  				{
					?>
              <th>Vendedor</th>
              <?php } ?>
                <th></th>

          </tr>
      </thead>
      <tbody>
          <?php
  	$extra="";
      $mysql = conexionMysql();
       $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombre,c.total,(select tv.Descripcion from tipoventa tv where tv.idtipo=c.tipoventa),c.idventas,(select u.user from usuarios u where u.idusuarios=c.idusuario) FROM ventas c inner join cliente p on p.idcliente=c.idcliente inner join ventasdetalle cd on cd.idventa=c.idventas inner join productos pd on pd.idproductos=cd.idproductos where c.estado=1 and cd.estado=1 $busca group by c.idventas order by c.fecha desc";
      $tabla="";
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

                  $tabla .="<td>"     .substr($fila["0"],0,10).    "</td>";
                  $tabla .="<td>" .$fila["1"].      "</td>";
                  $tabla .="<td>" .$fila["2"].      "</td>";
  				$tabla .="<td>" .$fila["3"].      "</td>";
  				$tabla .="<td>" .toMoney($fila["4"]).      "</td>";

  				$tabla .="<td>" .$fila["5"].      "</td>";
				if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
  				{
				$tabla .="<td>" .$fila["7"].      "</td>";
				}
				$tabla .="<td class='anchoC'>";
  				if($_SESSION['SOFT_ACCESOElimina'.'ventas']=='1')
  				{
                  $tabla .="<a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm ' onClick=\"anularVenta('".$fila["6"]."');\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a>";
  				}



                  $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm modalver'  onClick=\"buscarVenta('".$fila["6"]."');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>";
                  //$tabla .="<a class='waves-effect waves-light btn green dark-1 modal-trigger botonesm'  onClick=\"imprimirFactura('".$fila["6"]."','mensaje3');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/imprimir.png' /></i></a></td>";
                  $tabla .= "</tr>";
  				$contaId++;
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

  function cargarDetalleVentas($id)
  {


$total=0;
      //creacion de la tabla
  ?>

  <table id='tabla2' class='bordered centered highlight responsive-table centrarT'>
      <thead>
          <tr>
          		<th style="display:none;"></th>
              <th>ID</th>
              <th>Producto</th>
              <th>Tipo</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>SubTotal</th>
              <th></th>


          </tr>
      </thead>
      <tbody>
          <?php
  	$extra="";
      $mysql = conexionMysql();

     $sql = "SELECT cd.idventadetalle,(select p.nombre from productos p where p.idproductos=cd.idproductos),cd.precio,cd.cantidad,cd.subtotal,(select p.tiporepuesto from productos p where p.idproductos=cd.idproductos),cd.idproductos,(select p.codigoproducto from productos p where p.idproductos=cd.idproductos) FROM ventasdetalle cd where cd.idventa='".$id."'";
      $tabla="";
      $tabla.="<script>

                        if(document.getElementById('botonNuevo')){
                                $('#botonNuevo').show();
                                document.getElementById('botonNuevo111').innerHTML='';
                            }
                    </script>";
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
                    $tabla .="<td  id=\"Codigo$contaId\" style=\"display:none;\">"     .$fila["6"].    "</td>";

                    $tabla .="<td>" .$fila["7"].    "</td>";
                    $tabla .="<td>" .$fila["1"].      "</td>";
                    $tabla .="<td>" .$tipo[$fila["5"]].      "</td>";
                    $tabla .="<td>" .toMoney($fila["2"]).      "</td>";
                    $tabla .="<td id=\"Cantidad$contaId\">" .$fila["3"].      "</td>";
                    $tabla .="<td>" .toMoney($fila["4"]).      "</td>";

                    $tabla .="<td class='anchoC'><a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm ' onClick=\"anularDetalleVenta1('".$fila["0"]."');\"><i class='material-icons left'><img class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a><td>";

                    $tabla .= "</tr>";
                    $contaId++;
                    $total=$total+$fila["4"];
                
                if($contaId==13){
                    $tabla.="<script>

                        if(document.getElementById('modal1')){
                            cierre();
                                $('#modal1').closeModal();
                            }
                        if(document.getElementById('botonNuevo')){
                                
                                $('#botonNuevo').hide();
                                document.getElementById('botonNuevo111').innerHTML='Alcanzo el maximo de Filas permitidas';
                            }
                    </script>";
                }
              }

              $resultado->free();//librerar variable
				$tabla .= "<script>

	document.getElementById('totalVenta').innerHTML='Total de esta Venta: <strong>".toMoney($total)."</strong>';
    if(document.getElementById('totalNoInventario')){
        totalPermitido=parseFloat(document.getElementById('totalNoInventario').innerHTML.replace('Total: Q.',''));
        total=$total;
        document.getElementById('totalCompleto').innerHTML='Total de Todos los Productos: Q.'+(total+totalPermitido);
    }
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
  
  
  function mostrarVentasPorFecha($datos)
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
              <th>No. Comprobante</th>
              <th>Nit</th>
              <th>Cliente</th>
              <th>Total</th>
              <th>Tipo de Venta</th>
              <?php
			  if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
  				{
					?>
              <th>Vendedor</th>
              <?php } ?>
                <th></th>

          </tr>
      </thead>
      <tbody>
          <?php
  	$extra="";
      $mysql = conexionMysql();
       $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombre,c.total,(select tv.Descripcion from tipoventa tv where tv.idtipo=c.tipoventa),c.idventas,(select u.user from usuarios u where u.idusuarios=c.idusuario) FROM ventas c inner join cliente p on p.idcliente=c.idcliente inner join ventasdetalle cd on cd.idventa=c.idventas inner join productos pd on pd.idproductos=cd.idproductos where (c.fecha>'".$datos[1]."' and c.fecha<='".$datos[2]."') and c.estado=1 and cd.estado=1 and tipoventa=1 $busca group by c.idventas order by c.fecha desc";
      $tabla="";
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

                  $tabla .="<td>"     .substr($fila["0"],0,10).    "</td>";
                  $tabla .="<td>" .$fila["1"].      "</td>";
                  $tabla .="<td>" .$fila["2"].      "</td>";
  				$tabla .="<td>" .$fila["3"].      "</td>";
  				$tabla .="<td>" .toMoney($fila["4"]).      "</td>";

  				$tabla .="<td>" .$fila["5"].      "</td>";
				if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
  				{
				$tabla .="<td>" .$fila["7"].      "</td>";
				}
				$tabla .="<td class='anchoC'>";
  				



                  $tabla .="</td>";
                  $tabla .= "</tr>";
  				$contaId++;
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

  function mostrarVentasPorFechaCredito($datos)
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
              <th>No. Comprobante</th>
              <th>Nit</th>
              <th>Cliente</th>
              <th>Total</th>
              <th>Tipo de Venta</th>
              <?php
			  if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
  				{
					?>
              <th>Vendedor</th>
              <?php } ?>
                <th></th>

          </tr>
      </thead>
      <tbody>
          <?php
  	$extra="";
      $mysql = conexionMysql();
       $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombre,c.total,(select tv.Descripcion from tipoventa tv where tv.idtipo=c.tipoventa),c.idventas,(select u.user from usuarios u where u.idusuarios=c.idusuario) FROM ventas c inner join cliente p on p.idcliente=c.idcliente inner join ventasdetalle cd on cd.idventa=c.idventas inner join productos pd on pd.idproductos=cd.idproductos where (c.fecha>'".$datos[1]."' and c.fecha<='".$datos[2]."') and c.estado=1 and cd.estado=1 and tipoventa=2 $busca group by c.idventas order by c.fecha desc";
      $tabla="";
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

                  $tabla .="<td>"     .substr($fila["0"],0,10).    "</td>";
                  $tabla .="<td>" .$fila["1"].      "</td>";
                  $tabla .="<td>" .$fila["2"].      "</td>";
  				$tabla .="<td>" .$fila["3"].      "</td>";
  				$tabla .="<td>" .toMoney($fila["4"]).      "</td>";

  				$tabla .="<td>" .$fila["5"].      "</td>";
				if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
  				{
				$tabla .="<td>" .$fila["7"].      "</td>";
				}
				$tabla .="<td class='anchoC'>";
  				



                  $tabla .="</td>";
                  $tabla .= "</tr>";
  				$contaId++;
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
