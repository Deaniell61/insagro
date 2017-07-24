<div id="contenidoCrud">

    <ul class="collapsible popout" data-collapsible="accordion">
        <li>
            <div class="collapsible-header"><i class="material-icons"><img class="imgSub" src="../app/img/flecha-hacia-abajo-signo-para-navegar.png" /></i>Sueldo</div>
                <div class="collapsible-body">    
                    <div class="col s12">
                        <ul id="tabsn" class="tabsUsuarios centrartab blue darken-1 ">
                            <div class="lipUsuario">
                                <li class="centrarli"><a id="sueldo" href="#" class=" yellow darken-4 btn white-text tamatabsa  ">Sueldos</a></li>
                                <li class="centrarli"><a id="comi" href="#" class="amber accent-4 btn white-text tamatabsa  ">Comisiones</a></li>
                                <li class="centrarli"><a id="gastos" href="#" class="amber accent-4 btn white-text tamatabsa  ">Gastos</a></li>
                        

                        <!-- <div class="indicator blue" style="z-index:1"></div>  -->
                            </div>
                        </ul>
                     </div>
                   </div>
                 </li>
               </ul>  
 <!-- ********************************** tabla inicio ********************************** -->
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
        </table>
  
  <div class="row">
  	<div class="col s12">
  		
  		  <?php 
    
    include('../vista/pagoSueldoVista.php');
   // mostrarEstadistica();
mostrarSueldo();
    
    ?>
    
  		
  	</div>
  </div>
  
    
    
    
    
    
     <div id="modal1" class="modal">
              <div class="modal-content">
                  
                  <div id="mensajeEmpleado"></div>
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Sueldos </p>

                                  <a id="modalcerrar1" onClick="cierre();" class=" modal-action modal-close  waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                              </div>	

                          </div>
                      </div>
                      
                      <div id="Empleados" class="anchoFila col s4">
                                   
                                    </div>
                   
                  
                     <div class="row">
                    
							
							 
							 	
                             

                              <div class=" col s8 espacio">
                              	
                             
                               					<div class="input-field col s7" hidden>
													
													  <input id="codigo" type="text" class="validate">
													  
												 </div>
												 <div class="input-field col s7" >
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/codigo.png"/></i>
													  <input id="empleados" type="text" class="validate" onKeyUp="buscaEmpleado(this.value);">
													  <label for="icon_telephone" ><span class="etiquelogin">Empleado</span></label>
												 </div>
												  <div class="input-field col s7">
                                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/fecha.png"/></i>
                                                  <input  id="fecha" type="date" class="validate" value="<?php echo date('Y-m-d')?>" >
                                                  <label class="active" for="fecha" >Fecha</label>
                                                </div>
												 
												  
												 
												   <div class="input-field col s7 ">   
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/descripcion.png"/></i>
													  <input id="descripcion"  type="text" class="validate" onKeyUp="siguiente(event,'fecha');">
													  <label for="icon_telephone" ><span class="etiquelogin">Descripcion</span></label>
												  </div>
                                                  
												
                                                   
                                          
												   <div class="input-field col s7 ">   
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
													  <input id="monto" type="number" class="validate" onKeyUp="siguiente(event,'precioC');">
													  <label for="icon_telephone" ><span class="etiquelogin">Monto</span></label>
												  </div>
												  
												   
												  
                                                </div>

								
											  
 
              
                   </div>   
              <div class="modal-footer">
                  <a onClick="ingresoSueldo();" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a></div>


              </div>
          </div>
    
    
    
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
							
                        <div id="reselim" class="red"></div> 
                         
                        <div>
                            <p> Ingrese la contraseña para </p>
                        </div>

                        <div class="input-field col s10">
                            <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                            <input id="contraElim" type="password" class="validate">
                            <label for="icon_telephone" ><span class="etiquelogin">Contraseña</span></label>
                        </div>

                    </div>
                </form>
            </div>

        </form>
    </div>
    <div class="modal-footer">
        <a class=" modal-action waves-effect waves-light btn blue lighten-1" onClick="EliminarSueldo(document.getElementById('contraElim').value);" >Aceptar</a>


    </div>
</div>

<!-- Eliminar fin --->   
    
    
    
    
    
    
</div>