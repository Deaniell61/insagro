<div id="contenidoCrud">

  
  <ul class="collapsible popout" data-collapsible="accordion">
        <li>
            <div class="collapsible-header"><i class="material-icons"><img class="imgSub" src="../app/img/flecha-hacia-abajo-signo-para-navegar.png" /></i>Inventarios</div>
            <div class="collapsible-body">
                <div class="col s12">
                    <ul id="tabsn" class="tabsUsuarios centrartab blue darken-1 ">
                        <div class="lipUsuario">
                            <li class="centrarli"><a id="inventarioV" href="#" class="yellow darken-4 btn white-text tamatabsa "><i class="material-icons left"><img class="iconotab" src="../app/img/empleado.png" /></i>Vendedor</a></li>
                             <?php
	  if($_SESSION['SOFT_ROL']=='1' or $_SESSION['SOFT_ROL']=='0' or $_SESSION['SOFT_ROL']=='3')
				{
	  ?>
                            <li class="centrarli"><a id="inventarioA" href="#" class="yellow darken-3   btn white-text  tamatabsa1"><i class="material-icons left"><img class="iconotab" src="../app/img/avatar.png" /></i>Administrador</a></li>
                       <?php
				}
				
					   ?>
                       
                  <?php
	  if($_SESSION['SOFT_ROL']=='0')
				{
	  ?>
                            <li class="centrarli"><a id="inventarioI" href="#" class="yellow darken-3   btn white-text  tamatabsa"><i class="material-icons left"><img class="iconotab" src="../app/img/avatar.png" /></i>Inicial</a></li>

			<?php
				}?>


                            <!-- <div class="indicator blue" style="z-index:1"></div>  -->
                        </div>
                    </ul>
                </div>
            </div>
        </li>
      
    </ul>  

    <!-- ********************************** tabla inicio ********************************** -->

   <div style="display:none;">
        <center>
            <div class="radioFiltro">
                <i class="material-icons prefix"><img class="iconologin radioBoton" src="../app/img/motocicleta.png" /></i>
                <input class="radioColor" name="filtro" value="1" checked type="radio" id="motos" onChange=" mostrarInventario();" />
                <label for="motos">Motos</label>
            </div>

            <div class="radioFiltro carroEspacio">
                <i class="material-icons prefix"><img class="iconologin radioBoton" src="../app/img/coche.png" /></i>
                <input class="radioColor" name="filtro" value="2" type="radio" id="carros" onChange=" mostrarInventario();" />
                <label for="carros">Carros</label>
            </div>
        </center>
    </div>

                <div class="col s12 ">
                    <div id="mensaje3"></div>
                    <!-- reumen -->
                    <div id="tablaMostrar" class="centrartabla">
                    <?php 
						include('../vista/inventarioVista.php');
						//mostrarInventario('2');
				
				
						?>
                    </div>
               </div>
   
    <div class="centrartabla">


        




        


        <!-- ********************************** modal ********************************** --> 

        <!-- nuevo ---> 

        <div id="modal1" class="modal">
            <div class="modal-content">
                <form id="formUser" class="col s8">
                    <div id="mensaje"></div>
                    <div class="row">
                        <div class="nav-wrapper grey darken-4">
                            <div>
                                <p class="encabezadotextomodal">Inventario</p>

                                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                            </div>	

                        </div>
                    </div>
                    <div class="input-field col s10">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /></i>
                        <input id="user" type="text" class="validate">
                        <label for="icon_prefix" ><span class="etiquelogin">Nombre de Usuario</span></label>
                    </div>
                    <div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                        <input id="password" type="password" class="validate">
                        <label for="icon_telephone" ><span class="etiquelogin">Contraseña</span></label>
                    </div>
                    <div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                        <input id="password2" type="password" class="validate">
                        <label for="icon_telephone" ><span class="etiquelogin">Repetir Contraseña</span></label>
                    </div>
                    <!--
<div class="input-field col s10">
<i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
<input id="icon_telephone" type="text" class="validate">
<label for="icon_telephone" ><span class="etiquelogin">Email</span></label>
</div>
-->

                    <div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/rolActivo.png"/></i>
                        <select class="selectrol" id="rol">
                            <option value="" disabled selected>Selecione un Rol</option>
                            <option value="1">Administrador</option>
                            <option value="2">Vendedor</option>
                        </select>

                    </div>

                    <div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/modulo.png"/></i>
                    </div>       

                    <div class="input-field col s10">

                        <ul id="comprasUsu" class="dropdown-content">
                            <li>
                                <p >
                                    <input type="checkbox" id="comprasIns" />
                                    <label for="comprasIns">Insertar</label>
                                </p>
                            </li>
                            <li>
                                <p >
                                    <input type="checkbox" id="comprasEdi" />
                                    <label for="comprasEdi">Editar</label>
                                </p>    
                            </li>
                            <li>
                                <p >
                                    <input type="checkbox" id="compraEli" />
                                    <label for="compraEli">Eliminar</label>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <input type="checkbox" id="compraMos" />
                                    <label for="compraMos">Mostrar</label>
                                </p>
                            </li>
                        </ul>


                        <ul id="VentasUsu" class="dropdown-content">
                            <li>
                                <p >
                                    <input type="checkbox" id="VentasIns" />
                                    <label for="VentasIns">Insertar</label>
                                </p>
                            </li>
                            <li>
                                <p >
                                    <input type="checkbox" id="VentasEdi" />
                                    <label for="VentasEdi">Editar</label>
                                </p>    
                            </li>
                            <li>
                                <p >
                                    <input type="checkbox" id="VentasEli" />
                                                                        <label for="VentasEli">Eliminar</label>
                            </p>
                        </li>
                    <li>
                        <p>
                            <input type="checkbox" id="VentasMos" />
                                                                <label for="VentasMos">Mostrar</label>
                    </p>
                </li>
            </ul>

        <ul id="InventarioUsu" class="dropdown-content">
            <li>
                <p >
                    <input type="checkbox" id="InventarioIns" />
                    <label for="comprasIns">Inventario Inicial</label>
                </p>
            </li>
            <li>
                <p>
                    <input type="checkbox" id="compraMos" />
                    <label for="compraMos">Mostrar</label>
                </p>
            </li>
        </ul> 





        <ul id="CuentaCUsu" class="dropdown-content">


            <li>
                <p>
                    <input type="checkbox" id="CuentasCIns" />
                    <label for="CuentasCIns">Insertar</label>
                </p>
            </li>
            <li>
                <p >
                    <input type="checkbox" id="CuentasCEdi" />
                    <label for="CuentasCEdi">Editar</label>
                </p>    
            </li>
            <li>
                <p >
                    <input type="checkbox" id="CuentasCEli" />
                    <label for="CuentasCEli">Eliminar</label>
                </p>
            </li>
            <li>
                <p>
                    <input type="checkbox" id="CuentasCMos" />
                    <label for="CuentasCMos">Mostrar</label>
                </p>
            </li>



        </ul>

        <ul id="CuentaPUsu" class="dropdown-content">


            <li>
                <p>
                    <input type="checkbox" id="CuentasPIns" />
                    <label for="CuentasPIns">Insertar</label>
                </p>
            </li>
            <li>
                <p >
                    <input type="checkbox" id="CuentasPEdi" />
                    <label for="CuentasPEdi">Editar</label>
                </p>    
            </li>
            <li>
                <p >
                    <input type="checkbox" id="CuentasPEli" />
                    <label for="CuentasPEli">Eliminar</label>
                </p>
            </li>
            <li>
                <p>
                    <input type="checkbox" id="CuentasPMos" />
                    <label for="CuentasPMos">Mostrar</label>
                </p>
            </li>



        </ul> 

        <ul id="EstadisticasUsu" class="dropdown-content">

            <li>
                <p>
                    <input type="checkbox" id="EstadisticaMos" />
                    <label for="CuentasPMos">Mostrar</label>
                </p>
            </li>
        </ul>

        <ul id="moduloUsu" class="dropdown-content">

            <li>
                <p>
                    <input type="checkbox" id="usuariosIns" />
                    <label for="CuentasPIns">Insertar</label>
                </p>
            </li>
            <li>
                <p >
                    <input type="checkbox" id="usuariosEdi" />
                    <label for="CuentasPEdi">Editar</label>
                </p>    
            </li>
            <li>
                <p >
                    <input type="checkbox" id="usuariosEli" />
                    <label for="CuentasPEli">Eliminar</label>
                </p>
            </li>
            <li>
                <p>
                    <input type="checkbox" id="usuariosMos" />
                    <label for="CuentasPMos">Mostrar</label>
                </p>
            </li>

        </ul>


        <div class="modulo">


            <li><a class="dropdown-button" href="#" data-activates="comprasUsu">Compras</a></li>

            <li><a class="dropdown-button" href="#" data-activates="VentasUsu">Ventas</a></li>

            <li><a class="dropdown-button" href="#" data-activates="InventarioUsu">Inventario</a></li>

            <li><a class="dropdown-button" href="#" data-activates="CuentaCUsu">Cuentas Por Cobrar</a></li>

            <li><a class="dropdown-button" href="#" data-activates="CuentaPUsu">Cuentas Por Pagar</a></li>

            <li><a class="dropdown-button" href="#" data-activates="EstadisticasUsu">Estadistica</a></li>

            <li><a class="dropdown-button" href="#" data-activates="moduloUsu">Usuarios</a></li>





        </div>
    </div>

    </form>
</div>
<div class="modal-footer">
    <a id="btnInsertar" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>
    <a id="btnActualizar" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


</div>

</div>
<!-- nuevo fin --->


<!-- Eliminar ---> 
<div id="modal3" class="modal">
    <div class="modal-content">
        <form class="col s8">
            <div class="row">
                <form class="col s10">
                    <div class="row">
                        <div class="nav-wrapper grey darken-4">
                            <div>
                                <p class="encabezadotextomodal"> Eliminar </p>

                                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                            </div>	

                        </div>

                        <div>
                            <p> Ingrese la contraseña para </p>
                        </div>

                        <div class="input-field col s10">
                            <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                            <input id="icon_telephone" type="password" class="validate">
                            <label for="icon_telephone" ><span class="etiquelogin">Contraseña</span></label>
                        </div>

                    </div>
                </form>
            </div>

        </form>
    </div>
    <div class="modal-footer">
        <a class=" modal-action waves-effect waves-light btn blue lighten-1 eliminar" >Aceptar</a>


    </div>
</div>

<!-- Eliminar fin --->   

<!-- ********************************** modal fin ********************************** -->  


