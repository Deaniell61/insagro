//************************** globales *********************
var gobIDElim,gobIDEdit,gobIDInv;
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


$('#tabla2').DataTable( {

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


$('.modaleliminar').click(function(){

    event.preventDefault();

    gobIDElim = event.target.dataset.elim;
    gobIDInv = event.target.dataset.inv;

    $('#modal3').openModal();

});




$(".dropdown-button").dropdown();




$('#modalcerrar1').click(function(){
	

	
});




//*********************************************************




//comprobaciones
function buscarProveedor(buscar,evt)
{
	if(evt.keyCode=='13' && buscar.value=="")
	{
		
		$('#modal4').openModal();
		llamarProveedor();
	}
	else
	if(buscar.value=="")
	{
		
	}
	else
	if(evt.keyCode=='13')
	{
		buscarNIT(buscar.value)
	}
	
	
}
function ingresoProducto(id,compra)
{
	var  trasDato;
	trasDato = 3;
	if(id=="")
	{
		
		if($('#tipoRepuesto').val()!="" && $('#tipoRepuesto').val()!=null)
		{
			
	codigoproducto=$('#nombreC').val();
	nombre=$('#Producto').val();
	marca=$('#marca').val();
	descripcion=$('#descripcion').val();
	tipoRepuesto=$('#tipoRepuesto').val();
	medida='0';
	presentacion=$('#presentacion').val();
	idpresentacion=$('#idpresentacion').val();
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/productoControlador.php",
            data:' codigoproducto=' +  codigoproducto + '&nombre=' + nombre + '&idpresentacion=' + idpresentacion + '&presentacion=' + presentacion + '&medida=' + medida + '&marca=' + marca + '&descripcion=' + descripcion + '&tipoRepuesto=' + tipoRepuesto + '&id=' + id + '&compra=' + compra + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('mensajeCompras').html('Datos Incorrectos.');
                    //$('#precargar').hide();
                }
                else
                {

					 $('#mensaje').html(resp);

                }


            }
        });
		}
		else
		{
			alert("Debe seleccionar un tipo de repuesto");
		}
	}
}
function limpiarProducto()
{
	$('#codigo').val('');
	$('#nombreC').val('');
	$('#Producto').val('');
	$('#descripcion').val('');
	$('#tipoRepuesto').val('');
	$('#marca').val('');
	$('#nombreC').focus();
	
}
function buscarProveedor2(buscar)
{
	if(buscar.value=="")
	{
		$('#modal4').openModal();
		llamarProveedor();
	}
	else
	{
		buscarNIT(buscar.value)
	}
	
	
}

function buscarNIT(nit)
{
	 var  trasDato;
	trasDato = 1;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' nit=' +  nit + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
                    
					
					 $('#mensaje').html(resp); 

                }


            }     
        });
}
function seleccionaMarca(mc)
{
	document.getElementById('marca').value=mc;
	document.getElementById('listaMarca').hidden=false;
	
}
function buscaMarca(obj)
{
	var prod=obj.value;
	var  trasDato;
	trasDato = 11;
		
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' id=' +  prod + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
					
                    
					
					 $('#listaMarca').html(resp);
					  

                }


            }     
        });
	
	
}

function buscaProducto(obj)
{
	var prod=obj.value;
	var  trasDato;
	trasDato = 6;

        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' prod=' +  prod + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');
                    //$('#precargar').hide();
                }
                else
                {



					 $('#productosCompra').html(resp);


                }


            }
        });


}
function iniciarCompra(id)
{
	 var  trasDato;
	trasDato = 2;
	tipo=document.getElementById('tipoCompra').value;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' prov=' +  id + '&tipo=' + tipo + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
					
                    
					
					 $('#mensaje').html(resp); 

                }


            }     
        });
}
function verificaProductoCompra()
{
	
	if(document.getElementById('codigoProd').value!="")
	{
		ingresoCompra(document.getElementById('codigoProd').value);
	}
	else
	{

		$('#productoNom').focus();
		
	}
}
function ingresoCompra(prod)
{
	var  cantidad,trasDato;
	trasDato = 3;
		cantidad=$('#Cantidad').val();
		precioC=$('#precioC').val();
		precioG=$('#precioG').val();
		precioE=$('#precioE').val();
		precioM=$('#precioM').val();
		
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' prod=' +  prod + '&cantidad=' + cantidad + '&precioC=' + precioC + '&precioG=' + precioG + '&precioE=' + precioE + '&precioM=' + precioM + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
					
                    
					
					 $('#mensaje').html(resp);
					  

                }


            }     
        });
}
function guardarCompra()
{
	var  trasDato;
	trasDato = 4;
		
       $.ajax ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:'trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
					
                    
					
					 $('#mensaje').html(resp); 

                }


            }     
        });
}
function cargarDetalleCompras(id)
{
	var  trasDato;
	trasDato = 5;
		
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
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
					
                    
					
					 $('#resumenC').html(resp);
					  

                }


            }     
        });
}
function llamarProveedor()
{
	
	$.ajax
        ({
            type:"POST",
            url:"Proveedores.php",
            success: function(resp)
            {
				$('#proveedorContenedor').html(resp);
            }    
        });
}

function llamarProducto()
{
	
		
		$('#modal5').openModal();
		$.ajax
        ({
            type:"POST",
            url:"Productos.php",
			data:' id=1',
            success: function(resp)
            {
				$('#productoContenedor').html(resp);
            }    
        });
	
	
}
function seleccionaProducto(codprod)
{
	var prod=codprod;
	var  trasDato;
	trasDato = 7;

        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' prod=' +  prod + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensajeCompras').html('Datos Incorrectos.');
                    //$('#precargar').hide();
                }
                else
                {



					 $('#mensaje').html(resp);


                }


            }
        });
}

function cambiarTipo(tipo,id)
{
	
	var  trasDato;
	trasDato = 9;
		//alert(2);
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' tipo=' +  tipo + '&id=' + id + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
					
                   
					
					 $('#mensajeC').html(resp);
					  

                }


            }     
        });
}

function cambiarTipoProd(tipo,id)
{
	
	var  trasDato;
	trasDato = 2;
		//alert(2);
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/productoControlador.php",
            data:' tipo=' +  tipo + '&id=' + id + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
					
                   
					
					 $('#mensajeC').html(resp);
					  

                }


            }     
        });
}
//**********************



$('#btnInsertar').click(function(){

    // alert('hola');  

    $('#precargar').show();

    var  user, pass, email, trasDato;
    if(passHabilita==1)
    {
        user = $('#user').val();

        pass = $('#password').val();

        rol = $('#rol').val();

        trasDato = 2;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/usuarioControlador.php",
            data:' user=' +  user + '&pass=' + pass + '&rol=' + rol + '&trasDato=' + trasDato,
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
                    passHabilita=0;

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

function seleccionaPresentacion(mc,id)
{
	document.getElementById('presentacion').value=mc;
    document.getElementById('idpresentacion').value=id;
	document.getElementById('listaPresentacion').style.display='';

}


$('.eliminar').click(function(event)
                     {

    var idelim, trasDato; 

    idelim=gobIDElim;
    idinv=gobIDInv;

    trasDato = 5;


    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/inventarioControlador.php",
        data:'prod=' + idelim  + '&inv=' + idinv  + '&trasDato=' + trasDato,
        success: function(resp)
        {

           

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

               $('#mensaje').html(resp);


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