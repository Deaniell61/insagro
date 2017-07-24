<?php
require_once ('../../conf.php');
require_once ('../../lib/conexion.php');
require_once ('../../lib/PHPExcel/PHPExcel.php');

    switch($_GET['tipo']){
        case "1":{
            VentasTotales();
            break;
        }
        
    }
function VentasTotales(){



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
    $sqlClientes = "SELECT c.fecha,c.nocomprobante,p.nit,p.nombre,c.total,(select tv.Descripcion from tipoventa tv where tv.idtipo=c.tipoventa),c.idventas,(select u.user from usuarios u where u.idusuarios=c.idusuario) FROM ventas c inner join cliente p on p.idcliente=c.idcliente inner join ventasdetalle cd on cd.idventa=c.idventas inner join productos pd on pd.idproductos=cd.idproductos where c.estado>=1 and cd.estado>=1 group by c.idventas order by c.nocomprobante ";
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
            $objPHPExcel->setActiveSheetIndex($o)
                        ->setCellValue('A'.$i, "Fecha")
                        ->setCellValue('B'.$i, "No.Comprobante")
                        ->setCellValue('C'.$i, "NIT")
                        ->setCellValue('D'.$i, "Cliente")
                        ->setCellValue('E'.$i, "Total")
                        ->setCellValue('F'.$i, "Tipo Venta")
                        ->setCellValue('G'.$i, "Vendedor"); 
                        $objPHPExcel->getActiveSheet()->getStyle('A'.$i.':G'.$i.'')->applyFromArray($estiloTituloColumnas);
                        $i++;

            while($fila = $resultadoClientes->fetch_row())
            {

                $objPHPExcel->setActiveSheetIndex($o)
                        ->setCellValue('A'.$i, substr($fila["0"],0,10))
                        ->setCellValue('B'.$i, $fila["1"])
                        ->setCellValue('C'.$i, $fila["2"])
                        ->setCellValue('D'.$i, $fila["3"])
                        ->setCellValue('E'.$i, $fila["4"])
                        ->setCellValue('F'.$i, $fila["5"])
                        ->setCellValue('G'.$i, $fila["7"]); 
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
   $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "B3:G".($i-1));
    
	$objPHPExcel->getActiveSheet() ->getStyle('E1:G'.$i) ->getNumberFormat() ->setFormatCode( '_-* #,##0.00 Q_-;-* #,##0.00 Q_-;_-* "-"?? Q_-;_-@_-' );
   #$myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'My Data');
   #$objPHPExcel->addSheet($myWorkSheet, 0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Ventas.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
		



}


?>