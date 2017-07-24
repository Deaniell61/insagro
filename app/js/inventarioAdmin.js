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