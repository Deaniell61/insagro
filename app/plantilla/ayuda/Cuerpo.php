
    

<?php
    
		
    include('../vista/ayudaVista.php');    
    mostrarAyuda();
    	
?>

 <div class="row">
     
      
      <div class="col s2  ">
         <center>
         <div class="izqC">
         	<ul>
         	   
         	   <li><a id="mapacontenidoA" href="#!" class="" >Contenido</a></li>
         		<li><a id="usuariosA" href="#!" class="" >Usuarios</a></li>
         		<li><a id="empleadosA"  href="#!" class="">Empleados</a></li>
         		<li><a id="comprasA" href="#!" class="" >Compras</a></li>
            <li><a id="cuentasCA" href="#!" class="" >Cuentas</a></li>
            <li><a id="EstadisticaA" href="#!" class="" >Estadística</a></li>
            <li><a id="ventasA" href="#!" class="" >Ventas</a></li>
            <li><a id="InventarioA" href="#!" class="" >Inventarios</a></li>
            <!--
            <li><a id="pagosA" href="#!" class="" >Pagos</a></li> -->
         	</ul>
          </div>	
         </center>
      
      </div>
      <div class="col s10 ">
         <center>
          <div class="derC"> 
          
          
          
				<!-- reumen --> 
				 <div id="resumenC"  style="display: none;" >
                   <h4>Video Resumen</h4>
				<video id="resumenV" controls>
				   <source src="../app/video/video.mp4" type="video/mp4">
				</video>

				  </div>

				  <!-- Detalle todos --> 
				   <div id="mapacontenidoC"   >
                       <h4>Contenido General</h4>
						
                     <p class="subtitulo1">Menú</p>
                	 <p class="parrafo1">Son botones de acceso a cada módulo, en la cual indicara las opciones que podrá utilizar dentro de la administración que el usuario desee según, el acceso que se hay indicado. Dentro de estos botones podemos encontrar usuarios, compras, cuentas por cobrar y cuentas por pagar, etc.</p>
                	 
				   	 <div class="controlTabs">
				     <div class="row">
				     <div class="col s12">
					 <ul id="tabsn" class="tabs tabsTa centrartab blue darken-1 ">
				     <div class="centrarlip">
				           <?php
							$class="";
							for($i=0;$i<=$_SESSION['SOFT_MODULO_NUM'];$i++)
							{
							echo '<li class="centrarli"><a id="'.$_SESSION['SOFT_MODULO_REF'][$i].'" href="#" class="blue darken-1 btn white-text tamatabsa '.$class.'"><i class="material-icons left"><img class="iconotab" src="'.$_SESSION['SOFT_MODULO_DIR'][$i].'" /></i>'.$_SESSION['SOFT_MODULO'][$i].'</a></li>';
							}
							?>
				    </div>
				                    
					</ul>
				                    
					</div>
					</div>
				 	</div> 
					 <p class="subtitulo1">Submenú</p>
                	 <p class="parrafo1">Estos botones permiten añadir más opciones a la vista de los módulos que se desea administrar, presentados por medio de un acordeón que al presionarlo,  genera las opciones correspondientes al menú que lo conforma.</p>
	                	<ul class="collapsible popout" data-collapsible="accordion">
        				<li>
            			<div class="collapsible-header"><i class="material-icons"><img class="imgSub" src="../app/img/flecha-hacia-abajo-signo-para-navegar.png" /></i>Usuarios</div>
            			<div class="collapsible-body">
                		<div class="col s12">
                    	<ul id="tabsn" class="tabsUsuarios centrartab blue darken-1 ">
                        <div class="lipUsuario">
                        <li class="centrarli"><a id="empleadoDD" href="#" class="amber accent-3 btn white-text tamatabsa "><i class="material-icons left"><img class="iconotab" src="../app/img/empleado.png" /></i>Empleados</a></li>
                        </div>
                    	</ul>
                		</div>
            			</div>
        				</li>
						</ul>
					<p class="subtitulo1">Botón Editar</p>
                	 <p class="parrafo1">Este botón permite entrar al menú contextual de edición de los formularios sobre la información que se ha almacenado dentro de la base de datos, para así poder modificar cualquier dato erróneo o actualizarlo de manera eficientemente. </p>
                	 <a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm editar' ><i class='material-icons left'><img align="center" class='iconoeditcrud' src='../app/img/editar.png' /></i></a>
                	 <p class="subtitulo1">Botón Eliminar</p>
                	 <p class="parrafo1">Botón que se utiliza para eliminar algún registro no deseado. Se aplica cuando el dato o la información no es correcta; cuando los registros no son deseados o por alguna anulación de factura o requerimiento que ya no se necesite. Al utilizarlo se mostrara una confirmación con contraseña para que el usuario este seguro de la eliminación porque al procesarlo,  los registros quedaran fuera del sistema de base de datos.</p>
                	 <a class='waves-effect waves-light btn red lighten-1 modal-trigger botonesm modaleliminar' ><i class='material-icons left'><img align="center" class='iconoaddcrud' src='../app/img/boton-borrar.png' /></i></a>
                	 <p class="subtitulo1">Botón Ver</p>
                	 <p class="parrafo1">Botón que permite visualizar todos los procesos utilizados para la ejecución correcta del sistema, permitirá ver todos los movimientos que se han generado, editado, agrupado y eliminado, como también ver la información detallada ingresada dentro de la base de datos.</p>
                	 <a class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm ver' ><i class='material-icons left'><img align="center" class='iconoeditcrud' src='../app/img/ojo.png' /></i></a></td>
                	 <p class="subtitulo1">Botón Seleccionar</p>
                	 <p class="parrafo1">Botón que permite visualizar todos los procesos utilizados para la ejecución correcta del sistema, permitirá ver todos los movimientos que se han generado, editado, agrupado y eliminado, como también ver la información detallada ingresada dentro de la base de datos.</p>
				 	<a class='waves-effect waves-light btn modal-close  green lighten-1 modal-trigger botonesm editar' ><i class='material-icons left'><img align="center" class='iconoeditcrud' src='../app/img/seleccion.png' /></i></a>
				 	<p class="subtitulo1">Botón Nuevo</p>
                	 <p class="parrafo1">Batón que permite ingresar un nuevo registro  al sistema de la base de datos, se almacenara  en las tablas correspondientes al módulo que se ha elegido. Batón agrega clientes, proveedores, compras, ventas, etc.</p>	
                	 <a id="modalnuevoP" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesr " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i>Nuevo</a>
                	 <p class="subtitulo1">Caja de Búsqueda</p>
                	 <p class="parrafo1">Esta caja de búsqueda permite localizar el registro almacenado en las tablas de la base de datos  sin importar en qué tipo de columna pertenece, ya que lo hace de manera dinámica para filtrar los datos de manera confiable. </p>	
	                  <img src='../app/img/Ayuda/imbuscar.png' width="30%" height="25%" class="" onclick="zoomToggle('30%','25%','50%','30%',this);"/>
                   <p class="subtitulo1">Filtro de Registro</p>
                   <p class="parrafo1">Permite filtrar la cantidad de registros que se muestran en la administración de los módulos para ordenar el comportamiento de la información.</p>  
                    <img src='../app/img/Ayuda/imgfiltro.png' width="25%" height="20%" class="" onclick="zoomToggle('25%','20%','50%','30%',this);"/> 
                   <p class="subtitulo1">Filtro de Información</p>
                   <p class="parrafo1">Permite separar la información mediante los botones indicados mostrando los registros según se haya seleccionado, a medida de diferenciar que compra, venta o flujo se está administrando.</p>   
                   <div>
        <center>
            <div class="radioFiltro">
                <i class="material-icons prefix"><img class="iconologin radioBoton" src="../app/img/motocicleta.png" /></i>
                <input class="radioColor" name="group1" checked="checked" type="radio" id="motos" />
                <label for="motos">Motos</label>
            </div>

            <div class="radioFiltro carroEspacio">
                <i class="material-icons prefix"><img class="iconologin radioBoton" src="../app/img/coche.png" /></i>
                <input class="radioColor" name="group1" type="radio" id="carros" />
                <label for="carros">Carros</label>
            </div>
        </center>
    </div>
                   <p class="subtitulo1">Administrador de Vistas de tablas</p>
                   <p class="parrafo1">Permite distribuir la información de la vista de los registros ingresados dentro de la base de datos mediante tablas divididas en diferentes partes según se indique en el filtro de Registros.</p>  
                    <img src='../app/img/Ayuda/imgadminlistas.png' width="25%" height="20%" class="" onclick="zoomToggle('25%','20%','50%','30%',this);"/>  

				  </div>

				

          <!-- usuarios --> 
				   <div id="usuariosC"  style="display: none;" >
                      <h4>Usuarios</h4>
					   <p class="subtitulo1">Administración de Usuarios</p>
                   <p class="parrafo1">Contiene los datos ingresados de todos los usuarios, en la cual estos permitirán la manipulación y administración del uso correspondiente del software presentado, podrá asignar un ROL específico para establecer si podrá: eliminar, editar, modificar o solo ver el modulo correspondiente.</p>  
                   <img src='../app/img/Ayuda/Usuarios1.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a)  En el módulo de usuarios podrá crear uno  nuevo según el criterio del administrador. </p>  
                   <p class="parrafo1">b)  En esta área se mostraran todos los usuarios ingresados. </p>  
                   <p class="parrafo1">c)  El módulo de usuarios contiene una caja de búsqueda que permitirá filtrar y buscar los datos de manera eficiente sobre todos los registros ingresados de usuarios.</p>  
                   <p class="parrafo1">d)  Por cada usuario ingresado se mostrara un panel de mantenimiento en la cual contiene los botones de: editar, eliminar y ver para administrarlos según el criterio del usuario.</p>  
                   <p class="parrafo1">e)  Contiene un submenú en forma de acordeón que posee los botones de empleados y usuarios para administración de cualquiera de estos módulos.</p>  
                   <p class="parrafo1">f)  Contiene un Filtro de Registro para determinar la cantidad de datos que se desea mostrar a medida de localizar la información rápidamente. </p>  
                   <p class="parrafo1">g)  Contiene un Administrador de Vistas de Tablas que muestran los registros en forma de páginas según el rango que se tiene en el Filtro de Registros.     </p>  
           <p class="subtitulo1">Nuevo Usuario</p>
                   <p class="parrafo1">Podrá crear los usuarios que desee  según los trabajadores  que posea la empresa, asignándole un ROL específico, en la cual éste estará encargado de la utilización del sistema según los módulos que  el administrador le asigne.</p>          
                   <img src='../app/img/Ayuda/Usuarios1_1.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <br><img src='../app/img/Ayuda/Usuarios2.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a) Al crear un nuevo registro deberá de ingresar un Nombre de Usuario en la cual le servirá a esta persona manipular el sistema, según los módulos que el administrador le asigne. </p>  
                   <p class="parrafo1">b) Todo usuario debe contener una contraseña específica para poder acceder al sistema. La contraseña debe volverse a escribir a medida de seguridad para determinar que las contraseñas son iguales y deben ser mayores a 9 caracteres (ej. A12345678! ).</p>  
                   <p class="parrafo1">c) El administrador o persona encargada deberá de determinar el ROL en que los usuarios utilizaran el sistema.</p>  
                   <p class="parrafo1">d) Deberá de elegir el Empleado al que pertenece esta cuenta de usuario  </p>  
                   <p class="parrafo1">e) Al terminar de llenar los registros del formulario deberá de aceptar para que almacena la información ingresada.</p>  
                   <img src='../app/img/Ayuda/Usuarios3.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">f) Cuando haya guardado el formulario anterior deberá de asignar los módulos específicos a los usuarios para la manipulación en el sistema </p> 
                   <img src='../app/img/Ayuda/Usuarios4.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <img src='../app/img/Ayuda/Usuarios5.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
				  </div>


				  <!-- empleados --> 
				   <div id="empleadosC"  style="display: none;" >
                       <h4>Empleados</h4>
						<p class="subtitulo1">Administración de Empleados</p>
                   <p class="parrafo1">Es la información necesaria que representa a todos los empleados que posee la empresa, estos pueden estar determinados como usuarios o solo puede ser una información que servirá para el flujo de efectivo. Este módulo permite el ingreso del sueldo del empleado para determinar el flujo de efectivo que se genera en un tiempo determinado. </p>  
                   <img src='../app/img/Ayuda/Empleados1.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a)  En el módulo de empleados podrá crear uno  nuevo según el criterio del administrador. </p>  
                   <p class="parrafo1">b)  En esta área se mostraran todos los empleados ingresados y si posee algun usuario activo. </p>  
                   <p class="parrafo1">c)  El módulo de empleados contiene una caja de búsqueda que permitirá filtrar y buscar los datos de manera eficiente sobre todos los registros ingresados de empleados.</p>  
                   <p class="parrafo1">d)  Por cada empleado ingresado se mostrara un panel de mantenimiento en la cual contiene los botones de: editar, eliminar y ver, para administrarlos según el criterio del usuario.</p>  
                   <p class="parrafo1">e)  Contiene un submenú en forma de acordeón que posee los botones de empleados y usuarios para administración de cualquiera de estos módulos.</p>  
                   <p class="parrafo1">f)  Contiene un Filtro de Registro para determinar la cantidad de datos que se desea mostrar a medida de localizar la información rápidamente. </p>  
                   <p class="parrafo1">g)  Contiene un Administrador de Vistas de Tablas que muestran los registros en forma de páginas según el rango que se tiene en el Filtro de Registros.     </p>  
           <p class="subtitulo1">Nuevo Empleado</p>
                   <p class="parrafo1">Podrá generar los empleados según posea la empresa.</p>          
                   <img src='../app/img/Ayuda/Empleados1_1.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <br><img src='../app/img/Ayuda/Empleados2.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a) Cuando se genera un nuevo empleado deberá ingresar el nombre o nombres que tiene la persona.</p>  
                   <p class="parrafo1">b) Deberá ingresar el o los apellidos que posea el empleado.</p>  
                   <p class="parrafo1">c) Deberá ingresar un número de teléfono para contacto del empleado (no es obligado el campo) .</p>  
                   <p class="parrafo1">d) Deberá ingresar la dirección especifica del empleado.</p>  
                   <p class="parrafo1">e) El sueldo es un ingreso necesario que permitirá determinar el flujo de efectivo dentro de los procesos que genere la empresa.</p>  
                   <p class="parrafo1">f) Deberá de seleccionar el puesto que posee la empresa.</p> 
                   <p class="parrafo1">g) Al finalizar el llenado del formulario deberá dar aceptar para almacenar los datos dentro de la base de datos correspondiente. </p> 


				  </div>

				  <!-- compras --> 
				   <div id="comprasC"  style="display: none;" >
                      <h4>Compras</h4>
						<p class="subtitulo1">Administración de Compras </p>
                   <p class="parrafo1">Módulo que permite ingresar las compras hechas por la empresa para adquirir un nuevo producto. Esta compra se distribuirá en productos, inventarios, detalle de la compra y entre otros. Este módulo es importante para el flujo correspondiente de la empresa mediante el sistema. </p>  
                   <img src='../app/img/Ayuda/compras1.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a) En esta área se mostrara el detalle de todas las compras ingresados.</p>  
                   <p class="parrafo1">b) El módulo de compras contiene una caja de búsqueda que permitirá filtrar y buscar los datos de manera eficiente sobre todos los registros ingresados del usuario.</p>  
                   <p class="parrafo1">c) Por cada detalle de compra se mostrara  un panel de mantenimiento en la cual contiene los botones de: editar, eliminar y ver para administrarlos según el criterio del usuario. Si elimina un detalle de compra pasara al detalle anulado (inciso g).</p>  
                   <p class="parrafo1">d) Contiene un Filtro de Registro para determinar la cantidad de datos que se desea mostrar a medida de localizar la información rápidamente. </p>  
                   <p class="parrafo1">e) Contiene un Administrador de Vistas de Tablas que muestran los registros en forma de páginas según el rango que se tiene en el Filtro de Registros. </p>  
                   <p class="parrafo1">f) Este módulo tiene un filtro que permitirá  observar solo motos o carros dependiendo el uso que desee.</p>  
                   <p class="parrafo1">g) De las facturas que se han eliminado podrá verlos pero no recuperarlos ya que la utilización del botón de eliminar (inciso c), se solicita una contraseña para saber si está seguro de la operación ejecutada.</p>  
                   <p class="parrafo1">h) Podrá ingresar un nuevo detalle de compras según factura o comprobante que posea</p>  
           <p class="subtitulo1">Detalle de Compras</p>
                   <p class="parrafo1">Podrá ingresar un nuevo detalle de compras</p>          
                   <img src='../app/img/Ayuda/compras2.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <br><img src='../app/img/Ayuda/compras3.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a) Para ingresar un detalle de compra deberá ingresar el NIT del proveedor. Puede escribirlo  o puede presionar la tecla ENTER para generar un nuevo proveedor.</p>  
                   <p class="parrafo1">b) Al llenar el NIT automáticamente aparece la descripción del proveedor (nombre y dirección)</p>  
                   <p class="parrafo1">c) Deberá de completar la información que se le solicite en este formulario para determinar el detalle de la compra.</p>  
                   <p class="parrafo1">d) Podrá seleccionar un tipo de compra en la cual contiene si es al contado, crédito o alguna donación adquirida. Si es al crédito deberá de establecer el tipo de plazo como el día, mes y año, como también la cantidad del plazo en la cual pagará el total del crédito a pagar.</p>  
                   <p class="parrafo1">e)  Al detalle de la compra podrá añadirle los productos que posee la empresa.</p>  
                   <p class="parrafo1">f)  Cuando ingresa un nuevo producto que contiene la factura o comprobante  se mostrará en este espacio.</p> 
                   <p class="parrafo1">g) Por cada descripción de la factura o comprobante ingresada podrá eliminarla y volverla a ingresar si no es la adecuada.</p>
                   <p class="parrafo1">h) Al finalizar de ingresar la descripción de los productos que contiene la factura o comprobante deberá de guardarla para que quede establecida en el detalle de la compra.</p> 
            <p class="subtitulo1">Crear o seleccionar un nuevo proveedor</p>
                   <p class="parrafo1">Para seleccionar o crear un nuevo proveedor deberá presionar la tecla ENTER para acceder al formulario correspondiente.</p>          
                   <img src='../app/img/Ayuda/compras4.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <br><img src='../app/img/Ayuda/compras5.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a) Podrá Generar un nuevo proveedor contemplando todos los datos de contacto correspondientes.</p>  
                   <p class="parrafo1">b) Se mostraran en este espacio y podrá seleccionarlo según el detalle de la factura. Al seleccionarlo aparecerá en el detalle de la compra que se está generando.</p>  
                   <p class="parrafo1">c) Podrá editar el proveedor si los datos no son los correctos, pero no podrá eliminarlo ya que estará ligado a toda o todas las facturas con ese proveedor.</p>  
            
            <p class="subtitulo1">Generar un nuevo producto</p>
                   <p class="parrafo1">Para crear una nueva descripción del producto que contiene la factura o comprobante deberá de ingresar los datos que califiquen al producto ya que estos serán los que se mostraran en el inventario que posee la empresa.</p>          
                   <img src='../app/img/Ayuda/compras6.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">Si el producto no existe dentro de la base de datos del inventario deberá hacer lo siguiente:.</p>          
                   <br><img src='../app/img/Ayuda/compras7.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <br><img src='../app/img/Ayuda/compras8.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a) Deberá de ingresar la información que se le solicita que permitirá describir el producto y utilizarlo de la mejor manera, ingresara un código de ese producto, nombre del producto, la marca, una pequeña descripción y el tipo de la compra.</p>  
                   <p class="parrafo1">b) Al terminar de llenar este formulario deberá de agregar este producto para guardarlo dentro la base de datos.</p>  
                   <p class="parrafo1">c) Al guardar lo podrá ingresar el estado financiero que mueve este producto como la cantidad, el precio de costo,  el precio de venta general y los demás campos se llenan automáticos según el porcentaje de ganancia que desee pero puede ser modificable si así lo prefiera.</p>
                   <p class="parrafo1">d) Deberá de aceptar al terminar de llenar el formulario que se le solicitó. Este dejara en blanco el formulario para proseguir a llenarlo nuevamente siguiendo estos pasos, al finalizar con todos los productos que posee la factura deberá de cerrar este formulario.</p>        
                   <br><p class="parrafo1">Si el producto si existe dentro de la base de datos del inventario tendrá que hacer lo siguiente:</p>          
                    <br><img src='../app/img/Ayuda/compras9.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                    <p class="parrafo1">a)  Colocar el código o producto ya existen.</p>        
                    <p class="parrafo1">b)  En este espacio se mostraran los productos similares o exactos de los que coloque (inciso a), y podrá seleccionarlos para que desplace la información del producto ya existente.</p>        
                    <p class="parrafo1">c)  Deberá colocar la cantidad y si desea podrá modificar los costos para actualizar los datos dentro de la base de datos.</p>        
                    <p class="parrafo1">d)  Deberá de aceptar al terminar de llenar el formulario que se le solicitó. Este dejara en blanco el formulario para proseguir a llenarlo nuevamente siguiendo estos pasos, al finalizar con todos los productos que posee la factura deberá de cerrar este formulario.</p>        
			             </div>
			             
			       
              <div id="cuentasCc"  style="display: none;" >
              <h4>Cuentas</h4>
               <p class="subtitulo1">Cuentas por Cobrar y Cuentas por Pagar</p>
                    <p class="parrafo1">Módulo que permite visualizar el crédito que ha generado la empresa ya sea por cobrar o por pagar, en el cual podrá abonar o acreditar según la necesidad de la empresa. Este módulo genera un aviso por cada cuenta que va a caducar, mostrará un aviso cuando hayan pasado veintiocho días (28 días)  del plazo o cinco días (5 días)  antes de vencerse el crédito.</p>          
                    <img src='../app/img/Ayuda/cuentas1.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                    <p class="parrafo1">a)  Contiene un submenú en forma de acordeón que posee los botones de cuentas por cobrar y cuentas por pagar para administración de cualquiera de estos módulos.</p>        
                    <p class="parrafo1">b)  En esta área se mostraran todos los créditos generados.</p>        
                    <p class="parrafo1">c)  Por cada crédito generado se mostrará  un panel de mantenimiento en la cual contiene los botones de: editar, y ver para administrarlos según el criterio del usuario. En el botón de ver podrá abonar al crédito o liquidar el crédito de una vez.</p>        
                    <p class="parrafo1">d)  Contiene un Filtro de Registro para determinar la cantidad de datos que se desea mostrar a medida de localizar la información rápidamente. </p>        
                    <p class="parrafo1">e)  Contiene un Administrador de Vistas de Tablas que muestran los registros en forma de páginas según el rango que se tiene en el Filtro de Registros.</p>        
                    <p class="parrafo1">f)  El módulo de cuentas  contiene una caja de búsqueda que permitirá filtrar y buscar los datos de manera eficiente sobre todos los registros ingresados del usuario.</p>        
                    <p class="parrafo1">g)  Este módulo tiene un filtro que permitirá  observar solo motos o carros dependiendo el uso que desee. </p>        
              <p class="subtitulo1">Para Abonar a una Cuenta</p>
              <p class="parrafo1">Podrá abonar a un crédito que se tenga de parte de los clientes o de los proveedores, editando el contenido.</p>        
                    <img src='../app/img/Ayuda/cuentas2.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                    <img src='../app/img/Ayuda/cuentas3.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                    <p class="parrafo1">a)  Deberá de colocar la cantidad del abono.</p>        
                    <p class="parrafo1">b)  Deberá de colocar la descripción detallando de que trató el abono.</p>        
                    <p class="parrafo1">c)  Al guardar se mostrará el saldo de la cuenta que se está abonando o acreditando.</p>        
                    <p class="parrafo1">d)  Deberá guardar el resultado del abono para que quede registrado en la base de datos.</p>        
              </div>

              <div id="cuentasPC"  style="display: none;" >
                      <h4>Cuentas por Pagar</h4>
                      <p> cuentasP </p>

              </div>

              <div id="EstadisticaC"  style="display: none;" >
                      <h4>Estadística </h4>
                    <p class="subtitulo1">Administración de Estadística </p>
                    <p class="parrafo1">Módulo que permite mostrar el flujo de la empresa por medio de gráficas circulares y de barras para determinar y comparar los diferentes ingresos que generar la empresa. La estadística muestra en un determinando rango de fechas lo que ha sucedido en la empresa.</p>          
                    <img src='../app/img/Ayuda/Estadistica.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                    <p class="parrafo1">a)  En este módulo se mostraran los botones de las diferentes estadísticas para determinar el flujo de la empresa.</p>
                    <p class="parrafo1">b)  Podrá elegir un rango de fechas para establecer los criterios de las gráficas .</p>
                    <p class="parrafo1">c)  Podrá observar una gráfica circular, en donde detallará los porcentajes correspondientes.</p>
                    <p class="parrafo1">d)  Podrá observar una gráfica de barras en la cual determinara el periodo y los objetos de comparación.</p>          
                    <p class="parrafo1">e)  En esta área determinaran todos los objetos que se estarán comparando .</p>          
                    <p class="parrafo1">f)  Botón que permite imprimir las gráficas adecuándolas a la configuración que desee el usuario </p>          



              </div>

              <div id="InventarioC"  style="display: none;" >
                      <h4>Inventario </h4>
              <p class="subtitulo1">Administración de Inventarios </p>
                   <p class="parrafo1">Módulo que permitirá mostrar los productos que fueron generados por alguna compra hecha en el sistema por el administrador o persona encargada, en la cual según la descripción, cantidad y costo que se ingresó se mostrara y se reflejará el movimiento que se le ha dado al producto. </p>  
                   <img src='../app/img/Ayuda/inventario.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a)  En esta área se mostraran todos los productos ingresados según la compra establecida. </p>  
                   <p class="parrafo1">b)  El módulo de inventario contiene una caja de búsqueda que permitirá filtrar y buscar los datos de manera eficiente sobre todos los registros ingresados de empleados.</p>  
                   <p class="parrafo1">c)  Contiene un Filtro de Registro para determinar la cantidad de datos que se desea mostrar a medida de localizar la información rápidamente. </p>  
                   <p class="parrafo1">d)  Contiene un Administrador de Vistas de Tablas que muestran los registros en forma de páginas según el rango que se tiene en el Filtro de Registros.     </p> 
                   <p class="parrafo1">e) Podrá modificar algunos datos de los productos ingresados, como los precios y otros para determinar o actualizar el producto generado. Esto lo prodrá hacer el administrador</p>  
                   <p class="parrafo1">f) Este módulo tiene un filtro que permitirá  observar solo motos o carros dependiendo el uso que desee.</p> 
                   <p class="parrafo1">g) El administrador podrá observar un submenú en forma de acordeón que desplegara las diferentes vistas de los invnetarios. Estos botones son para reflejar un inventario para vendedores y otro para el administradors.</p>  
              </div>

              <div id="ventasC"  style="display: none;" >
                      <h4>Ventas </h4>
              <p class="subtitulo1">Administración de Ventas </p>
                   <p class="parrafo1">Módulo que permite generar las ventas por medio de la búsqueda del producto que exite en el inventario. Esta venta se distribuirá en productos, inventarios, detalle de la venta y entre otros. Este módulo es importante para el flujo correspondiente de la empresa mediante el sistema. </p>  
                   <img src='../app/img/Ayuda/ventas1.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a) En esta área se mostrara el detalle de todas las ventas ingresadas.</p>  
                   <p class="parrafo1">b) El módulo de ventas contiene una caja de búsqueda que permitirá filtrar y buscar los datos de manera eficiente sobre todos los registros ingresados del usuario.</p>  
                   <p class="parrafo1">c) Por cada detalle de venta se mostrara  un panel de mantenimiento en la cual contiene los botones de: editar, eliminar y ver para administrarlos según el criterio del usuario. Si elimina un detalle de venta pasara al detalle anulado (inciso g).</p>  
                   <p class="parrafo1">d) Contiene un Filtro de Registro para determinar la cantidad de datos que se desea mostrar a medida de localizar la información rápidamente. </p>  
                   <p class="parrafo1">e) Contiene un Administrador de Vistas de Tablas que muestran los registros en forma de páginas según el rango que se tiene en el Filtro de Registros. </p>  
                   <p class="parrafo1">f) Este módulo tiene un filtro que permitirá  observar solo motos o carros dependiendo el uso que desee.</p>  
                   <p class="parrafo1">g) De las facturas que se han eliminado podrá verlos pero no recuperarlos ya que la utilización del botón de eliminar (inciso c), se solicita una contraseña para saber si está seguro de la operación ejecutada.</p>  
                   <p class="parrafo1">h) Podrá ingresar un nuevo detalle de venta según el movimiento que genere la empresa</p>  
           <p class="subtitulo1">Detalle de ventas</p>
                   <p class="parrafo1">Podrá ingresar un nuevo detalle de ventas</p>          
                   <img src='../app/img/Ayuda/ventas2.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <br><img src='../app/img/Ayuda/ventas3.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a) Para ingresar un detalle de venta deberá ingresar el NIT del cliente. Puede escribirlo  o puede presionar la tecla ENTER para generar un nuevo cliente.</p>  
                   <p class="parrafo1">b) Al llenar el NIT automáticamente aparece la descripción del cliente (nombre y dirección)</p>  
                   <p class="parrafo1">c) Deberá de completar la información que se le solicite en este formulario para determinar el detalle de la venta.</p>  
                   <p class="parrafo1">d) Podrá seleccionar un tipo de venta en la cual contiene si es al contado, crédito o alguna donación permitida. Si es al crédito deberá de establecer el tipo de plazo como el día, mes y año, como también la cantidad del plazo en la cual pagará el total del crédito a pagar.</p>  
                   <p class="parrafo1">e)  Al detalle de la venta podrá añadirle los productos que posee la empresa.</p>  
                   <p class="parrafo1">f)  Cuando ingresa un nuevo producto que solicite el cliente para su venta se mostrará en este espacio.</p> 
                   <p class="parrafo1">g) Por cada descripción de la factura ingresada podrá eliminarla y volverla a ingresar si no es la adecuada.</p>
                   <p class="parrafo1">h) Al finalizar de ingresar la descripción de los productos requeridas por el cliente deberá de guardarla para que quede establecida en el detalle de la venta.</p> 
                   <p class="parrafo1">i) Se mostrara un espacio para la impresión de una cotización que desee el cliente, esta cotización solo imprimirá y no guardar la información ya que no es un flujo que ingreso a la empresa</p> 
            <p class="subtitulo1">Crear o seleccionar un nuevo cliente</p>
                   <p class="parrafo1">Para seleccionar o crear un nuevo cliente deberá presionar la tecla ENTER para acceder al formulario correspondiente.</p>          
                   <img src='../app/img/Ayuda/ventas4.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <br><img src='../app/img/Ayuda/ventas5.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a) Podrá Generar un nuevo cliente contemplando todos los datos de contacto correspondientes.</p>  
                   <p class="parrafo1">b) Se mostraran en este espacio y podrá seleccionarlo según el detalle de la factura. Al seleccionarlo aparecerá en el detalle de la venta que se está generando.</p>  
                   <p class="parrafo1">c) Podrá editar el cliente si los datos no son los correctos, pero no podrá eliminarlo ya que estará ligado a toda o todas las facturas con ese cliente.</p>  
            
            <p class="subtitulo1">Generar un nuevo producto</p>
                   <p class="parrafo1">Para crear una nueva descripción del producto que solicite el cliente deberá de ingresar los datos que califiquen al producto que se encuentran en el inventario que posee la empresa.</p>          
                   <img src='../app/img/Ayuda/ventas6.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <br><img src='../app/img/Ayuda/ventas7.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <br><img src='../app/img/Ayuda/ventas8.jpg' width="50%" height="30%" class="" onclick="zoomToggle('50%','30%','100%','60%',this);"/>   
                   <p class="parrafo1">a) Deberá de colocar el nombre o código que tenga el producto que está ingresado dentro del inventario de la empresa y se mostrara en la parte derecha del formulario (inciso b)</p>  
                   <p class="parrafo1">b)  Se mostrara todos los productos según el código o descripción ingresada (inciso a), deberá de seleccionar el indicado por el cliente. Cuando se selecciona el producto aparecerá automáticamente la información de este. </p>  
                   <p class="parrafo1">c)  Deberá de ingresar la cantidad del producto que está pidiendo el cliente según la existencia del inventario.</p>  
                   <p class="parrafo1">d)  Dentro de los diferentes precios de venta podrá modificarlo solo el administrador del sistema para algún cliente súper especial.</p>  
                   <p class="parrafo1">e)  El sistema presentara diferentes tipos de precios que el vendedor pueda asignar al producto para la venta. Estará predeterminado el precio general pero el vendedor lo podrá cambiar según criterio del administrador.</p>  
                   <p class="parrafo1">f)  Al terminar de ingresar el formulario deberá de presionar aceptar para generar el producto, si desea vender más producto sobre la misma factura tendrá que llenar nuevamente el formulario según el producto que el cliente este solicitando y si ya no desea agregar más deberá de cerrar esta ventana.</p>  

              </div>

              <div id="pagosC"  style="display: none;" >
                      <h4>Pagos </h4>
                      <p> pagos </p>

              </div>
                   
			      
			             
			             
           </div>	   
              
         </center>
      </div>
      
      
     
 </div>



    
    
	
	
