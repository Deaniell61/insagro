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
	document.getElementById('formUser').reset();
	$('#password2Row').show();
	$('#passwordRow').show();
	formularioDis(false);
	 $('#btnActualizar').hide();
	 $('#btnInsertar').show();
    $('#modal1').openModal();
	$('#user').focus();
	
	
});
function verificaEnter(evt)
{
	
	if(evt.keyCode=='13')
	{
		
		eliminaFun();
	}
}
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




//comprobaciones

$('#password2').keyup(function(){

    compruebaPass();
	
});
$('#password').keyup(function(){

    compruebaPass();
	
});

function compruebaPass()
{
	pas1=$('#password').val();
	pas2=$('#password2').val();
	
	
		if(pas1==pas2 && pas1!="" && pas1.length>8)
		{
			passHabilita=1;
			$('#password2').css('border-color','#3F0');
			
		}
		else
		{
			passHabilita=0;
			$('#password2').css('border-color','#F00');
			
		}
}

function llamarModulos()
{
	  var  trasDato;
		trasDato = 10;
		$.ajax
		({
			type:"POST",
			url:"../core/controlador/usuarioControlador.php",
			data:'trasDato=' + trasDato,
			success: function(resp)
			{
				if(resp == '1')
				{
	
				}
				else
				{
					$('#Modulos').html(resp); 
					$('select').material_select(); 
				}
				
			 
			}     
		});
}
function habilitarModulos(i,x)
{
	
	
}
function cargarModulo(x,mod,id)
{
	
	var modulo="";
	var modul="";
	var edit="0";
	var elim="0";
	var inser="0";
	for (var i = 0; i < x.options.length; i++) 
	{
		 if(x.options[i].selected ==true)
		 {
		
						modulo+=x.options[i].value+".";
			
			 
		  }
	  }
  	modulo=modulo.substring(0,modulo.length-1);
	modulo=modulo.split(".");
		
		for (var i = 0; i < modulo.length; i++)
		{
			switch(modulo[i])
			{
				case '0':
				{
					modul=mod;
					break;
				}
				case '1':
				{
					inser='1';
					break;
				}
				case '2':
				{
					edit='1';
					break;
				}
				case '3':
				{
					elim='1';
					break;
				}
			}
			
		}
		
	var  trasDato;
	
	if(modul!="")
	{
		trasDato = 11;
        
	}
	else
	{
		trasDato = 12;
       
	}
	//alert(modul);
	
	$.ajax
        ({
            type:"POST",
            url:"../core/controlador/usuarioControlador.php",
            data:' modul=' +  mod + '&inser=' + inser + '&edit=' + edit + '&elim=' + elim + '&user=' + id + '&trasDato=' + trasDato,
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
		empleado = $('#emple').val();
		
		trasDato = 2;
		$.ajax
		({
			type:"POST",
			url:"../core/controlador/usuarioControlador.php",
			data:' user=' +  user + '&pass=' + pass + '&empleado=' + empleado + '&rol=' + rol + '&trasDato=' + trasDato,
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
					//$('#mensaje').html(resp);  
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
    
			eliminaFun();
    
});



function eliminaFun()
{
	
			var idelim,pass, trasDato; 
			
            idelim=gobIDElim;
            pass=$('#contraElim').val();
            trasDato = 3;
    		
            if(confirm("Si elimina el usuario, eliminara todos los datos del mismo"))
			{
            
			$.ajax
            ({
                type:"POST",
                url:"../core/controlador/usuarioControlador.php",
                data:'idelim=' + idelim  + '&pass=' + pass  + '&trasDato=' + trasDato,
                success: function(resp)
                {
                   
						$('#mensajeElim111').html(resp);
                        //setTimeout(window.location.reload(), 3000);


                   
                }  
            });
			}
}


function editar(id)
{
formularioDis(false);
    gobIDEdit = id;

	var idedit, trasDato; 
	idedit = gobIDEdit;
	
	 $('#modal1').openModal();
document.getElementById('Modulos').hidden=false;
	$('#password2Row').show();
	$('#passwordRow').show();
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

}
function actualizarUsuario()
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
		empleado = $('#emple').val();
		document.getElementById('Modulos').hidden=true;
		$.ajax
		({
			type:"POST",
			url:"../core/controlador/usuarioControlador.php",
			data:' user=' +  user + '&empleado=' + empleado + '&pass=' + pass + '&rol=' + rol+ '&id=' + idedit + '&trasDato=' + trasDato,
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
          

}
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
		empleado = $('#emple').val();
		document.getElementById('Modulos').hidden=true;
		$.ajax
		({
			type:"POST",
			url:"../core/controlador/usuarioControlador.php",
			data:' user=' +  user + '&empleado=' + empleado + '&pass=' + pass + '&rol=' + rol+ '&id=' + idedit + '&trasDato=' + trasDato,
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

function ver(id)
                     {

 
	var idver, trasDato; 
    idver = id;

	 $('#modal1').openModal();
	$('#Modulos').show();
	$('#password2Row').hide();
	$('#passwordRow').hide();
    trasDato =4;


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

}

function formularioDis(res)
{
	 $('#user').prop( "disabled", res );
		
		$('#password').prop( "disabled", res );
		
		$('#password2').prop( "disabled", res );
		
		$('#rol').prop( "disabled", res );
		
		
	    
}

function deshabilitarUsuariosTurno(estado,estadofin)
{
	var trasDato; 
  	trasDato =14;
    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/usuarioControlador.php",
        data:'estadoFin=' + estado  + '&estadoIni=' + estadofin  + '&trasDato=' + trasDato,
        success: function(resp)
        {
            $('#resultadoUsu').html(resp); 
	    }     
    });  
}
function deshabilitarUsuariosTurnoU(estado,estadofin,cod)
{
	var trasDato; 
  	trasDato =15;
    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/usuarioControlador.php",
        data:'estadoFin=' + estado  + '&estadoIni=' + estadofin  + '&id=' + cod  + '&trasDato=' + trasDato,
        success: function(resp)
        {
            $('#resultadoUsu').html(resp); 
	    }     
    });  
}