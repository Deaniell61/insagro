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


$('#tablaPro').DataTable( {

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
$('#tipoRepuesto').material_select();
$('#idpresentacion').material_select();

//$('select').material_select();

//*********************************************************

//*************** modal ***********************************

function ocultarF(){
  trasDato = 8;
  id= $('#codigoFrag').val();
    $.ajax
        ({
            type:"POST",
            dataType: "json",
            url:"../core/controlador/inventarioControlador.php",
            data:' id=' + id + '&trasDato=' + trasDato,
            success: function(resp)
            {
                //alert(resp['status'])
                $('#codigo').val(resp['id']);
                $('#nombreC').val(resp[0]);$('#nombreC').focus();$('#nombreC').prop('disabled',true);
                $('#tipoRepuesto').material_select('destroy');
                $('#idpresentacion').material_select('destroy');
                $('#Producto').val(resp[1]);$('#Producto').focus();$('#Producto').prop('disabled',true);
                $('#marca').val(resp[2]);$('#marca').focus();$('#marca').prop('disabled',true);
                $('#descripcion').val(resp[3]);$('#descripcion').focus();$('#descripcion').prop('disabled',true);        
                $('#tipoRepuesto').val(resp[4]);$('#tipoRepuesto').focus();$('#tipoRepuesto').prop('disabled',true);     
                $('#idpresentacion').val(resp[7]);$('#idpresentacion').focus();$('#idpresentacion').prop('disabled',true); 
                $('#cantidadQ').val(resp[5]);$('#cantidadQ').focus();$('#cantidadQ').prop('disabled',true); 
                $('#precioCQu').val(resp[6]);$('#precioCQu').focus();$('#precioCQu').prop('disabled',true);        
                $('#tipoRepuesto').material_select();
                $('#idpresentacion').material_select();
                $('#Cantidad').focus();
            }
        });
}
function CalculaCostoLibra()
{
    $('#precioC').val(($('#precioCQu').val()/100));
}
function fragmentarProducto(){

    var  trasDato;
	id=document.getElementById('codigo').value;
	precioG=document.getElementById('precioG').value;
	precioE=document.getElementById('precioE').value;
	precioM=document.getElementById('precioM').value;
	costo=document.getElementById('precioC').value;
	cantidad=document.getElementById('cantidadL').value;
	cantidadQ=document.getElementById('cantidadQ').value;
	codigo=document.getElementById('nombreC').value;
	presentacion=3;
    presentada=$('#presentada').val();
	
	
	nombre=document.getElementById('Producto').value;
	descripcionA=document.getElementById('DescripcionAbono').value;
	marca=document.getElementById('marca').value;
	descripcion=document.getElementById('descripcion').value;
    var padre= $('#prodpadre').val();
   
    if(padre==""){
      //  alert(padre);
        alert('Debe seleccionar un producto al cual acreditar')
    }else{
        var trasDato = 9;
    }
    $.ajax
        ({
            type:"POST",
            url:"../core/controlador/inventarioControlador.php",
            data:' id=' +  id + '&descripcionA=' + descripcionA + '&presentada=' + presentada + '&precioG=' + precioG + '&codigo=' + codigo + '&presentacion=' + presentacion + '&costo=' + costo + '&cantidadQ=' + cantidadQ + '&cantidad=' + cantidad + '&precioE=' + precioE + '&precioM=' + precioM + '&nombre=' + nombre + '&padre=' + padre + '&trasDato=' + trasDato,
            success: function(resp)
            {
                
                    $('#respuesta').html(resp)
                
                
            }
        });
}


function Ocultarfor(){
  limpiarFragmentar();
}

function limpiarFragmentar () {
    $('#codigo').val('');
    $('#nombreC').val('');$('#nombreC').focus();$('#nombreC').prop('disabled',false);
    $('#Producto').val('');$('#Producto').focus();$('#Producto').prop('disabled',false);
    $('#marca').val('');$('#marca').focus();$('#marca').prop('disabled',false);
    $('#descripcion').val('');$('#descripcion').focus();$('#descripcion').prop('disabled',false);        
    $('#tipoRepuesto').val('');$('#tipoRepuesto').focus();$('#tipoRepuesto').prop('disabled',false);        
    $('#medida').material_select('destroy'); 
    $('#tipoRepuesto').material_select('destroy');

}






function abrirFragmentar(id,pres){

   
    $('#modal1P').openModal();
    cierre();
    
    trasDato = 8;
    
    $.ajax
        ({
            type:"POST",
            dataType: "json",
            url:"../core/controlador/inventarioControlador.php",
            data:' id=' + id + '&trasDato=' + trasDato,
            success: function(resp)
            {
                //alert(resp['status'])
                 $('#codigo').val(resp['id']);
                $('#nombreC').val(resp[0]);$('#nombreC').focus();$('#nombreC').prop('disabled',true);
                $('#tipoRepuesto').material_select('destroy');
                $('#idpresentacion').material_select('destroy');
                $('#Producto').val(resp[1]);$('#Producto').focus();$('#Producto').prop('disabled',true);
                $('#marca').val(resp[2]);$('#marca').focus();$('#marca').prop('disabled',true);
                $('#descripcion').val(resp[3]);$('#descripcion').focus();$('#descripcion').prop('disabled',true);        
                $('#tipoRepuesto').val(resp[4]);$('#tipoRepuesto').focus();$('#tipoRepuesto').prop('disabled',true);     
                $('#idpresentacion').val(resp[7]);$('#idpresentacion').focus();$('#idpresentacion').prop('disabled',true); 
                $('#cantidadQ').val(resp[5]);$('#cantidadQ').focus();$('#cantidadQ').prop('disabled',true); 
                $('#precioCQu').val(resp[6]);$('#precioCQu').focus();$('#precioCQu').prop('disabled',true);        
                $('#tipoRepuesto').material_select();
                $('#idpresentacion').material_select();
                $('#Cantidad').focus();
                $('#presentada').val(pres);
                mostratDetalle(id);
                if(pres!='1')
                {
                    comboPadre('0',pres);
                    $('#prodpadre').material_select('destroy');
                    $('#prodpadre').val(pres);$('#prodpadre').focus();$('#prodpadre').prop('disabled',false); 
                    $('#prodpadre').material_select();
                }else{
                    comboPadre('1','');
                    $('#prodpadre').material_select('destroy');
                    $('#prodpadre').focus();$('#prodpadre').prop('disabled',false); 
                    $('#prodpadre').material_select();
                }
            }
        });
        
}
function mostratDetalle(id){
    var  trasDato;
    trasDato = 21;
    
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/inventarioControlador.php",
            data:' tipo=' +  id + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
                    
                    
                     $('#tablaAbonos').html(resp); 
                     
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
function mostrarTablaFragmentar(id){
    trasDato = 7;
    $.ajax
        ({
            type:"POST",
            url:"../core/controlador/inventarioControlador.php",
            data:' id=' + id + '&trasDato=' + trasDato,
            success: function(resp)
            {
                $('#tablaFragmentadaFrag').html(resp);
            }
        });
}

function comboPadre(prop,pres){
    trasDato = 27;
    $('#prodpadre').material_select('destroy');
                    
    $.ajax
        ({
            type:"POST",
            url:"../core/controlador/inventarioControlador.php",
            data:'trasDato=' + trasDato + '&prop=' + prop,
            success: function(resp)
            {
                $('#prodpadre').html(resp);
                
            },
            complete:function(){
                $('#prodpadre').val(pres);$('#prodpadre').focus();$('#prodpadre').prop('disabled',(pres)); 
                $('#prodpadre').material_select();
            }
        });
}

function seleccionar(id)
{


	buscarNIT(id);
	 cierre();
	$('#modal4').closeModal();
}
$('.modaleliminarP').click(function(){

    event.preventDefault();

    gobIDElim = event.target.dataset.elim;

    $('#modal3P').openModal();

});


function buscaPresentacion(obj)
{
	var prod=obj.value;
	var  trasDato;
	trasDato = 20;

        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' id=' +  prod + '&trasDato=' + trasDato,
            success: function(resp)
            {

					 $('#listaPresentacion').html(resp);

            }
        });


}



$(".dropdown-button").dropdown();

//*********************************************************




//comprobaciones
function distribuidores(prov)
{


		$('#modal4P').openModal();
		llamarDistribuidor();


}
function llamarDistribuidor()
{

	$.ajax
        ({
            type:"POST",
            url:"Distribuidores.php",
            success: function(resp)
            {
				$('#distribuidorContenedor').html(resp);
            }
        });
}


//**********************



function ingresarClienteP(){

    // alert('hola');



    var  nombre, direccion, telefono, nit, apellido,  trasDato;

        nombre = $('#nombreP').val();
		codigo = $('#codigoP').val();
		apellido = $('#apellidoP').val();
		direccion = $('#direccionP').val();
		telefono = $('#telefonoP').val();
		nit = $('#nitP').val();

		if(codigo=="")
		{
			trasDato = 1;
		}
		else
		{
        	trasDato = 3;
		}

        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/clientesControlador.php",
            data:' nombre=' +  nombre + '&direccion=' + direccion + '&nit=' + nit + '&telefono=' + telefono + '&apellido=' + apellido + '&codigo=' + codigo + '&trasDato=' + trasDato,
            success: function(resp)
            {



                if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');
                    //$('#precargar').hide();
                }
                else
                {


                  cierre();
				  if(typeof llamarCliente === 'function')
					  {
							//Es seguro ejecutar la función
							llamarCliente();
						}
						else
						{
							location.reload();
						}

                }


            }
        });



}

function editarCliente(id)
{
	$('#btnActualizar').show();
    $('#btnInsertar').hide();
    $('#modal1P').openModal();
	trasDato = 2;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/clientesControlador.php",
            data:' id=' +  id + '&trasDato=' + trasDato,
            success: function(resp)
            {
				$('#mensajeP2').html(resp);
            }
        });

}




$('#modalcliente').click(function(){
	$('#modal4').closeModal();
	cierre();
	//alert('sdjhfkjshfjk');
});


$('#btnInsertarP').click(function(){

	//cierre();
	//$('#modalP').closeModal();


});

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
    trasDato = 16;
    tipo=1;
    $.ajax({
        type: "POST",
        url: "../core/controlador/consignacionControlador.php",
        data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
        success: function(resp) {

          
          $('#impresionDeProforma11').html(resp);
           ImprimirVar('impresionDeProforma11');
        }
    });


    
        
       
    
   
   //$('#'+div).html("");


}

function impInvConsignacion(div){
    

    
    $('#'+div).html('<div id="impresionInvent"></div>');
     var encab="<div class=\"\" style=\"margin-bottom: 0px ;\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/><div style=\"height: 18px; text-align:right;color:#ccc;margin-top: -75px;\"><strong>Insagro</strong></div><div  style=\"height: 18px; text-align:right;color:#ccc;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;color:#ccc;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;color:#ccc;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;color:#ccc;\">Cel. 42207608</div></div><br>";
   //$('#impresionDeFacturaC11').html(encab);
     var cuerpo=""+encab;
     var trasDato;
    trasDato = 25;
    tipo=1;
    id=1;
        $.ajax({
            type: "POST",
            //dataType: "json",
            url: "../core/controlador/inventarioControlador.php",
            data: ' tipo=' + tipo + '&id=' + id + '&trasDato=' + trasDato,
            success: function(resp) {
                

                
                    cuerpo+=resp;
                        $('#impresionInvent').html(cuerpo);
                        
                        //document.getElementById('impresionDeFactura11').print();
                        // setTimeout(function(){printDiv('impresionDeFactura11');},500);
                        ImprimirVar('impresionInvent');
                   
                        
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