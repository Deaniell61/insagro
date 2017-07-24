
//-------- constantes
//-------- Eventos

$('#enviar').click(function(){

    login();
	
});
$('#pass').keyup(function(event){

	if(event.keyCode=='13')
	{
		login();
	}
   
	
});
$('#user').keyup(function(event){

	if(event.keyCode=='13')
	{
		if($('#pass').val()=="")
		{
			$('#pass').focus();
		}
		else
		{
			login();
		}
	}
   
	
});

//-------- funciones
function login()
{
 
    
    $('#precargar').css("display","");
    
    var user, pass, trasDato;
     user = $('#user').val();
     pass = $('#pass').val();
     trasDato = 1;
   $.ajax
   ({
      type:"POST",
      url:"core/controlador/usuarioControlador.php",
     data:'user=' + user + '&pass=' + pass + '&trasDato=' + trasDato,
      success: function(resp)
       {
         
           if(resp == 1)
               {
                   
                  $('#mensajeI').css("display","");         
                   $('#precargar').css("display","none");    
               }
           else
		   if(resp == 2)
               {
                   
                  $('#mensajeI').css("display","");         
                   $('#precargar').css("display","none");    
               }
			else
               {
                  //$('#mensajeI').html(resp);  
                   location.href=resp;
                   
                            
               }
          
       }     
   });
}


