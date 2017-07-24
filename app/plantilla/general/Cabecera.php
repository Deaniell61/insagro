
<?php
//echo date('Y-m-d');
		for($i=0;$i<count($_SESSION['notified1']);$i++)
		{
			($_SESSION['notified1'][($i)]="");
		}

		for($i=0;$i<count($_SESSION['notified22']);$i++)
		{
			($_SESSION['notified22'][($i)]="");
		}
		for($i=0;$i<count($_SESSION['notified2P']);$i++)
		{
			($_SESSION['notified2P'][($i)]="");
		}
$_SESSION['notified'] = nitificaciones();

if ($_SESSION['notified'] != 0) {
    $_SESSION['notified2'] = "(" . ($_SESSION['notified']) . ") ";
} else {
    $_SESSION['notified2'] = "";
}

function nitificaciones()
{
	$fecha3 = date('Y-m-d');
    $nuevafecha3 = strtotime ( '+5 day' , strtotime ( $fecha3 ) ) ;
	$hoy = date ( 'Y-m-d' , $nuevafecha3 );
	$contador = 0;
    	$sql = "select cc.fecha,cc.tipoPlazo,cc.plazo,cc.total,c.nombre,c.apellido,cc.idcuentasc from cuentascobrar cc inner join ventas v on cc.idventas=v.idventas inner join cliente c on c.idcliente=v.idcliente where cc.total>1  and cc.estado=1";
    $mysql = conexionMysql();

	if($resultado = $mysql->query($sql))
    {
		if($resultado->num_rows>0)
		{
			while($fila=$resultado->fetch_row())
			{
				$fecha1 = substr($fila[0],0,10);
				$tipoPlazo="";
				switch($fila[1])
				{
					case '1':
					{
						$tipoPlazo="day";
						break;
					}
					case '2':
					{
						$tipoPlazo="month";
						break;
					}
					case '3':
					{
						$tipoPlazo="year";
						break;
					}
				}
				$nuevafecha2 = strtotime ( '+28 day' , strtotime ( $fecha1 ) ) ;
				$fecha28 = date ( 'Y-m-d' , $nuevafecha2 );
				$fechaOri=$fecha1;
				$nuevafecha1 = strtotime ( '+'.$fila[2].' '.$tipoPlazo , strtotime ( $fecha1 ) ) ;
				$fecha1 = date ( 'Y-m-d' , $nuevafecha1 );

				//echo $fecha1."  ".$hoy;
				if($fecha1<=$hoy && $fila[3]>0)
				{

					$_SESSION['notified1'][($contador)] = $fila[4]." ".$fila[5]."  ".toMoney($fila[3]);//substr($fila[0],0,10);
					$_SESSION['direccione1'][($contador)] = $fila['6'];
					$contador++;
				}
				else
				if($fecha28<=$fecha3 && $fila[3]>0)
				{

					$_SESSION['notified1'][($contador)] = $fila[4]." ".$fila[5]."  ".toMoney($fila[3]);//substr($fila[0],0,10);
					$_SESSION['direccione1'][($contador)] = $fila['6'];
					$contador++;
				}
			}

		}
		else
		{

		}

    }
    else
    {
        echo 1;
    }

	$sql = "select cc.fecha,cc.tipoPlazo,cc.plazo,cc.total,c.nombreempresa,cc.idcuentasp from cuentaspagar cc inner join compras v on v.idcompras=cc.idcompras inner join proveedor c on c.idproveedor=v.iddistribuidor where cc.total>1 and cc.estado=1";
    $mysql = conexionMysql();

	if($resultado = $mysql->query($sql))
    {
		$contP=0;
		if($resultado->num_rows>0)
		{
			while($fila=$resultado->fetch_row())
			{
				$fecha1 = substr($fila[0],0,10);
				$tipoPlazo="";
				switch($fila[1])
				{
					case '1':
					{
						$tipoPlazo="day";
						break;
					}
					case '2':
					{
						$tipoPlazo="month";
						break;
					}
					case '3':
					{
						$tipoPlazo="year";
						break;
					}
				}
				$nuevafecha2 = strtotime ( '+28 day' , strtotime ( $fecha1 ) ) ;
				$fecha28 = date ( 'Y-m-d' , $nuevafecha2 );
				$fechaOri=$fecha1;
				$nuevafecha1 = strtotime ( '+'.$fila[2].' '.$tipoPlazo , strtotime ( $fecha1 ) ) ;
				$fecha1 = date ( 'Y-m-d' , $nuevafecha1 );
				if($fecha1<=$hoy && $fila[3]>0)
				{

					$_SESSION['notified22'][($contP)] = $fila[4]."    ".toMoney($fila[3]);//substr($fila[0],0,10);
					$_SESSION['direccione22'][($contP)] = $fila['5'];
					$contador++;
					$contP++;
				}
				else
				if($fecha28<=$fecha3 && $fila[3]>0)
				{

					$_SESSION['notified22'][($contP)] = $fila[4]."    ".toMoney($fila[3]);//substr($fila[0],0,10);
					$_SESSION['direccione22'][($contP)] = $fila['5'];
					$contador++;
					$contP++;
				}
			}

		}

	}
	else
		{
			echo '2';
		}
		//*****************************************************
	$sql = "select i.cantidad,i.minimo,p.nombre,p.codigoproducto from inventario i inner join productos p on i.idproducto=p.idproductos where i.cantidad>=0 and i.cantidad<=i.minimo and p.estado=1";
    $mysql = conexionMysql();

	if($resultado = $mysql->query($sql))
    {
		$contPr=0;
		if($resultado->num_rows>0)
		{
			while($fila=$resultado->fetch_row())
			{

				if($fila[0]<=$fila[1])
				{

					$_SESSION['notified2P'][($contPr)] = $fila[2]." - ".$fila[3];//substr($fila[0],0,10);
					$_SESSION['direccione2P'][($contPr)] = "?InventarioAdministrador&codigo=".$fila['3'];
					$contador++;
					$contPr++;
				}

			}

		}


    }



    $mysql->close();
	return $contador;
}

?>

<div class="navbar-fixed">
            <nav>
                <div class="nav-wrapper grey darken-4">
                    <a  class="brand-logo"><img class="logo" src="../app/img/logoinsagro1.png"/></a>
                     <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons"><img src="../app/img/ordenar.png"></i></a>


                         <ul class="right hide-on-med-and-down">

                <?php
				if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
				{
					?>
                <li><a class="right ayuda">
                	<img src="../app/img/mensajes/sinnotifiacion.svg" id="notified" onClick="if(document.getElementById('globoNotificacion').hidden){document.getElementById('globoNotificacion').hidden=false;}else{document.getElementById('globoNotificacion').hidden=true;}">

                <div id="notificationsCont" <?php if($_SESSION['notified']==0){echo "hidden";}else{echo "";}?>><strong id="cantNotified"><?php echo $_SESSION['notified'];?></strong></div>

                </a></li>

                 <?php }?>
						<li><a id="ayuda" class="right ayuda"><img class="ayudaI" src="../app/img/ayuda.png"></a></li>
						<li><a href="?Inicio"><h4 id="usuarioPrincipalLogiado"><?php echo $_SESSION['SOFT_USER'];?></h4> </a></li>
						<li><a class="right"  id="logout" href="#!">Cerrar Session</a></li>



							 <div id="globoNotificacion" hidden>
                         	<div id="notificacionesContenerdor">
                             <ul id="menuNotificacion" >
                        			<?php
											if($_SESSION['notified']>0)
											{
												if ($_SESSION['notified'] >= 10 && $_SESSION['notified'] < 100)
												{
													echo "<script>document.getElementById('notificationsCont').style.width='25px'; </script>";
												}
												else
												if ($_SESSION['notified'] >= 100)
												{
													echo "<script>document.getElementById('notificationsCont').style.width='32px';</script>";
												}
												echo "
													<li class=\"tituloNotifica\" >Cuentas por Cobrar </li>
													";
													
												
												
												for($i=0;$i<count($_SESSION['notified1']);$i++)
												{
													if($_SESSION['notified1'][($i)]!="" && $_SESSION['notified1'][($i)]!=NULL)
													{
												echo "
													<li class=\"listaNotificacion\" onClick=\"location.href='?Cobrar&fd=".$_SESSION['direccione1'][($i)]."'\">".$_SESSION['notified1'][($i)]." </li>
													";
													}
												}
												
												echo "
													<li class=\"tituloNotifica\" >Cuentas por Pagar </li>
													";
												for($i=0;$i<count($_SESSION['notified22']);$i++)
												{
													if($_SESSION['notified22'][($i)]!="" && $_SESSION['notified22'][($i)]!=NULL)
													{
												echo "
													<li class=\"listaNotificacion\"  onClick=\"location.href='?Pagar&fd=".$_SESSION['direccione22'][($i)]."'\">".$_SESSION['notified22'][($i)]." </li>
													";
													}
												}
												
												echo "
													<li class=\"tituloNotifica\" >Productos Escasos</li>
													";
												for($i=0;$i<count($_SESSION['notified2P']);$i++)
												{
													if($_SESSION['notified2P'][($i)]!="" && $_SESSION['notified2P'][($i)]!=NULL)
													{
												echo "
													<li class=\"listaNotificacion\"  onClick=\"location.href='".$_SESSION['direccione2P'][($i)]."'\">".$_SESSION['notified2P'][($i)]." </li>
													";
													}
												}
											} else {
												echo "
										<li class=\"listaNotificacion\">No tiene notificacines pendientes</li>
										";
											}
													?>
                            </ul>
    </div>
                       	</div>
                    </ul>

                </div>
            </nav>
        </div>

<!-- mobil -->
      <ul class="side-nav" id="mobile-demo">
				<li><a style="cursor:pointer;" href="?Inicio"><h4 id="ocultarmensaje"><?php echo $_SESSION['SOFT_USER'];?></h4> </a></li>
				 <li><div class="divider"></div></li>
        <li><a id="ayuda" href="?Ayuda" class="ayuda" style="cursor:pointer;">Ayuda</a></li>
		
 <li><a id="mensaje" onclick="mostrar()"  class="ayuda" style="cursor:pointer;" >Mensajes <?php echo $_SESSION['notified2'];?></a></li>

		<div id="globoN" hidden >
							 <div id="notificacionesContenerdor">
									<ul id="menuNotificacion" >
									 <?php
					 if($_SESSION['notified']>0)
					 {
						 if ($_SESSION['notified'] >= 10 && $_SESSION['notified'] < 100)
						 {
							 echo "<script>document.getElementById('notificationsCont').style.width='25px'; </script>";
						 }
						 else
						 if ($_SESSION['notified'] >= 100)
						 {
							 echo "<script>document.getElementById('notificationsCont').style.width='32px';</script>";
						 }
						 echo "
							 <li class=\"tituloNotifica\" >Cuentas por Cobrar </li>
							 ";
						 for($i=0;$i<count($_SESSION['notified1']);$i++)
						 {
						 echo "
							 <li class=\"listaNotificacion\" onClick=\"location.href='?Cobrar'\">".$_SESSION['notified1'][($i)]." </li>
							 ";
						 }
						 echo "
							 <li class=\"tituloNotifica\" >Cuentas por Pagar </li>
							 ";
						 for($i=0;$i<count($_SESSION['notified22']);$i++)
						 {
						 echo "
							 <li class=\"listaNotificacion\"  onClick=\"location.href='?Cobrar'\">".$_SESSION['notified22'][($i)]." </li>
							 ";
						 }
						 echo "
							 <li class=\"tituloNotifica\" >Productos Escasos</li>
							 ";
						 for($i=0;$i<count($_SESSION['notified2P']);$i++)
						 {
						 echo "
							 <li class=\"listaNotificacion\"  onClick=\"location.href='".$_SESSION['direccione2P'][($i)]."'\">".$_SESSION['notified2P'][($i)]." </li>
							 ";
						 }
					 } else {
						 echo "
				 <li class=\"listaNotificacion\">No tiene notificacines pendientes</li>
				 ";
					 }
							 ?>
								 </ul>
</div>
						 </div>
                 <li><a id="logoutR" style="cursor:pointer;">Cerrar Session</a></li>

      </ul>
<!-- mobil -->
