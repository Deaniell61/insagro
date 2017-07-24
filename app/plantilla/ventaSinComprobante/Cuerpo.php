


      <!-- ********************************** tabla inicio ********************************** -->
 <!-- ********************************** tabla inicio ********************************** -->


      <div class="row">
      <?php
	  if($_SESSION['SOFT_ACCESOAgrega'.'ventas']=='1')
				{
	  ?>
           <div>
         	<ul>
                    <li class="centrarli"><a id="ventaL" href="#!" class="amber accent-3 btn white-text tamaniobot " ><i class="material-icons left"><img class="iconotab" src="../app/img/generarv.png" /></i>Ventas</a></li>
         		  <li class="centrarli"><a id="anularV" href="#!" class="red accent-3 btn white-text tamaniobot " ><i class="material-icons left"><img class="iconotab" src="../app/img/generarv.png" /></i>Detalle Anulado</a></li>
                   
         	</ul>
          </div>

     <?php
				}?>

         <center>
<div style="display:none;">
        <center>
            <div class="radioFiltro">
                <i class="material-icons prefix"><img class="iconologin radioBoton" src="../app/img/motocicleta.png" /></i>
                <input class="radioColor" name="filtro" value="1" checked type="radio" id="motos" onChange=" mostrarVentas();" />
                <label for="motos">Motos</label>
            </div>

            <div class="radioFiltro carroEspacio">
                <i class="material-icons prefix"><img class="iconologin radioBoton" src="../app/img/coche.png" /></i>
                <input class="radioColor" name="filtro" value="2" type="radio" id="carros" onChange=" mostrarVentas();" />
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




</center>




      












          <!-- ********************************** modal ********************************** -->

          <!-- nuevo --->

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
                  <a  class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


              </div>
          </div>

          <!-- Eliminar fin --->


          <!-- modal ver -->

          	<div id="modalV" class="modal">



          	 		   <div class=" nav-wrapper grey darken-4">
                    		          <div>
                            		      <p class="encabezadotextomodal"> Ver Ventas </p>

                                  			<a id="modalcerrar1" class=" modal-action modal-close  waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                             			 </div>

                       </div>

        	             <div class="row">


          	              <div class="col s12 ">

         	 <div id="mensaje2"></div>

                                      <div class="input-field col s5">

										 <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
										<input id="NIT" disabled  class="" type="text" onKeyUp="buscarProveedor(this,event)" class="validate">
										     <label class="active" for="fecha" >Nit</label>
							  </div>
                              <div class="input-field col s5">

										 <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /> </i>
										<input id="Cliente" disabled class="" type="text" onKeyUp="buscarProveedor(this,event)" class="validate">
										    <label class="active" for="fecha" >Cliente</label>
							  </div>




                                <div class="input-field col s5">
								  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/calle.png"/></i>
								  <input id="direccionC" disabled class="" type="text" class="validate">
								   <label class="active" for="fecha" >Direccion</label>

							  </div>


                                <div class="input-field col s5">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/fecha.png"/></i>
								  <input  id="fecha" disabled  class="" type="date" class="validate">
								  <label class="active" for="fecha" >Fecha</label>
								</div>


                                <div class="input-field col s5">
								  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/factura.png"/></i>
								  <input id="factura" disabled class="" type="number" class="validate numerico">

								   <label class="active" for="fecha" >Factura</label>
							  </div>







          			         <div class="input-field col s5">

								<select id="tipoCompra" disabled  onChange="cambiarTipo(this.value,document.getElementById('codigoCompra').value);">

								  <option value="" disabled selected>Credito/Contado/Donación</option>
								  <option value="2">Credito</option>
								  <option value="1" selected>Contado</option>
								  <option value="3">Donación</option>
								</select>
								<label>Tipo de Venta</label>
							  </div>







								<div id="totalVenta" class="col s10 total">
                	
                </div>

								<!-- reumen -->


									<div id="resumenCVV2" class="col s12"  >

										tabla2

									   </div>





                </div>

          	  </div>

         </div>



          <!-- fin modal ver -->






          <!-- ********************************** modal fin ********************************** -->
