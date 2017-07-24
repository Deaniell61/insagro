<div id="contenidoCrud">

   <ul class="collapsible popout" data-collapsible="accordion">
    <li>
        <div class="collapsible-header"><i class="material-icons"><img class="imgSub" src="../app/img/flecha-hacia-abajo-signo-para-navegar.png" /></i>Empleados</div>
        <div class="collapsible-body">
          <div class="col s12">
             <ul id="tabsn" class="tabsUsuarios centrartab blue darken-1 ">
               <div class="lipUsuario">
                 <li class="centrarli"><a id="empleado" href="#" class="yellow darken-4 btn white-text tamatabsa "><i class="material-icons left"><img class="iconotab" src="../app/img/empleado.png" /></i>Empleados</a></li>
                 <li class="centrarli"><a id="usuarioUsu" href="#" class="amber accent-3  btn white-text tamatabsa "><i class="material-icons left"><img class="iconotab" src="../app/img/avatar.png" /></i>Usuarios</a></li>




                <!-- <div class="indicator blue" style="z-index:1"></div>  -->
               </div>
              </ul>
             </div>
            </div>
           </li>
         </div>
        </ul>

    <!-- ********************************** tabla inicio ********************************** -->

    <div class="centrartabla">

<?php
	if($_SESSION['SOFT_ACCESOAgrega'.'usuario']=='1')
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
        </table>



<?php
}?>

        <?php
        include('../vista/empleadoVista.php');
        mostrarEmpeados();


        ?>


        <!-- ********************************** modal ********************************** -->

        <!-- nuevo --->

        <div id="modal1" class="modal">
            <div class="modal-content">
                <form id="form1" class="col s8">
                    <div id="mensaje"></div>
                    <div class="row">
                        <div class="nav-wrapper grey darken-4">
                            <div>
                                <p class="encabezadotextomodal"> Empleado </p>

                                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="input-field col s10">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /></i>
                        <input id="nom" type="text" class="validate">
                        <label for="icon_prefix" ><span class="etiquelogin">Nombre</span></label>
                    </div>
                    <div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png"/></i>
                        <input id="apel" type="text" class="validate">
                        <label for="icon_telephone" ><span class="etiquelogin">Apellido</span></label>
                    </div>
                    <div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/telefono.png"/></i>
                        <input id="tel" type="text" class="validate">
                        <label for="icon_telephone" ><span class="etiquelogin">Telefono</span></label>
                    </div>
                    <!--
<div class="input-field col s10">
<i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
<input id="icon_telephone" type="text" class="validate">
<label for="icon_telephone" ><span class="etiquelogin">Email</span></label>
</div>
-->
                    <div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/calle.png"/></i>
                        <input id="dir" type="text" class="validate">
                        <label for="icon_telephone" ><span class="etiquelogin">Direccion</span></label>
                    </div>

                    <div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/sueldo.png"/></i>
                        <input id="sueldos" type="number" class="validate">
                        <label for="sueldos" ><span class="etiquelogin">Sueldo</span></label>
                    </div>

                    <div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/rolActivo.png"/></i>
                        <select class="selectrol" id="pue">
                            <option value="" disabled selected>Puesto</option>
                            <?php  comboPuestosEmpleado();?>
                        </select>

                    </div>

                    <!--aqui esta el select del puesto

<div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/rolActivo.png"/></i>
                        <input id="pue" type="text" class="validate">
                        <label for="icon_telephone" ><span class="etiquelogin">Puesto</span></label>
                    </div>
                    -->

    </form>
</div>
<div class="modal-footer">
    <a id="btnInsertar" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>
    <a id="btnActualizar" class=" modal-action waves-effect waves-light btn blue lighten-1 " >Aceptar</a>


</div>

</div>
<!-- nuevo fin --->


<!-- Eliminar --->
<div id="modal3" class="modal">
    <div class="modal-content">
    <div id="mensajeE"></div>
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
                            <input id="contraElim" type="password" class="validate">
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

<!-- Eliminar fin --->

<!-- ********************************** modal fin ********************************** -->
