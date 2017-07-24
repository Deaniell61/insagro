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


 

//*********************************************************

//*************** modal ***********************************



$('.modaleliminar').click(function(){

    event.preventDefault();

    gobIDElim = event.target.dataset.elim;

    $('#modal3').openModal();

});




$(".dropdown-button").dropdown();

//*********************************************************
function mostrarInventario()
{
	var filto="";
 
        var porNombre=document.getElementsByName("filtro");
        
        for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked)
                filto=porNombre[i].value;
        }

	var  trasDato;
	trasDato = 3;
	
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/inventarioControlador.php",
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
										

                }


            }     
        });
}
function mostrarInventarioAdmin()
{
	var filto="";
 
        var porNombre=document.getElementsByName("filtro");
        
        for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked)
                filto=porNombre[i].value;
        }

	var  trasDato;
	trasDato = 4;
	
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/inventarioControlador.php",
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
										//$('select').material_select();

                }


            }     
        });
}
function eliminaInven(prod,inv)
{
	if(confirm("Se eliminara este producto de inventario"))
	{
			var  trasDato;
		trasDato = 5;
		
			$.ajax
			({
				type:"POST",
				url:"../core/controlador/inventarioControlador.php",
				data:' prod=' +  prod + '&inv=' + inv + '&trasDato=' + trasDato,
				success: function(resp)
				{
	
				   if(resp == '1')
					{
	
	
						//$('#mensaje').html('Datos Incorrectos.');         
						//$('#precargar').hide();    
					}
					else
					{
						
						
						 $('#mensajeINA').html(resp); 
	
					}
	
	
				}     
			});
	}
}
function editar(id)
{
	$('#modal1').openModal();

	 var  trasDato;
	trasDato = 1;
	habilita(false);
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/inventarioControlador.php",
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
function guardarInventario()
{
	

	 var  trasDato;
	trasDato = 2;
	id=document.getElementById('idproducto').value;
	id2=document.getElementById('idproducto2').value;
	precioG=document.getElementById('precioG').value;
	precioE=document.getElementById('precioE').value;
	precioM=document.getElementById('precioM').value;
	Minimo=document.getElementById('MinimoCant').value;
	costo=document.getElementById('costo').value;
	cantidad=document.getElementById('cantidad').value;
	codigo=document.getElementById('codigo').value;
	segmento=document.getElementById('tipoRepuesto').value;
	presentacion=document.getElementById('idpresentacion').value;
	
	
	nombre=document.getElementById('producto').value;
	marca=document.getElementById('marca').value;
	descripcion=document.getElementById('descripcion').value;
	
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/inventarioControlador.php",
            data:' id=' +  id + '&precioG=' + precioG + '&codigo=' + codigo + '&segmento=' + segmento + '&presentacion=' + presentacion + '&minimo=' + Minimo + '&costo=' + costo + '&cantidad=' + cantidad + '&precioE=' + precioE + '&precioM=' + precioM + '&nombre=' + nombre + '&marca=' + marca + '&descripcion=' + descripcion + '&prod=' + id2 + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
                    
					
					 $('#mensajeINA').html(resp); 

                }


            }     
        });
}
function calcula()
{
	precio=document.getElementById('precioG').value;
	
	pe=precio-(precio*(document.getElementById('precioEP').value/100));
	pm=precio-(precio*(document.getElementById('precioMP').value/100));
	
	
	document.getElementById('precioE').value=pe;
	document.getElementById('precioM').value=pm;
	
}
function habilita(ds)
{
	/*document.getElementById('producto').disabled=ds;
	document.getElementById('marca').disabled=ds;
	document.getElementById('descripcion').disabled=ds;*/
	document.getElementById('costo').disabled=ds;
	document.getElementById('cantidad').disabled=ds;
	document.getElementById('precioE').disabled=ds;
	document.getElementById('precioM').disabled=ds;
}

function printInv(tipo)
{
	var filto="";
 
	var porNombre=document.getElementsByName("filtro");
	
	for(var i=0;i<porNombre.length;i++)
	{
		if(porNombre[i].checked)
			filto=porNombre[i].value;
	}
    switch(tipo)
	{
		case 1:
		{
			impInvAdmin('mensaje3');
			//setTimeout("location.href='../core/modelo/reportes/inventarioReportes.php?tipo="+tipo+"&filtro="+filto+"'", 100);
			break;
		}
		case 2:
		{
			impInvAdminSinPres('mensaje3');
			//setTimeout("location.href='../core/modelo/reportes/inventarioReportes.php?tipo="+tipo+"&filtro="+filto+"'", 100);
			break;
		}
	}
	
		
	
}

function impInvAdmin(div){
    

    
    $('#'+div).html('<div id="impresionInvent"></div>');
    var encab="<div class=\"\" style=\"margin-bottom: 0px ;\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/><div style=\"height: 18px; text-align:right;color:#ccc;margin-top: -75px;\"><strong>Insagro</strong></div><div  style=\"height: 18px; text-align:right;color:#ccc;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;color:#ccc;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;color:#ccc;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;color:#ccc;\">Cel. 42207608</div></div><br>";
    //$('#impresionDeFacturaC11').html(encab);
     var cuerpo=""+encab;
     var trasDato;
    trasDato = 11;
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

 function impInvAdminSinPres(div){
    

    
    $('#'+div).html('<div id="impresionInvent"></div>');
     var encab="<div class=\"\" style=\"margin-bottom: 0px ;\"><img class=\"logo\" src=\"../app/img/logoinsagro1.png\"/><div style=\"height: 18px; text-align:right;color:#ccc;margin-top: -75px;\"><strong>Insagro</strong></div><div  style=\"height: 18px; text-align:right;color:#ccc;\">\"Lo mejor para tus plantas\"</div><div  style=\"height: 18px; text-align:right;color:#ccc;\">Direccion: Mazatenango</div><div  style=\"height: 18px; text-align:right;color:#ccc;\">Tel. 77737775</div><div  style=\"height: 18px; text-align:right;color:#ccc;\">Cel. 42207608</div></div><br>";
   //$('#impresionDeFacturaC11').html(encab);
     var cuerpo=""+encab;
     var trasDato;
    trasDato = 12;
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

