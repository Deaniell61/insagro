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


//$('select').material_select(); 

//*********************************************************

//*************** modal ***********************************






function abrirProvNuevo(){

    $('#btnActualizar').hide();
    $('#btnInsertar').show();
    $('#modal1P').openModal();
	cierre();
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