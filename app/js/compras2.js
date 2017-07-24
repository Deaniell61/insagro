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


$('.modaleliminar').click(function(){

    event.preventDefault();

    gobIDElim = event.target.dataset.elim;

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
function mostrarCompras()
{
	var filto="";
 
        var porNombre=document.getElementsByName("filtro");
        
        for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked)
                filto=porNombre[i].value;
        }

	var  trasDato;
	trasDato = 16;
	
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
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

function mostrarComprasAnul()
{
	var filto="";
 
        var porNombre=document.getElementsByName("filtro");
        
        for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked)
                filto=porNombre[i].value;
        }

	var  trasDato;
	trasDato = 17;
	
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
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

function buscarCompra(id)
{
	$('#modalV').openModal();

	 var  trasDato;
	trasDato = 8;
	
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
                    
					
					 $('#mensaje2').html(resp); 

                }


            }     
        });
}
function anularCompra(id)
{
	var  trasDato;
	trasDato = 10;

		if(confirm("Desea anular esta compra?"))
		{
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
					
                    
					
					 $('#mensaje3').html(resp); 

                }


            }     
        });
		}
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
		cantidad=$('#cantidad').val();
		precio=$('#precio').val();
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' prod=' +  prod + '&cantidad=' + cantidad + '&precio=' + precio + '&trasDato=' + trasDato,
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
					 setTimeout(function(){
					 $('#tabla22').DataTable( {

											info:     false,
										
										
										
											language: {
										
												search: "Buscar",
												sLengthMenu:" _MENU_ ",
										
												paginate:{
										
													previous: "Anterior",
													next: "Siguiente",
										
												},
										
											},
											
													   "scrollY":        "375px",
												"scrollCollapse": true,
												"paging":         true
												 
										} );
					 },0);
					  

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
					
                    
					
					 $('#productosContenedor').html(resp);
					  

                }


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