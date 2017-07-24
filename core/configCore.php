<?php

//Constantes de conexión
require_once('../conf.php');

//rutas de html
define('HTML_DIR','plantilla/');
define('HTML_ERROR','error/');
define('HTML_INDEX','index/');
define('HTML_GENERAL', HTML_DIR.'general/');
define('HTML_PUBLIC', HTML_DIR.'public/');
define('HTML_LIB', HTML_DIR.'lib/');


/*
//nombre de la aplicacion
define('APP_TITLE','MVC');/#/#

//copyright
define('APP_COPY','Copyright &copy'.date('Y',time() ).' SofTocnic');


 //URL BASE
define('APP_URL','http://localhost/MVC/');
*/


//estructura


require_once('../lib/conexion.php');
require_once('../modelo/usuarioModelo.php');
require_once('../modelo/comprasModelo.php');
require_once('../modelo/ventasModelo.php');
require_once('../modelo/ProveedorModelo.php');
require_once('../modelo/ProductoModelo.php');
require_once('../modelo/clienteModelo.php');
require_once('../modelo/cuentasPagarModelo.php');
require_once('../modelo/cuentasCobrarModelo.php');
require_once('../modelo/inventarioModelo.php');
require_once('../modelo/pagosModelo.php');
require_once('../modelo/estadisticaModelo.php');
require_once('../modelo/inventarioModelo.php');
require_once('../modelo/cajaModelo.php');
require_once('../../vista/usuarioVista.php');
require_once('../../vista/compra2Vista.php');
require_once('../../vista/compraAnuladaVista.php');
require_once('../../vista/empleadoVista.php');
require_once('../../vista/clientesVista.php');
require_once('../../vista/ventaVista.php');
require_once('../../vista/ventaSinComprobanteVista.php');
require_once('../../vista/ventaAnuladaVista.php');
require_once('../../vista/cuentasPVista.php');
require_once('../../vista/cuentasCVista.php');
require_once('../../vista/inventarioVista.php');
require_once('../../vista/inventarioAdminVista.php');
require_once('../../vista/pagoSueldoVista.php');
require_once('../../vista/gastosVista.php');
require_once('../../vista/cajaVista.php');


?>