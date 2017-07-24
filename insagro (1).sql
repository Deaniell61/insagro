-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 15-03-2017 a las 10:49:18
-- Versión del servidor: 5.7.17-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `insagro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accesos`
--

CREATE TABLE `accesos` (
  `idAccesos` int(11) NOT NULL,
  `Agrega` int(11) DEFAULT NULL,
  `Modifica` int(11) DEFAULT NULL,
  `Mostrar` int(11) DEFAULT NULL,
  `Elimina` int(11) DEFAULT NULL,
  `idUsuarios` int(11) DEFAULT NULL,
  `idModulo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `accesos`
--

INSERT INTO `accesos` (`idAccesos`, `Agrega`, `Modifica`, `Mostrar`, `Elimina`, `idUsuarios`, `idModulo`) VALUES
(1, 1, 1, 1, 1, 0, 1),
(2, 1, 1, 1, 1, 0, 2),
(3, 1, 1, 1, 1, 0, 3),
(4, 1, 1, 1, 1, 0, 4),
(5, 1, 1, 1, 1, 0, 5),
(6, 1, 1, 1, 1, 0, 6),
(7, 1, 1, 1, 1, 0, 7),
(8, 1, 1, 1, 1, 0, 8),
(9, 1, 1, 1, 1, 0, 9),
(10, 1, 1, 1, 1, 0, 10),
(11, 1, 1, 1, 1, 0, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Nit` varchar(100) DEFAULT NULL,
  `Departamento` int(11) DEFAULT NULL,
  `Municipio` int(11) DEFAULT NULL,
  `Pais` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `direccion` varchar(80) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `Nombre`, `Apellido`, `Nit`, `Departamento`, `Municipio`, `Pais`, `estado`, `direccion`, `telefono`) VALUES
(1, 'C/F', '', 'C/F', NULL, NULL, NULL, 1, 'Ciudad', '00000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comisiones`
--

CREATE TABLE `comisiones` (
  `idComisiones` int(11) NOT NULL,
  `fechaIni` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `monto` double DEFAULT NULL,
  `porcentaje` double DEFAULT NULL,
  `total` double DEFAULT NULL,
  `idUsuarios` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compradetalle`
--

CREATE TABLE `compradetalle` (
  `idCompraDetalle` int(11) NOT NULL,
  `subtotal` double DEFAULT NULL,
  `vencimiento` date DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `costo` double DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `precioE` double DEFAULT NULL,
  `precioM` double DEFAULT NULL,
  `descuentos` double DEFAULT NULL,
  `garantia` text,
  `estado` int(11) DEFAULT NULL,
  `idCompras` int(11) DEFAULT NULL,
  `idProductos` int(11) DEFAULT NULL,
  `idTipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `idCompras` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `tipoCompra` int(11) DEFAULT NULL,
  `NoComprobante` varchar(45) DEFAULT NULL,
  `idDistribuidor` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correos`
--

CREATE TABLE `correos` (
  `idCorreos` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `correo` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tipo` int(11) DEFAULT '1',
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentascobrar`
--

CREATE TABLE `cuentascobrar` (
  `idCuentasC` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `plazo` int(11) DEFAULT NULL,
  `tipoPlazo` varchar(50) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `idVentas` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `CreditoDado` double DEFAULT NULL,
  `fecha_ant` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentaspagar`
--

CREATE TABLE `cuentaspagar` (
  `idCuentasP` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `plazo` int(11) DEFAULT NULL,
  `tipoPlazo` varchar(50) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `idCompras` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `CreditoDado` double DEFAULT NULL,
  `fecha_ant` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `idDepartamentos` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `codigoPostal` varchar(45) DEFAULT NULL,
  `LADA` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distribuidores`
--

CREATE TABLE `distribuidores` (
  `idDistribuidores` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Telefono2` varchar(20) DEFAULT NULL,
  `NoVendedor` varchar(30) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `IdProveedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `idEmpleados` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Apellido` varchar(75) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Puesto` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `sueldo` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gastos`
--

CREATE TABLE `gastos` (
  `idGastos` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `Descripcion` text,
  `Monto` double DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idInventario` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `precioCosto` double DEFAULT NULL,
  `precioVenta` double DEFAULT NULL,
  `precioClienteEs` double DEFAULT NULL,
  `precioDistribuidor` double DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `minimo` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventarioC`
--

CREATE TABLE `inventarioC` (
  `idInventarioC` int(11) NOT NULL,
  `idProducto` int(11) DEFAULT NULL,
  `precioCosto` double DEFAULT NULL,
  `precioVenta` double DEFAULT NULL,
  `precioClienteEs` double DEFAULT NULL,
  `precioDistribuidor` double DEFAULT NULL,
  `cantidad` double DEFAULT NULL,
  `minimo` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `idMarca` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `idModulos` int(11) NOT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Dir` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `RefId` varchar(50) DEFAULT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idModulos`, `Nombre`, `Dir`, `estado`, `RefId`, `tipo`) VALUES
(1, 'Inicio', '../app/img/inicio.png', 1, 'inicio', 0),
(2, 'Usuarios', '../app/img/usuariotab.png', 1, 'usuario', 0),
(3, 'Compras', '../app/img/carro-de-la-compra.png', 1, 'compras', 0),
(4, 'Cuentas', '../app/img/etiqueta-del-precio.png', 1, 'cuentas', 0),
(5, 'Estadistica', '../app/img/reparacion-mecanismo.png', 1, 'estadistica', 1),
(6, 'Inventario', '../app/img/notas.png', 1, 'inventario', 0),
(7, 'Ventas', '../app/img/diagrama.png', 1, 'ventas', 0),
(8, 'Pagos', '../app/img/pagos.png', 1, 'pagos', 1),
(9, 'Clientes', '../app/img/clientes.png', 1, 'clientes1', 0),
(10, 'Proveedores', '../app/img/proveedores.png', 1, 'proveedores1', 0),
(11, 'Fragmentar', '../app/img/proveedores.png', 1, 'fragmentar', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientosc`
--

CREATE TABLE `movimientosc` (
  `idMovimientoC` int(11) NOT NULL,
  `credito` double DEFAULT NULL,
  `abono` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcion` varchar(50) DEFAULT NULL,
  `idCuentasC` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientosp`
--

CREATE TABLE `movimientosp` (
  `idMovimientoP` int(11) NOT NULL,
  `credito` double DEFAULT NULL,
  `abono` double DEFAULT NULL,
  `saldo` double DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `descripcion` varchar(50) DEFAULT NULL,
  `idCuentasP` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE `municipio` (
  `idMunicipio` int(11) NOT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `LADA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `idPais` int(11) NOT NULL,
  `Nombre` varchar(70) DEFAULT NULL,
  `Codigo` varchar(50) DEFAULT NULL,
  `LADA` varchar(45) DEFAULT NULL,
  `Cod` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `Descripcion` text,
  `Nombre` varchar(100) DEFAULT NULL,
  `CodigoProducto` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `tipoRepuesto` int(11) DEFAULT NULL,
  `idMarca` int(11) DEFAULT NULL,
  `marca2` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idproveedor` int(11) NOT NULL,
  `NombreEmpresa` varchar(50) DEFAULT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Nit` varchar(100) DEFAULT NULL,
  `CuentaDepoito` varchar(100) DEFAULT NULL,
  `IdDepartamento` int(11) DEFAULT NULL,
  `IdMuniciopio` int(11) DEFAULT NULL,
  `IdPais` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idproveedor`, `NombreEmpresa`, `Direccion`, `Telefono`, `Nit`, `CuentaDepoito`, `IdDepartamento`, `IdMuniciopio`, `IdPais`, `Estado`) VALUES
(1, 'C/F', 'Ciudad', 'C/F', '000000', '', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `idPuestos` int(11) NOT NULL,
  `Descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`idPuestos`, `Descripcion`) VALUES
(1, 'Jefe'),
(2, 'Vendedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `Descripcion` varchar(45) DEFAULT NULL,
  `ModulosDefecto` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `Descripcion`, `ModulosDefecto`, `estado`) VALUES
(0, 'Soporte', '1234567891011', 0),
(1, 'Administrador', '12345678', 1),
(2, 'Usuario', '1456', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sueldos`
--

CREATE TABLE `sueldos` (
  `idSueldos` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Descripcion` text,
  `monto` double DEFAULT NULL,
  `idEmpleado` int(11) DEFAULT NULL,
  `Estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocompra`
--

CREATE TABLE `tipocompra` (
  `idTipo` int(11) NOT NULL,
  `Descripcion` varchar(70) DEFAULT NULL,
  `Observacion` text,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipocompra`
--

INSERT INTO `tipocompra` (`idTipo`, `Descripcion`, `Observacion`, `estado`) VALUES
(1, 'Contado', NULL, 1),
(2, 'Credito', NULL, 1),
(3, 'Donacion', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodetallecompra`
--

CREATE TABLE `tipodetallecompra` (
  `idTipo` int(11) NOT NULL,
  `Descripcion` varchar(70) DEFAULT NULL,
  `Observacion` text,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodetalleventa`
--

CREATE TABLE `tipodetalleventa` (
  `idTipo` int(11) NOT NULL,
  `Descripcion` varchar(70) DEFAULT NULL,
  `Observacion` text,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoventa`
--

CREATE TABLE `tipoventa` (
  `idTipo` int(11) NOT NULL,
  `Descripcion` varchar(70) DEFAULT NULL,
  `Observacion` text,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipoventa`
--

INSERT INTO `tipoventa` (`idTipo`, `Descripcion`, `Observacion`, `estado`) VALUES
(1, 'Contado', NULL, 1),
(2, 'Credito', NULL, 1),
(3, 'Donacion', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `Email` varchar(55) DEFAULT NULL,
  `user` varchar(10) DEFAULT NULL,
  `Contra` varchar(20) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `idEmpleados` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuarios`, `Email`, `user`, `Contra`, `estado`, `idRol`, `idEmpleados`) VALUES
(0, NULL, 'admin', '123412341234', 1, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `idVentas` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total` double DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `tipoVenta` int(11) DEFAULT NULL,
  `nocomprobante` int(11) DEFAULT '1',
  `idCliente` int(11) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasdetalle`
--

CREATE TABLE `ventasdetalle` (
  `idVentaDetalle` int(11) NOT NULL,
  `Subtotal` double DEFAULT NULL,
  `Vencimiento` date DEFAULT NULL,
  `Cantidad` double DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `garantia` text,
  `idVenta` int(11) DEFAULT NULL,
  `idProductos` int(11) DEFAULT NULL,
  `idTipo` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD PRIMARY KEY (`idAccesos`),
  ADD KEY `AccesoModulo_idx` (`idModulo`),
  ADD KEY `AccesoUsuarios_idx` (`idUsuarios`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `ClientePais_idx` (`Pais`),
  ADD KEY `ClineteDepartamento_idx` (`Departamento`),
  ADD KEY `ClienteMunicipio_idx` (`Municipio`);

--
-- Indices de la tabla `comisiones`
--
ALTER TABLE `comisiones`
  ADD PRIMARY KEY (`idComisiones`),
  ADD KEY `ComisionesUsuarios` (`idUsuarios`);

--
-- Indices de la tabla `compradetalle`
--
ALTER TABLE `compradetalle`
  ADD PRIMARY KEY (`idCompraDetalle`),
  ADD KEY `DetalleCompra_idx` (`idCompras`),
  ADD KEY `DetalleTipo_idx` (`idTipo`),
  ADD KEY `DetalleProducto_idx` (`idProductos`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`idCompras`),
  ADD KEY `CompraDistribuidor_idx` (`idDistribuidor`),
  ADD KEY `CompraTipo_idx` (`tipoCompra`),
  ADD KEY `ComprasUsuario` (`idUsuario`);

--
-- Indices de la tabla `correos`
--
ALTER TABLE `correos`
  ADD PRIMARY KEY (`idCorreos`);

--
-- Indices de la tabla `cuentascobrar`
--
ALTER TABLE `cuentascobrar`
  ADD PRIMARY KEY (`idCuentasC`),
  ADD UNIQUE KEY `idCompras` (`idVentas`);

--
-- Indices de la tabla `cuentaspagar`
--
ALTER TABLE `cuentaspagar`
  ADD PRIMARY KEY (`idCuentasP`),
  ADD UNIQUE KEY `idVentas` (`idCompras`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`idDepartamentos`);

--
-- Indices de la tabla `distribuidores`
--
ALTER TABLE `distribuidores`
  ADD PRIMARY KEY (`idDistribuidores`),
  ADD KEY `DistribuidorProveedor_idx` (`IdProveedor`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`idEmpleados`),
  ADD KEY `EmpleadoPuesto_idx` (`Puesto`);

--
-- Indices de la tabla `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`idGastos`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`),
  ADD KEY `InventarioProducto_idx` (`idProducto`);

--
-- Indices de la tabla `inventarioC`
--
ALTER TABLE `inventarioC`
  ADD PRIMARY KEY (`idInventarioC`),
  ADD KEY `InventarioCProducto_idx` (`idProducto`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`idMarca`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idModulos`);

--
-- Indices de la tabla `movimientosc`
--
ALTER TABLE `movimientosc`
  ADD PRIMARY KEY (`idMovimientoC`),
  ADD KEY `MovimientoCCuentasC` (`idCuentasC`),
  ADD KEY `MovimientosCUsuario` (`idUsuario`);

--
-- Indices de la tabla `movimientosp`
--
ALTER TABLE `movimientosp`
  ADD PRIMARY KEY (`idMovimientoP`),
  ADD KEY `MovimientoPCuentasP` (`idCuentasP`),
  ADD KEY `MovimientosPUsuario` (`idUsuario`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`idMunicipio`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`idPais`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`),
  ADD KEY `ProductoMarca` (`idMarca`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idproveedor`),
  ADD KEY `ProveedorPais_idx` (`IdPais`),
  ADD KEY `ProveedorDepartamento_idx` (`IdDepartamento`),
  ADD KEY `ProveedorMunicipio_idx` (`IdMuniciopio`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`idPuestos`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `sueldos`
--
ALTER TABLE `sueldos`
  ADD PRIMARY KEY (`idSueldos`),
  ADD KEY `SueldosEmpleado` (`idEmpleado`);

--
-- Indices de la tabla `tipocompra`
--
ALTER TABLE `tipocompra`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `tipodetallecompra`
--
ALTER TABLE `tipodetallecompra`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `tipodetalleventa`
--
ALTER TABLE `tipodetalleventa`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `tipoventa`
--
ALTER TABLE `tipoventa`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`),
  ADD KEY `UsuarioEmpleado_idx` (`idEmpleados`),
  ADD KEY `UsuarioRol_idx` (`idRol`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`idVentas`),
  ADD KEY `ClienteVenta_idx` (`idCliente`),
  ADD KEY `VentaTipo_idx` (`tipoVenta`),
  ADD KEY `VentasUsuario` (`idUsuario`);

--
-- Indices de la tabla `ventasdetalle`
--
ALTER TABLE `ventasdetalle`
  ADD PRIMARY KEY (`idVentaDetalle`),
  ADD KEY `VentaDetalleTipo_idx` (`idTipo`),
  ADD KEY `VentaDetalle_idx` (`idVenta`),
  ADD KEY `VentaDetalleProducto_idx` (`idProductos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accesos`
--
ALTER TABLE `accesos`
  MODIFY `idAccesos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `comisiones`
--
ALTER TABLE `comisiones`
  MODIFY `idComisiones` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `compradetalle`
--
ALTER TABLE `compradetalle`
  MODIFY `idCompraDetalle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `idCompras` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `correos`
--
ALTER TABLE `correos`
  MODIFY `idCorreos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cuentascobrar`
--
ALTER TABLE `cuentascobrar`
  MODIFY `idCuentasC` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cuentaspagar`
--
ALTER TABLE `cuentaspagar`
  MODIFY `idCuentasP` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `idDepartamentos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `distribuidores`
--
ALTER TABLE `distribuidores`
  MODIFY `idDistribuidores` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `idEmpleados` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `gastos`
--
ALTER TABLE `gastos`
  MODIFY `idGastos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idInventario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inventarioC`
--
ALTER TABLE `inventarioC`
  MODIFY `idInventarioC` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `idMarca` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idModulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `movimientosc`
--
ALTER TABLE `movimientosc`
  MODIFY `idMovimientoC` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `movimientosp`
--
ALTER TABLE `movimientosp`
  MODIFY `idMovimientoP` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `idMunicipio` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `idPais` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProductos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `idproveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `idPuestos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `sueldos`
--
ALTER TABLE `sueldos`
  MODIFY `idSueldos` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipocompra`
--
ALTER TABLE `tipocompra`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipodetallecompra`
--
ALTER TABLE `tipodetallecompra`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipodetalleventa`
--
ALTER TABLE `tipodetalleventa`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipoventa`
--
ALTER TABLE `tipoventa`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `idVentas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ventasdetalle`
--
ALTER TABLE `ventasdetalle`
  MODIFY `idVentaDetalle` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accesos`
--
ALTER TABLE `accesos`
  ADD CONSTRAINT `AccesoModulo` FOREIGN KEY (`idModulo`) REFERENCES `modulos` (`idModulos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `AccesoUsuarios` FOREIGN KEY (`idUsuarios`) REFERENCES `usuarios` (`idUsuarios`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `ClienteDepartamento` FOREIGN KEY (`Departamento`) REFERENCES `departamentos` (`idDepartamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ClienteMunicipio` FOREIGN KEY (`Municipio`) REFERENCES `municipio` (`idMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ClientePais` FOREIGN KEY (`Pais`) REFERENCES `pais` (`idPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comisiones`
--
ALTER TABLE `comisiones`
  ADD CONSTRAINT `ComisionesUsuarios` FOREIGN KEY (`idUsuarios`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `compradetalle`
--
ALTER TABLE `compradetalle`
  ADD CONSTRAINT `DetalleCompra` FOREIGN KEY (`idCompras`) REFERENCES `compras` (`idCompras`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `DetalleProducto` FOREIGN KEY (`idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `DetalleTipo` FOREIGN KEY (`idTipo`) REFERENCES `tipodetallecompra` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `CompraProveedor2` FOREIGN KEY (`idDistribuidor`) REFERENCES `proveedor` (`idproveedor`),
  ADD CONSTRAINT `CompraTipo` FOREIGN KEY (`tipoCompra`) REFERENCES `tipocompra` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ComprasUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `cuentascobrar`
--
ALTER TABLE `cuentascobrar`
  ADD CONSTRAINT `CuentasVentas` FOREIGN KEY (`idVentas`) REFERENCES `ventas` (`idVentas`);

--
-- Filtros para la tabla `cuentaspagar`
--
ALTER TABLE `cuentaspagar`
  ADD CONSTRAINT `CuentasCompras` FOREIGN KEY (`idCompras`) REFERENCES `compras` (`idCompras`);

--
-- Filtros para la tabla `distribuidores`
--
ALTER TABLE `distribuidores`
  ADD CONSTRAINT `DistribuidorProveedor` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedor` (`idproveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `EmpleadoPuesto` FOREIGN KEY (`Puesto`) REFERENCES `puestos` (`idPuestos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `InventarioProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventarioC`
--
ALTER TABLE `inventarioC`
  ADD CONSTRAINT `InventarioCProducto` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `movimientosc`
--
ALTER TABLE `movimientosc`
  ADD CONSTRAINT `MovimientoCCuentasC` FOREIGN KEY (`idCuentasC`) REFERENCES `cuentascobrar` (`idCuentasC`),
  ADD CONSTRAINT `MovimientosCUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `movimientosp`
--
ALTER TABLE `movimientosp`
  ADD CONSTRAINT `MovimientoPCuentasP` FOREIGN KEY (`idCuentasP`) REFERENCES `cuentaspagar` (`idCuentasP`),
  ADD CONSTRAINT `MovimientosPUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `ProductoMarca` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`idMarca`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `ProveedorDepartamento` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamentos` (`idDepartamentos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ProveedorMunicipio` FOREIGN KEY (`IdMuniciopio`) REFERENCES `municipio` (`idMunicipio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `ProveedorPais` FOREIGN KEY (`IdPais`) REFERENCES `pais` (`idPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sueldos`
--
ALTER TABLE `sueldos`
  ADD CONSTRAINT `SueldosEmpleado` FOREIGN KEY (`idEmpleado`) REFERENCES `empleados` (`idEmpleados`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `UsuarioEmpleado` FOREIGN KEY (`idEmpleados`) REFERENCES `empleados` (`idEmpleados`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `UsuarioRol` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `VentaCliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `VentaTipo` FOREIGN KEY (`tipoVenta`) REFERENCES `tipoventa` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `VentasUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuarios`);

--
-- Filtros para la tabla `ventasdetalle`
--
ALTER TABLE `ventasdetalle`
  ADD CONSTRAINT `VentaDetalle` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`idVentas`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `VentaDetalleProducto` FOREIGN KEY (`idProductos`) REFERENCES `productos` (`idProductos`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `VentaDetalleTipo` FOREIGN KEY (`idTipo`) REFERENCES `tipodetalleventa` (`idTipo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
