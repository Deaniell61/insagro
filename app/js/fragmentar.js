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
$('#prodpadre').material_select();
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
	codigo=document.getElementById('nombreC').value;
	presentacion=3;
	
	
	nombre=document.getElementById('Producto').value;
	marca=document.getElementById('marca').value;
	descripcion=document.getElementById('descripcion').value;
    var padre= $('#prodpadre').val();
   
    if(padre==""){
      //  alert(padre);
        var trasDato = 10;
    }else{
        var trasDato = 9;
    }
    $.ajax
        ({
            type:"POST",
            dataType: "json",
            url:"../core/controlador/inventarioControlador.php",
            data:' id=' +  id + '&precioG=' + precioG + '&codigo=' + codigo + '&presentacion=' + presentacion + '&costo=' + costo + '&cantidad=' + cantidad + '&precioE=' + precioE + '&precioM=' + precioM + '&nombre=' + nombre + '&padre=' + padre + '&trasDato=' + trasDato,
            success: function(resp)
            {
                if(resp['status']=='1'){
                    
                    limpiarFragmentar();
                    location.reload();
                }else{
                    alert(resp['status']);
                }
                
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






function abrirFragmentar(id){

   
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
