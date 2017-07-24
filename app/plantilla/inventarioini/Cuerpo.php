<div id="contenidoCrud">

  
  <ul class="collapsible popout" data-collapsible="accordion">
        <li>
            <div class="collapsible-header"><i class="material-icons"><img class="imgSub" src="../app/img/flecha-hacia-abajo-signo-para-navegar.png" /></i>Inventario Inicial</div>
            <div class="collapsible-body">
                <div class="col s12">
                    <ul id="tabsn" class="tabsUsuarios centrartab blue darken-1 ">
                        <div class="lipUsuario">
                            <li class="centrarli"><a id="inventarioV" href="#" class="yellow darken-3 btn white-text tamatabsa "><i class="material-icons left"><img class="iconotab" src="../app/img/empleado.png" /></i>Vendedor</a></li>
                            <li class="centrarli"><a id="inventarioA" href="#" class="yellow darken-3   btn white-text  tamatabsa1"><i class="material-icons left"><img class="iconotab" src="../app/img/avatar.png" /></i>Administrador</a></li>
                            <li class="centrarli"><a id="inventarioI" href="#" class="yellow darken-4   btn white-text  tamatabsa"><i class="material-icons left"><img class="iconotab" src="../app/img/avatar.png" /></i>Inicial</a></li>




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
   
    <div class="centrartabla">

<?php
	  if($_SESSION['SOFT_ACCESOAgrega'.'inventario']=='1')
				{
	  ?>
        <table>
            <tr>
                <td class="">
                    <div class="input-field ">
                        <a id="modalnuevo" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesr " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i>Nuevo</a>
                    </div>	
                </td>
                <td class="">




                </td>
            </tr>
        </table><?php } ?>





        <?php 
        include('../vista/inventarioiniVista.php');
        mostrarInventario();


        ?>


        <!-- ********************************** modal ********************************** --> 

       


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

<!-- Eliminar fin -->   


<div id="modal1" class="modal">
         	    
        
         	    
          	 		   <div class=" nav-wrapper grey darken-4">
                    		          <div>
                            		      <p class="encabezadotextomodal"> Inventario Inicial </p>

                                  			<a id="modalcerrar1" class=" modal-action modal-close  waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                             			 </div>	

                       </div>
          	
        	             <div class="12">
                     <div class="row">
                     
							
							  <div class=" col s4">
							 	<div id="productosCompra">
                                   
                                    </div>
                                      
							 	
							 </div>

                              <div class=" col s8">
                              	
                             <div id="mensaje">
                                   
                                    </div>
                               					<div class="input-field col s8" hidden>
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/codigo.png"/></i>
													  <input id="codigo" type="text" class="validate">
													  <label for="icon_telephone" ><span class="etiquelogin">Codigo</span></label>
												 </div>
												 <div class="input-field col s8">
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/codigo.png"/></i>
													  <input id="nombreC" onKeyUp="buscaProducto(this)" type="text" class="validate">
													  <label for="icon_telephone" ><span class="etiquelogin">Codigo</span></label>
												 </div>
												 
												  
												  <div class="input-field col s8 ">   
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/producto.png"/></i>
													  <input id="Producto" onKeyUp="buscaProducto(this)" type="text" class="validate">
													  <label for="icon_telephone" ><span class="etiquelogin">Producto</span></label>
												  </div>
												  <div class="input-field col s8 ">   
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/marca.png"/></i>
													  <input id="marca" onKeyUp="buscaMarca(this)" type="text" class="validate">
													   <label for="icon_telephone" ><span class="etiquelogin">Marca</span></label>
                                                        <center>
															 <div class="listaMarca" id="listaMarca">
																	<script></script>

															 </div>
                                                         </center>
												  </div>
												   <div class="input-field col s8 ">   
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/descripcion.png"/></i>
													  <input id="descripcion" type="text" class="validate" onKeyUp="siguiente(event,'fecha');">
													  <label for="icon_telephone" ><span class="etiquelogin">Descripcion</span></label>
												  </div>
                                                  
												  <div class="input-field col s8">
                                                    <i  class="material-icons prefix"><img class="iconologin" src="../app/img/tipoR.png"/></i>
                                                    <select id="tipoRepuesto" onChange="cambiarTipoProd(this.value,document.getElementById('codigo').value)">
                                                      <option value="" disabled selected>Sector</option>
                                                      <option value="1">Sector Fertilizantes</option>
                                                      <option value="2">Sector Herbicidas</option>
                                                      <option value="3">Sector Insecticidas</option>
                                                      <option value="4">Sector Veterinarios</option>
                                                      <option value="5">Sector semillas</option>
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
                                                  
                                                 <div class="input-field col s8 ">
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/descripcion.png"/></i>
													  
                                                      <input id="presentacion" onKeyUp="buscaPresentacion(this);document.getElementById('idpresentacion').value='';" type="text" class="validate" >
                                                      <label for="presentacion" ><span class="etiquelogin">Presentacion</span></label>
                                                      <center>
															 <div class="listaMarca" id="listaPresentacion">


															 </div>
                                                         </center>
												  </div>
                                                   <div class="input-field col s8 " style="display:none;">
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/descripcion.png"/></i>
													  
                                                      <input id="idpresentacion" type="text" class="validate" >
                                                      <label for="idpresentacion" ><span class="etiquelogin">Presentacion</span></label>
                                                     
												  </div>
                                                   <div class="input-field col s5" id="agregarProd">
                                                  <a onClick="ingresoProducto(document.getElementById('codigo').value);" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a></div>
                                                  
												   <div class="input-field col s8 " style="display:none;">
           <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cantidad.png"/></i>
           <input id="Cantidad" type="text" class="validate" onKeyUp="siguiente(event,'precioC');">
           <label for="icon_telephone" ><span class="etiquelogin">Cantidad</span></label>
         </div>
<div id="retoCompra"  style="display:none;"></div>

								</div>
											  
 
              </div>
                   </div>   
             
 <script>setTimeout(function(){buscaProducto(document.getElementById('nombreC'));buscaMarca(document.getElementById('marca'));},500);</script>

              </div>
          </div>
          

<!-- ********************************** modal fin ********************************** -->  


