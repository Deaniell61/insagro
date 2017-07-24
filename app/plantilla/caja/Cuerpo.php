<div id="contenidoCrud">
  
    
    <?php
	$fecha = date('Y-m-d');
	if($_SESSION['SOFT_ACCESOAgrega'.'CajaT']=='1')
				{		?>

        <div>
         	<ul>

         		<li class="centrarli"><a id="generarCaja" href="#!" class="amber accent-3 btn white-text tamaniobot " ><i class="material-icons left"><img class="iconotab" src="../app/img/generarv.png" /></i>Generar Caja</a></li>
           </ul>
          </div>


<?php 		}	
?>       



    <!-- ********************************** tabla inicio ********************************** -->
      <div style="display:none;">
        <center>
            <div class="radioFiltro">
                <i class="material-icons prefix"><img class="iconologin radioBoton" src="../app/img/motocicleta.png" /></i>
                <input class="radioColor" name="filtro" value="1" checked type="radio" id="motos" onChange=" mostrarCuentasC();" />
                <label for="motos">Motos</label>
            </div>

            <div class="radioFiltro carroEspacio">
                <i class="material-icons prefix"><img class="iconologin radioBoton" src="../app/img/coche.png" /></i>
                <input class="radioColor" name="filtro" value="2" type="radio" id="carros" onChange=" mostrarCuentasC();" />
                <label for="carros">Carros</label>
            </div>
        </center>
    </div>

                <div class="col s12 ">
                    <div id="mensaje3"></div>
                    <!-- reumen -->
                    <div id="tablaMostrar">
					<?php 
							include('../vista/cajaVista.php');
							
					
					
							?>
                    </div>
                </div>
   
    <div class="centrartabla">







        


        <!-- ********************************** modal ********************************** --> 

        <!-- nuevo --> 

        <div id="modal1" class="modal">
           
              
                    	
                  
                        <div class="nav-wrapper grey darken-4">
                            <div>
                                <p class="encabezadotextomodal">Cuentas Por Cobrar</p>

                                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                            </div>	
						</div>
                      
                      
                      
                      
                       <div class="row">
     
        
         
      
                      <div class="col s12 ">
         
         
 <div id="mensajecc"></div>
         						
                                	<div class="input-field col s5" hidden>
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
								  <input  id="codigo" disabled type="text" class="validate">
								  <label class="active" for="fecha" >Total Credito</label>
								</div>
           
								<div class="input-field col s5">

								<i class="material-icons prefix"><img class="iconologin" src="../app/img/plazo.png" /> </i>
								<input id="fechaCorte" disabled type="date" class="validate">
								<label class="active" for="fecha" >Fecha Corte</label>
										
								</div>

                             	<div class="input-field col s5">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
								  <input  id="totalCorte" disabled type="text" class="validate">
								  <label class="active" for="fecha" >Corte</label>
								</div>
                              
                              
                               <div class="input-field col s5">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
								  <input  id="descripcion" disabled type="number" class="validate">
								  <label class="active" for="fecha" >Descripcion</label>
								</div>
                               
                                 <div class="input-field col s5">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/plazo.png"/></i>
								  <input  id="fechaAct" type="date" class="validate" value="<?php echo $fecha;?>">
								  <label class="active" for="fecha" >Fecha</label>
								</div>
                                <div class="input-field col s5">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
								  <input  id="comprobante" type="text" class="validate">
								  <label class="active" for="fecha" >Comprobante</label>
								</div>
								 <div class="input-field col s5">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
								  <input  id="nocuenta" type="text" class="validate">
								  <label class="active" for="fecha" >No. Cuenta</label>
								</div>
								 <div class="input-field col s5">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
								  <input  id="banco" type="text" class="validate">
								  <label class="active" for="fecha" >Banco</label>
								</div>
								 <div class="input-field col s5">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/monto.png"/></i>
								  <input  id="monto" type="number" class="validate">
								  <label class="active" for="fecha" >Monto</label>
								</div>
                               
                               
                              
                                                 
          
				<!-- reumen --> 
		          
				 <p id="saldoE" class=" col s3 right">Saldo Proximo Corte </p>
				 <div id="resumenCEdit" class="col s10"   >
               
				    Tabla(fecha de pago, Descripcion, Abono, Credito)
                     
					 </div>   
          
                          
                         <?php
	  if($_SESSION['SOFT_ACCESOAgrega'.'CajaT']=='1')
				{
	  ?>
                      
                        <a id="guardar" class="waves-effect waves-light btn blue lighten-1 modal-trigger" onClick="Depositar();"><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/guardar.png" /></i>Depositar</a>
                    
                   <?php
				}
				   ?>
           </div>	   
              
       
      </div>
      
 </div>


                       
<!-- nuevo fin -->



<!-- Ver --> 
<div id="modal2" class="modal">
           
              
                    	
                  
                        <div class="nav-wrapper grey darken-4">
                            <div>
                                <p class="encabezadotextomodal">Cuentas Por Cobrar</p>

                                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                            </div>	
						</div>
                      
                      
                       <div id="mensajeccV"></div>
                      
                       <div class="row">
     
        
         
      
                      <div class="col s12 ">
         
         
 
         
           
                    <div class="input-field col s10">

										 <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /> </i>
										<input id="clienteV" disabled type="text" class="validate">
							
                     <label for="icon_prefix" ><span class="etiquelogin">Cliente </span></label>        
							  </div>
                             <div class="input-field col s10">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/calle.png"/></i>
								  <input  id="direccionV" disabled type="text" class="validate">
								  <label class="active" for="Direccion" >Direccion</label>
                  
								</div>
                             
                              <div class="input-field col s5">

										 <i class="material-icons prefix"><img class="iconologin" src="../app/img/telefono.png" /> </i>
										<input  id="TelefonoV" disabled type="text" class="validate">
                  <label class="active" for="Telefono" >Telefono</label>
                          
							  </div>
                              
                              <div class="input-field col s5">

										 <i class="material-icons prefix"><img class="iconologin" src="../app/img/plazo.png" /> </i>
										<input id="fechaCredito" disabled type="date" class="validate">
										  <label class="active" for="fecha" >Fecha Inicio</label>          
							  </div>
                              
                               
                            
                            
                              <div class="input-field col s5">
                               <i  class="material-icons prefix"><img class="iconologin" src="../app/img/TipoC.png"/></i>
								<select disabled id="tipoPlazoV">
								  <option value=""  selected>Dia/Mes/Año</option>
								  <option value="1">Dia</option>
								  <option value="2">Mes</option>
								  <option value="3">Año</option>
								</select>
								 <label>Tipo de Plazo</label>    
							  </div>
                             
                              <div class="input-field col s5">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/fecha.png"/></i>
								  <input  id="plazoV" disabled type="number" class="validate">
								  <label class="active" for="fechaPlazo" >Plazo</label>    
								</div>
                              
                                  
                                
                               
                               
                               
                              
                                                 
          
				<!-- reumen --> 
		          
				 <p id="saldoV" class=" col s3 right">Saldo</p>
				 <div id="resumenCVer" class="col s10"   >
               
				    Tabla(fecha de pago, Descripcion, Abono, Credito)
                     
					 </div>   
          
                          
                         
                      
                    
                   
           </div>	   
              
       
      </div>
      
 </div>
       
<!-- Ver fin --->   

<!-- ********************************** modal fin ********************************** -->  


