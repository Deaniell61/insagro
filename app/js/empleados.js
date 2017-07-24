//************************** globales *********************
var gobIDElim=gobIDEdit="";
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
$('#pue').material_select(); 

//*********************************************************

//*************** modal ***********************************
$('#modalnuevo').click(function(){
	document.getElementById('form1').reset();
	formularioDis(false);
	 $('#btnActualizar').hide();
	 $('#btnInsertar').show();
    $('#modal1').openModal();
	$('#nom').focus();
});


$('.modaleliminar').click(function(){

    event.preventDefault();
                     
    gobIDElim = event.target.dataset.elim;
	
	$('#modal3').openModal();
	$('#contraElim').focus();
	
});




$(".dropdown-button").dropdown();

//*********************************************************




//Funciones
//**********************



$('#btnInsertar').click(function(){
    
 // alert('hola');  

    $('#precargar').show();

    var  nombre, apellido, telefono,direccion,puesto, trasDato;
    //if(passHabilita==1)
	{
		nombre = $('#nom').val();
		
		direccion = $('#dir').val();
		
		apellido = $('#apel').val();
		
		telefono = $('#tel').val();
		
		puesto = $('#pue').val();
		sueldo = $('#sueldos').val();
		
		trasDato = 6;
		$.ajax
		({
			type:"POST",
			url:"../core/controlador/usuarioControlador.php",
			data:' nombre=' +  nombre + '&apellido=' + apellido + '&sueldo=' + sueldo + '&direccion=' + direccion + '&telefono=' + telefono + '&puesto=' + puesto + '&trasDato=' + trasDato,
			success: function(resp)
			{
				
				//console.log(trasDato);
				
	
				//$('#mensaje').html(resp); 
			   // $('#precargar').css('display','none');  
				
	
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
	
   
    
});




$('.eliminar').click(function(event)
{
    
		     eliminaFun();  
    
});

function eliminaFun()
{
	
			var idelim, trasDato; 
			
            idelim=gobIDElim;
            pass=$('#contraElim').val();
            trasDato = 7;
    		
            if(confirm("Si elimina el empleado, eliminara todos los datos del mismo"))
			{
            
			$.ajax
            ({
                type:"POST",
                url:"../core/controlador/usuarioControlador.php",
                data:'idelim=' + idelim  + '&pass=' + pass  + '&trasDato=' + trasDato,
                success: function(resp)
                {
                   
						$('#mensajeE').html(resp);
                        //setTimeout(window.location.reload(), 3000);


                   
                }  
            });
			}
}




function editar(edit)
                     {
formularioDis(false);
     
	 

    gobIDEdit = edit;

	var idedit, trasDato; 
	idedit = gobIDEdit;
	 $('#modal1').openModal();
	
    trasDato = 8;


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

}



$('#btnActualizar').click(function()
                     {

    var idedit, trasDato, nombre, apellido, telefono,direccion,puesto; 

    idedit = gobIDEdit;

    trasDato = 9;
	//$('#precargar').show();
	{
		nombre = $('#nom').val();
		
		direccion = $('#dir').val();
		
		apellido = $('#apel').val();
		
		telefono = $('#tel').val();
		
		puesto = $('#pue').val();
		
		sueldo = $('#sueldos').val();
		
		
		$.ajax
		({
			type:"POST",
			url:"../core/controlador/usuarioControlador.php",
			data:' nombre=' +  nombre + '&sueldo=' + sueldo + '&apellido=' + apellido + '&direccion=' + direccion + '&telefono=' + telefono + '&puesto=' + puesto + '&trasDato=' + trasDato+ '&id=' + idedit,
			success: function(resp)
			{
				
				//console.log(trasDato);
				
	
				//$('#mensaje').html(resp); 
			   // $('#precargar').css('display','none');  
				
	
				if(resp == '1')
				{
	
						
					//$('#mensaje').html('Datos Incorrectos.');         
					//$('#precargar').hide();    
				}
				else
				{
					
					setTimeout(window.location.reload(), 3000);
	
	//$('#mensaje').html(resp);     
				}
				
			 
			}     
		});
	}
          

});

$('.ver').click(function()
                     {

     event.preventDefault();
var idver, trasDato; 
    idver = event.target.dataset.ver;

	
	
	console.log(idver);
	 $('#modal1').openModal();
	
    trasDato = 8;


    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/usuarioControlador.php",
        data:'idedit=' + idver  + '&trasDato=' + trasDato,
        success: function(resp)
        {

           
			
            $('#mensaje').html(resp); 
			$('#btnActualizar').hide();
	 $('#btnInsertar').hide();
      
			formularioDis(true);
            
            

        }     
    });            

});

function formularioDis(res)
{
	 $('#nom').prop( "disabled", res );
		
		$('#dir').prop( "disabled", res );
		
		$('#apel').prop( "disabled", res );
		
		$('#tel').prop( "disabled", res );
		
	    $('#pue').prop( "disabled", res );
		
		$('#sueldos').prop( "disabled", res );
}