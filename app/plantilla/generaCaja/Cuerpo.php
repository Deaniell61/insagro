

		<div>
         	<ul>

         		<li class="centrarli"><a id="CajaT2" href="#!" class="amber accent-3 btn white-text tamaniobot " ><i class="material-icons left"><img class="iconotab" src="../app/img/generarv.png" /></i>Caja</a></li>
           </ul>
          </div>

<br>
<br>
    <div class="row">



    		<div class="col s12">



<?php
$fecha3 = date('Y-m-d');
     
 $nuevafecha3 = strtotime ( '-1 month' , strtotime ( $fecha3 ) ) ;
$fecha3 = date ( 'Y-m-d' , $nuevafecha3 );

?>
<div style="display:none">
    			                 <div class="input-field col s6">

                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/fecha.png"/></i>
								  <input  id="fechaI" class="fechas" type="text" onChange="cargarGrafico('7','');
cargarGrafico('8','');
setTimeout(function(){
cargarGrafico('9','');
},500);" class="validate" onKeyUp="siguiente(event,'factura');" value="<?php echo $fecha3?>" >
								  <label class="active" for="fecha" >Fecha de Inicio</label>

								</div>

    		                      <div class="input-field col s6">

                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/fecha.png"/></i>
								  <input  id="fechaF" class="fechas" type="text" class="validate" onChange="cargarGrafico('7','');
cargarGrafico('8','');
setTimeout(function(){
cargarGrafico('9','');
},500);" value="<?php echo date('Y-m-d')?>" >
								  <label class="active" for="fecha" >Fecha Final</label>
								</div>

    			                                
</div>
<div id="mensaje">
    
</div>
<div id="contenidoImprimir">					

<div class="input-field col s12">
                                 <center>
                                 	 <h2>Corte de Caja</h2>

                                 </center>

								</div>


										<div class="col s12">
											

									<div class="col m12 borde">

                                      <center>  <h3>Ingresos</h3></center>
										<div class="col s6" >


											<br>
														<div class="col s8">
                                                             <label class="active" for="fecha" >Ventas</label>
                                                           <input  id="ventas111" class="fechas" readonly type="text"   class="validate"  value="">


													    </div>
													    <div class="col s2">
													    <a id="modalVentas" class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm modalver'  onClick=""><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>
														</div>

													    <div class="col s8">
                                                             <label class="active" for="fecha" >Ventas al Credito</label>
                                                           <input  id="VentasCredito111" class="fechas" readonly type="text"   class="validate"  value="">


													    </div>

                                                         

													   <div class="col s2">
													    <a id="modalVentasCredito" class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm modalver'  onClick=""><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>
														</div>

											          


												</div>

										         <div class=" col s6">
												    	<br>

													    <div class="col s8">
                                                             <label class="active" for="fecha" >Abonos a clientes</label>
                                                           <input  id="abonos111" type="text" readonly class="validate">


													    </div>
													    <div class="col s2">
													    <a id="modalAbonos" class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm modalver'  onClick=""><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>
														</div>

													    <div class="col s8">
                                                             <label class="active" for="fecha" >Saldo Anterior</label>
                                                           <input  id="saldoAnt111" type="text" readonly   class="validate"  value="">


													    </div>

													   

											</div>

                                     <center>  <h3>Egresos</h3></center>
										<div class="col s6" >


											<br>
														<div class="col s8">
                                                             <label class="active" for="fecha" >Gastos Varios</label>
                                                           <input  id="Gastos" class="fechas" type="text" readonly   class="validate"  value="">


													    </div>
													    <div class="col s2">
													    <a id="modalGastos" class='waves-effect waves-light btn yellow dark-1 modal-trigger botonesm modalver'  onClick=""><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/ojo.png' /></i></a>
														</div>

													   

											            

												</div>

										         <div class=" col s6">
												    	
											    </div>


										</div>
                                        <center>
                                          <div class="col s4">
                                                <label class="active" for="fecha" >Total Ingreso</label>
                                            <h5 id="totalI111">Total</h5>


                                        </div>
                                        <div class="col s4">
                                                <label class="active" for="fecha" >Total Egreso</label>
                                            <h5 id="totalE111">Total</h5>


                                        </div>
                                        <div class="col s4">
                                                <label class="active" for="fecha" >Total Corte de Caja</label>
                                            <h5 id="totalCC111">Total</h5>


                                        </div>
                                        </center>
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix"> <img class="iconologin" src="../app/img/monto.png" /></i>
                                            <input  id="descripcion" type="text" class="validate">
                                            <label class="active" for="fecha" >Descripcion</label>
                                        </div>
					<center>
                 <li class="centrarli"><a id="" onClick="ingresarCorte()" class="green accent-3 btn white-text tamaniobot " ><i class="material-icons left"><img class="iconotab" src="../app/img/guardar.png" />    Guardar</a></li>
                  <!-- <li class="centrarli"><a id="" onClick="imprimirCorte2('mensaje')" class="green accent-3 btn white-text tamaniobot " ><i class="material-icons left"><img class="iconotab" src="../app/img/imprimir.png" />    Imprimir</a></li> -->
                 
                </center>
                <br>
		</div>
</div>


</div>
    	<div id="modal1" class="modal">
        <div class="nav-wrapper grey darken-4">
            <div>
                <p class="encabezadotextomodal">Ventas</p>

                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
            </div>
        </div>
        
        
        	<div id="cuerpoModal1">
            	
            </div>
       
    	</div>

      <div id="modal2" class="modal">
        <div class="nav-wrapper grey darken-4">
            <div>
                <p class="encabezadotextomodal">Abonos Pagados</p>

                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
            </div>
        </div>
        
       		<div id="cuerpoModal2">
            	
            </div>
           
     	</div>



      <div id="modal3" class="modal">
        <div class="nav-wrapper grey darken-4">
            <div>
                <p class="encabezadotextomodal">Compras</p>

                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
            </div>
      </div>
      		<div id="cuerpoModal3">
            	
            </div>
      </div>

      <div id="modal4" class="modal">
        <div class="nav-wrapper grey darken-4">
            <div>
                <p class="encabezadotextomodal">Sueldos</p>

                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
            </div>
      </div>
        <div id="cuerpoModal4">
            	
            </div>
      </div>

      <div id="modal5" class="modal">
        <div class="nav-wrapper grey darken-4">
            <div>
                <p class="encabezadotextomodal">Creditos Pagados</p>

                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
            </div>
      </div>
      <div id="cuerpoModal5">
            	
            </div>
      </div>

      <div id="modal6" class="modal">
        <div class="nav-wrapper grey darken-4">
            <div>
                <p class="encabezadotextomodal">Gastos Varios</p>

                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
            </div>
      </div>
        <div id="cuerpoModal6">
            	
            </div>
      </div>
