<div id="contenidoCrud">


    <ul class="collapsible popout" data-collapsible="accordion">
        <li>
            <div class="collapsible-header"><i class="material-icons"><img class="imgSub" src="../app/img/flecha-hacia-abajo-signo-para-navegar.png" /></i>Usuarios</div>
            <div class="collapsible-body">
                <div class="col s12">
                    <ul id="tabsn" class="tabsUsuarios centrartab blue darken-1 ">
                        <div class="lipUsuario">
                            <li class="centrarli"><a id="empleado" href="#" class="amber accent-3 btn white-text tamatabsa "><i class="material-icons left"><img class="iconotab" src="../app/img/empleado.png" /></i>Empleados</a></li>
                            <li class="centrarli"><a id="usuarioUsu" href="#" class="yellow darken-4   btn white-text tamatabsa "><i class="material-icons left"><img class="iconotab" src="../app/img/avatar.png" /></i>Usuarios</a></li>




                            <!-- <div class="indicator blue" style="z-index:1"></div>  -->
                        </div>
                    </ul>
                </div>
            </div>
        </li>

    </ul>

<?php
	if($_SESSION['SOFT_ROL']=='1' || $_SESSION['SOFT_ROL']=='0')
				{		?>
<ul id="tabsn" class="tabsUsuarios centrartab blue darken-1 ">
    <div class="lipUsuario">

           <li class="centrarli" onClick="deshabilitarUsuariosTurno('5','1');"><a href="#" class="red accent-4 btn white-text ">Deshabilitar Usuarios</a></li>
            <li class="centrarli" onClick="deshabilitarUsuariosTurno('1','5');"><a href="#" class="green accent-7 btn white-text ">Habilitar Usuarios</a></li>

          
<!-- <div class="indicator blue" style="z-index:1"></div>  -->
    </div>
</ul>
<?php 		}	
?>
    <!-- ********************************** tabla inicio ********************************** -->

    <div class="centrartabla">
	
    <?php
	if($_SESSION['SOFT_ACCESOAgrega'.'usuario']=='1')
				{		?>

        <table>
            <tr>
                <td class="">
                    <div class="input-field ">
                        <a id="modalnuevo" class="waves-effect waves-light btn blue lighten-1 modal-trigger botonesr " ><i class="material-icons left"><img class="iconoaddcrud" src="../app/img/anadir.png" /></i>Nuevo</a>
                    </div>
                </td>
                
            </tr>
        </table>


<?php 		}	
?>

		<div id="resultadoUsu"></div>

        <?php
        include('../vista/usuarioVista.php');
        mostrarUsuarios();


        ?>


        <!-- ********************************** modal ********************************** -->

        <!-- nuevo -->

        <div id="modal1" class="modal">
            <div class="modal-content">
                <form id="formUser" class="col s12">
                    	<div id="mensaje"></div>
                    <div class="row">
                        <div class="nav-wrapper grey darken-4">
                            <div>
                                <p class="encabezadotextomodal">Usuario</p>

                                <a id="modalcerrar" class=" modal-action modal-close waves-effect waves-light right  " ><i class="material-icons prefix" onClick="cerrarEsto();"><img class="iconocerrarmodal" src="../app/img/desenfrenado.png"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="input-field col s10" hidden>
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /></i>
                        <input id="codigo" type="text" class="validate">

                    </div>
                    <div class="input-field col s10">
                        <i class="material-icons prefix"><img class="iconologin" src="../app/img/usuario.png" /></i>
                        <input id="user" type="text" class="validate">
                        <label for="icon_prefix" ><span class="etiquelogin">Nombre de Usuario</span></label>
                    </div>
                    <div class="input-field col s10" id="passwordRow">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                        <input id="password" type="password" class="validate">
                        <label for="icon_telephone" ><span class="etiquelogin">Contraseña</span></label>
                    </div>
                    <div class="input-field col s10" id="password2Row">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                        <input id="password2" type="password" class="validate">
                        <label for="icon_telephone" ><span class="etiquelogin">Repetir Contraseña</span></label>
                    </div>

                  
                    <!--
<div class="input-field col s10">
<i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
<input id="icon_telephone" type="text" class="validate">
<label for="icon_telephone" ><span class="etiquelogin">Email</span></label>
</div>
-->

                    <div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/rolActivo.png"/></i>
                        <select class="selectrol" id="rol">
                            <option value="" disabled selected>Selecione un Rol</option>
                            <?php  comboRolesUsuarios();?>
                        </select>

                    </div>
                    
                    <div class="input-field col s10">
                        <i  class="material-icons prefix"><img class="iconologin" src="../app/img/rolActivo.png"/></i>
                        <select class="selectrol" id="emple">
                            <option value="" disabled selected>Selecione un Empleado</option>
                           		<?php  comboEmpleados();?>
                        </select>

                    </div>

                      <div class="input-field col s10">
						  <i  class="material-icons prefix"><img class="iconologin" src="../app/img/modulo.png"/></i>
                     <label for="">Modulos</label>
                     <br>
                     <br>
                      </div>


                      <div class="row" id="Modulos" hidden>







                      </div>







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
<div id="mensajeElim111"></div>
                        <div>
                            <p> Ingrese la contraseña para </p>
                        </div>

                        <div class="input-field col s10">
                            <i  class="material-icons prefix"><img class="iconologin" src="../app/img/cerrojo-cerrado.png"/></i>
                            <input id="contraElim" type="password" class="validate" onKeyUp="verificaEnter(event);">
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
