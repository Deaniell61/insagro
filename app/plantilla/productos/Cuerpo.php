  <div id="contenidoCrud">
  
      <!-- ********************************** tabla inicio ********************************** -->

     
      
      <div class="centrartabla">


          <table id="nuevoProducto">
              <tr>
                  <td class="">
                      <div class="input-field ">
                          <a id="modalnuevoP" onClick="abrirProvNuevo();" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesr " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i>Nuevo</a>
                      </div>	
                  </td>
                  <td class="">




                  </td>
              </tr>
          </table>



     <?php 
      
      include('../vista/proveedorVista.php');
      if(isset($_SESSION['ingresoProd']))
	  {
		  if($_SESSION['ingresoProd']=="hola")
		  {
			  ?>
              <script>document.getElementById('nuevoProducto').hidden=true; </script>
                  <div class="input-field col s10">
                          <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /></i>
                          <input id="nombrePr" type="text" class="validate">
                          <label for="icon_prefix" ><span class="etiquelogin">Nombre</span></label>
                      </div>
                      <div class="input-field col s10">
                          <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                          <textarea id="descripcionPr" class="validate"></textarea>
                          <label for="descripcionPr" ><span class="etiquelogin">Descripcion</span></label>
                      </div>
                      <div class="input-field col s10">
                          <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /></i>
                          <input id="codigoPr" type="text" class="validate">
                          <label for="icon_prefix" ><span class="etiquelogin">Codigo</span></label>
                      </div>
                      
                  </form>
              </div>
              <div class="modal-footer">
                  <a id="btnInsertarP" onClick="ingresarProductoP();" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


              </div>
              <?php
			  
		  }
		  else
		  {
			mostrarProveedor();
		  }
	  }
      
      
      ?>


          <!-- ********************************** modal ********************************** --> 

          <!-- nuevo ---> 

          <div id="modal1Pr" class="modal">
              <div class="modal-content">
                  <form class="col s8">
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Compras </p>

                                  <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                              </div>	

                          </div>
                      </div>
                      <div class="input-field col s10">
                          <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /></i>
                          <input id="nombreP" type="text" class="validate">
                          <label for="icon_prefix" ><span class="etiquelogin">Nombre</span></label>
                      </div>
                      <div class="input-field col s10">
                          <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                          <input id="direccionP" type="text" class="validate">
                          <label for="icon_telephone" ><span class="etiquelogin">Direccion</span></label>
                      </div>
                      <div class="input-field col s10">
                          <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                          <input id="telefonoP" type="text" class="validate">
                          <label for="icon_telephone" ><span class="etiquelogin">Telefono</span></label>
                      </div>
                      <div class="input-field col s10">
                          <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                          <input id="nitP" type="text" class="validate">
                          <label for="icon_telephone" ><span class="etiquelogin">NIT</span></label>
                      </div>
                      <div class="input-field col s10">
                          <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                          <input id="cuentaDepP" type="text" class="validate">
                          <label for="icon_telephone" ><span class="etiquelogin">Cuenta de Deposito</span></label>
                      </div>
                  </form>
              </div>
              <div class="modal-footer">
                  <a id="btnInsertarP" onClick="ingresarProveedorP();" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


              </div>
          </div>
          <!-- nuevo fin --->


          <!-- Eliminar ---> 
          <div id="modal3Pr" class="modal">
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
                  <a id="modalnuevo" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


              </div>
          </div>

          <!-- Eliminar fin --->
          <!-- modal distribuidor -->
          
          <div id="modal4Pr" class="modal">
              <div class="modal-content">
                  <div class="col s8">
                      <div class="row">
                          <div class="nav-wrapper grey darken-4">
                              <div>
                                  <p class="encabezadotextomodal"> Distribuidores </p>

                                  <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a> 
                              </div>	

                          </div>
                      </div>
                <div id="distribuidorContenedor">
                </div>
                  </div>
              </div>
             
          </div>
          
          <!-- Distribuidor Fin --> 
           

          <!-- ********************************** modal fin ********************************** -->  
