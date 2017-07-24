  <div id="contenidoCrud">
  
     

      <!-- ********************************** tabla inicio ********************************** -->

     
      
      <div class="centrartabla">


          <table>
              <tr>
                  <td class="">
                      <div class="input-field ">
                          <a id="modalnuevoD" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesr " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i>Nuevo</a>
                      </div>	
                  </td>
                  <td class="">




                  </td>
              </tr>
          </table>



     <?php 
      
      include('../vista/distribuidorVista.php');
      
      mostrarDistribuidor();
      
      
      ?>


          <!-- ********************************** modal ********************************** --> 

          <!-- nuevo ---> 

          <div id="modal1D" class="modal">
              <div class="modal-content">
                  <form class="col s8">
                  <div id="mensaje"></div>
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
                          <input id="NIT" type="text" onKeyUp="buscarProveedor(this,event)" class="validate">
                          <label for="icon_prefix" ><span class="etiquelogin">NIT</span></label>
                      </div>
                      <div class="input-field col s10">
                          <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                          <input id="nombreC" type="text" class="validate">
                          <label for="icon_telephone" ><span class="etiquelogin">Nombre</span></label>
                      </div>
                      <div class="input-field col s10">
                          <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                          <input id="direccionC" type="text" class="validate">
                          <label for="icon_telephone" ><span class="etiquelogin">Direccion</span></label>
                      </div>
                    <div class="input-field col s10">
                          <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                          <input id="cantidad" type="number" class="validate">
                          <label for="icon_telephone" ><span class="etiquelogin">Cantidad</span></label>
                      </div>
                    <div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/rolActivo.png"/></i>
                        <select class="selectrol" id="producto" onChange="ingresoCompra(this);">
                            <option value="" disabled selected>Selecione un Producto</option>
                            <option value="1">Repuesto</option>
                            <option value="2">Vendedor</option>
                        </select>

                    </div>
                      <div id="productosCompra"></div>
                  </form>
              </div>
              <div class="modal-footer">
                  <a id="modalnuevo" onClick="guardarCompra();" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


              </div>
          </div>
          <!-- nuevo fin --->

          <!-- Eliminar ---> 
          <div id="modal3D" class="modal">
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
          
             

          <!-- ********************************** modal fin ********************************** -->  
