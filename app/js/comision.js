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
	
    $('#modal1').openModal();
	$('#vendedores').focus();
	
	
	
});

function cerrarEsto()
{
	if(document.getElementById('codigo').value!="")
	{
		actualizarUsuario();
	}
}

function eliminar(id)
{
                     
    gobIDElim = id;
	
	$('#modal3').openModal();
	$('#contraElim').focus();
	
}




$(".dropdown-button").dropdown();

//*********************************************************


function buscaUsuarios(emp)
{
	var prod=emp;
	var  trasDato;
	trasDato = 5;
		
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/pagosControlador.php",
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
					
                    
					
					 $('#Usuarios1').html(resp);
					  

                }


            }     
        });
	
	
}
function seleccionaUsuarios(emp)
{
	var prod=emp;
	var  trasDato;
	trasDato = 6;
		fechaini=document.getElementById('fechaI').value;
		fechafin=document.getElementById('fechaF').value;
		
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/pagosControlador.php",
            data:' prod=' +  prod + '&fechaini=' + fechaini + '&fechafin=' + fechafin + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
					
                    
					
					 $('#mensajeUsuarios').html(resp);
					  

                }


            }     
        });
	
	
}
function ingresoComision()
{
	
	var  trasDato;
	trasDato = 7;
		var id=document.getElementById('codigo').value;
		var fechaIni=document.getElementById('fechaI').value;
		var fechaFin=document.getElementById('fechaF').value;
		var monto=document.getElementById('Monto').value;
		var porcent=document.getElementById('porcentaje').value;
		var PagarC=document.getElementById('PagarC').value;
		
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/pagosControlador.php",
            data:' id=' +  id + '&fechaIni=' + fechaIni + '&fechaFin=' + fechaFin + '&monto=' + monto + '&porcent=' + porcent + '&PagarC=' + PagarC + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
					
                    
					
					 $('#mensajeUsuarios').html(resp);
					  

                }


            }     
        });
	
	
}

function EliminarComision(contra)
{
	var  trasDato;
	trasDato = 8;
		
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/pagosControlador.php",
            data:' contra=' +  contra + '&id=' + gobIDElim + '&trasDato=' + trasDato,
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

function calculaComi(val)
{
	monto=document.getElementById('Monto').value;
	monto=monto*(val/100);
	document.getElementById('PagarC').disabled=false;
	document.getElementById('PagarC').value=monto;
	document.getElementById('PagarC').focus();
	document.getElementById('PagarC').disabled=true;
		document.getElementById('porcentaje').focus();
}