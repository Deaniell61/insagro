//************************** globales *********************
var gobIDElim,gobIDEdit;
var passHabilita=0;
//**************************************************
//*************************Iniciales
/*$('#contenidoCrud').mouseenter(function(){
    document.getElementById('formUser').reset();
});
*/
//***********************************
//************************** tabla ***********************


$('select').material_select(); 

//*********************************************************

//*************** modal ***********************************
$('#modalnuevo').click(function(){
    $('#btnActualizar').hide();
    $('#btnInsertar').show();
    $('#modal1').openModal();
});

$('#modalVer').click(function(){
    $('#btnActualizar').hide();
    $('#btnInsertar').show();
    $('#modal2').openModal();
});

$('.modaleliminar').click(function(){

    event.preventDefault();

    gobIDElim = event.target.dataset.elim;

    $('#modal3').openModal();

});




$(".dropdown-button").dropdown();

//*********************************************************




function mostrarCuentasP()
{
	var filto="";
 
        var porNombre=document.getElementsByName("filtro");
        
        for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked)
                filto=porNombre[i].value;
        }

	var  trasDato;
	trasDato = 13;
	
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/cuentasPagarControlador.php",
            data:' tipo=' +  filto + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
                    
					
					 $('#tablaMostrar').html(resp); 
					 
					 $('#tabla').DataTable( {

											info:     false,
										
										
										
											language: {
										
												search: "Buscar",
												sLengthMenu:" _MENU_ ",
										
												paginate:{
										
													previous: "Anterior",
													next: "Siguiente",
										
												},
										
											},
											/*
													   "scrollY":        "375px",
												"scrollCollapse": true,
												"paging":         true
												 */
										} );
										$('select').material_select();

                }


            }     
        });
}
function cargarDetalleCuentasP(id)
{
	var  trasDato;
	trasDato = 4;
		
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/cuentasPagarControlador.php",
            data:' id=' +  id + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
					
                    
					
					 $('#resumenPVer').html(resp);
					  $('#resumenPEdit').html(resp);
					  

                }


            }     
        });
}
function abonarCuenta()
{
	 
    var idedit, trasDato; 
		
    trasDato = 5;
	var abono=document.getElementById('MontoED').value;
	var fecha=document.getElementById('fechaPagoED').value;
	var descripcion=document.getElementById('descripcionED').value;
	var saldo=document.getElementById('saldoED').value;
	var credito=document.getElementById('totalCreditoED').value;
	var id=document.getElementById('codigo').value;
			
    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/cuentasPagarControlador.php",
        data:'id=' + id  + '&abono=' + abono  + '&fecha=' + fecha  + '&saldo=' + saldo  + '&descripcion=' + descripcion  + '&credito=' + credito  + '&trasDato=' + trasDato,
        success: function(resp)
        {


			
            $('#mensajecv').html(resp); 
            // $('#precargar').css('display','none');  
				alert(3);



        }     
    });            

}
function editar(id)
{
	 
    var idedit, trasDato; 

    $('#modal1').openModal();

    trasDato = 2;


    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/cuentasPagarControlador.php",
        data:'id=' + id  + '&trasDato=' + trasDato,
        success: function(resp)
        {



            $('#mensajecv').html(resp); 
            // $('#precargar').css('display','none');  




        }     
    });            

}
function ver(id)
{
	 
    var idedit, trasDato; 

    $('#modal2').openModal();

    trasDato = 3;


    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/cuentasPagarControlador.php",
        data:'id=' + id  + '&trasDato=' + trasDato,
        success: function(resp)
        {



            $('#mensajeccV').html(resp); 
            // $('#precargar').css('display','none');  




        }     
    });            

}

$('.eliminar').click(function(event)
                     {

    var idelim, trasDato; 

    idelim=gobIDElim;

    trasDato = 3;


    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/usuarioControlador.php",
        data:'idelim=' + idelim  + '&trasDato=' + trasDato,
        success: function(resp)
        {

            console.log(idelim);

            //$('#mensaje').html(resp); 
            //$('#precargar').css('display','none');  
            $("#user").val("");
            $("#password").val("");

            if(resp == '1')
            {

                //$('#mensaje').html('Datos Incorrectos.');         
                //$('#precargar').hide();    
            }
            else
            {

                setTimeout(window.location.reload(), 3000);


            }


        }     
    });            

});







$('.editar').click(function(event)
                   {

    event.preventDefault();

    var idedit, trasDato; 

    gobIDEdit = event.target.dataset.edit;

    idedit = gobIDEdit;

    $('#modal1').openModal();

    trasDato = 4;


    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/usuarioControlador.php",
        data:'idedit=' + idedit  + '&trasDato=' + trasDato,
        success: function(resp)
        {



            $('#mensaje').html(resp); 
            // $('#precargar').css('display','none');  




        }     
    });            

});

$('#btnActualizar').click(function()
                          {

    var idedit, trasDato, user, pass, rol; 

    idedit = gobIDEdit;

    trasDato = 5;
    //$('#precargar').show();


    if($('#password').val()=="")
    {
        passHabilita=1;
    }

    if(passHabilita==1)
    {
        user = $('#user').val();

        pass = $('#password').val();

        rol = $('#rol').val();

        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/usuarioControlador.php",
            data:' user=' +  user + '&pass=' + pass + '&rol=' + rol+ '&id=' + idedit + '&trasDato=' + trasDato,
            success: function(resp)
            {

                //console.log(trasDato);


                //$('#mensaje').html(resp); 
                // $('#precargar').css('display','none');  
                $("#user").val("");
                $("#password").val("");

                if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {


                    setTimeout(window.location.reload(), 3000);


                }


            }     
        });
    }
    else
    {
        alert('password erroneo');
    }


});

function verificaImpresion(){
    monto=$('#MontoED').val();

    if(monto>0){
        document.getElementById('SelectCheque').style.display='';
        document.getElementById('BI').checked=true;
        document.getElementById('imprimir1').style.display='';
        document.getElementById('nombreChequeED111').style.display='';
    }else{
        document.getElementById('SelectCheque').style.display='none';
        document.getElementById('imprimir1').style.display='none';
        document.getElementById('imprimir').style.display='none';
        document.getElementById('nombreChequeED111').style.display='none';
    }
}

function imprimirCuentaPagar11(id,div){
var cuerpo="";
if(document.getElementById(id))
{
    id=document.getElementById(id).value;
}
    $('#'+div).html('<div id="impresionDeProforma11"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br><p>Cliente: </p>";
    //$('#impresionDeProforma11').html(encab);
     var trasDato;
    trasDato = 15;
    tipo=1;
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../core/controlador/cuentasPagarControlador.php",
        data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

           //alert(resp['DetalleCuentaC'].length);
           cuerpo="";
           cuerpo+='<div class="logoProforma"><img class=\"logoProf\" src=\"../app/img/logoinsagro1.png\"/></div>'+
           '<div class="diaProforma">'+resp['CuentaC']['dia']+'</div><div class="mesProforma">'+resp['CuentaC']['mes']+'</div><div class="anioProforma">'+resp['CuentaC']['anio']+'</div>'+
           '<div class="nombreProforma">'+resp['CuentaC']['1']+'</div>'+
           '<div class="direccionProforma">'+resp['CuentaC']['3']+'</div>'+
           '<table class="detalleProforma espacioproforma">';
          cuerpo+='<tr>'+
                    '<td class="cantidadFilaProforma"></td>'+
                    '<td class="descripcionFilaProforma">'+currency(resp['CuentaC']['9'])+' a plazo de '+resp['CuentaC']['6']+' '+resp['CuentaC']['7']+'</td>'+
                    '<td class="unidadFilaProforma">-</td>'+
                    '<td class="subtotalFilaProforma">'+resp['CuentaC']['9']+'</td>'+
                    '</tr>';
          if(resp['DetalleCuentaC'])
          {if(resp['DetalleCuentaC'].length>0 && resp['DetalleCuentaC'][0]['descripcion'])
           {
                for(i=0;i<resp['DetalleCuentaC'].length;i++){
                    cuerpo+='<tr>'+
                    '<td class="cantidadFilaProforma"></td>'+
                    '<td class="descripcionFilaProforma">'+resp['DetalleCuentaC'][i]['descripcion']+'</td>'+
                    '<td class="unidadFilaProforma">'+resp['DetalleCuentaC'][i]['abono']+'</td>'+
                    '<td class="subtotalFilaProforma">'+resp['DetalleCuentaC'][i]['saldo']+'</td>'+
                    '</tr>';
                }
           }}
          cuerpo+='</table>';
          cuerpo+='<div class="totalProformaLET">'+NumeroALetras(resp['total'])+'</div>';
          cuerpo+='<div class="totalProforma">'+parseFloat(resp['total'])+'</div>';
          $('#impresionDeProforma11').html(cuerpo);
           ImprimirVar('impresionDeProforma11');
        }
    });


    
        
       
    
   
   //$('#'+div).html("");


}

function imprimirCuentaPagar(id,div){
$('#'+div).html('<div id="impresionCuentaC"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br>";
    var cuerpo="";
if(document.getElementById(id))
{
    id=document.getElementById(id).value;
}
    var trasDato;
    trasDato = 15;
    tipo=1;
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../core/controlador/cuentasPagarControlador.php",
        data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {
           // alert(resp['estatus']);
           //alert(resp['DetalleVenta'].length);
           cuerpo="";
           cuerpo+=encab+'<div class="ingresos">'+
           '<center><h5 style="text-align: left;" class="CuentasTitulo">Proveedor: '+(resp['CuentaC']['1'])+'</h5></center>'+
           '<center><div style="text-align: left;">Direccion: '+(resp['CuentaC']['3'])+'</div></center>'+
           '<center><div style="text-align: left;">Total Cuenta: '+currency(resp['CuentaC']['9'])+' </div></center>'+
           '<center><div style="text-align: left;">Fecha Inicio: '+(resp['CuentaC']['0'])+' </div></center>'+
           '<center><div style="text-align: left;">Dias Transcurrido: '+(resp['CuentaC']['diasTrans'])+' </div></center>'+
           '</div>';
          if(resp['DetalleCuentaC']) 
          {if(resp['DetalleCuentaC'].length>0 && resp['DetalleCuentaC'][0]['descripcion']){
           cuerpo+='<div class="deposito">'+
           '<center><h5>Abonos</h5>';
           cuerpo+='<table  class="depositos">';
           cuerpo+='<tr>'+
                    '<th>Descripcion</th>'+
                    '<th>Abono</th>'+
                    '<th>Saldo</th>'+
                    '</tr>';
           o=0;
           total=0;
                for(i=0;i<resp['DetalleCuentaC'].length;i++){
                    o=i;
                    cuerpo+='<tr class="FilaDeposito">'+
                    '<td class="fechaFila">'+resp['DetalleCuentaC'][i]['descripcion']+'</td>'+
                    '<td class="noCuentaFila">'+currency(resp['DetalleCuentaC'][i]['abono'])+'</td>'+
                    '<td class="bancoFila">'+currency(resp['DetalleCuentaC'][i]['saldo']+"")+'</td>'+
                    '</tr>';
                total+=parseFloat(resp['DetalleCuentaC'][i]['abono']);
               }
            cuerpo+='</table></center></div>';
             cuerpo+='<table  class="depositos">';
           
           
                    cuerpo+='<tr class="FilaDeposito" style="border-top-style: solid;">'+
                    '<td class="fechaFila">Credito menos Abonos:</td>'+
                    '<td class="noCuentaFila" style="text-align: right;">'+currency(resp['CuentaC']['9'])+' - '+currency(total+"")+' = </td>'+
                    '<td class="bancoFila" style="text-align: left;"> '+currency(resp['DetalleCuentaC'][o]['saldo']+"")+'</td>'+
                    '</tr>';
                    cuerpo+='<tr class="FilaDeposito" style="border-top-style: double;">'+
                    '<td class="fechaFila">Saldo</td>'+
                    '<td class="noCuentaFila">  </td>'+
                    '<td class="bancoFila"><strong> '+currency(resp['DetalleCuentaC'][o]['saldo']+"")+'</strong></td>'+
                    '</tr>';
               
            cuerpo+='</table></center></div>';
            
           }}
           
          $('#impresionCuentaC').html(cuerpo);
          
          //document.getElementById('impresionDeFactura11').print();
          // setTimeout(function(){printDiv('impresionDeFactura11');},500);
          ImprimirVar('impresionCuentaC');
        },
            error: function( jqXHR, textStatus, errorThrown ) {

          if (jqXHR.status === 0) {

            alert('Not connect: Verify Network.');

          } else if (jqXHR.status == 404) {

            alert('Requested page not found [404]');

          } else if (jqXHR.status == 500) {

            alert('Internal Server Error [500].');

          } else if (textStatus === 'parsererror') {

            alert('Requested JSON parse failed.');

          } else if (textStatus === 'timeout') {

            alert('Time out error.');

          } else if (textStatus === 'abort') {

            alert('Ajax request aborted.');

          } else {

            alert('Uncaught Error: ' + jqXHR.responseText);

          }

        }
    });
    
        
       
        
    
}


function CuentasPagarPorCliente(div){
    

    
    $('#'+div).html('<div id="impresionCuentas"></div>');
    var encab="<div class=\"navbar-fixed\"  style=\"margin-bottom: 50px;\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br>";
    //$('#impresionDeFacturaC11').html(encab);
     var cuerpo=""+encab;
     var trasDato;
    trasDato = 16;
    tipo=1;
    id=1;
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../core/controlador/cuentasPagarControlador.php",
            data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
            success: function(resp) {

                for(i=0;i<resp.length;i++)
                {
                        cuerpo+='<div class="CuentasCliente"><div class="ingresos">'+
                        '<center><h5 style="text-align: left;" class="CuentasTitulo">Proveedor: '+(resp[i]['nombre'])+'</h5></center>'+
                        '</div>';
                        
                    if(resp[i]['Abonos'])
                    {
                        if(resp[i]['Abonos'].length>0 && resp[i]['Abonos'][0][0])
                        {
                            cuerpo+='<div class="deposito">'+
                            '<center>';
                            cuerpo+='<table  class="depositos">';
                            cuerpo+='<tr class="FilaCuentasCliente">'+
                                        '<th class="CuentasClienteColumna">Fecha</th>'+
                                        '<th class="CuentasClienteColumna">Plazo</th>'+
                                        '<th class="CuentasClienteColumna">Dias Transcurridos</th>'+
                                        '<th class="CuentasClienteColumna">Comprobante</th>'+
                                        '<th class="CuentasClienteColumna">Total Credito</th>'+
                                        '<th class="CuentasClienteColumna">Abonado</th>'+
                                        '<th class="CuentasClienteColumna">Saldo</th>'+
                                        '</tr>';
                            o=0;
                            total=0;
                                    for(c=0;c<resp[i]['Abonos'].length;c++){
                                        o=i;
                                        cuerpo+='<tr class="FilaCuentasCliente">'+
                                        '<td class="CuentasClienteColumna">'+(resp[i]['Abonos'][c][0])+'</td>'+
                                        '<td class="CuentasClienteColumna">'+(resp[i]['Abonos'][c][1])+'</td>'+
                                        '<td class="CuentasClienteColumna">'+(resp[i]['Abonos'][c]['difDia'])+'</td>'+
                                        '<td class="CuentasClienteColumna">'+(resp[i]['Abonos'][c][6]==null?'':resp[i]['Abonos'][c][6])+'</td>'+
                                        '<td class="CuentasClienteColumna">'+currency(resp[i]['Abonos'][c][3]+'')+'</td>'+
                                        '<td class="CuentasClienteColumna">'+currency(resp[i]['Abonos'][c][5]+'')+'</td>'+
                                        '<td class="CuentasClienteColumna">'+currency(resp[i]['Abonos'][c][4]+'')+'</td>'+
                                        '</tr>';
                                        total+=parseFloat(resp[i]['Abonos'][c][4]);
                                    }
                                cuerpo+='</table></center></div></div>';

                            

                        }
                    }
                }
                        
                        $('#impresionCuentas').html(cuerpo);
                        
                        //document.getElementById('impresionDeFactura11').print();
                        // setTimeout(function(){printDiv('impresionDeFactura11');},500);
                        ImprimirVar('impresionCuentas');
            },
            error: function( jqXHR, textStatus, errorThrown ) {

          if (jqXHR.status === 0) {

            alert('Not connect: Verify Network.');

          } else if (jqXHR.status == 404) {

            alert('Requested page not found [404]');

          } else if (jqXHR.status == 500) {

            alert('Internal Server Error [500].');

          } else if (textStatus === 'parsererror') {

            alert('Requested JSON parse failed.');

          } else if (textStatus === 'timeout') {

            alert('Time out error.');

          } else if (textStatus === 'abort') {

            alert('Ajax request aborted.');

          } else {

            alert('Uncaught Error: ' + jqXHR.responseText);

          }

        }
        });
    
 }
function CuentasPagarVencidas(div){
    

    
    $('#'+div).html('<div id="impresionCuentas"></div>');
    var encab="<div class=\"navbar-fixed\"  style=\"margin-bottom: 50px;\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br>";
    //$('#impresionDeFacturaC11').html(encab);
     var cuerpo=""+encab;
     var trasDato;
    trasDato = 17;
    tipo=1;
    id=1;
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../core/controlador/cuentasPagarControlador.php",
            data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
            success: function(resp) {
                   
                    cuerpo+='<div class="deposito">'+
                            '<center><h5 class="CuentasTitulo">Cuentas Vencidas</h5>';
                    cuerpo+='<table  class="depositos">';
                    cuerpo+='<tr class="FilaCuentasCliente">'+
                                '<th class="CuentasClienteColumna">Fecha</th>'+
                                '<th class="CuentasClienteColumna">Plazo</th>'+
                                '<th class="CuentasClienteColumna">Dias Transcurridos</th>'+
                                '<th class="CuentasClienteColumna">Comprobante</th>'+
                                '<th class="CuentasClienteColumna">Proveedor</th>'+
                                '<th class="CuentasClienteColumna">Total Credito</th>'+
                                '<th class="CuentasClienteColumna">Abonado</th>'+
                                '<th class="CuentasClienteColumna">Saldo</th>'+
                                '</tr>';
                     
                    o=0;
                    total=0;
                    if(resp.length>0 && resp[0][0])
                    {
                            for(c=0;c<resp.length;c++){
                                o=c;
                                cuerpo+='<tr class="FilaCuentasCliente">'+
                                '<td class="CuentasClienteColumna">'+(resp[c][0])+'</td>'+
                                '<td class="CuentasClienteColumna">'+(resp[c][1])+'</td>'+
                                '<td class="CuentasClienteColumna">'+(resp[c]['difDia'])+'</td>'+
                                '<td class="CuentasClienteColumna">'+(resp[c][6]==null?'':resp[c][6])+'</td>'+
                                '<td class="CuentasClienteColumna">'+(resp[c][7]+'')+'</td>'+
                                '<td class="CuentasClienteColumna">'+currency(resp[c][3]+'')+'</td>'+
                                '<td class="CuentasClienteColumna">'+currency(resp[c][5]+'')+'</td>'+
                                '<td class="CuentasClienteColumna">'+currency(resp[c][4]+'')+'</td>'+
                                '</tr>';
                                total+=parseFloat(resp[c][4]);
                            }
                            cuerpo+='</table></center></div>';

                
                        
                        $('#impresionCuentas').html(cuerpo);
                        
                        //document.getElementById('impresionDeFactura11').print();
                        // setTimeout(function(){printDiv('impresionDeFactura11');},500);
                        ImprimirVar('impresionCuentas');
                    }else{
                        alert('Usted no tiene cuentas por Pägar Vencidas')
                    }
                    
                        
            },
            error: function( jqXHR, textStatus, errorThrown ) {

          if (jqXHR.status === 0) {

            alert('Not connect: Verify Network.');

          } else if (jqXHR.status == 404) {

            alert('Requested page not found [404]');

          } else if (jqXHR.status == 500) {

            alert('Internal Server Error [500].');

          } else if (textStatus === 'parsererror') {

            alert('Requested JSON parse failed.');

          } else if (textStatus === 'timeout') {

            alert('Time out error.');

          } else if (textStatus === 'abort') {

            alert('Ajax request aborted.');

          } else {

            alert('Uncaught Error: ' + jqXHR.responseText);

          }

        }
        });
    
 }