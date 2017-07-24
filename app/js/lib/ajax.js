

$('#logout').click(function(){

    cerrarSesion();

});


$('#logoutR').click(function(){

    cerrarSesion();

});

function mostrar(){
$('#globoN').toggle();
//alert("mostrar");
}





$('.row').click(function(){

    if(document.getElementById('globoNotificacion')){
    document.getElementById('globoNotificacion').hidden=true;
    }
});
$('#contenidoCrud').click(function(){
    if(document.getElementById('globoNotificacion')){
    document.getElementById('globoNotificacion').hidden=true;
    }
});

function cerrarSesion()
{
    var trasDato;

     trasDato = 66;
   $.ajax
   ({
      type:"POST",
      url:"../core/controlador/usuarioControlador.php",
     data:'trasDato=' + trasDato,
      success: function(resp)
       {
           location.href=resp;

       }
   });
}

function envioCorreo(destino,mensaje,copia)
{
    var trasDato;

     trasDato = 67;
   $.ajax
   ({
      type:"POST",
      url:"../core/controlador/usuarioControlador.php",
     data:'destino=' + destino + '&mensaje=' + mensaje + '&copia=' + copia+ '&trasDato=' + trasDato,
      success: function(resp)
       {
           console.log(resp);

       }
   });
}
function siguiente(evt,id)
{
	if(evt.keyCode=='13')
	{
		if(id=="compra1")
		{
			ingresoCompra(document.getElementById('codigo').value);
		}
		document.getElementById(id).focus();
	}
}
function cierre()
{
	$('.lean-overlay').css('display','none');

}


function printDiv(divName)
{

   /* var mywindow = window.open('', 'PRINT', 'height=1000,width=1500');
   
 
    mywindow.document.write(document.getElementById(divName).innerHTML);
    mywindow.document.close(); // necessary for IE >= 10
    */

    
      var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;
     var originalHeader = document.head.innerHTML;

    //mywindow.document.write('<html><head><title>' + document.title  + '</title>');
    //en la funcion imprSelec
    var css = document.createElement("link");
    css.setAttribute("href", "../app/css/lib/datatable.css");
    css.setAttribute("rel", "stylesheet");
    css.setAttribute("type", "text/css");
    css.setAttribute("media", "print");
    
    var css2 = document.createElement("link");
    css2.setAttribute("href", "../app/css/lib/materialize.css");
    css2.setAttribute("rel", "stylesheet");
    css2.setAttribute("type", "text/css");
    css2.setAttribute("media", "print");

    var css3 = document.createElement("link");
    css3.setAttribute("href", "../app/css/lib/nav.css");
    css3.setAttribute("rel", "stylesheet");
    css3.setAttribute("type", "text/css");
    css3.setAttribute("media", "print");

    
   // document.head.appendChild(css);
    //document.head.appendChild(css2);
    document.head.appendChild(css3);


    document.head.innerHTML = originalHeader;
     document.body.innerHTML = printContents;

     window.print();
     document.head.innerHTML = originalHeader;
     document.body.innerHTML = originalContents;
	location.reload();
}


/** *******************************************************************************numeros a letras */
function Unidades (num){

  switch (num) {
    case 1: return 'UN';
    case 2: return 'DOS';
    case 3: return 'TRES';
    case 4: return 'CUATRO';
    case 5: return 'CINCO';
    case 6: return 'SEIS';
    case 7: return 'SIETE';
    case 8: return 'OCHO';
    case 9: return 'NUEVE';
    }

    return '';
}//Unidades()

function Decenas(num){

    decena = Math.floor(num/10);
    unidad = num-(decena * 10);

    switch(decena)
    {
        case 1:
            switch(unidad)
            {
                case 0: return 'DIEZ';
                case 1: return 'ONCE';
                case 2: return 'DOCE';
                case 3: return 'TRECE';
                case 4: return 'CATORCE';
                case 5: return 'QUINCE';
                default: return 'DIECI' + Unidades(unidad);
            }
        case 2:
            switch(unidad)
            {
                case 0: return 'VEINTE';
                default: return 'VEINTI' + Unidades(unidad);
            }
        case 3: return DecenasY('TREINTA', unidad);
        case 4: return DecenasY('CUARENTA', unidad);
        case 5: return DecenasY('CINCUENTA', unidad);
        case 6: return DecenasY('SESENTA', unidad);
        case 7: return DecenasY('SETENTA', unidad);
        case 8: return DecenasY('OCHENTA', unidad);
        case 9: return DecenasY('NOVENTA', unidad);
        case 0: return Unidades(unidad);
    }
}//Unidades()

function DecenasY(strSin, numUnidades) {
    if (numUnidades > 0)
    return strSin + ' Y ' + Unidades(numUnidades)

    return strSin;
}//DecenasY()

function Centenas(num) {
    centenas = Math.floor(num / 100);
    decenas = num-(centenas * 100);

    switch(centenas)
    {
        case 1:
            if (decenas > 0)
                return 'CIENTO ' + Decenas(decenas);
            return 'CIEN';
        case 2: return 'DOSCIENTOS ' + Decenas(decenas);
        case 3: return 'TRESCIENTOS ' + Decenas(decenas);
        case 4: return 'CUATROCIENTOS ' + Decenas(decenas);
        case 5: return 'QUINIENTOS ' + Decenas(decenas);
        case 6: return 'SEISCIENTOS ' + Decenas(decenas);
        case 7: return 'SETECIENTOS ' + Decenas(decenas);
        case 8: return 'OCHOCIENTOS ' + Decenas(decenas);
        case 9: return 'NOVECIENTOS ' + Decenas(decenas);
    }

    return Decenas(decenas);
}//Centenas()

function Seccion(num, divisor, strSingular, strPlural) {
    cientos = Math.floor(num / divisor)
    resto = num-(cientos * divisor)

    letras = '';

    if (cientos > 0)
        if (cientos > 1)
            letras = Centenas(cientos) + ' ' + strPlural;
        else
            letras = strSingular;

    if (resto > 0)
        letras += '';

    return letras;
}//Seccion()

function Miles(num) {
    divisor = 1000;
    cientos = Math.floor(num / divisor)
    resto = num-(cientos * divisor)

    strMiles = Seccion(num, divisor, 'UN MIL', 'MIL');
    strCentenas = Centenas(resto);

    if(strMiles == '')
        return strCentenas;

    return strMiles + ' ' + strCentenas;
}//Miles()

function Millones(num) {
    divisor = 1000000;
    cientos = Math.floor(num / divisor)
    resto = num-(cientos * divisor)

    strMillones = Seccion(num, divisor, 'UN MILLON DE', 'MILLONES DE');
    strMiles = Miles(resto);

    if(strMillones == '')
        return strMiles;

    return strMillones + ' ' + strMiles;
}//Millones()

function NumeroALetras(num) {
    var data = {
        numero: num,
        enteros: Math.floor(num),
        centavos: (((Math.round(num * 100))-(Math.floor(num) * 100))),
        letrasCentavos: '',
        letrasMonedaPlural: 'QUETZALES',//'PESOS', 'Dólares', 'Bolívares', 'etcs'
        letrasMonedaSingular: 'QUETZALES', //'PESO', 'Dólar', 'Bolivar', 'etc'

        letrasMonedaCentavoPlural: 'CENTAVOS',
        letrasMonedaCentavoSingular: 'CENTAVOS'
    };

    if (data.centavos > 0) {
        data.letrasCentavos = 'CON ' + (function (){
            if (data.centavos == 1)
                return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoSingular;
            else
                return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoPlural;
            })();
    };

    if(data.enteros == 0)
        return 'CERO ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
    if (data.enteros == 1)
        return Millones(data.enteros) + ' ' + data.letrasMonedaSingular + ' ' + data.letrasCentavos;
    else
        return Millones(data.enteros) + ' ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
}//NumeroALetras()
function NumeroALetrasCheque(num) {
    var data = {
        numero: num,
        enteros: Math.floor(num),
        centavos: (((Math.round(num * 100))-(Math.floor(num) * 100))),
        letrasCentavos: '',
        letrasMonedaPlural: 'QUETZALES',//'PESOS', 'Dólares', 'Bolívares', 'etcs'
        letrasMonedaSingular: 'QUETZALES', //'PESO', 'Dólar', 'Bolivar', 'etc'

        letrasMonedaCentavoPlural: 'CENTAVOS',
        letrasMonedaCentavoSingular: 'CENTAVOS'
    };

    if (data.centavos > 0) {
        data.letrasCentavos = 'CON ' + (function (){
            if (data.centavos == 1)
                return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoSingular;
            else
                return Millones(data.centavos) + ' ' + data.letrasMonedaCentavoPlural;
            })();
    };

    if(data.enteros == 0)
        return 'CERO ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
    if (data.enteros == 1)
        return Millones(data.enteros) + ' ' + data.letrasMonedaSingular + ' ' + data.letrasCentavos;
    else
        return Millones(data.enteros) + ' ' + data.letrasMonedaPlural + ' ' + data.letrasCentavos;
}//NumeroALetras()
/** **************************************************************************************fin numero a letras */
function ImprimirVar(div)
{
	    var printin=window.open('Impresion.php?div='+div);
        
          //printin.close();
	
}
function printCoti(divName)
{
	 var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img height='100px' width='100px' src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:center;font-size: 35px;padding-bottom: 30px;\"><strong>Insagro</strong></div><div  style=\"height: 18px; text-align:center;\">Local no.9 Nueva terminal de Buses</div><div  style=\"height: 18px; text-align:center;\">Mazatenango, Suchitepequez</div><div  style=\"height: 18px; text-align:center;\">Tel. 7820-0607</div></div></nav></div><br><p>Cliente: "+document.getElementById('Cliente').value+"</p>";
     var printContents = document.head.innerHTML+encab+document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     print();

     document.body.innerHTML = originalContents;
	 location.reload();
}
function imprimirFlujo(div)
{
    $('#'+div).html('<div id="impresionCaja"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br>";
    //$('#impresionDeFactura11').html(encab);
    
          var ventas=document.getElementById('ventas111').value.replace("Q","").replace(",","");
          var abonos=document.getElementById('abonosCobrados1111').value.replace("Q","").replace(",","");
          var totalVentas=document.getElementById('totalV111').innerHTML.replace("Q","").replace(",","");

          var compras=document.getElementById('compras111').value.replace("Q","").replace(",","");
          var sueldos=document.getElementById('sueldos111').value.replace("Q","").replace(",","");
          var creditosP=document.getElementById('creditosP111').value.replace("Q","").replace(",","");
          var gVarios=document.getElementById('gVarios111').value.replace("Q","").replace(",","");
          var totalC=document.getElementById('totalC111').innerHTML.replace("Q","").replace(",","");
          var grafica=document.getElementById('chart2222').innerHTML;
           //alert(resp['DetalleVenta'].length);
           cuerpo="";
           cuerpo+=encab+'<div class="ingresos">'+
           '<center><h3>Ingresos</h3></center>'+
           '<center><div style="width: 50%;text-align: left;margin-left: 50px;">Ventas ................................... '+
           ''+currency(ventas)+'</div>'+
           '<div style="width: 50%;text-align: left;margin-left: 50px;">Abonos de Clientes ............... '+
           ''+currency(abonos)+'</div>'+
           '<div style="width: 50%;text-align: left;margin-left: 50px;">Total ....................... '+
           ''+currency(totalVentas)+'</div></center>'+
           '</div>';
          cuerpo+='<div class="egresos">'+
           '<center><h3>Egresos</h3></center>'+
           '<center><div style="width: 50%;text-align: left;margin-left: 50px;">Gastos .................................. '+
           ''+currency(gVarios)+'</div></center>'+
           '<center><div style="width: 50%;text-align: left;margin-left: 50px;">Sueldos ................................. '+
           ''+currency(sueldos)+'</div></center>'+
           '<center><div style="width: 50%;text-align: left;margin-left: 50px;">Creditos Pagados ........................ '+
           ''+currency(creditosP)+'</div></center>'+
           '<center><div style="width: 50%;text-align: left;margin-left: 50px;">Compras ................................. '+
           ''+currency(compras)+'</div></center>'+
           '<center><div style="width: 50%;text-align: left;margin-left: 50px;">Total ................................. '+
           ''+currency(totalC)+'</div></center>'+
           '</div>';

           cuerpo+='<div class="totales">'+
           '<center><h3>Totales</h3></center>'+
           '<center><div style="width: 50%;text-align: left;margin-left: 50px;">Ingresos ............................... '+
           ''+currency(totalVentas)+'(+)</div>'+
           '<div style="width: 50%;text-align: left;margin-left: 50px;">Egresos ............................... '+
           ''+currency(totalC)+'(-)</div>'+
           '<div style="width: 50%;text-align: left;margin-left: 50px;">Totales ................................. '+
           ''+currency(""+(parseFloat(totalVentas)+parseFloat(totalC)))+'(=)</div></center>'+
           '</div>';

           cuerpo+='<br><center><div class="totales" style="text-align: left;color: white;">'+
          // ''+grafica+''+
           '</div></center>';
          $('#impresionCaja').html(cuerpo);
          //document.getElementById('impresionDeFactura11').print();
          // setTimeout(function(){printDiv('impresionDeFactura11');},500);
          ImprimirVar('impresionCaja');
        
    
}

function imprimirCorte(id,div,ff,fI)
{
    $('#'+div).html('<div id="impresionCaja"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br>";
    var cuerpo="";
if(document.getElementById(id))
{
    id=document.getElementById(id).value;
}
    var trasDato;
    fechaI = fI
    fechaF = ff
    trasDato = 7;
    tipo=1;
    $.ajax({
        type: "POST",
        //dataType: "json",
        url: "../core/controlador/cajaControlador.php",
        data: ' tipo=' + tipo + '&id=' + id + '&fechaI=' + fechaI + '&fechaF=' + fechaF + '&trasDato=' + trasDato,
        success: function(resp) {
           // alert(resp['estatus']);
           //alert(resp['DetalleVenta'].length);
           //alert(resp['caja']['sql'])
           //alert(resp)
           //$('#impresionCaja').html(resp['estatus']);
           cuerpo="";
           cuerpo+=encab+resp;
          $('#impresionCaja').html(cuerpo);
          
          //document.getElementById('impresionDeFactura11').print();
          // setTimeout(function(){printDiv('impresionDeFactura11');},500);
          ImprimirVar('impresionCaja');
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


function toMoney(input)
{
		input.value=(currency(input.value));

}

function currency(value, decimals, separators) {
	value=value.replace("Q","");
    decimals = decimals >= 0 ? parseInt(decimals, 0) : 2;
    separators = separators || [',', ",", '.'];
    var number = (parseFloat(value) || 0).toFixed(decimals);
    if (number.length <= (4 + decimals))
        return "Q"+number.replace('.', separators[separators.length - 1]);
    var parts = number.split(/[-.]/);
    value = parts[parts.length > 1 ? parts.length - 2 : 0];
    var result = value.substr(value.length - 3, 3) + (parts.length > 1 ?
        separators[separators.length - 1] + parts[parts.length - 1] : '');
    var start = value.length - 6;
    var idx = 0;
    while (start > -3) {
        result = (start > 0 ? value.substr(start, 3) : value.substr(0, 3 + start))
            + separators[idx] + result;
        idx = (++idx) % 2;
        start -= 3;
    }
    return 'Q'+(parts.length == 3 ? '-' : '') + result;
}
function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
	//alert(charCode);
    if (charCode > 31 && (charCode < 48 || charCode > 57))
	{
		if(charCode==46)
		{
			return true;
		}
		else
		{
        	return false;
		}
    }
    return true;
}


function imprimirFactura(id,div){
var cuerpo="";
if(document.getElementById(id))
{
    id=document.getElementById(id).value;
}
    $('#'+div).html('<div id="impresionDeFactura11"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br><p>Cliente: </p>";
    //$('#impresionDeFactura11').html(encab);
     var trasDato;
    trasDato = 20;
    tipo=1;
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../core/controlador/ventasControlador.php",
        data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

           //alert(resp['DetalleVenta'].length);
           cuerpo="";
           cuerpo+='<div class="logoFactura"><img class=\"logoFact\" src=\"../app/img/logoinsagro1.png\"/></div>'+
           '<div class="diaFactura">'+resp['venta']['dia']+'</div><div class="mesFactura">'+resp['venta']['mes']+'</div><div class="anioFactura">'+resp['venta']['anio']+'</div>'+
           '<div class="nombreFactura">'+resp['venta']['1']+' '+resp['venta']['2']+'</div><div class="nitFactura">'+resp['venta']['4']+'</div>'+
           '<div class="direccionFactura ">'+resp['venta']['3']+
           '<table  class="detalleFactura espaciodetallefactura">';
          for(i=0;i<resp['DetalleVenta'].length;i++){
             cuerpo+='<tr class="FilaFactura">'+
             '<td class="cantidadFila">'+resp['DetalleVenta'][i]['cantidad']+'</td>'+
             '<td class="descripcionFila">'+resp['DetalleVenta'][i]['nombre']+' ('+resp['DetalleVenta'][i]['presentacion']+')</td>'+
             '<td class="unidadFila">'+currency(resp['DetalleVenta'][i]['precio'])+'</td>'+
             '<td class="subtotalFila">'+currency(resp['DetalleVenta'][i]['subtotal'])+'</td>'+
             '</tr>';
          }
          cuerpo+='</table>';
          resp['total'] = currency(resp['total'] + '').replace('Q','').replace(',','') + '';
          total = resp['total'].substring(0,(resp['total'].length)-3)
          centavos = resp['total'].substring((resp['total'].length)-2,(resp['total'].length))
          cuerpo+='<div class="totalFacturaLET">'+NumeroALetras(parseFloat(total))+' '+(centavos!=0?centavos+'/100':'')+'</div>';
          cuerpo+='<div class="totalFactura">'+currency(parseFloat(resp['total'] + '') + '').replace("Q","")+'</div>';
          $('#impresionDeFactura11').html(cuerpo);
          //document.getElementById('impresionDeFactura11').print();
          // setTimeout(function(){printDiv('impresionDeFactura11');},500);
          ImprimirVar('impresionDeFactura11');
        }
    });
    
        
       
    
   
   //$('#'+div).html("");


}


function imprimirFacturaCambiaria(id,div){
var cuerpo="";
if(document.getElementById(id))
{
    id=document.getElementById(id).value;
}

    $('#'+div).html('<div id="impresionDeFacturaC11"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br><p>Cliente: </p>";
    //$('#impresionDeFacturaC11').html(encab);
     var trasDato;
    trasDato = 20;
    tipo=1;
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../core/controlador/ventasControlador.php",
        data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

           //alert(resp['DetalleVenta'].length);
           cuerpo="";
           cuerpo+='<div class="logoFacturaC"><img class=\"logoFactC\" src=\"../app/img/logoinsagro1.png\"/></div>'+
           '<div class="diaFacturaC">'+resp['venta']['dia']+'/</div><div class="mesFacturaC">'+resp['venta']['mes']+'/</div><div class="anioFacturaC">'+resp['venta']['anio']+'</div>'+
           '<div class="nombreFacturaC">'+resp['venta']['1']+' '+resp['venta']['2']+'</div><div class="nitFacturaC">'+resp['venta']['4']+'</div>'+
           '<div class="direccionFacturaC">'+resp['venta']['3']+'</div>'+
           '<table class="espaciodetallefacturaCambiaria">';
          for(i=0;i<resp['DetalleVenta'].length;i++){
             cuerpo+='<tr class="FilaC">'+
             '<td class="codigoC">'+resp['DetalleVenta'][i]['codigoproducto']+'</td>'+
             '<td class="cantidadFilaC">'+resp['DetalleVenta'][i]['cantidad']+'</td>'+
             '<td class="unidadC">'+resp['DetalleVenta'][i]['presentacion']+'</td>'+
             '<td class="descripcionFilaC">'+resp['DetalleVenta'][i]['nombre']+'</td>'+
             '<td class="unidadFilaC">'+currency(resp['DetalleVenta'][i]['precio'])+'</td>'+
             '<td class="subtotalFilaC">'+currency(resp['DetalleVenta'][i]['subtotal'])+'</td>'+

             '</tr>';
          }
          cuerpo+='</table>';
          resp['total'] = currency(resp['total'] + '').replace('Q','').replace(',','') + '';
          total = resp['total'].substring(0,(resp['total'].length)-3)
          centavos = resp['total'].substring((resp['total'].length)-2,(resp['total'].length))
          cuerpo+='<div class="totalFacturaCLET">'+NumeroALetras(parseFloat(total))+' '+(centavos!=0?centavos+'/100':'')+'</div>';
          cuerpo+='<div class="totalFacturaC">'+currency(parseFloat(resp['total'] + '') + '').replace("Q","")+'</div>';
          $('#impresionDeFacturaC11').html(cuerpo);
         
          //document.getElementById('impresionDeFacturaC11').print();
           //setTimeout(function(){ImprimirVar(div);},500);
           ImprimirVar('impresionDeFacturaC11');
        }
    });
    
        
       
    
   
   //$('#'+div).html("");


}

function imprimirProforma(id,div){
var cuerpo="";
if(document.getElementById(id))
{
    id=document.getElementById(id).value;
}
    $('#'+div).html('<div id="impresionDeProforma11"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br><p>Cliente: </p>";
    //$('#impresionDeProforma11').html(encab);
     var trasDato;
    trasDato = 20;
    tipo=1;
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../core/controlador/ventasControlador.php",
        data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

           //alert(resp['DetalleVenta'].length);
           cuerpo="";
           cuerpo+='<div class="logoProforma"><img class=\"logoProf\" src=\"../app/img/logoinsagro1.png\"/></div>'+
           '<div class="diaProforma">'+resp['venta']['dia']+'/</div><div class="mesProforma">'+resp['venta']['mes']+'/</div><div class="anioProforma">'+resp['venta']['anio']+'</div>'+
           '<div class="nombreProforma">'+resp['venta']['1']+' '+resp['venta']['2']+'</div>'+
           '<div class="direccionProforma">'+resp['venta']['3']+'</div>'+
           '<table class="detalleProforma espacioproforma">';
          for(i=0;i<resp['DetalleVenta'].length;i++){
             cuerpo+='<tr>'+
             '<td class="cantidadFilaProforma">'+resp['DetalleVenta'][i]['cantidad']+'</td>'+
             '<td class="descripcionFilaProforma">'+resp['DetalleVenta'][i]['nombre']+'</td>'+
             '<td class="unidadFilaProforma">'+currency(resp['DetalleVenta'][i]['precio'] + '')+'</td>'+
             '<td class="subtotalFilaProforma">'+currency(resp['DetalleVenta'][i]['subtotal'] + '')+'</td>'+
             '</tr>';
          }
          cuerpo+='</table>';
          
          resp['total'] = currency(resp['total'] + '').replace('Q','').replace(',','') + '';
          total = resp['total'].substring(0,(resp['total'].length)-3)
          centavos = resp['total'].substring((resp['total'].length)-2,(resp['total'].length))
          cuerpo+='<div class="totalProformaLET">'+NumeroALetras(parseFloat(total))+' '+(centavos!=0?centavos+'/100':'')+'</div>';
          cuerpo+='<div class="totalProforma">'+currency(parseFloat(resp['total'] + '') + '').replace("Q","")+'</div>';
          $('#impresionDeProforma11').html(cuerpo);
           ImprimirVar('impresionDeProforma11');
        }
    });


    
        
       
    
   
   //$('#'+div).html("");


}

function imprimirReciboTodasCuentas(id,div){
var cuerpo="";
if(document.getElementById(id))
{
    id=document.getElementById(id).value;
}
    $('#'+div).html('<div id="impresionDeProforma11"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br><p>Cliente: </p>";
    //$('#impresionDeProforma11').html(encab);
     var trasDato;
    trasDato = 14;
    tipo=1;
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../core/controlador/cuentasCobrarControlador.php",
        data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

           //alert(resp['DetalleVenta'].length);
           cuerpo="";
           cuerpo+='<div class="logoProforma"><img class=\"logoProf\" src=\"../app/img/logoinsagro1.png\"/></div>'+
           '<div class="diaProforma">F'+resp['venta']['dia']+'</div><div class="mesProforma">'+resp['venta']['mes']+'</div><div class="anioProforma">'+resp['venta']['anio']+'</div>'+
           '<div class="nombreProforma">'+resp['venta']['1']+' '+resp['venta']['2']+'</div>'+
           '<div class="direccionProforma">'+resp['venta']['3']+'</div>'+
           '<table class="detalleProforma espacioproforma">';
          for(i=0;i<resp['DetalleVenta'].length;i++){
             cuerpo+='<tr>'+
             '<td class="cantidadFilaProforma">'+resp['DetalleVenta'][i]['cantidad']+'</td>'+
             '<td class="descripcionFilaProforma">'+resp['DetalleVenta'][i]['nombre']+'</td>'+
             '<td class="unidadFilaProforma">'+resp['DetalleVenta'][i]['precio']+'</td>'+
             '<td class="subtotalFilaProforma">'+resp['DetalleVenta'][i]['subtotal']+'</td>'+
             '</tr>';
          }
          cuerpo+='</table>';
          cuerpo+='<div class="totalProformaLET">'+NumeroALetras(resp['total'])+'</div>';
          cuerpo+='<div class="totalProforma">'+parseFloat(resp['total'])+'</div>';
          $('#impresionDeProforma11').html(cuerpo);
           ImprimirVar('impresionDeProforma11');
        }
    });

}

function imprimirRecibo(id,div){
var cuerpo="";
if(document.getElementById(id))
{
    id=document.getElementById(id).value;
}
    $('#'+div).html('<div id="impresionDeProforma11"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br><p>Cliente: </p>";
    //$('#impresionDeProforma11').html(encab);
     var trasDato;
    trasDato = 14;
    tipo=1;
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../core/controlador/cuentasCobrarControlador.php",
        data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

           //alert(resp['DetalleVenta'].length);
           cuerpo="";
           cuerpo+='<div class="logoProforma"><img class=\"logoProf\" src=\"../app/img/logoinsagro1.png\"/></div>'+
           '<div class="diaProforma">'+resp['venta']['dia']+'</div><div class="mesProforma">'+resp['venta']['mes']+'</div><div class="anioProforma">'+resp['venta']['anio']+'</div>'+
           '<div class="nombreProforma">'+resp['venta']['1']+' '+resp['venta']['2']+'</div>'+
           '<div class="direccionProforma">'+resp['venta']['3']+'</div>'+
           '<table class="detalleProforma espacioproforma">';
          for(i=0;i<resp['DetalleVenta'].length;i++){
             cuerpo+='<tr>'+
             '<td class="cantidadFilaProforma">'+resp['DetalleVenta'][i]['cantidad']+'</td>'+
             '<td class="descripcionFilaProforma">'+resp['DetalleVenta'][i]['nombre']+'</td>'+
             '<td class="unidadFilaProforma">'+resp['DetalleVenta'][i]['precio']+'</td>'+
             '<td class="subtotalFilaProforma">'+resp['DetalleVenta'][i]['subtotal']+'</td>'+
             '</tr>';
          }
          cuerpo+='</table>';
          cuerpo+='<div class="totalProformaLET">'+NumeroALetras(10)+'</div>';
        cuerpo+='<div class="totalProforma">'+parseFloat(resp['total'])+'</div>';
          $('#impresionDeProforma11').html(cuerpo);
           ImprimirVar('impresionDeProforma11');
        }
    });

}


function imprimirRecibo111(id,div){
var cuerpo="";
if(document.getElementById(id))
{
    id=document.getElementById(id).value;
}
    fecha=$('#fechaPagoED').val();
    if($('#descripcionED').val()!=''){
    descripcion=$('#descripcionED').val();}
    else{
        descripcion='-';
    }
    $('#'+div).html('<div id="impresionDeProforma11"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br><p>Cliente: </p>";
    
        cuerpo="";
        cuerpo+='<div class="logoProforma"><img class=\"logoProf\" src=\"../app/img/logoinsagro1.png\"/></div>'+
        '<div class="diaProforma">'+fecha.substring(fecha.length-2, fecha.length)+'</div><div class="mesProforma">'+fecha.substring(fecha.length-5, fecha.length-3)+'</div><div class="anioProforma">'+fecha.substring(0, 4)+'</div>'+
        '<div class="nombreProforma">'+$('#clienteED').val()+'</div>'+
        '<div class="direccionProforma">'+$('#direccionV').val()+'</div>'+
        '<table class="detalleProforma espacioproforma">';
        
             cuerpo+='<tr>'+
             '<td class="cantidadFilaProforma">1</td>'+
             '<td class="descripcionFilaProforma">'+descripcion+'</td>'+
             '<td class="unidadFilaProforma">'+currency($('#MontoED').val())+'</td>'+
             '<td class="subtotalFilaProforma">'+$('#MontoED').val()+'</td>'+
             '</tr>';
        cuerpo+='</table>';
        cuerpo+='<div class="totalProformaLET">'+NumeroALetras($('#MontoED').val())+'</div>';
        cuerpo+='<div class="totalProforma">'+$('#MontoED').val()+'</div>';
        $('#impresionDeProforma11').html(cuerpo);
        ImprimirVar('impresionDeProforma11');

}

function imprimirCheque(id,div){
var cuerpo="";
if(document.getElementById(id))
{
    id=document.getElementById(id).value;
}
    fecha=$('#fechaPagoED').val();
    monto=$('#MontoED').val();
    nombre=$('#nombreChequeED').val();
    $('#'+div).html('<div id="impresionCheque"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br><p>Cliente: </p>";
    //$('#impresionDeFacturaC11').html(encab);
     
     var trasDato;
    trasDato = 14;
    tipo=1;
    if(monto!='0'){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../core/controlador/cuentasPagarControlador.php",
            data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
            success: function(resp) {

            //alert(resp['DetalleVenta'].length);
            cuerpo="";
            cuerpo+='<div  class="divimpresion11"><div class="lugarFecha">'+resp['fecha']+'</div>'+
            '<div class="CantidadNumero">'+currency(monto).replace('Q','')+'</div>'+
            '<div class="PagoA">'+nombre+'</div>';
            monto = currency(monto + '').replace('Q','').replace(',','') + '';
            total = monto.substring(0,(monto.length)-3)
            centavos = monto.substring((monto.length)-2,(monto.length))
            cuerpo+='<div class="sumaDe">'+NumeroALetras(parseFloat(total))+' '+(centavos!=0?centavos+'/100':'')+'</div></div>';
            $('#impresionCheque').html(cuerpo);
            ImprimirVar('impresionCheque');
            }
        });
    }else{
        alert('Debe Ingresar un monto');
    }

}

function imprimirChequeBI(id,div){
var cuerpo="";
if(document.getElementById(id))
{
    id=document.getElementById(id).value;
}
    fecha=$('#fechaPagoED').val();
    monto=$('#MontoED').val();
    nombre=$('#nombreChequeED').val();
    $('#'+div).html('<div id="impresionCheque"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br><p>Cliente: </p>";
    //$('#impresionDeFacturaC11').html(encab);
     
     var trasDato;
    trasDato = 14;
    tipo=1;
    if(monto!='0'){
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../core/controlador/cuentasPagarControlador.php",
            data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
            success: function(resp) {

            //alert(resp['DetalleVenta'].length);
            cuerpo="";
            cuerpo+='<div  class="divimpresion11BI"><div class="lugarFechaBI">'+resp['fecha']+'</div>'+
            '<div class="CantidadNumeroBI">'+currency(monto).replace('Q','')+'</div>'+
            '<div class="PagoABI">'+nombre+'</div>';
            monto = currency(monto + '').replace('Q','').replace(',','') + '';
            total = monto.substring(0,(monto.length)-3)
            centavos = monto.substring((monto.length)-2,(monto.length))
            cuerpo+='<div class="sumaDe">'+NumeroALetras(parseFloat(total))+' '+(centavos!=0?centavos+'/100':'')+'</div></div>';
           
            $('#impresionCheque').html(cuerpo);
            ImprimirVar('impresionCheque');
            }
        });
    }else{
        alert('Debe Ingresar un monto');
    }

}



function printReporte111(tipo)
{

			var filto="";
 
			if(document.getElementsByName("filtro"))
            {
                var porNombre=document.getElementsByName("filtro");
				
				for(var i=0;i<porNombre.length;i++)
				{
					if(porNombre[i].checked)
						filto=porNombre[i].value;
				}
            }

			setTimeout("location.href='../core/modelo/reportes/cuentasReportes.php?tipo="+tipo+"&filtro="+filto+"'", 100);
			
		
	
}

function printReporte(tipo)
{

			var filto="";
 
			if(document.getElementsByName("filtro"))
            {
                var porNombre=document.getElementsByName("filtro");
				
				for(var i=0;i<porNombre.length;i++)
				{
					if(porNombre[i].checked)
						filto=porNombre[i].value;
				}
            }
            switch(tipo){
                case 1:{
                    CuentasCobrarPorCliente('mensaje3');
                    break;
                }
                case 2:{
                    CuentasCobrarVencidas('mensaje3');
                    break;
                }
                case 3:{
                    CuentasPagarPorCliente('mensaje3');
                    break;
                }
                case 4:{
                    CuentasPagarVencidas('mensaje3');
                    break;
                }
            }

			
		
	
}

