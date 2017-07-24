

   <!-- ********************************** tabla inicio ********************************** -->
 <!-- ********************************** tabla inicio ********************************** -->


      <div class="row">

         <div class="">
         	<ul>

             <li class="centrarli"><a id="ventaL" href="#!" class="amber accent-3 btn white-text tamaniobot " ><i class="material-icons left"><img class="iconotab" src="../app/img/generarv.png" /></i>Ventas</a></li>
                <li class="centrarli"><a id="Cotizacion" href="#!" class="red accent-3 btn white-text tamaniobot "><i class="material-icons left"><img class="iconotab" src="../app/img/detallec.png" /></i>Cotizacion</a></li>


         	</ul>
          </div>


      <div class="col s12 " >


 <div id="mensajeVV"></div>

          <div class="">
          				<div class="input-field col s5" hidden>


							<i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
										<input id="codigoVenta" type="text" class="validate">

							  </div>
                        <div class="input-field col s5" hidden>


							<i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
										<input id="codigoCliente" type="text" class="validate">

							  </div>
                    	<div class="input-field col s5">


							<i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
										<input id="NIT" type="text" onKeyUp="buscarCliente(this,event);" class="validate" autofocus>
										 <label for="icon_prefix" ><span class="etiquelogin">NIT </span></label>
							  </div>
                              <div class="input-field col s5">

										 <i class="material-icons prefix"><img class="iconologin" src="../app/img/carnet.png" /> </i>
										<input id="Cliente" type="text" onKeyUp="buscarCliente(this,event);siguiente(event,'direccionC');" class="validate">
										 <label for="icon_prefix" ><span class="etiquelogin">Cliente </span></label>
							  </div>



                                <div class="input-field col s10">
								  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/calle.png"/></i>
								  <input id="direccionC" type="text" class="validate" onKeyUp="siguiente(event,'fecha');">
								  <label for="icon_telephone" ><span class="etiquelogin">Direccion</span></label>
							  </div>


                                <div id="Ofecha" class="input-field col s5">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/fecha.png"/></i>
								  <input  id="fecha" type="date" class="validate" onKeyUp="siguiente(event,'factura');" value="<?php echo date('Y-m-d')?>" >
								  <label class="active" for="fecha" >Fecha</label>
								</div>

                <div id="correlativoCont" class="input-field col s5" style="display:none;">
                      <p>
                      <input name="Correlativos" type="radio" id="Correlativo" onChange="document.getElementById('factura').value=facturaCorrelacion; agregaClick();" value="1" />
                      <label for="Correlativo">Correlativo</label>


                      <input name="Correlativos" type="radio" id="NoCorrelativo" onChange="facturaCorrelacion=document.getElementById('factura').value;document.getElementById('factura').value=''; agregaClick();" value='0'/>
                      <label for="NoCorrelativo">Sin Correlativo</label>
                    </p>
                </div>


                                <div id="nofactura" class="input-field col s8">
								  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/factura.png"/></i>
								  <input id="factura" type="number" value="0" readonly class="validate numerico" onKeyUp="siguiente(event,'tipoVenta');" onBlur="agregarFacturaVenta(this.value,document.getElementById('codigoVenta').value);">
								  <label for="icon_telephone" ><span class="etiquelogin">No. Comprobante</span></label>
							  </div>


          <div id="OtipoCompra" class="input-field col s8">
                               <i  class="material-icons prefix"><img class="iconologin" src="../app/img/TipoC.png"/></i>
								<select id="tipoVenta" onChange="cambiarTipo(this.value,document.getElementById('codigoVenta').value);comprobarCredito(this);buscarPlazoCuentaCobrar();">
								  <option value="" disabled selected>Credito/Contado/Donación</option>
								  <option value="2">Credito</option>
								  <option value="1" selected>Contado</option>
								  <option value="3">Donación</option>
								</select>
								<label>Tipo de Venta</label>
							  </div>
          					<div id="cuentasContenedor" hidden>
                                 <div class="input-field col s5">
                               <i  class="material-icons prefix"><img class="iconologin" src="../app/img/TipoC.png"/></i>
								<select id="tipoPlazo" onChange="ingresoCuentaCobrar();">
								  <option value="" disabled selected>Dia/Mes/Año</option>
								  <option value="1">Dia</option>
								  <option value="2">Mes</option>
								  <option value="3">Año</option>
								</select>
								<label>Tipo de Plazo</label>
							  </div>


                                <div class="input-field col s5">
                                  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/fecha.png"/></i>
								  <input  id="plazo" type="number" class="validate"  onChange="ingresoCuentaCobrar();">
								  <label class="active" for="fecha" >Plazo</label>
								</div>

           						</div>


				<!-- reumen -->
				<center>

				  	<table>
          					  <tr>
              					  <td class="">
									<div id="botonNuevo111" ></div>
              					      <div class="input-field " id="botonNuevo" hidden>
               					         <center>
                                 <a id="modalnuevo" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesr " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i>Nuevo</a>
                               </center>
                					    </div>
               					 </td>

           					 </tr>
        		 	</table>
				<div id="totalVenta" class="col s10 total">
                	0
                </div>
				<div id="tablaCotiza" class=""  >
				 <div id="resumenC" class=""  >



					 </div>

			<div id="noExiste" style="display:none;"><br>
					<a onClick="agregaProdNoExist('tablaCotiza2')" id="nuevoNoExist" class="waves-effect waves-light btn blue lighten-1 modal-trigger  " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i>Nuevo No Existente</a>
					<div id="totalNoInventario" style="float: right;margin-right: 10%;">0</div>
					<table id='tablaCotiza2' class='bordered centered highlight responsive-table centrarT'>
      <thead>
          <tr>
          		<th style="display:none;"></th>
              <th>ID</th>
              <th>Producto</th>
              <th>Sector</th>
              <th>Precio</th>
              <th>Cantidad</th>
              <th>SubTotal</th>
              <th></th>


          </tr>
      </thead>
      <tbody></tbody>
	  </table></div>
	  <div id="totalCompleto" style="float: right;margin-right: 10%;">0</div>
					 </div>
            </center>

             <div class="input-field " id="botonGuardar" hidden>
                       <center>
                         <div id="btnGuardar" class="">
                           <a id="guardar" onClick="quitaInvetario();" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonG " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/guardar.png" /></i>Guardar</a>
						   <a id="imprimeFa" style="display:none" onClick="imprimirFactura('codigoVenta','mensaje');" class="waves-effect waves-light btn green lighten-1 modal-trigger botonG " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/imprimir.png" /></i>Imprimir</a>
						   <a id="imprimeFaC" style="display:none" onClick="imprimirFacturaCambiaria('codigoVenta','mensaje');" class="waves-effect waves-light btn green lighten-1 modal-trigger botonG " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/imprimir.png" /></i>Imprimir</a>
						   <a id="imprimePro" style="display:none" onClick="imprimirProforma('codigoVenta','mensaje');" class="waves-effect waves-light btn green lighten-1 modal-trigger botonG " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/imprimir.png" /></i>Imprimir</a>

                         </div>

                      </center>
                    </div>
           </div>
          	 <center><br>

			   <a id="imprimir"  style="display: none"  onClick="document.getElementById('nuevoNoExist').style.display='none';pintarRow();printCoti('tablaCotiza');" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonG " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/imprimir.png" /></i>Imprimir</a>
			</center>

      </div>







 </div>

















          <!-- ********************************** modal ********************************** -->

          <!-- nuevo -->

          <div id="modal1" class="modal">
              <div class="modal-content">

                  <div id="mensaje"></div>
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Ventas </p>

                                  <a id="modalcerrar1" onClick="cierre();" class=" modal-action modal-close  waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                              </div>

                          </div>
                      </div>



                   <div class="12">
                     <div class="row">


							  <div class=" col s4">
                  <div style="display: none" class="">
                             <p>
                           <input  type="checkbox" id="Moto" checked="checked" />
                           <label for="Moto">Moto</label>
                           <input   type="checkbox" id="Carro"  />
                           <label for="Carro">Carro</label>
                           </p>

                 </div>
							 	<div id="productosVenta" class="alto">

                                    </div>


							 </div>

                              <div class=" col s8">


                               					<div class="input-field col s8" hidden>
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/codigo.png"/></i>
													  <input id="codigo" type="text" class="validate">
													  <label for="icon_telephone" ><span class="etiquelogin">Codigo</span></label>
												 </div>
												 <div class="input-field col s8">
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/codigo.png"/></i>
													  <input id="nombreC" onKeyUp="buscaProductoVenta(this)" type="text" class="validate" autofocus>
													  <label for="icon_telephone" ><span class="etiquelogin">Codigo</span></label>
												 </div>


												  <div class="input-field col s8 ">
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/producto.png"/></i>
													  <input id="Producto" onKeyUp="buscaProductoVenta(this)" type="text" class="validate">
													  <label for="icon_telephone" ><span class="etiquelogin">Producto</span></label>
												  </div>
												  <div class="input-field col s8 ">
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/marca.png"/></i>
													  <input id="marca" disabled onKeyUp="buscaMarca(this)" type="text" class="validate">
													   <label for="icon_telephone" ><span class="etiquelogin">Marca</span></label>
                                                        <center>
															 <div class="listaMarca" id="listaMarca">


															 </div>
                                                         </center>
												  </div>
												   <div class="input-field col s8 ">
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/descripcion.png"/></i>
													  <input id="descripcion" disabled type="text" class="validate" onKeyUp="siguiente(event,'fecha');">
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


												   <div class="input-field col s8 ">
														  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cantidad.png"/></i>
														  <input id="Cantidad" type="text" class="validate" onKeyUp="siguiente(event,'precioC');">
														  <label for="icon_telephone" ><span class="etiquelogin">Cantidad</span></label>
												  </div>



												   <div class="input-field col s8 ">
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/precioGeneral.png"/></i>
													  <input id="precioG" disabled type="text" class="validate" onKeyUp="siguiente(event,'precioE');">
													  <label for="icon_telephone" ><span class="etiquelogin">Precio Venta general</span></label>
												  </div>
												  <div class="input-field col s4 ">

													  <a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm' onClick="deshabilita('precioG');"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>
												  </div>

												   <div class="input-field col s8 ">
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/precioEspecial.png"/></i>
													  <input id="precioE" disabled type="text" class="validate" onKeyUp="siguiente(event,'precioM');">
													  <label for="icon_telephone" ><span class="etiquelogin">Precio Venta Especial</span></label>
												  </div>
												   <div class="input-field col s4 ">

													  <a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm' onClick="deshabilita('precioE');"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>
												  </div>
												  <div class="input-field col s8 ">
													  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/precioMayoreo.png"/></i>
													  <input id="precioM" disabled type="text" class="validate" onKeyUp="siguiente(event,'compra1');">
													  <label for="icon_telephone" ><span class="etiquelogin">Precio Mayoreo</span></label>
												  </div>
												   <div class="input-field col s4 ">

													  <a class='waves-effect waves-light btn orange lighten-1 modal-trigger botonesm' onClick="deshabilita('precioM');"><i class='material-icons left'><img class='iconoeditcrud' src='../app/img/editar.png' /></i></a>
												  </div>
												   <div class="input-field col s8 ">
																<p>
																	<input type="checkbox" id="test1" name="PG" checked="checked" onClick="seleccionaPrecio('PG');" />
																  <label for="test1">Precio General</label>
																</p>

																  <p>

																  	 <input type="checkbox" id="test2" name="PE" onClick="seleccionaPrecio('PE');"  />
																  <label for="test2">Precio Especial</label>
																  </p>

																  <p>
																  	<input type="checkbox" id="test3" name="PM" onClick="seleccionaPrecio('PM');"/>
																  <label for="test3">Precio Mayoreo</label>
																  </p>


												      </div>
													  <div style="display:none;" id="cotizacionTrue"></div>



								</div>


              </div>
                   </div>
              <div class="modal-footer">
                  <a id="modalnuevo" onClick="ingresoVenta(document.getElementById('codigo').value);" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a></div>
 <script>//setTimeout(function(){buscaProductoVenta(document.getElementById('nombreC'));},500);</script>

              </div>
          </div>
          <!-- nuevo fin -->



          <!-- modal Busqueda -->

          <div id="modal4" class="modal">
              <div class="modal-content">

                  <div id="mensajeV1"></div>
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Ingreso de Clientes </p>

                                  <a id="modalcerrar1"  onClick="cierre();" class=" modal-action modal-close  waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                              </div>

                          </div>
                      </div>
                <div id="ClienteContenedor">

                </div>

              </div>

          </div>

          <!-- Busqueda Fin -->

           <!-- modal Producto -->

          <div id="modal5" class="modal">
              <div class="modal-content">
                  <form class="col s8">
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Productos </p>

                                  <a id="modalcerrar" class="  modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                              </div>

                          </div>
                      </div>
                <div id="productoContenedor">

                </div>
                  </form>
              </div>

          </div>

          <!-- Producto Fin -->

          <!-- ********************************** modal fin ********************************** -->
