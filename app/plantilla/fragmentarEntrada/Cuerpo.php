<div id="contenidoCrud">

    <!-- ********************************** tabla inicio ********************************** -->



    <div class="centrartabla">


        <table>
        <tr>
                <td class="">
                    <div class="input-field ">
                    
                    </div>
                </td>
                <td class="">

                <center>
                  <li class="centrarli"><a id="imprimirT" onClick="impInvConsignacion('mensaje3');" class="amber accent-3 btn white-text  " ><i class="material-icons left"><img class="iconotab" src="../app/img/imprimir.png" /></i>Imprimir Movimientos Internos Entrada</a></li>
                </center>


                </td>
            </tr>
            <tr>
                <td class="">
                    <div class="input-field ">

                    </div>
                </td>
                <td class="">

                <center>
                <li class="centrarli">
                    <a id="FragSalida"  class="red accent-2 btn white-text  " ><i class="material-icons left"><img class="iconotab" src="../app/img/salida.png" /></i>Salidas</a>
                <a id="FragEntrada"  class="green accent-5 btn white-text  " ><i class="material-icons left"><img class="iconotab" src="../app/img/entrada.png" /></i>Entradas</a></li>
                </center>


                </td>
            </tr>
        </table>                <div id="mensajeccV"></div>

        <div id="mensaje3"></div>
<div id="respuesta">
    
</div>

   <?php

    include('../vista/fragmentarVista.php');

    mostrarfragmentarEntrada();


    ?>


        <!-- ********************************** modal ********************************** -->

        <!-- nuevo -->

        <div id="modal1P" class="modal">
            <div class="modal-content">
            <div id="mensajeP2"></div>
                <form class="col s8">
                    <div class="row">
                        <div class="nav-wrapper grey darken-4">
                            <div>
                                <p class="encabezadotextomodal"> Movimientos Internos </p>

                                <a id="modalcerrar"  onClick="cierre();"  class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                            </div>

                        </div>
                    </div>

              <div class="row">
              
          <div id="nuevoFrag"  class="fragmentarFor">

        <div class="col s5">
          <div id="productosCompra" class="alto">

                             </div>
        </div>

        <div class="col s5">

            <div class="input-field col s8" style="display:none">
            <i  class="material-icons prefix"><img class="iconologin" src="../app/img/codigo.png"/></i>
            <input id="codigo" type="text" class="validate">
            <label for="icon_telephone" ><span class="etiquelogin">Codigo</span></label>
        </div>
        <div class="input-field col s6">
            <i  class="material-icons prefix"><img class="iconologin" src="../app/img/codigo.png"/></i>
            <input id="nombreC" onKeyUp="buscaProducto(this)" type="text" class="validate" autofocus>
            <label for="icon_telephone" ><span class="etiquelogin">Codigo</span></label>
        </div>


        <div class="input-field col s6 ">
            <i  class="material-icons prefix"><img class="iconologin" src="../app/img/producto.png"/></i>
            <input id="Producto" onKeyUp="buscaProducto(this)" type="text" class="validate">
            <label for="icon_telephone" ><span class="etiquelogin">Producto</span></label>
        </div>
        <div class="input-field col s8 " style="display:none">
            <i  class="material-icons prefix"><img class="iconologin" src="../app/img/marca.png"/></i>
            <input id="marca" onKeyUp="buscaMarca(this)" type="text" class="validate">
            <label for="icon_telephone" ><span class="etiquelogin">Laboratorio</span></label>
            <center>
                    <div class="listaMarca" id="listaMarca">


                    </div>
                </center>
        </div>

         <div class="input-field col s10" style="display:none">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/descripcion.png" /></i>
                        <input id="descripcion" type="text" class="validate">
                        <label for="icon_prefix" ><span class="etiquelogin">Descripcion</span></label>
                    </div>
                    <div class="input-field col s6">
                    <i  class="material-icons prefix"><img class="iconologin" src="../app/img/tipoR.png"/></i>
                    <select id="tipoRepuesto" onChange="cambiarTipoProd(this.value,document.getElementById('codigo').value)">
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
                    <div class="input-field col s6">
                    <i  class="material-icons prefix"><img class="iconologin" src="../app/img/tipoR.png"/></i>
                    <select id="idpresentacion" onChange="">
                        <?php
                        include('../vista/compra2Vista.php');
                        comboPresentacion();
                        ?>

                    </select>
                    <label>Presentacion</label>
                    </div><br>
                    <!--<div class="input-field col s8 ">
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
                        
                    </div>-->
            
            <div class="input-field col s6 ">
                <i  class="material-icons prefix"><img class="iconologin" src="../app/img/precioCosto.png"/></i>
                <input id="cantidadQ" type="text" value="0" class="validate" onKeyUp="siguiente(event,'precioG');">
                <label for="icon_telephone" ><span class="etiquelogin">Cantidad de Libras</span></label>
            </div>

            <div class="input-field col s6 ">
                <i  class="material-icons prefix"><img class="iconologin" src="../app/img/precioCosto.png"/></i>
                <input id="precioCQu" type="text" value="0" class="validate" onKeyUp="siguiente(event,'precioG');">
                <label for="icon_telephone" ><span class="etiquelogin">Precio Costo de Libra</span></label>
            </div>
            <div class="input-field col s6">
            <i  class="material-icons prefix"><img class="iconologin" src="../app/img/tipoR.png"/></i>
            <select id="prodpadre">
                <?php
                //include('../vista/fragmentarVista.php');
                comboProductos2();
                ?>

            </select>
            <label>Sector de Producto</label>
            </div>
            <div class="input-field col s6 ">
                <i  class="material-icons prefix"><img class="iconologin" src="../app/img/precioCosto.png"/></i>
                <input id="cantidadL" type="text" value="0" class="validate" onKeyUp="CalculaCostoLibra();">
                <label for="icon_telephone" ><span class="etiquelogin">Cantidad de Libras a Inventario</span></label>
            </div>

            <div class="input-field col s12 ">
                <i  class="material-icons prefix"><img class="iconologin" src="../app/img/precioCosto.png"/></i>
                <input id="DescripcionAbono" type="text"  class="validate">
                <label for="icon_telephone" ><span class="etiquelogin">Descripcion</span></label>
            </div>

            <div class="input-field col s8 " style="display:none">
                <i  class="material-icons prefix"><img class="iconologin" src="../app/img/precioCosto.png"/></i>
                <input id="precioC" type="text" value="0" class="validate" onKeyUp="" disabled>
                <label for="icon_telephone" ><span class="etiquelogin">Precio Costo</span></label>
            </div>

            
            <div class="input-field col s8 " style="display:none">
                <i  class="material-icons prefix"><img class="iconologin" src="../app/img/precioGeneral.png"/></i>
                <input id="precioG" type="text" value="0" class="validate" onKeyUp="siguiente(event,'precioE');calcularPrecios('precioE','precioM',this.value);">
                <label for="icon_telephone"  ><span class="etiquelogin">Precio Venta general</span></label>
            </div>

            <div class="input-field col s8 "  style="display:none;">
                <i  class="material-icons prefix"><img class="iconologin" src="../app/img/precioEspecial.png"/></i>
                <input id="precioE" type="text" value="0" class="validate" onKeyUp="siguiente(event,'precioM');">
                <label for="icon_telephone" ><span class="etiquelogin">Precio Venta Especial</span></label>

            </div>

            <div class="input-field col s8 "  style="display:none;">
                <i  class="material-icons prefix"><img class="iconologin" src="../app/img/precioMayoreo.png"/></i>
                <input id="precioM" type="text" value="0" class="validate" onKeyUp="siguiente(event,'compra1');">
                <label for="icon_telephone" ><span class="etiquelogin">Precio Mayoreo</span></label>
            </div>
  </div>

            <div class="modal-footer col s5 right">
                <a id="btnInsertarFrag" onClick="fragmentarProducto()" class=" modal-action waves-effect waves-light btn blue lighten-1" >Aceptar</a>
                <a id="imprimePro" style="display:;" onClick="imprimirCuentaPagar11('codigo','mensajeccV');" class="waves-effect waves-light btn green lighten-1 modal-trigger botonG " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/imprimir.png" /></i>Imprimir Recibo</a>

            </div>

          </div>
          <div id="tablaAbonos">

            </div>

        </div>
      </div>
    </div>

        <!-- nuevo fin -->





        <!-- modal distribuidor

        <div id="modal4P" class="modal">
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
        -->
        <!-- Distribuidor Fin -->


        <!-- ********************************** modal fin ********************************** -->