<?php

function Ayuda()
{
    include('../app/plantilla/ayuda/Cabecera.php');
    include('../app/plantilla/ayuda/Cuerpo.php');
    include('../app/plantilla/ayuda/Pie.php');

}


function Cobrar()
{
    include('../app/plantilla/cuentasC/Cabecera.php');
    include('../app/plantilla/cuentasC/Cuerpo.php');
    include('../app/plantilla/cuentasC/Pie.php');
}

function CobrarPagadas()
{
    include('../app/plantilla/cuentasCPagadas/Cabecera.php');
    include('../app/plantilla/cuentasCPagadas/Cuerpo.php');
    include('../app/plantilla/cuentasCPagadas/Pie.php');
}

function Caja()
{
    include('../app/plantilla/caja/Cabecera.php');
    include('../app/plantilla/caja/Cuerpo.php');
    include('../app/plantilla/caja/Pie.php');
}

function Compra()
{
    include('../app/plantilla/compra/Cabecera.php');
    include('../app/plantilla/compra/Cuerpo.php');
    include('../app/plantilla/compra/Pie.php');
}


function Compra2()
{
    include('../app/plantilla/compra2/Cabecera.php');
    include('../app/plantilla/compra2/Cuerpo.php');
    include('../app/plantilla/compra2/Pie.php');
}

function   CompraAnulada()
{
    include('../app/plantilla/compraanulada/Cabecera.php');
    include('../app/plantilla/compraanulada/Cuerpo.php');
    include('../app/plantilla/compraanulada/Pie.php');
}



function Cuentas()
{

    include('../app/plantilla/cuentas/Cabecera.php');
    include('../app/plantilla/cuentas/Cuerpo.php');
    include('../app/plantilla/cuentas/Pie.php');
}

function Empleado()
{
    include('../app/plantilla/empleado/Cabecera.php');
    include('../app/plantilla/empleado/Cuerpo.php');
    include('../app/plantilla/empleado/Pie.php');
}


function Estadistica()
{
    include('../app/plantilla/estadistica/Cabecera.php');
    include('../app/plantilla/estadistica/Cuerpo.php');
    include('../app/plantilla/estadistica/Pie.php');
}

function generarC()
{
    include('../app/plantilla/generarC/Cabecera.php');
    include('../app/plantilla/generarC/Cuerpo.php');
    include('../app/plantilla/generarC/Pie.php');
}

function generarV()
{
    include('../app/plantilla/generarV/Cabecera.php');
    include('../app/plantilla/generarV/Cuerpo.php');
    include('../app/plantilla/generarV/Pie.php');
}

function generarCaja()
{
    include('../app/plantilla/generaCaja/Cabecera.php');
    include('../app/plantilla/generaCaja/Cuerpo.php');
    include('../app/plantilla/generaCaja/Pie.php');
}

function Inicio()
{

    include('../app/plantilla/inicio/Cabecera.php');
    include('../app/plantilla/inicio/Cuerpo.php');
    include('../app/plantilla/inicio/Pie.php');
}

function Inventario()
{
    include('../app/plantilla/inventario/Cabecera.php');
    include('../app/plantilla/inventario/Cuerpo.php');
    include('../app/plantilla/inventario/Pie.php');
}


function InventarioIni()
{
    include('../app/plantilla/inventarioini/Cabecera.php');
    include('../app/plantilla/inventarioini/Cuerpo.php');
    include('../app/plantilla/inventarioini/Pie.php');
}

function InventarioAdmin()
{
    include('../app/plantilla/inventarioadmin/Cabecera.php');
    include('../app/plantilla/inventarioadmin/Cuerpo.php');
    include('../app/plantilla/inventarioadmin/Pie.php');
}


function Pagar()
{
    include('../app/plantilla/cuentasP/Cabecera.php');
    include('../app/plantilla/cuentasP/Cuerpo.php');
    include('../app/plantilla/cuentasP/Pie.php');
}

function Proveedor()
{
    //include('../app/plantilla/proveedor/Cabecera.php');
    include('../app/plantilla/proveedor/Cuerpo.php');
    include('../app/plantilla/proveedor/Pie.php');
}
function Cliente()
{
    //include('../app/plantilla/proveedor/Cabecera.php');
    include('../app/plantilla/cliente/Cuerpo.php');
    include('../app/plantilla/cliente/Pie.php');
}
function Proveedor2()
{
    include('../app/plantilla/proveedor/Cabecera.php');
    include('../app/plantilla/proveedor/Cuerpo.php');
    include('../app/plantilla/proveedor/Pie.php');
}
function Cliente2()
{
    include('../app/plantilla/cliente/Cabecera.php');
    include('../app/plantilla/cliente/Cuerpo.php');
    include('../app/plantilla/cliente/Pie.php');
}
function Producto()
{
    //include('../app/plantilla/proveedor/Cabecera.php');
    include('../app/plantilla/productos/Cuerpo.php');
    include('../app/plantilla/productos/Pie.php');
}
function IngresoProducto()
{
	$_SESSION['ingresoProd']="hola";
    //include('../app/plantilla/proveedor/Cabecera.php');
    include('../app/plantilla/productos/Cuerpo.php');
    include('../app/plantilla/productos/Pie.php');
}
function Distribuidor()
{
    //include('../app/plantilla/proveedor/Cabecera.php');
    include('../app/plantilla/distribuidor/Cuerpo.php');
    include('../app/plantilla/distribuidor/Pie.php');
}

function Usuario()
{
    include('../app/plantilla/usuario/Cabecera.php');
    include('../app/plantilla/usuario/Cuerpo.php');
    include('../app/plantilla/usuario/Pie.php');
}


function Venta()
{
    include('../app/plantilla/venta/Cabecera.php');
    include('../app/plantilla/venta/Cuerpo.php');
    include('../app/plantilla/venta/Pie.php');

}
function VentaSinC()
{
    include('../app/plantilla/ventaSinComprobante/Cabecera.php');
    include('../app/plantilla/ventaSinComprobante/Cuerpo.php');
    include('../app/plantilla/ventaSinComprobante/Pie.php');

}

function VentaAnulada()
{
    include('../app/plantilla/ventaanulada/Cabecera.php');
    include('../app/plantilla/ventaanulada/Cuerpo.php');
    include('../app/plantilla/ventaanulada/Pie.php');

}

function Vendedor()
{
	 include('../app/plantilla/vendedor/Cabecera.php');
    include('../app/plantilla/vendedor/Cuerpo.php');
    include('../app/plantilla/vendedor/Pie.php');

}
function EClientes()
{
	 include('../app/plantilla/estadisticaClientes/Cabecera.php');
    include('../app/plantilla/estadisticaClientes/Cuerpo.php');
    include('../app/plantilla/estadisticaClientes/Pie.php');

}

function Flujo()
{
	 include('../app/plantilla/flujo/Cabecera.php');
    include('../app/plantilla/flujo/Cuerpo.php');
    include('../app/plantilla/flujo/Pie.php');
}



function estadisticaVentas()
{
	 include('../app/plantilla/estadisticaVentas/Cabecera.php');
    include('../app/plantilla/estadisticaVentas/Cuerpo.php');
    include('../app/plantilla/estadisticaVentas/Pie.php');
}


function Pago()
{
	 include('../app/plantilla/pagos/Cabecera.php');
    include('../app/plantilla/pagos/Cuerpo.php');
    include('../app/plantilla/pagos/Pie.php');
}


function Sueldo()
{
	 include('../app/plantilla/pagoSueldo/Cabecera.php');
    include('../app/plantilla/pagoSueldo/Cuerpo.php');
    include('../app/plantilla/pagoSueldo/Pie.php');
}

function  Comisiones()
{
	 include('../app/plantilla/comisiones/Cabecera.php');
    include('../app/plantilla/comisiones/Cuerpo.php');
    include('../app/plantilla/comisiones/Pie.php');
}

function Gatos()
{
	 include('../app/plantilla/gastos/Cabecera.php');
    include('../app/plantilla/gastos/Cuerpo.php');
    include('../app/plantilla/gastos/Pie.php');
}


function Fragmentar()
{
  include('../app/plantilla/fragmentar/Cabecera.php');
   include('../app/plantilla/fragmentar/Cuerpo.php');
   include('../app/plantilla/fragmentar/Pie.php');
}



?>
