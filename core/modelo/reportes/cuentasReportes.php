<?php
require_once ('../../conf.php');
require_once ('../../lib/conexion.php');
require_once ('../../lib/PHPExcel/PHPExcel.php');

    switch($_GET['tipo']){
        case "1":{
            CuentasCobrarPorCliente();
            break;
        }
        case "2":{
            CuentasCobrarVencidas();
            break;
        }
        case "3":{
            CuentasPagarPorCliente();
            break;
        }
        case "4":{
            CuentasPagarVencidas();
            break;
        }
    }
function CuentasCobrarPorCliente(){



$objPHPExcel = new PHPExcel();
   
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("DAWESystems")
        ->setLastModifiedBy("DAWESystems")
        ->setTitle("Cuentas")
        ->setSubject("Reporte_Cuentas")
        ->setDescription("Reporte de Cuentas")
        ->setKeywords("Cuentas")
        ->setCategory("ciudades");    
$objPHPExcel->getSheetCount();//cuenta las pestañas
	
	
	$estiloTituloCanales = array(
    'font' => array(
        		'name'  => 'Arial',
        		'bold'  => true,
        		'color' => array(
            					'rgb' => '000000'
        						)
    				),
    'borders' => array(
        				'top' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
        				'bottom' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            											)
        									),
						'left' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
						'right' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
    					),
    'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        					'wrap'      => TRUE
    						)
	);
    $estiloTituloColumnas = array(
    'font' => array(
        		'name'  => 'Arial',
        		'bold'  => true,
        		'color' => array(
            					'rgb' => 'FFFFFF'
        						)
    				),
    'fill' => array(
        			'type'=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
  					'rotation'=> 90,
        			'startcolor' => array(
            								'rgb' => '000000'
        								),
        			'endcolor' => array(
            							'argb' => 'FF431a5d'
        								)
    				),
    'borders' => array(
        				'top' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
        				'bottom' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            											)
        									),
						'left' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
						'right' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
    					),
    'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        					'wrap'      => TRUE
    						)
	);
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    	'font' => array(
        	'name'  => 'Arial',
        	'color' => array(
            				'rgb' => '000000'
        					)
    				),
    	'fill' => array(
  					'type'  => PHPExcel_Style_Fill::FILL_SOLID
  						),
    	'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    						),
    	'borders' => array(
        			'left' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'right' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'top' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'bottom' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							)

    					),
					
				));
	$estiloInformacion2 = new PHPExcel_Style();
	$estiloInformacion2->applyFromArray( array(
    	'font' => array(
        	'name'  => 'Arial',
        	'color' => array(
            				'rgb' => '000000'
        					)
    				),
    	'fill' => array(
  					'type'  => PHPExcel_Style_Fill::FILL_SOLID
  						),
    	'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    						),
    	'borders' => array(
        			'left' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'right' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'top' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'bottom' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							)

    					),
					
				));
	$positionInExcel=0;//esto es para que ponga la nueva pestaña al principio
session_start();
if(isset($_SESSION['codigoBuscaCobrar_SOFT']))
{
	if($_SESSION['codigoBuscaCobrar_SOFT']!="")
	{
		$mas=" and cc.idcuentasc='".$_SESSION['codigoBuscaCobrar_SOFT']."' ";
	}
	else
		{
			$mas="";
		}
}
else
{
	$mas="";
}
	//creamos la pestaña
	
	$o=0;
	
	$i = 2;

	

$mysql = conexionMysql();
    $sqlClientes = "SELECT c.idcliente,c.nombre,c.apellido FROM cliente c inner join ventas v on v.idcliente=c.idcliente inner join cuentascobrar cc on cc.idventas=v.idventas where v.estado=1 and cc.estado=1 and c.estado=1 and v.tipoventa=2 group by c.idcliente";
    $fecha=date('Y-m-d');
	$cont=0;
    if($resultadoClientes = $mysql->query($sqlClientes))
    {

        if(mysqli_num_rows($resultadoClientes)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

            while($filaClientes = $resultadoClientes->fetch_row())
            {

                 $plazo = array('','Dia','Mes','Año');
            $objPHPExcel->setActiveSheetIndex($o)
            ->setCellValue('A'.$i, "Cliente: ".$filaClientes[1]." ".$filaClientes[2].""); 
            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':E'.$i.'')->applyFromArray($estiloTituloCanales);
            $i++;  
			
            $sqlCuentas="select cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,(select sum(abono) from movimientosc mc where mc.idcuentasc=cc.idcuentasc),(select v.nocomprobante from ventas v where v.idventas=cc.idventas) from cuentascobrar cc inner join ventas v on cc.idventas=v.idventas where v.idcliente='".$filaClientes[0]."' and v.estado=1 and cc.estado=1 group by cc.idcuentasc";
            if($resultadoCuentas = $mysql->query($sqlCuentas))
            {

                if(mysqli_num_rows($resultadoCuentas)==0)
                {
                    $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
                }

                else
                {
                    $plazo = array('','Dia','Mes','Año');
                    $objPHPExcel->setActiveSheetIndex($o)
                        ->setCellValue('A'.$i, "Fecha")
                        ->setCellValue('B'.$i, "Plazo")
                        ->setCellValue('C'.$i, "Dias Transcurridos")
                        ->setCellValue('D'.$i, "Comprobante")
                        ->setCellValue('E'.$i, "Total Credito")
                        ->setCellValue('F'.$i, "Abonado")
                        ->setCellValue('G'.$i, "Saldo"); 
                        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':G'.$i.'')->applyFromArray($estiloTituloColumnas);
                        $i++;
						$ini=0;
                    while($filaCuentas = $resultadoCuentas->fetch_row())
                    {
						$segundos=strtotime($fecha) - strtotime($filaCuentas["0"]); //para tu fecha de ejmplo
						$diferencia_dias=intval($segundos/60/60/24);
                        $objPHPExcel->setActiveSheetIndex($o)
                            ->setCellValue('A'.$i, $filaCuentas["0"])
                            ->setCellValue('B'.$i, $filaCuentas["1"]." ".$plazo[$filaCuentas["2"]])
                            ->setCellValue('C'.$i, $diferencia_dias)
                            ->setCellValue('D'.$i, $filaCuentas["6"])
                            ->setCellValue('E'.$i, toMoney($filaCuentas["3"]))
                            ->setCellValue('F'.$i, toMoney($filaCuentas["5"]))
                            ->setCellValue('G'.$i, toMoney($filaCuentas["4"])); 
                            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "B".$i.":G".$i);
	                        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "A".($i).":A".$i);
                            $i++;
							$ini+=$filaCuentas["4"];
                         
                    }
					$objPHPExcel->setActiveSheetIndex($o)
                            ->setCellValue('G'.$i, $ini);
							$i++; 

                }
                $resultadoCuentas->free();
            }
				
                
		$i++;

            }

            $resultadoClientes->free();//librerar variable


           
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }

    //cierro la conexion
    $mysql->close();

   //$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
   //$objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloCanales);

   
   $objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
   
    
	$objPHPExcel->getActiveSheet() ->getStyle('E1:G'.$i) ->getNumberFormat() ->setFormatCode( '_-Q* #,##0_-;-Q* #,##0_-;_-Q* "-"_-;_-@_-' );
   #$myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'My Data');
   #$objPHPExcel->addSheet($myWorkSheet, 0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Cuentas_Cobrar_Por_Cliente.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
		



}

function CuentasCobrarVencidas(){


$objPHPExcel = new PHPExcel();
   
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("DAWESystems")
        ->setLastModifiedBy("DAWESystems")
        ->setTitle("Productos")
        ->setSubject("Reporte_Productos")
        ->setDescription("Reporte de Productos")
        ->setKeywords("Productos")
        ->setCategory("ciudades");    
$objPHPExcel->getSheetCount();//cuenta las pestañas
	
	$estiloTituloColumnas = array(
    'font' => array(
        		'name'  => 'Arial',
        		'bold'  => true,
        		'color' => array(
            					'rgb' => 'FFFFFF'
        						)
    				),
    'fill' => array(
        			'type'=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
  					'rotation'=> 90,
        			'startcolor' => array(
            								'rgb' => '000000'
        								),
        			'endcolor' => array(
            							'argb' => 'FF431a5d'
        								)
    				),
    'borders' => array(
        				'top' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
        				'bottom' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            											)
        									),
						'left' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
						'right' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
    					),
    'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        					'wrap'      => TRUE
    						)
	);
	$estiloTituloCanales = array(
    'font' => array(
        		'name'  => 'Arial',
        		'bold'  => true,
        		'color' => array(
            					'rgb' => '000000'
        						)
    				),
    'borders' => array(
        				'top' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
        				'bottom' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            											)
        									),
						'left' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
						'right' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
    					),
    'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        					'wrap'      => TRUE
    						)
	);

	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    	'font' => array(
        	'name'  => 'Arial',
        	'color' => array(
            				'rgb' => '000000'
        					)
    				),
    	'fill' => array(
  					'type'  => PHPExcel_Style_Fill::FILL_SOLID
  						),
    	'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    						),
    	'borders' => array(
        			'left' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'right' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'top' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'bottom' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							)

    					),
					
				));

	$estiloInformacion2 = new PHPExcel_Style();
	$estiloInformacion2->applyFromArray( array(
    	'font' => array(
        	'name'  => 'Arial',
        	'color' => array(
            				'rgb' => '000000'
        					)
    				),
    	'fill' => array(
  					'type'  => PHPExcel_Style_Fill::FILL_SOLID
  						),
    	'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    						),
    	'borders' => array(
        			'left' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'right' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'top' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'bottom' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							)

    					),
					
				));
	$positionInExcel=0;//esto es para que ponga la nueva pestaña al principio
session_start();
if(isset($_SESSION['codigoBuscaCobrar_SOFT']))
{
	if($_SESSION['codigoBuscaCobrar_SOFT']!="")
	{
		$mas=" and cc.idcuentasc='".$_SESSION['codigoBuscaCobrar_SOFT']."' ";
	}
	else
		{
			$mas="";
		}
}
else
{
	$mas="";
}
	//creamos la pestaña
	
	$o=0;
	
	$i = 2;
     $plazo = array('','day','month','year');
            $plazo2 = array('','Dia','Mes','Año');

	$objPHPExcel->setActiveSheetIndex($o)
            ->setCellValue('A'.$i, "Fecha")
			->setCellValue('B'.$i, "Plazo")
			->setCellValue('C'.$i, "Dias Transcurridos")
			->setCellValue('D'.$i, "Comprobante")
			->setCellValue('E'.$i, "Cliente")
			->setCellValue('F'.$i, "Total Credito")
			->setCellValue('G'.$i, "Abonado")
			->setCellValue('H'.$i, "Saldo"); 
   $i++;   

$mysql = conexionMysql();
    $sql="select cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,(select sum(abono) from movimientosc mc where mc.idcuentasc=cc.idcuentasc),(select v.nocomprobante from ventas v where v.idventas=cc.idventas),(select cl.nombre from cliente cl where cl.idcliente=v.idcliente),(select cl.apellido from cliente cl where cl.idcliente=v.idcliente) from cuentascobrar cc inner join ventas v on cc.idventas=v.idventas where v.estado=1 and cc.estado=1 $mas group by cc.idcuentasc";
	$fecha=date('Y-m-d');
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

                $fechaINI = $fila["0"];
				$fechaHOY = date('Y-m-d');
                if($fila[1]>0){
                    $nuevafecha = strtotime ( '+'.$fila[1].' '.$plazo[$fila["2"]] , strtotime ( $fechaINI ) ) ;
                }else{
                    $nuevafecha = strtotime ( '+'.($fila[1]*(-1)).' '.$plazo[$fila["2"]] , strtotime ( $fechaINI ) ) ;
                }
                $fechaPAGO = date ( 'Y-m-d' , $nuevafecha );
$cont++;
                if($fechaHOY>$fechaPAGO)
                {
					$segundos=strtotime($fecha) - strtotime($fila["0"]); //para tu fecha de ejmplo
						$diferencia_dias=intval($segundos/60/60/24);
				
				$objPHPExcel->setActiveSheetIndex($o)
                    ->setCellValue('A'.$i, $fila["0"])
                    ->setCellValue('B'.$i, $fila["1"]." ".$plazo2[$fila["2"]])
					->setCellValue('C'.$i, $diferencia_dias)
					->setCellValue('D'.$i, $fila["6"])
                    ->setCellValue('E'.$i, $fila["7"]." ".$fila["8"])
                    ->setCellValue('F'.$i, toMoney($fila["3"]))
                    ->setCellValue('G'.$i, toMoney($fila["5"]))
                    ->setCellValue('H'.$i, toMoney($fila["4"])); 
                    
                    $i++;}

            }

            $resultado->free();//librerar variable


           
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }

    //cierro la conexion
    $mysql->close();

   //$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
   //$objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloCanales);

   $objPHPExcel->getActiveSheet()->getStyle('A2:H2')->applyFromArray($estiloTituloColumnas);
   $objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
   
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "B3:H".($i-1));
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "A3:A".($i-1));
    $objPHPExcel->getActiveSheet() ->getStyle('E1:H'.$i) ->getNumberFormat() ->setFormatCode( '_-Q* #,##0_-;-Q* #,##0_-;_-Q* "-"_-;_-@_-' );
 #$myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'My Data');
   #$objPHPExcel->addSheet($myWorkSheet, 0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="CuentasCobrarVencidas.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
		
}
	

function CuentasPagarPorCliente(){

$objPHPExcel = new PHPExcel();
   
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("DAWESystems")
        ->setLastModifiedBy("DAWESystems")
        ->setTitle("Cuentas")
        ->setSubject("Reporte_Cuentas")
        ->setDescription("Reporte de Cuentas")
        ->setKeywords("Cuentas")
        ->setCategory("ciudades");    
$objPHPExcel->getSheetCount();//cuenta las pestañas
	
	
	$estiloTituloCanales = array(
    'font' => array(
        		'name'  => 'Arial',
        		'bold'  => true,
        		'color' => array(
            					'rgb' => '000000'
        						)
    				),
    'borders' => array(
        				'top' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
        				'bottom' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            											)
        									),
						'left' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
						'right' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
    					),
    'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        					'wrap'      => TRUE
    						)
	);
    $estiloTituloColumnas = array(
    'font' => array(
        		'name'  => 'Arial',
        		'bold'  => true,
        		'color' => array(
            					'rgb' => 'FFFFFF'
        						)
    				),
    'fill' => array(
        			'type'=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
  					'rotation'=> 90,
        			'startcolor' => array(
            								'rgb' => '000000'
        								),
        			'endcolor' => array(
            							'argb' => 'FF431a5d'
        								)
    				),
    'borders' => array(
        				'top' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
        				'bottom' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            											)
        									),
						'left' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
						'right' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
    					),
    'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        					'wrap'      => TRUE
    						)
	);
	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    	'font' => array(
        	'name'  => 'Arial',
        	'color' => array(
            				'rgb' => '000000'
        					)
    				),
    	'fill' => array(
  					'type'  => PHPExcel_Style_Fill::FILL_SOLID
  						),
    	'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    						),
    	'borders' => array(
        			'left' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'right' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'top' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'bottom' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							)

    					),
					
				));
	$estiloInformacion2 = new PHPExcel_Style();
	$estiloInformacion2->applyFromArray( array(
    	'font' => array(
        	'name'  => 'Arial',
        	'color' => array(
            				'rgb' => '000000'
        					)
    				),
    	'fill' => array(
  					'type'  => PHPExcel_Style_Fill::FILL_SOLID
  						),
    	'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    						),
    	'borders' => array(
        			'left' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'right' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'top' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'bottom' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							)

    					),
					
				));
	$positionInExcel=0;//esto es para que ponga la nueva pestaña al principio
session_start();
if(isset($_SESSION['codigoBuscaPagar_SOFT']))
{
	if($_SESSION['codigoBuscaPagar_SOFT']!="")
	{
		$mas=" and cc.idcuentasp='".$_SESSION['codigoBuscaPagar_SOFT']."' ";
	}
	else
		{
			$mas="";
		}
}
else
{
	$mas="";
}
	//creamos la pestaña
	
	$o=0;
	
	$i = 2;

	

$mysql = conexionMysql();
    $sqlClientes = "SELECT c.idproveedor,c.nombreempresa FROM proveedor c inner join compras v on v.iddistribuidor=c.idproveedor inner join cuentaspagar cc on cc.idcompras=v.idcompras where v.estado=1 and cc.estado=1 and c.estado=1 and v.tipocompra=2 $mas group by c.idproveedor";
 $fecha=date('Y-m-d');
	$cont=0;
    if($resultadoClientes = $mysql->query($sqlClientes))
    {

        if(mysqli_num_rows($resultadoClientes)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

            while($filaClientes = $resultadoClientes->fetch_row())
            {

                 $plazo = array('','Dia','Mes','Año');
            $objPHPExcel->setActiveSheetIndex($o)
            ->setCellValue('A'.$i, "Proveedor: ".$filaClientes[1].""); 
            $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':E'.$i.'')->applyFromArray($estiloTituloCanales);
            $i++;  

            $sqlCuentas="select cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,(select sum(abono) from movimientosp mc where mc.idcuentasp=cc.idcuentasp),(select v.nocomprobante from compras v where v.idcompras=cc.idcompras) from cuentaspagar cc inner join compras v on cc.idcompras=v.idcompras where v.iddistribuidor='".$filaClientes[0]."' and v.estado=1 and cc.estado=1 group by cc.idcuentasp";
            if($resultadoCuentas = $mysql->query($sqlCuentas))
            {

                if(mysqli_num_rows($resultadoCuentas)==0)
                {
                    $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
                }

                else
                {
                    $plazo = array('','Dia','Mes','Año');
                    $objPHPExcel->setActiveSheetIndex($o)
                        ->setCellValue('A'.$i, "Fecha")
                        ->setCellValue('B'.$i, "Plazo")
                        ->setCellValue('C'.$i, "Dias Transcurridos")
                        ->setCellValue('D'.$i, "Comprobante")
                        ->setCellValue('E'.$i, "Total Credito")
                        ->setCellValue('F'.$i, "Abonado")
                        ->setCellValue('G'.$i, "Saldo"); 
                        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':G'.$i.'')->applyFromArray($estiloTituloColumnas);
                        $i++;
						$ini=$i;
                    while($filaCuentas = $resultadoCuentas->fetch_row())
                    {
						$segundos=strtotime($fecha) - strtotime($filaCuentas["0"]); //para tu fecha de ejmplo
						$diferencia_dias=intval($segundos/60/60/24);
                        $objPHPExcel->setActiveSheetIndex($o)
                            ->setCellValue('A'.$i, $filaCuentas["0"])
                            ->setCellValue('B'.$i, $filaCuentas["1"]." ".$plazo[$filaCuentas["2"]])
                            ->setCellValue('C'.$i, $diferencia_dias)
                            ->setCellValue('D'.$i, $filaCuentas["6"])
                            ->setCellValue('E'.$i, toMoney($filaCuentas["3"]))
                            ->setCellValue('F'.$i, toMoney($filaCuentas["5"]))
                            ->setCellValue('G'.$i, toMoney($filaCuentas["4"])); 
                            $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "B".$i.":G".$i);
	                        $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "A".($i).":A".$i);
                            $i++;
                         
                    }
					$objPHPExcel->setActiveSheetIndex($o)
                            ->setCellValue('G'.$i, "'=SUMA(G".$ini.":G".($i-1).")");
							$i++; 

                }
                $resultadoCuentas->free();
            }
				
                
		$i++;

            }

            $resultadoClientes->free();//librerar variable


           
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }

    //cierro la conexion
    $mysql->close();

   //$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
   //$objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloCanales);

   
   $objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
   
    
	$objPHPExcel->getActiveSheet()->getStyle('E1:G'.$i)->getNumberFormat()->setFormatCode( "_-Q* #,##0_-;-Q* #,##0_-;_-Q* "-"_-;_-@_-");
   #$myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'My Data');
   #$objPHPExcel->addSheet($myWorkSheet, 0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Cuentas_Pagar_Por_Proveedor.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
	
  

}

function CuentasPagarVencidas(){





$objPHPExcel = new PHPExcel();
   
   //Informacion del excel
   $objPHPExcel->
    getProperties()
        ->setCreator("DAWESystems")
        ->setLastModifiedBy("DAWESystems")
        ->setTitle("Productos")
        ->setSubject("Reporte_Productos")
        ->setDescription("Reporte de Productos")
        ->setKeywords("Productos")
        ->setCategory("ciudades");    
$objPHPExcel->getSheetCount();//cuenta las pestañas
	
	$estiloTituloColumnas = array(
    'font' => array(
        		'name'  => 'Arial',
        		'bold'  => true,
        		'color' => array(
            					'rgb' => 'FFFFFF'
        						)
    				),
    'fill' => array(
        			'type'=> PHPExcel_Style_Fill::FILL_GRADIENT_LINEAR,
  					'rotation'=> 90,
        			'startcolor' => array(
            								'rgb' => '000000'
        								),
        			'endcolor' => array(
            							'argb' => 'FF431a5d'
        								)
    				),
    'borders' => array(
        				'top' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
        				'bottom' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            											)
        									),
						'left' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
						'right' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
    					),
    'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        					'wrap'      => TRUE
    						)
	);
	$estiloTituloCanales = array(
    'font' => array(
        		'name'  => 'Arial',
        		'bold'  => true,
        		'color' => array(
            					'rgb' => '000000'
        						)
    				),
    'borders' => array(
        				'top' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
        				'bottom' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            											)
        									),
						'left' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
						'right' => array(
            							'style' => PHPExcel_Style_Border::BORDER_MEDIUM ,
            							'color' => array(
                										'rgb' => '143860'
            												)
        								),
    					),
    'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER,
        					'wrap'      => TRUE
    						)
	);

	$estiloInformacion = new PHPExcel_Style();
	$estiloInformacion->applyFromArray( array(
    	'font' => array(
        	'name'  => 'Arial',
        	'color' => array(
            				'rgb' => '000000'
        					)
    				),
    	'fill' => array(
  					'type'  => PHPExcel_Style_Fill::FILL_SOLID
  						),
    	'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    						),
    	'borders' => array(
        			'left' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'right' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'top' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'bottom' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							)

    					),
					
				));

	$estiloInformacion2 = new PHPExcel_Style();
	$estiloInformacion2->applyFromArray( array(
    	'font' => array(
        	'name'  => 'Arial',
        	'color' => array(
            				'rgb' => '000000'
        					)
    				),
    	'fill' => array(
  					'type'  => PHPExcel_Style_Fill::FILL_SOLID
  						),
    	'alignment' =>  array(
        					'horizontal'=> PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
        					'vertical'  => PHPExcel_Style_Alignment::VERTICAL_CENTER
    						),
    	'borders' => array(
        			'left' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'right' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'top' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							),
					'bottom' => array(
            					'style' => PHPExcel_Style_Border::BORDER_THIN 
        							)

    					),
					
				));
	$positionInExcel=0;//esto es para que ponga la nueva pestaña al principio
session_start();
if(isset($_SESSION['codigoBuscaCobrar_SOFT']))
{
	if($_SESSION['codigoBuscaCobrar_SOFT']!="")
	{
		$mas=" and cc.idcuentasc='".$_SESSION['codigoBuscaCobrar_SOFT']."' ";
	}
	else
		{
			$mas="";
		}
}
else
{
	$mas="";
}
	//creamos la pestaña
	
	$o=0;
	
	$i = 2;
     $plazo = array('','day','month','year');
            $plazo2 = array('','Dia','Mes','Año');

	$objPHPExcel->setActiveSheetIndex($o)
            ->setCellValue('A'.$i, "Fecha")
			->setCellValue('B'.$i, "Plazo")
			->setCellValue('C'.$i, "Dias Transcurridos")
			->setCellValue('D'.$i, "Comprobante")
			->setCellValue('E'.$i, "Proveedor")
			->setCellValue('F'.$i, "Total Credito")
			->setCellValue('G'.$i, "Abonado")
			->setCellValue('H'.$i, "Saldo");  
   $i++;   

$mysql = conexionMysql();
    $sql="select cc.fecha,cc.plazo,cc.tipoPlazo,cc.creditodado,cc.total,(select sum(abono) from movimientosp mc where mc.idcuentasp=cc.idcuentasp),(select v.nocomprobante from compras v where v.idcompras=cc.idcompras),(select cl.nombreempresa from proveedor cl where cl.idproveedor=v.iddistribuidor) from cuentaspagar cc inner join compras v on cc.idcompras=v.idcompras where v.estado=1 and cc.estado=1 group by cc.idcuentasp";
	$fecha=date('Y-m-d');
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

                $fechaINI = $fila["0"];
				$fechaHOY = date('Y-m-d');
                if($fila[1]>0){
                    $nuevafecha = strtotime ( '+'.$fila[1].' '.$plazo[$fila["2"]] , strtotime ( $fechaINI ) ) ;
                }else{
                    $nuevafecha = strtotime ( '+'.($fila[1]*(-1)).' '.$plazo[$fila["2"]] , strtotime ( $fechaINI ) ) ;
                }
                $fechaPAGO = date ( 'Y-m-d' , $nuevafecha );
$cont++;
                if($fechaHOY>$fechaPAGO)
                {
					$segundos=strtotime($fecha) - strtotime($fila["0"]); //para tu fecha de ejmplo
						$diferencia_dias=intval($segundos/60/60/24);
				
				$objPHPExcel->setActiveSheetIndex($o)
                    ->setCellValue('A'.$i, $fila["0"])
                    ->setCellValue('B'.$i, $fila["1"]." ".$plazo2[$fila["2"]])
					->setCellValue('C'.$i, $diferencia_dias)
					->setCellValue('D'.$i, $fila["6"])
                    ->setCellValue('E'.$i, $fila["7"])
                    ->setCellValue('F'.$i, toMoney($fila["3"]))
                    ->setCellValue('G'.$i, toMoney($fila["5"]))
                    ->setCellValue('H'.$i, toMoney($fila["4"])); 
                    
                    $i++;}

            }

            $resultado->free();//librerar variable


           
        }
    }
    else
    {
        $respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

    }

    //cierro la conexion
    $mysql->close();

   //$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
   //$objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloCanales);

   $objPHPExcel->getActiveSheet()->getStyle('A2:H2')->applyFromArray($estiloTituloColumnas);
   $objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getStyle('E1:H'.$i)->getNumberFormat()->setFormatCode("_-Q* #,##0_-;-Q* #,##0_-;_-Q* "-"_-;_-@_-");
   
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "B3:H".($i-1));
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "A3:A".($i-1));
    $objPHPExcel->getActiveSheet() ->getStyle('E1:H'.$i) ->getNumberFormat() ->setFormatCode( '_-Q* #,##0_-;-Q* #,##0_-;_-Q* "-"_-;_-@_-' );
  #$myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'My Data');
   #$objPHPExcel->addSheet($myWorkSheet, 0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="CuentasPagarVencidas.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;



}
?>