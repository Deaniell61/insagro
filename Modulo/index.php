    
   <?php
    	if(isset($_GET['AClientes'])){
            include('AClientes.php');
        }else if(isset($_GET['AProveedores'])){
            include('AProveedores.php');
        }else if(isset($_GET['Ayuda'])){
            include('Ayuda.php');
        }else if(isset($_GET['Caja'])){
            include('Caja.php');
        }else if(isset($_GET['Clientes'])){
            include('Clientes.php');
        }else if(isset($_GET['Cobrar'])){
            include('Cobrar.php');
        }else if(isset($_GET['Comisiones'])){
            include('Comisiones.php');
        }else if(isset($_GET['CompraAnulada'])){
            include('CompraAnulada.php');
        }else if(isset($_GET['Compras'])){
            include('Compras.php');
        }else if(isset($_GET['Cuentas'])){
            include('Cuentas.php');
        }else if(isset($_GET['Distribuidores'])){
            include('Distribuidores.php');
        }else if(isset($_GET['Empleado'])){
            include('Empleado.php');
        }else if(isset($_GET['Estadistica'])){
            include('Estadistica.php');
        }else if(isset($_GET['EstadisticaClientes'])){
            include('EstadisticaClientes.php');
        }else if(isset($_GET['estadisticaVenta'])){
            include('estadisticaVenta.php');
        }else if(isset($_GET['Flujo'])){
            include('Flujo.php');
        }else if(isset($_GET['Fragmentar'])){
            include('Fragmentar.php');
        }else if(isset($_GET['Gastos'])){
            include('Gastos.php');
        }else if(isset($_GET['GenerarCaja'])){
            include('GenerarCaja.php');
        }else if(isset($_GET['GenerarCompras'])){
            include('GenerarCompras.php');
        }else if(isset($_GET['GenerarVentas'])){
            include('GenerarVentas.php');
        }else if(isset($_GET['Impresion'])){
            include('Impresion.php');
        }else if(isset($_GET['Inicio'])){
            include('Inicio.php');
        }else if(isset($_GET['Inventario'])){
            include('Inventario.php');
        }else if(isset($_GET['InventarioAdministrador'])){
            include('InventarioAdministrador.php');
        }else if(isset($_GET['InventarioInicial'])){
            include('InventarioInicial.php');
        }else if(isset($_GET['Pagar'])){
            include('Pagar.php');
        }else if(isset($_GET['Pagos'])){
            include('Pagos.php');
        }else if(isset($_GET['Productos'])){
            include('Productos.php');
        }else if(isset($_GET['Proveedores'])){
            include('Proveedores.php');
        }else if(isset($_GET['Sueldos'])){
            include('Sueldos.php');
        }else if(isset($_GET['Usuarios'])){
            include('Usuarios.php');
        }else if(isset($_GET['Vendedor'])){
            include('Vendedor.php');
        }else if(isset($_GET['VentaAnulada'])){
            include('VentaAnulada.php');
        }else if(isset($_GET['Ventas'])){
            include('Ventas.php');
        }else if(isset($_GET['VentasSinComprobante'])){
            include('VentasSinComprobante.php');
        }else if(isset($_GET['CobrarPagadas'])){
            include('CobrarPagadas.php');
        }else{?>
              <script>
        window.location.href="../";
             </script>
        <?php }
?>   
    
