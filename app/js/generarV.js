//* ************************* globales *********************
var gobIDElim, gobIDEdit;
var passHabilita = 0;
var seleccionPrecio = 'PG';
var facturaCorrelacion = '';
//* *************************************************
//* ************************Iniciales
/* $('#contenidoCrud').mouseenter(function(){
    document.getElementById('formUser').reset();
});
*/
//* **********************************
//* ************************* tabla ***********************
$('#tabla2').DataTable({

    info: false,



    language: {

        search: "Buscar",
        sLengthMenu: " _MENU_ ",

        paginate: {

            previous: "Anterior",
            next: "Siguiente",

        },

    },
    /*
			   "scrollY":        "375px",
        "scrollCollapse": true,
        "paging":         true
         */
});


$('#tabla2').DataTable({

    info: false,



    language: {

        search: "Buscar",
        sLengthMenu: " _MENU_ ",

        paginate: {

            previous: "Anterior",
            next: "Siguiente",

        },

    },
    /*
			   "scrollY":        "375px",
        "scrollCollapse": true,
        "paging":         true
         */
});


//$('#tipoPlazo').material_select();

//*********************************************************

//*************** modal ***********************************
$('#modalnuevo').click(function() {
    $('#btnActualizar').hide();
    $('#btnInsertar').show();
    $('#modal1').openModal();
    document.getElementById('nombreC').focus();
});


$('.modaleliminar').click(function() {

    event.preventDefault();

    gobIDElim = event.target.dataset.elim;

    $('#modal3').openModal();

});




$(".dropdown-button").dropdown();




$('#modalcerrar1').click(function() {



});




//*********************************************************




//comprobaciones
function buscarCliente(buscar, evt) {
    if (evt.keyCode == '13' && buscar.value == "") {

        $('#modal4').openModal();
        /*setTimeout(function(){
        llamarCliente();},300);*/
    } else
    if (buscar.value == "") {

    } else
    if (evt.keyCode == '13') {
        buscarNIT(buscar.value)
    }



}



function contraAdmin111() {

    return id;
}

function deshabilita(id) {
    var trasDato;
    trasDato = 13;
    idd = 1;
    if (document.getElementById(id).disabled) {
        var contra = prompt("Ingrese Contraseña");
        $.ajax({
            type: "POST",
            url: "../core/controlador/usuarioControlador.php",
            data: ' id=' + idd + '&contra=' + contra + '&trasDato=' + trasDato,
            success: function(resp) {


                if (resp == 1) {

                    document.getElementById(id).disabled = false;
                } else {
                    alert('Contraseña Erronea');
                }




            }
        });
    } else {
        document.getElementById(id).disabled = true;
    }

}

function anularDetalleVenta1(id) {
    var trasDato;
    trasDato = 14;

    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#mensajeVV').html(resp);

            }


        }
    });
}

function seleccionaPrecio(id) {
    document.getElementsByName('PG')[0].checked = false;
    document.getElementsByName('PE')[0].checked = false;
    document.getElementsByName('PM')[0].checked = false;

    seleccionPrecio = id;
    document.getElementsByName(id)[0].checked = true;
}

function quitaInvetario() {
    cont = 0;
    var real = 1;
    cliente = $('#codigoVenta').val();
    //while(document.getElementById('Cantidad'+cont))
    {
        var cantidad, trasDato,tipo;
        cantidad = (document.getElementById('Cantidad' + cont).innerHTML);
        codigo = (document.getElementById('Codigo' + cont).innerHTML);
        
        trasDato = 13;

            if(document.getElementById('NoCorrelativo').checked){
                tipo=3;
            }else{
                tipo=1;
            }
        $.ajax({
            type: "POST",
            url: "../core/controlador/ventasControlador.php",
            data: ' codigo=' + codigo + '&tipo=' + tipo + '&cantidad=' + cantidad + '&cliente=' + cliente + '&trasDato=' + trasDato,
            success: function(resp) {

                if (resp == '1') {

                    real = 0;
                    alert('Algo salio mal');

                } else {

                    real = 1;

                    $('#mensajeVV').html(resp);


                }


            }
        });


        cont++;
    }

    if (real == 1) {

        //window.location.href="Ventas.php";
    }

}

function seleccionaMarca(mc) {
    document.getElementById('marca').value = mc;
    document.getElementById('listaMarca').hidden = false;

}

function comprobarCredito(obj) {

    if (obj.value == '2') {
        $('#cuentasContenedor').show();
    } else {
        $('#cuentasContenedor').hide();
    }
}

function limpiarProducto() {
    $('#codigo').val('');
    $('#nombreC').val('');
    $('#Producto').val('');
    $('#descripcion').val('');
    $('#tipoRepuesto').val('');
    $('#marca').val('');
    $('#Cantidad').val('');

    $('#precioG').val('');
    $('#precioE').val('');
    $('#agregarProd').show();
    $('#nombreC').focus();
    $('#precioM').val('');


}


function buscarCliente2(buscar) {
    if (buscar.value == "") {
        $('#modal4').openModal();
        /*setTimeout(function(){
        llamarCliente();},300);*/
    } else {
        buscarNIT(buscar.value)
    }


}

function buscarNIT(nit) {
    var trasDato;
    trasDato = 1;
    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' nit=' + nit + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {


                $('#mensajeVV').html(resp);

            }


        }
    });
}

function buscarPlazoCuentaCobrar() {
    var trasDato;
    trasDato = 15;
    id = document.getElementById('codigoVenta').value;
    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {


                $('#mensajeVV').html(resp);

            }


        }
    });
}

function iniciarVenta(id) {
    var trasDato;
    trasDato = 2;
    tipo = document.getElementById('tipoVenta').value;
    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' prov=' + id + '&tipo=' + tipo + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#mensajeVV').html(resp);

            }


        }
    });
}

function verificaProductoCompra() {

    if (document.getElementById('codigoProd').value != "") {
        ingresoCompra(document.getElementById('codigoProd').value);
    } else {

        $('#productoNom').focus();

    }
}

function ingresoVenta(prod) {

    var cantidad, trasDato;
    trasDato = 3;
    cantidad = $('#Cantidad').val();
    precioG = $('#precioG').val();
    precioE = $('#precioE').val();
    precioM = $('#precioM').val();
    cliente = $('#codigoCliente').val();
    var precioGuardar = precioG;
    switch (seleccionPrecio) {
        case 'PG':
            {
                precioGuardar = precioG;
                break;
            }
        case 'PE':
            {
                precioGuardar = precioE;
                break;
            }
        case 'PM':
            {
                precioGuardar = precioM;
                break;
            }
    }

    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' prod=' + prod + '&cantidad=' + cantidad + '&precioG=' + precioG + '&precioGuardar=' + precioGuardar + '&precioE=' + precioE + '&precioM=' + precioM + '&cliente=' + cliente + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#mensaje').html(resp);
               agregaClick();

            }


        }
    });
}

function guardarCompra() {
    var trasDato;
    trasDato = 4;

    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: 'trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#mensaje').html(resp);

            }


        }
    });
}

function cargarDetalleVentas(id) {
    var trasDato;
    trasDato = 5;

    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#resumenC').html(resp);


            }


        }
    });
}

function llamarCliente() {

    $.ajax({
        type: "POST",
        url: "Clientes.php",
        success: function(resp) {
            $('#ClienteContenedor').html(resp);
        }
    });
}

function llamarProducto() {


    $('#modal5').openModal();
    $.ajax({
        type: "POST",
        url: "Productos.php",
        data: ' id=1',
        success: function(resp) {
            $('#productoContenedor').html(resp);
        }
    });


}

function buscaProductoVenta(obj) {
    var prod = obj.value;
    var trasDato;
    trasDato = 6;

    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' prod=' + prod + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#productosVenta').html(resp);


            }


        }
    });


}

function buscaMarca(obj) {
    var prod = obj.value;
    var trasDato;
    trasDato = 11;

    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' id=' + prod + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#listaMarca').html(resp);


            }


        }
    });


}

function seleccionaProductoVenta(codprod) {
    var prod = codprod;
    var trasDato;
    trasDato = 7;

    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' prod=' + prod + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#mensajeV1').html(resp);


            }


        }
    });
}

function cambiarTipo(tipo, id) {

    var trasDato;
    trasDato = 9;
    //alert(2);
    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#mensajeC').html(resp);
                agregaClick();

            }


        }
    });
}
function agregaClick(){
    var div=document.getElementById('btnGuardar');
    document.getElementById('imprimePro').style.display='none';
    document.getElementById('imprimeFaC').style.display='none';
    document.getElementById('imprimeFa').style.display='none';
    var filto="";
 
        var porNombre=document.getElementsByName("Correlativos");
        
        for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked){
                filto=porNombre[i].value;}
        }
    if(filto=='1'){
        switch(document.getElementById('tipoVenta').value){
            case '1':{
                
            document.getElementById('imprimeFa').style.display='';
                break;
            }
            case '2':{
                
            document.getElementById('imprimeFaC').style.display='';
            break;
            }
           default:{
                
            document.getElementById('imprimePro').style.display='';
            break;
            }
        }
    }else{
            document.getElementById('imprimePro').style.display='';
    }
}
function agregarFacturaVenta(tipo, id) {

    var trasDato;
    trasDato = 12;
    //alert(2);
    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#mensajeC').html(resp);


            }


        }
    });
}

function cambiarTipoProd(tipo, id) {

    var trasDato;
    trasDato = 2;
    //alert(2);
    $.ajax({
        type: "POST",
        url: "../core/controlador/productoControlador.php",
        data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#mensajeC').html(resp);


            }


        }
    });
}

function ingresoCuentaCobrar() {

    var trasDato;
    trasDato = 1;
    //alert(2);
    tipo = document.getElementById('tipoPlazo').value;
    plazo = document.getElementById('plazo').value;
    id = document.getElementById('codigoVenta').value;
    $.ajax({
        type: "POST",
        url: "../core/controlador/cuentasCobrarControlador.php",
        data: ' tipo=' + tipo + '&plazo=' + plazo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');
                //$('#precargar').hide();
            } else {



                $('#mensajeVV').html(resp);


            }


        }
    });
}
//**********************

var contRow = 0;
//*****************  cotizacion ************************/

function agregaProdNoExist(id) {
    var table = document.getElementById(id);
    var row = table.insertRow(table.rows.length);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    var cell4 = row.insertCell(3);
    var cell5 = row.insertCell(4);
    var cell6 = row.insertCell(5);
    cell1.id = "ID1R" + contRow;
    cell2.id = "Prod2R" + contRow;
    cell3.id = "Tipo3R" + contRow;
    cell4.id = "Precio4R" + contRow;
    cell5.id = "Cantidad5R" + contRow;
    cell6.id = "Subtotal6R" + contRow;
    cell1.innerHTML = "Producto Nuevo";
    cell2.innerHTML = '<input type="text" id="ProdF2R' + contRow + '">';
    cell3.innerHTML = '<div class="input-field"><select id="TipoF3R' + contRow + '"><option value="" disabled selected>Sector</option>'+
                                                      '<option value="1">Sector Fertilizantes</option>'+
                                                      '<option value="2">Sector Herbicidas</option>'+
                                                      '<option value="3">Sector Insecticidas</option>'+
                                                      '<option value="4">Sector Veterinarios</option>'+
                                                      '<option value="5">Sector semillas</option>'+
                                                      '<option value="6">Sector Caceros</option>'+
                                                      '<option value="7">Sector Concentrados</option>'+
                                                      '<option value="8">Sector Equipo Agricola</option>'+
                                                      '<option value="9">Sector Foliares</option>'+
                                                      '<option value="10">Sector Fungicidas</option>'+
                                                      '<option value="11">Sector Adherentes</option>'+
                                                      '<option value="12">Sector Bolsas</option>'+
                                                      '<option value="13">Sector Plastico</option>'+
                                                      '<option value="14">Sector Pintura</option> </select></div>';
    cell4.innerHTML = '<input type="number" id="PrecioF4R' + contRow + '" onKeyUp="document.getElementById(\'SubtotalF6R' + contRow + '\').value=\'Q.\'+(document.getElementById(\'CantidadF5R' + contRow + '\').value*this.value).toFixed(2);sumarTotal(\'SubtotalF6R\',\'' + contRow + '\');">';
    cell5.innerHTML = '<input type="number" id="CantidadF5R' + contRow + '" onKeyUp="document.getElementById(\'SubtotalF6R' + contRow + '\').value=\'Q.\'+(document.getElementById(\'PrecioF4R' + contRow + '\').value*this.value).toFixed(2);sumarTotal(\'SubtotalF6R\',\'' + contRow + '\');">';
    cell6.innerHTML = '<input type="text" id="SubtotalF6R' + contRow + '" readonly onChange="sumarTotal(this);">';
    setTimeout(function() {
        $('#TipoF3R' + contRow).material_select();
    }, 100);
    contRow++;
    $('select').material_select();


}
function sumarTotal(esto,num){
    var total=0;
    var table = document.getElementById('tablaCotiza2');
    var row = table.rows.length-1;
    for(i=0;i<row;i++){
        if(document.getElementById(esto+i).value!=''){
            total=parseFloat(total)+parseFloat(document.getElementById(esto+i).value.replace('Q.',''));
        }
    }
    var totalPermitido=parseFloat(document.getElementById('totalVenta').innerHTML.replace('Total de esta Venta: ','').replace('<strong>','').replace('</strong>','').replace('Q',''));
    document.getElementById('totalNoInventario').innerHTML='Total: Q.'+(total).toFixed(2);
    document.getElementById('totalCompleto').innerHTML='Total de Todos los Productos: Q.'+(total+totalPermitido).toFixed(2);
}

function pintarRow() {
    for (i = 0; i < contRow; i++) {
        var cell2 = document.getElementById('ProdF2R' + i).value;
        document.getElementById('Prod2R' + i).innerHTML = cell2;
        var cell3 = document.getElementById('TipoF3R' + i).value;
        document.getElementById('Tipo3R' + i).innerHTML = cell3;
        var cell4 = document.getElementById('PrecioF4R' + i).value;
        document.getElementById('Precio4R' + i).innerHTML = "Q." + cell4;
        var cell5 = document.getElementById('CantidadF5R' + i).value;
        document.getElementById('Cantidad5R' + i).innerHTML = cell5;
        var cell6 = document.getElementById('SubtotalF6R' + i).value;
        document.getElementById('Subtotal6R' + i).innerHTML = "Q." + cell6;
    }
    $("#totalNoInventario").hide();
}
$("#Cotizacion").click(function() {
    $("#Ofecha").hide();
    $("#nofactura").hide();
    $("#btnGuardar").hide();
    $("#OtipoCompra").hide();
    $("#Cotizacion").hide();
    $("#noExiste").css('display', '');
    $("#generarV").show();
    $("#imprimir").show();
    $("#NIT").focus();
    /*document.getElementById("marca").disabled = false;
    document.getElementById("descripcion").disabled = false;
    document.getElementById("Cantidad").disabled = false;
    document.getElementById("precioG").disabled = false;
    document.getElementById("precioE").disabled = false;
    document.getElementById("precioM").disabled = false;
    $('#tipoRepuesto').material_select();
    document.getElementById('cotizacionTrue').innerHTML = "1";*/


});