


<div id="contenidoCrud">


   <ul class="collapsible popout" data-collapsible="accordion">
        <li>
            <div class="collapsible-header"><i class="material-icons"><img class="imgSub" src="../app/img/flecha-hacia-abajo-signo-para-navegar.png" /></i>Inventario del Administrador</div>
            <div class="collapsible-body">
                <div class="col s12">
                    <ul id="tabsn" class="tabsUsuarios centrartab blue darken-1 ">
                        <div class="lipUsuario">
                            <li class="centrarli"><a id="inventarioV" href="#" class="yellow darken-3 btn white-text tamatabsa "><i class="material-icons left"><img class="iconotab" src="../app/img/empleado.png" /></i>Vendedor</a></li>
                            <li class="centrarli"><a id="inventarioA" href="#" class="yellow darken-4   btn white-text  tamatabsa1"><i class="material-icons left"><img class="iconotab" src="../app/img/avatar.png" /></i>Administrador</a></li>
                            <?php
	  if($_SESSION['SOFT_ROL']=='0' || $_SESSION['SOFT_ROL']=='1')
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
<br>
<center>
                  <li class="centrarli"><a id="imprimirT" onClick="printInv(1);" class="amber accent-3 btn white-text tamaniobot " ><i class="material-icons left"><img class="iconotab" src="../app/img/imprimir.png" /></i>Imprimir Con Precio</a></li>
                  <li class="centrarli"><a id="imprimirT" onClick="printInv(2);" class="amber accent-3 btn white-text tamaniobot " ><i class="material-icons left"><img class="iconotab" src="../app/img/imprimir.png" /></i>Imprimir Sin Precio</a></li>
                </center>
                <br>
     <div style="display:none;">
        <center>
            <div class="radioFiltro">
                <i class="material-icons prefix"><img class="iconologin radioBoton" src="../app/img/motocicleta.png" /></i>
                <input class="radioColor" name="filtro" value="1" checked type="radio" id="motos" onChange=" mostrarInventarioAdmin();" />
                <label for="motos">Motos</label>
            </div>

            <div class="radioFiltro carroEspacio">
                <i class="material-icons prefix"><img class="iconologin radioBoton" src="../app/img/coche.png" /></i>
                <input class="radioColor" name="filtro" value="2" type="radio" id="carros" onChange=" mostrarInventarioAdmin();" />
                <label for="carros">Carros</label>
            </div>
        </center>
    </div>
<!--centrartabla-->
                <div class="col s12 ">
                    <div id="mensaje3"></div>
                    <!-- reumen -->
                    <div id="tablaMostrar" class="">
                    <?php 
						include('../vista/inventarioVista.php');
						//mostrarInventario('2');
				
				
						?>
                    </div>
               </div>

    <div class="centrartabla">






        <?php
        include('../vista/inventarioAdminVista.php');
        //mostrarInventarioAdmin('');


        ?>


        <!-- ********************************** modal ********************************** -->

        <!-- nuevo -->

        <div id="modal1" class="modal">
            <div class="modal-content">
                <form id="formUser" class="col s8">
                    <div id="mensajeINA"></div>
                    <div class="row">
                        <div class="nav-wrapper grey darken-4">
                            <div>
                                <p class="encabezadotextomodal">Inventario</p>

                                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                            </div>

                        </div>
                    </div>
                     <div class="input-field col s10" style="display:none;">
                      
                        <input id="idproducto" disabled type="text" class="validate">
                        <input id="idproducto2" disabled type="text" class="validate">
                        
                    </div>
                    <div class="input-field col s8">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/codigo.png"/></i>
                        <input id="codigo" onKeyUp="" type="text" class="validate">
                        <label for="icon_telephone" ><span class="etiquelogin">Codigo</span></label>
                    </div>
                    <div class="input-field col s10">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/producto.png" /></i>
                        <input id="producto" type="text" class="validate">
                        <label for="icon_prefix" ><span class="etiquelogin">Productos</span></label>
                    </div>
                    
                    <div class="input-field col s10">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/marca.png" /></i>
                        <input id="marca" type="text" class="validate">
                        <label for="icon_prefix" ><span class="etiquelogin">Marca</span></label>
                    </div>
                    <div class="input-field col s10">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/descripcion.png" /></i>
                        <input id="descripcion" type="text" class="validate">
                        <label for="icon_prefix" ><span class="etiquelogin">Descripcion</span></label>
                    </div>
                    <div class="input-field col s8">
                    <i  class="material-icons prefix"><img class="iconologin" src="../app/img/tipoR.png"/></i>
                    <select id="tipoRepuesto" onChange="">
                        <option value="" disabled selected>Sector</option>
                        <option value="1">Sector Fertilizantes</option>
                        <option value="2">Sector Herbicidas</option>
                        <option value="3">Sector Insecticidas</option>
                        <option value="4">Sector Veterinarios</option>
                        <option value="5">Sector Semillas</option>
                        <option value="6">Sector Caceros</option>
                        <option value="7">Sector Concentrados</option>
                        <option value="8">Sector Equipo Agricola</option>
                        <option value="9">Sector Foliares</option>
                        <option value="10">Sector Fungicidas</option>
                        <option value="11">Sector Adherentes</option>
                        <option value="12">Sector Bolsas</option>
                        <option value="13">Sector Plastico</option>
                        <option value="14">Sector Pintura</option>

                    </select>
                    <label>Sector de Producto</label>
                    </div>

                    <div class="input-field col s8">
                    <i  class="material-icons prefix"><img class="iconologin" src="../app/img/tipoR.png"/></i>
                    <select id="idpresentacion" onChange="">
                        <?php
                        include('../vista/compra2Vista.php');
                        comboPresentacion();
                        ?>

                    </select>
                    <label>Presentacion</label>
                    </div><br>
                    
                    
                    <div class="input-field col s8 " style="display:none;">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/descripcion.png"/></i>
                        
                        <input id="presentacion" onKeyUp="buscaPresentacion(this);document.getElementById('idpresentacion').value='';" type="text" class="validate" >
                        <label for="presentacion" ><span class="etiquelogin">Presentacion</span></label>
                        <center>
                                <div class="listaMarca" id="listaPresentacion">


                                </div>
                            </center>
                    </div>
                    <!--
                    <div class="input-field col s8 " style="display:none;">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/descripcion.png"/></i>
                        
                        <input id="idpresentacion" type="text" class="validate" >
                        <label for="idpresentacion" ><span class="etiquelogin">Presentacion</span></label>
                        
                    </div>-->
                    <div class="input-field col s10">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/precioCosto.png" /></i>
                        <input id="costo" disabled type="text" class="validate">
                        <label for="icon_prefix" ><span class="etiquelogin">Costo</span></label>
                    </div>
                    <div class="input-field col s10">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/cantidad.png" /></i>
                        <input id="cantidad" disabled type="number" class="validate">
                        <label for="icon_prefix" ><span class="etiquelogin">Cantidad</span></label>
                    </div>



                    <div class="input-field col s10">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/precioGeneral.png" /></i>
                        <input id="precioG"  type="number" class="validate" onChange="calcula();" onKeyUp="calcula();">
                        <label for="icon_prefix" ><span class="etiquelogin">Precio General</span></label>
                    </div>
                    <div class="input-field col s1">
                        <input id="precioEP"  type="text" class="validate" value="10"  onChange="calcula();" onKeyUp="calcula();">
                        <label for="icon_prefix" ><span class="etiquelogin"></span>% Especial</label>
                    </div>



                    <div class="input-field col s10">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/precioEspecial.png" /></i>
                        <input id="precioE"  disabled type="number" class="validate">
                        <label for="icon_prefix" ><span class="etiquelogin">Precio Especial</span></label>
                    </div>
                    <div class="input-field col s1">
                        <input id="precioMP"    type="number" class="validate"  value="15"  onChange="calcula();" onKeyUp="calcula();">
                        <label for="icon_prefix" ><span class="etiquelogin"></span>% Mayoreo</label>
                    </div>




                    <div class="input-field col s10">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/precioMayoreo.png" /></i>
                        <input id="precioM"  disabled type="number" class="validate">
                        <label for="icon_prefix" ><span class="etiquelogin">Precio Mayoreo</span></label>
                    </div>
                    
                    <div class="input-field col s10">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/precioMayoreo.png" /></i>
                        <input id="MinimoCant"  type="number" class="validate">
                        <label for="icon_prefix" ><span class="etiquelogin">Cantidad Minima</span></label>
                    </div>

                    <div class="modal-footer">

                        <a onClick="guardarInventario();" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


                    </div>

        </div>
    </div>

    </form>


</div>


<!-- nuevo fin -->


<!-- Eliminar -->
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
