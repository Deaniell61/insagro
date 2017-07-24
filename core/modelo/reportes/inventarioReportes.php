<?php
require_once ('../../conf.php');
require_once ('../../lib/conexion.php');

require_once ('../../lib/PHPExcel/PHPExcel.php');
    switch($_GET['tipo']){
        case "1":{
            inventarioAdministradorExcel();
            break;
        }
        case "2":{
            inventarioAdministradorSinPrecioExcel();
            break;
        }
    }
function proveedorU($id)
{
	require_once ('../../conf.php');
	require_once ('../../lib/conexion.php');
	$mysql = conexionMysql();
    $form="";
    $sql = "select pr.nombreempresa from proveedor pr inner join compras c on c.iddistribuidor=pr.idproveedor inner join compradetalle cd on cd.idcompras=c.idcompras where cd.idproductos='".$id."' order by c.idcompras desc limit 1";
 	//echo $sql;
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		$fila = $resultado->fetch_row();    
			
		
		
		$form .="".$fila[0]."";
		
		
			
		$resultado->free();    
	  }
	  
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return ($form);
}

function fechaU($id)
{
	require_once ('../../conf.php');
	require_once ('../../lib/conexion.php');
	$mysql = conexionMysql();
    $form="";
    $sql = "select c.fecha from proveedor pr inner join compras c on c.iddistribuidor=pr.idproveedor inner join compradetalle cd on cd.idcompras=c.idcompras where cd.idproductos='".$id."' order by c.idcompras desc limit 1";
 	//echo $sql;
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		$fila = $resultado->fetch_row();    
			
		
		
		$form .="".$fila[0]."";
		
		
			
		$resultado->free();    
	  }
	  
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return (substr($form,0,10));
}

function noDocU($id)
{
	require_once ('../../conf.php');
	require_once ('../../lib/conexion.php');
	$mysql = conexionMysql();
    $form="";
    $sql = "select c.nocomprobante from proveedor pr inner join compras c on c.iddistribuidor=pr.idproveedor inner join compradetalle cd on cd.idcompras=c.idcompras where cd.idproductos='".$id."' order by c.idcompras desc limit 1";
 	//echo $sql;
    if($resultado = $mysql->query($sql))
    {
      if($resultado->num_rows>0)
	  {
		$fila = $resultado->fetch_row();    
			
		
		
		$form .="".$fila[0]."";
		
		
			
		$resultado->free();    
	  }
	  
    
    }
    else
    {   
    
    $form = "<div><script>console.log('$idedit');</script></div>";
    
    }
    
    
    $mysql->close();
    
    return ($form);
}



function inventarioAdministradorSinPrecioExcel(){

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
if(isset($_SESSION['codigoBuscaProducto_SOFT']))
{
	if($_SESSION['codigoBuscaProducto_SOFT']!="")
	{
		$mas=" and p.codigoproducto='".$_SESSION['codigoBuscaProducto_SOFT']."' and i.cantidad<=i.minimo ";
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
	
	$i = 3;

	$ss = 0;

	   

$mysql = conexionMysql();
    $sqlSegmento = "select tiporepuesto from productos group by tiporepuesto order by tiporepuesto;";
    $tipo=array('','Sector Fertilizantes','Sector Herbicidas','Sector Insecticidas','Sector Veterinarios','Sector semillas','Sector Caceros','Sector Concentrados','Sector Equipo Agricola','Sector Foliares','Sector Fungicidas','Sector Adherentes','Sector Bolsas','Sector Plastico','Sector Pintura');
    
	$cont=0;

	if($resultadoSegmento = $mysql->query($sqlSegmento))
    {

        if(mysqli_num_rows($resultadoSegmento)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

			$ini=0;
            while($filaSegmento = $resultadoSegmento->fetch_row())
			{
				$cont=0;
				$objPHPExcel->createSheet($o)->setTitle($tipo[$o+1]);
				
				$i=3;
				$sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,p.marca2,p.codigoproducto,i.idinventario,p.idproductos,p.tiporepuesto FROM inventario i inner join productos p on p.idproductos=i.idproducto where i.cantidad>=0 $mas and p.estado=1 order by p.codigoproducto";
    
				if($resultado = $mysql->query($sql))
				{

					if(mysqli_num_rows($resultado)==0)
					{
						$respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
					}

					else
					{
						$r=1;
							
							while($fila = $resultado->fetch_row())
							{
								
								if($fila["14"]==$filaSegmento[0])
									{
										if($r==1)
										{
											
										$r++;
											$objPHPExcel->setActiveSheetIndex($o)
											->setCellValue('A'.$i, "Correlativo")
											->setCellValue('B'.$i, "Codigo")
											->setCellValue('C'.$i, "Producto")
											->setCellValue('D'.$i, "Marca")
											->setCellValue('E'.$i, "Descripcion")
											->setCellValue('F'.$i, "Cantidad")
											->setCellValue('G'.$i, "Proveedor")
											->setCellValue('H'.$i, "Fecha")
											->setCellValue('I'.$i, "Comprobante"); 
											$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':I'.$i.'')->applyFromArray($estiloTituloColumnas);
											$ini=$i;
										$i++;
										
										}
							$cont++;
									$objPHPExcel->setActiveSheetIndex($o)
										->setCellValue('A'.$i, $cont)
										->setCellValue('B'.$i, $fila["11"])
										->setCellValue('C'.$i, $fila["0"])
										->setCellValue('D'.$i, $fila["10"])
										->setCellValue('E'.$i, $fila["4"])
										->setCellValue('F'.$i, $fila["9"])
										->setCellValue('G'.$i, proveedorU($fila["13"]))
										->setCellValue('H'.$i, fechaU($fila["13"]))
										->setCellValue('I'.$i, noDocU($fila["13"])); 
										
										$i++;
									}

							}

							$resultado->free();//librerar variable


					
					}
				}
				else
				{
					$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}
				$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);
				$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:I".($i-1));
				$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "C4:C".($i-1));
				$i++;
				$o++;
			}
			$resultadoSegmento->free();//librerar variable
		}
	}else
				{
					$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->removeSheetByIndex($o);
    //cierro la conexion
    $mysql->close();

   //$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
   //$objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloCanales);

   
   
   
    
  #$myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'My Data');
   #$objPHPExcel->addSheet($myWorkSheet, 0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Inventario_Administrador_Sin_Precio.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
}

function inventarioAdministradorExcel(){

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
if(isset($_SESSION['codigoBuscaProducto_SOFT']))
{
	if($_SESSION['codigoBuscaProducto_SOFT']!="")
	{
		$mas=" and p.codigoproducto='".$_SESSION['codigoBuscaProducto_SOFT']."' and i.cantidad<=i.minimo ";
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
	
	$i = 3;

	$ss = 0;

	   

$mysql = conexionMysql();
    $sqlSegmento = "select tiporepuesto from productos group by tiporepuesto order by tiporepuesto;";
    $tipo=array('','Sector Fertilizantes','Sector Herbicidas','Sector Insecticidas','Sector Veterinarios','Sector semillas','Sector Caceros','Sector Concentrados','Sector Equipo Agricola','Sector Foliares','Sector Fungicidas','Sector Adherentes','Sector Bolsas','Sector Plastico','Sector Pintura');
    
	$cont=0;

	if($resultadoSegmento = $mysql->query($sqlSegmento))
    {

        if(mysqli_num_rows($resultadoSegmento)==0)
        {
            $respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
        }

        else
        {

			$ini=0;
            while($filaSegmento = $resultadoSegmento->fetch_row())
			{
				$cont=0;
				
				$objPHPExcel->createSheet($o)->setTitle($tipo[$o+1]);
				
				
				$i=3;
				$sql = "SELECT p.nombre,i.preciocosto,p.idproductos,p.codigoproducto,p.descripcion,i.precioCosto,i.precioVenta,i.precioClienteEs,i.precioDistribuidor,i.cantidad,p.marca2,p.codigoproducto,i.idinventario,p.idproductos,p.tiporepuesto FROM inventario i inner join productos p on p.idproductos=i.idproducto where i.cantidad>=0 $mas and p.estado=1 order by p.codigoproducto";
    
				if($resultado = $mysql->query($sql))
				{

					if(mysqli_num_rows($resultado)==0)
					{
						$respuesta = "<div class='error'>No hay usuarios BD vacia</div>";
					}

					else
					{
						$r=1;
							
							while($fila = $resultado->fetch_row())
							{
								
								if($fila["14"]==$filaSegmento[0])
									{
										if($r==1)
										{
											
										$r++;
											$objPHPExcel->setActiveSheetIndex($o)
												->setCellValue('A'.$i, "Correlativo")
												->setCellValue('B'.$i, "Codigo")
												->setCellValue('C'.$i, "Producto")
												->setCellValue('D'.$i, "Marca")
												->setCellValue('E'.$i, "Descripcion")
												->setCellValue('F'.$i, "Costo")
												->setCellValue('G'.$i, "Cantidad")
												->setCellValue('H'.$i, "Precio General")
												->setCellValue('I'.$i, "Precio Especial")
												->setCellValue('J'.$i, "Precio Mayoreo")
												->setCellValue('K'.$i, "Proveedor")
												->setCellValue('L'.$i, "Fecha")
												->setCellValue('M'.$i, "Comprobante");
											$objPHPExcel->getActiveSheet()->getStyle('A'.$i.':M'.$i.'')->applyFromArray($estiloTituloColumnas);
											$ini=$i;
										$i++;
										
										}
							$cont++;
									$objPHPExcel->setActiveSheetIndex($o)
										->setCellValue('A'.$i, $cont)
										->setCellValue('B'.$i, $fila["11"])
										->setCellValue('C'.$i, $fila["0"])
										->setCellValue('D'.$i, $fila["10"])
										->setCellValue('E'.$i, $fila["4"])
										->setCellValue('F'.$i, toMoney($fila["5"]))
										->setCellValue('G'.$i, $fila["9"])
										->setCellValue('H'.$i, toMoney($fila["6"]))
										->setCellValue('I'.$i, toMoney($fila["7"]))
										->setCellValue('J'.$i, toMoney($fila["8"]))
										->setCellValue('K'.$i, proveedorU($fila["13"]))
										->setCellValue('L'.$i, fechaU($fila["13"]))
										->setCellValue('M'.$i, noDocU($fila["13"]));
										
										$i++;
									}

							}

							$resultado->free();//librerar variable


					
					}
				}
				else
				{
					$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}
				$objPHPExcel->getActiveSheet()->getColumnDimension("A")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("B")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("C")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("D")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("E")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("F")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("G")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("H")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("I")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("J")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("K")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("L")->setAutoSize(true);
   $objPHPExcel->getActiveSheet()->getColumnDimension("M")->setAutoSize(true);
   
    $objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion, "A4:M".($i-1));
	$objPHPExcel->getActiveSheet()->setSharedStyle($estiloInformacion2, "C4:C".($i-1));
	$objPHPExcel->getActiveSheet() ->getStyle('H4:J'.$i) ->getNumberFormat() ->setFormatCode( '_-* #,##0.00 Q_-;-* #,##0.00 Q_-;_-* "-"?? Q_-;_-@_-' );
   $objPHPExcel->getActiveSheet() ->getStyle('F4:F'.$i) ->getNumberFormat() ->setFormatCode( '_-* #,##0.00 Q_-;-* #,##0.00 Q_-;_-* "-"?? Q_-;_-@_-' );
				$i++;
				$o++;
			}
			$resultadoSegmento->free();//librerar variable
		}
	}else
				{
					$respuesta = "<div class='error'>Error: no se ejecuto la consulta a BD</div>";

				}

    //cierro la conexion
    $mysql->close();
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->removeSheetByIndex($o);
   //$objPHPExcel->getActiveSheet()->mergeCells('A2:F2');
   //$objPHPExcel->getActiveSheet()->getStyle('A2:F2')->applyFromArray($estiloTituloCanales);

   
   
   
    
  #$myWorkSheet = new PHPExcel_Worksheet($objPHPExcel, 'My Data');
   #$objPHPExcel->addSheet($myWorkSheet, 0);
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Inventario_Administrador.xlsx"');
header('Cache-Control: max-age=0');

$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
}
?>