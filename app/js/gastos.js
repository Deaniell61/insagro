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

function eliminar(id)
{
                     
    gobIDElim = id;
	
	$('#modal3').openModal();
	$('#contraElim').focus();
	
}




$(".dropdown-button").dropdown();

//*********************************************************

function ingresoGasto()
{
	
	var  trasDato;
	trasDato = 9;
		
		var fecha=document.getElementById('fecha').value;
		var descripcion=document.getElementById('descripcion').value;
		var monto=document.getElementById('monto').value;
		
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/pagosControlador.php",
            data:' fecha=' + fecha + '&descripcion=' + descripcion + '&monto=' + monto + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
					
                    
					
					 $('#mensajeGastos').html(resp);
					  

                }


            }     
        });
	
	
}

function EliminarGasto(contra)
{
	var  trasDato;
	trasDato = 10;
		
		if(confirm("Desea anular este Gasto?"))
		{
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/pagosControlador.php",
            data:' contra=' +  contra + '&id=' + contra + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
					
                    
					
					 $('#reselim').html(resp);
					  

                }


            }     
        });
        }
}

function imprimirReciboGastos(id,div){
var cuerpo="";
if(document.getElementById(id))
{
    id=document.getElementById(id).value;
}
    fecha=$('#fecha').val();
    if($('#descripcion').val()!=''){
    descripcion=$('#descripcion').val();}
    else{
        descripcion='-';
    }
    $('#'+div).html('<div id="impresionDeProforma11"></div>');
    var encab="<div class=\"navbar-fixed\"><nav><div class=\"nav-wrapper grey darken-4\"><a  class=\"brand-logo\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/></a><div style=\"height: 18px; text-align:right;\">Insagro</div><div  style=\"height: 18px; text-align:right;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;\">Cel. 42207608</div></div></nav></div><br><p>Cliente: </p>";
    
        cuerpo="";
        cuerpo+='<div class="logoProforma"><img class=\"logoProf\" src=\"../app/img/logoinsagro1.png\"/></div>'+
        '<div class="diaProforma">'+fecha.substring(fecha.length-2, fecha.length)+'</div><div class="mesProforma">'+fecha.substring(fecha.length-5, fecha.length-3)+'</div><div class="anioProforma">'+fecha.substring(0, 4)+'</div>'+
        '<div class="nombreProforma">'+$('#usuarioPrincipalLogiado').html()+'</div>'+
        '<div class="direccionProforma"></div>'+
        '<table class="detalleProforma espacioproforma">';
        
             cuerpo+='<tr>'+
             '<td class="cantidadFilaProforma">1</td>'+
             '<td class="descripcionFilaProforma">'+descripcion+'</td>'+
             '<td class="unidadFilaProforma">'+currency($('#monto').val())+'</td>'+
             '<td class="subtotalFilaProforma">'+$('#monto').val()+'</td>'+
             '</tr>';
        cuerpo+='</table>';
        cuerpo+='<div class="totalProforma">'+$('#monto').val()+'</div>';
        $('#impresionDeProforma11').html(cuerpo);
        ImprimirVar('impresionDeProforma11');

}