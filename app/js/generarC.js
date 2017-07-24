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

//$('#idpresentacion').material_select();
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


	//$('#tipoPlazo').material_select();

//*********************************************************

//*************** modal ***********************************
$('#modalnuevo').click(function(){
    $('#btnActualizar').hide();
    $('#btnInsertar').show();
    $('#modal1').openModal();
	document.getElementById('nombreC').focus();
    document.getElementById('tipoRepuesto').disabled=false;
    document.getElementById('idpresentacion').disabled=false;
	$('#tipoRepuesto').material_select();
    $('#idpresentacion').material_select();
    
	cierre();
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
cierre();

}
function ingresoProducto(id,compra)
{
	var  trasDato;
	trasDato = 1;
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

					 $('#mensajeCompras').html(resp);

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
    /*var availableTags = [ "hola","hola2"
      
    ];
    $( "#presentacion" ).autocomplete({
		
      source: availableTags,
	  position: { my : "right top", at: "right bottom" },
	  select: function(){document.getElementById('existe').checked=true;cargaColumna(document.getElementById('existe'));},
	  open: function(){document.getElementById('existe').checked=false;}
	  
    });
   /* $( "#campo" ).autocomplete({
		
      source: availableTagsC,
	  position: { my : "right top", at: "right bottom" },
	  select: function(){document.getElementById('existeC').checked=true;document.getElementById('CambiarNombre').style.display="table-cell";},
	  open: function(){document.getElementById('existeC').checked=false;document.getElementById('CambiarNombre').style.display="table-column";}
	  
    });*/
function agregaInvetario()
{
	cont=0;
	var real=1;
	
	var filas=(document.getElementById("tabla22").rows.length)-1;

	
	
	{
		{
		cantidad=(document.getElementById('Cantidad'+cont).innerHTML);
		codigo=(document.getElementById('Codigo'+cont).innerHTML);
		costo=(document.getElementById('Costo'+cont).innerHTML);
		precioG=(document.getElementById('PrecioG'+cont).innerHTML);
		
		precioE=(document.getElementById('PrecioE'+cont).innerHTML);
		precioM=(document.getElementById('PrecioM'+cont).innerHTML);
		Presentacion=(document.getElementById('Presentacion'+cont).innerHTML);
		proveedor=$('#codigoProveedor').val();
		var  cantidad,trasDato;
		trasDato = 13;
		
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' codigo=' +  codigo + '&cantidad=' + cantidad + '&presentacion=' + Presentacion + '&costo=' + costo + '&precioG=' + precioG + '&precioE=' + precioE + '&precioM=' + precioM + '&proveedor=' + proveedor + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {

					real=0;
                    alert('Algo salio mal');
					
                }
                else
                {
				
                    real=1;
					
					 $('#mensajeC').html(resp);
					 

                }


            } 
        });
		
		
		}
		/*else
		{
			alert('error'+cont+'  Cantidad'+cont);
		}*/
	}

	if(real==1)
	{
		
		//window.location.href="Compras.php";
	}
	
	
}
function anularDetalleCompra(id)
{
	
	var  trasDato;
	trasDato = 14;

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
					
                  
					
					 $('#mensajeC').html(resp); 

                }


            }     
        });
}
function seleccionaMarca(mc)
{
	document.getElementById('marca').value=mc;
	document.getElementById('listaMarca').style.display='';

}
function seleccionaPresentacion(mc,id)
{
	document.getElementById('presentacion').value=mc;
    document.getElementById('idpresentacion').value=id;
	document.getElementById('listaPresentacion').style.display='';

}
function comprobarCredito(obj)
{

	if(obj.value=='2')
	{
		$('#cuentasContenedor').show();
		$('#tipoPlazo').material_select();
	}
	else
	{
		$('#cuentasContenedor').hide();
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
	$('#Cantidad').val('');
	$('#precioC').val('');
	$('#precioG').val('');
	$('#precioE').val('');
	//$('#agregarProd').show();
    document.getElementById('codigo').disabled=false;
	document.getElementById('nombreC').disabled=false;
	document.getElementById('Producto').disabled=false;
	document.getElementById('descripcion').disabled=false;
	document.getElementById('tipoRepuesto').disabled=false;
    document.getElementById('idpresentacion').disabled=false;
	$('#tipoRepuesto').material_select();
    $('#idpresentacion').material_select();
	document.getElementById('marca').disabled=false;
	document.getElementById('Cantidad').disabled=false;
	document.getElementById('precioC').disabled=false;
	document.getElementById('precioG').disabled=false;
	document.getElementById('precioE').disabled=false;
	$('#nombreC').focus();
	$('#precioM').val('');
	document.getElementById('retoCompra').style.display='none';

}
function calcularPrecios(id1,id2,tot)
{
	es=(tot-(tot*0.1));
	m=(tot-(tot*0.15));
	document.getElementById(id1).value=es;
	document.getElementById(id2).value=m;
}
function buscarProveedor2(buscar)
{
	if(buscar.value=="")
	{
		$('#modal4').openModal();
		setTimeout(function(){
		llamarProveedor();},300);
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
				$('#mensajeCompras').html(resp);
            }
        });
}
function buscarPlazoCuentaPagar()
{
	 var  trasDato;
	trasDato = 15;
	id=document.getElementById('codigoCompra').value;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' id=' +  id + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensajeCompras').html('Datos Incorrectos.');
                    //$('#precargar').hide();
                }
                else
                {


					 $('#mensajeCompras').html(resp);

                }


            }
        });
}
function iniciarCompra(id)
{
	 var  trasDato;
	trasDato = 2;
	tipo=document.getElementById('tipoCompra').value;
	fecha=document.getElementById('fecha').value;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' prov=' +  id + '&tipo=' + tipo + '&fecha=' + fecha + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensajeCompras').html('Datos Incorrectos.');
                    //$('#precargar').hide();
                }
                else
                {



					 $('#mensajeCompras').html(resp);

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
	if($('#Cantidad').val()>=0)
	{
		cantidad=$('#Cantidad').val();
		cod=$('#codigo').val();
		precioC=$('#precioC').val();
		precioG=$('#precioG').val();
		precioE=$('#precioE').val();
		precioM=$('#precioM').val();
		proveedor=$('#codigoProveedor').val();
		medida=$('#medida').val();
		presentacion=$('#presentacion').val();
		idpresentacion=$('#idpresentacion').val();


        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' prod=' +  prod + '&presentacion=' + presentacion + '&idpresentacion=' + idpresentacion + '&cod=' + cod + '&cantidad=' + cantidad + '&medida=' + medida + '&precioC=' + precioC + '&precioG=' + precioG + '&precioE=' + precioE + '&precioM=' + precioM + '&proveedor=' + proveedor + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensajeCompras').html('Datos Incorrectos.');
                    //$('#precargar').hide();
                }
                else
                {



					 $('#mensajeCompras').html(resp);


                }


            }
        });
	}
	else
	{
		alert('No se permite compras negativas');
	}
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


                    //$('#mensajeCompras').html('Datos Incorrectos.');
                    //$('#precargar').hide();
                }
                else
                {



					 $('#mensajeCompras').html(resp);

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




					 $('#mensajeCompras').html(resp);


               

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
function cambiarFecha(tipo,id)
{

	var  trasDato;
	trasDato = 18;
		//alert(2);
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            data:' fecha=' +  tipo + '&id=' + id + '&trasDato=' + trasDato,
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
function agregarFactura(tipo,id)
{

	var  trasDato;
	trasDato = 12;
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

function ingresoCuentaPagar()
{

	var  trasDato;
	trasDato = 1;
		//alert(2);
		tipo=document.getElementById('tipoPlazo').value;
		plazo=document.getElementById('plazo').value;
		id=document.getElementById('codigoCompra').value;
		fecha=document.getElementById('fecha').value;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/cuentasPagarControlador.php",
            data:' tipo=' +  tipo + '&plazo=' + plazo + '&id=' + id + '&fecha=' + fecha + '&trasDato=' + trasDato,
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

function agregaCorrelativo(){
    var  trasDato;
	trasDato = 21;
		//alert(2);
		segmento=document.getElementById('tipoRepuesto').value;
		if(segmento>0){
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/comprasControlador.php",
            dataType: 'json',
            data:' segmento=' +  segmento + '&trasDato=' + trasDato,
            success: function(resp)
            {
                    //alert(resp['estatus']);

    				 $('#nombreC').val(resp['correlativo']);
                     $('#nombreC').focus();
                     buscaProducto(document.getElementById('nombreC'))

            }
        });}else{
            alert('Debe seleccionar un sector valido');
        }
}
//**********************
