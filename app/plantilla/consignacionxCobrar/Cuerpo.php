<div id="contenidoCrud">
  
    
    <ul class="collapsible popout" data-collapsible="accordion">
        <li>
            <div class="collapsible-header"><i class="material-icons"><img class="imgSub" src="../app/img/flecha-hacia-abajo-signo-para-navegar.png" /></i>Consignacion Venta</div>
                <div class="collapsible-body">        
                    <div class="col s12">
                        <ul id="tabsn" class="tabsUsuarios centrartab blue darken-1 ">
                            <div class="lipUsuario">
                                <li class="centrarli"><a id="cobrar" href="#" class="amber accent-4 btn white-text tamatabsa  "><i class="material-icons left"><img class="iconotab" src="../app/img/cuentac.png" /></i>Cobrar</a></li>
                                <li class="centrarli"><a id="pagar" href="#" class=" amber accent-4 btn white-text tamatabsa  "><i class="material-icons left"><img class="iconotab" src="../app/img/cuentap.png" /></i>Pagar</a></li>
                                <li class="centrarli"><a id="consignacion" href="#" class="amber accent-4 btn white-text tamatabsa  "><i class="material-icons left"><img class="iconotab" src="../app/img/avatar.png" /></i>Consignacion Compra</a></li>
                                <li class="centrarli"><a id="consignacionxCobrar" href="#" class="yellow darken-4 btn white-text tamatabsa  "><i class="material-icons left"><img class="iconotab" src="../app/img/avatar.png" /></i>Consignacion Venta</a></li>
                        <!-- <div class="indicator blue" style="z-index:1"></div>  -->
                            </div>
                        </ul>
                     </div>
                </div>
        </li>
    </ul>         



    <!-- ********************************** tabla inicio ********************************** -->
               <!-- <center>
                  <li class="centrarli"><a id="imprimirT" onClick="printReporte(3);" class="amber accent-3 btn white-text  " ><i class="material-icons left"><img class="iconotab" src="../app/img/imprimir.png" /></i>Reporte de Proveedores</a></li>
                  <li class="centrarli"><a id="imprimirT" onClick="printReporte(4);" class="amber accent-3 btn white-text  " ><i class="material-icons left"><img class="iconotab" src="../app/img/imprimir.png" /></i>Cuentas Vencidas</a></li>
                </center>
                <br>-->
      <div style="display:none;">
        <center>
            <div class="radioFiltro">
                <i class="material-icons prefix"><img class="iconologin radioBoton" src="../app/img/motocicleta.png" /></i>
                <input class="radioColor" name="filtro" value="1" checked type="radio" id="motos" onChange=" mostrarCuentasP();" />
                <label for="motos">Motos</label>
            </div>

            <div class="radioFiltro carroEspacio">
                <i class="material-icons prefix"><img class="iconologin radioBoton" src="../app/img/coche.png" /></i>
                <input class="radioColor" name="filtro" value="2" type="radio" id="carros" onChange=" mostrarCuentasP();" />
                <label for="carros">Carros</label>
            </div>
        </center>
    </div>

                <div class="col s12 ">
                    <div id="mensaje3"></div>
                    <!-- reumen -->
                    <div id="tablaMostrar">
                    <?php 
						include('../vista/cuentasPVista.php');
						//mostrarCuentasP();
				
				
						?>
                    </div>
                </div>
   
    <div class="centrartabla">


      

        


        <!-- ********************************** modal ********************************** --> 

        <!-- nuevo --> 

        <div id="modal1" class="modal">
           
              
                    	
                  
                        <div class="nav-wrapper grey darken-4">
                            <div>
                                <p class="encabezadotextomodal">Consignacion</p>

                                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                            </div>	
						</div>
                      
                      
                      
                      
                       <div class="row">
     
        
         
      
                      <div class="col s12 ">
         
         
 <div id="mensajecv"></div>
         
                
           			<div class="input-field col s5" hidden>
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
								  <input  id="codigo" disabled type="text" class="validate">
								  <label class="active" for="fecha" >Total Credito</label>
								</div>
                                <div class="input-field col s6">

										 <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /> </i>
										<input id="proveedorED" disabled type="text" onKeyUp="buscarCliente(this,event)" class="validate">
										 <label for="icon_prefix" ><span class="etiquelogin">Proveedor </span></label>        
							  </div>
                             <div class="input-field col s6">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
								  <input  id="totalCreditoED" disabled type="number" class="validate">
								  <label class="active" for="fecha" >Total Consignacion</label>
								</div>
                              <div class="input-field col s6">

           <i class="material-icons prefix"><img class="iconologin" src="../app/img/plazo.png" /> </i>
          <input id="fechaInicialED" disabled type="date" class="validate">
           <label class="active" for="fecha" >Fecha Inicio</label>
                 
         </div>
                              
                               <div class="input-field col s6">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
								  <input  id="saldoED" disabled type="number" class="validate">
								  <label class="active" for="fecha" >Saldo</label>
								</div>
                               
                               
                             
                             
                              
                                  <div class="input-field col s6">

										 <i class="material-icons prefix"><img class="iconologin" src="../app/img/plazo.png" /> </i>
										<input id="fechaPagoED" type="date" class="validate" value="<?php echo date('Y-m-d')?>">
										 <label class="active" for="fecha" >Fecha de Pago</label>       
							  </div>
                              
                               <div class="input-field col s6">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
								  <input  id="MontoED" type="number" onChange="verificaImpresion();" onkeyup="verificaImpresion();" class="validate" autofocus>
								  <label class="active" for="fecha" >Monto</label>
								</div>
                              
                              
                             
                                <div class="input-field col s10">   
								  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/descripcion.png"/></i>
								  <input id="descripcionED" type="text" class="validate">
								  <label for="icon_telephone" ><span class="etiquelogin">Descripcion</span></label>
							  </div>

                               
                               
                              
                                                 
          
				<!-- reumen --> 
		          
				 <p id="saldoE" class=" col s3 right">Saldo</p>
				 <div id="resumenPEdit" class="col s10"   >
               
				    Tabla(fecha de pago, Descripcion, Abono, Credito)
                     
					 </div>   
          
                          
                          <?php
	  if($_SESSION['SOFT_ACCESOAgrega'.'cuentas']=='1')
				{
	  ?>
                            <a id="guardar" class="waves-effect waves-light btn blue lighten-1 modal-trigger" onClick="abonarConsignacion();" ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/guardar.png" /></i>Guardar</a>
                       
                       
                            
                        
                        
                    <?php
				}?>
                   
           </div>	   
             <!-- <a id="imprimePro11"  onClick="imprimirCuentaPagar('codigo','mensajecv');" class="waves-effect waves-light btn green lighten-1 modal-trigger botonG " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/imprimir.png" /></i>Imprimir Detalle</a> 
          -->
       
      </div>
      
 </div>


                       
<!-- nuevo fin -->



<!-- Ver --> 

  <div id="modal2" class="modal">
           
              
                    	
                  
                        <div class="nav-wrapper grey darken-4">
                            <div>
                                <p class="encabezadotextomodal">Consignacion</p>

                                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                            </div>	
						</div>
                      
                      
                       <div id="mensajeccV"></div>
                      
                       <div class="row">
     
        
         
      
                      <div class="col s12 ">
         
         
 
         
           
                    <div class="input-field col s10">

										 <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /> </i>
										<input id="proveedorV" disabled type="text" class="validate">
                                        <label for="icon_prefix" ><span class="etiquelogin">Proveedor </span></label>        
							  </div>
                             <div class="input-field col s10">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/calle.png"/></i>
								  <input  id="direccionV" disabled type="text" class="validate">
								  <label class="active" for="Direccion" >Direccion</label>
                  
								</div>
                             
                              
                              
                              <div class="input-field col s10">

										 <i class="material-icons prefix"><img class="iconologin" src="../app/img/plazo.png" /> </i>
										<input id="fechaCredito" disabled type="date" class="validate">
										  <label class="active" for="fecha" >Fecha Inicio</label>          
							  </div>
                              
                               
                            
                            
                              
                              
                                  
                                
                               
                               
                               
                              
                                                 
          
				<!-- reumen --> 
		          
				 <p id="saldoV" class=" col s3 right">Saldo</p>
				 <div id="resumenPVer" class="col s10"   >
               
				    Tabla(fecha de pago, Descripcion, Abono, Credito)
                     
					 </div>   
          
                          
                         
                      
                    
                   
           </div>	   
              
       
      </div>
      
 </div>
<!-- Ver fin --->   

<!-- ********************************** modal fin ********************************** -->  

