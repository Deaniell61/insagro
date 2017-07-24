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


function eliminar(id)
{
                     
    gobIDElim = id;
	
	$('#modal3').openModal();
	$('#contraElim').focus();
	
}




$(".dropdown-button").dropdown();

//*********************************************************




//funciones

function buscaEmpleado(emp)
{
	var prod=emp;
	var  trasDato;
	trasDato = 1;
		
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
					
                    
					
					 $('#Empleados').html(resp);
					  

                }


            }     
        });
	
	
}
function seleccionaEmpleado(emp)
{
	var prod=emp;
	var  trasDato;
	trasDato = 2;
		
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
					
                    
					
					 $('#mensajeEmpleado').html(resp);
					  

                }


            }     
        });
	
	
}
function ingresoSueldo()
{
	
	var  trasDato;
	trasDato = 3;
		var id=document.getElementById('codigo').value;
		var fecha=document.getElementById('fecha').value;
		var descripcion=document.getElementById('descripcion').value;
		var monto=document.getElementById('monto').value;
		if(id!=""){
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/pagosControlador.php",
            data:' id=' +  id + '&fecha=' + fecha + '&descripcion=' + descripcion + '&monto=' + monto + '&trasDato=' + trasDato,
            success: function(resp)
            {

               if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
					
                    
					
					 $('#mensajeEmpleado').html(resp);
					  

                }


            }     
        });
        }else{
            alert("Debe seleccionar un empleado, no se puede pagar sueldo si no es empleado")
            location.reload()
        }
	
	
}

function EliminarSueldo(contra)
{
	var  trasDato;
	trasDato = 4;
		
		
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