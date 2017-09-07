<?php



function mostrarConsignacionxCobrar($dato)
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
                  <th>Saldo</th>
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
           $sql = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombre,c.total,(select tv.Descripcion from tipoventa tv where tv.idtipo=c.tipoventa),c.idventas,(select u.user from usuarios u where u.idusuarios=c.idusuario),(select cong.saldo from consignacionxCob cong where cong.idventas=c.idventas order by cong.fecha desc limit 1) FROM ventas c inner join cliente p on p.idcliente=c.idcliente inner join ventasdetalle cd on cd.idventa=c.idventas inner join productos pd on pd.idproductos=cd.idproductos where c.estado=1 and cd.estado=1 and c.tipoventa=5 $busca group by c.idventas order by c.fecha desc";
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
    
                      $tabla .="<td>" .toMoney($fila["8"].'').      "</td>";
                    if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
                      {
                    $tabla .="<td>" .$fila["7"].      "</td>";
                    }
                    $tabla .="<td class='anchoC'>";
                      if($_SESSION['SOFT_ACCESOElimina'.'ventas']=='1')
                      {
                        $tabla .="<a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm editar' onclick=\"editar('".$fila["6"]."')\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>";
                        
                        }
                        
        
                        $tabla .="<a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm ver' onClick=\"ver('".$fila["6"]."');\"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>";
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


function mostrarMovimientosConsignacionxCobrar($id)
{

    //creacion de la tabla
?>

<table id='tabla' class='bordered centered highlight responsive-table centrarT'>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>Descripcion</th>
            <th>Abono</th>
            <!--<th>Credito</th>-->
            
            
        </tr>
    </thead>
    <tbody>
        <?php

    $mysql = conexionMysql();
    $sql = "SELECT cc.fecha,cc.descripcion,cc.retirado,cc.consignado FROM consignacionxCob cc  WHERE cc.idVentas=".$id['0'];
    $tabla="";
    if($resultado = $mysql->query($sql))
    {

        if(mysqli_num_rows($resultado)==0)
        {
            $respuesta = "<div class='error'>No hay movimientos BD vacia</div>";
        }

        else
        {

            while($fila = $resultado->fetch_row())
            {

                $tabla .= "<tr>";

                $tabla .="<td>"     .$fila["0"].    "</td>";
                $tabla .="<td>" .$fila["1"]."</td>";
                $tabla .="<td>" .toMoney($fila["2"]).      "</td>";
				//$tabla .="<td>" .toMoney($fila["3"]).      "</td>";
               
                $tabla .= "</tr>";
            }

            $resultado->free();//librerar variable


            $respuesta = $tabla;
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BssD".$sql."</div>";

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