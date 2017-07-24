//************************** globales *********************
var gobIDElim,gobIDEdit;
var passHabilita=0;
var verEdita=0;
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

$('#modalVer').click(function(){
    $('#btnActualizar').hide();
    $('#btnInsertar').show();
    $('#modal1').openModal();
});





$(".dropdown-button").dropdown();

//*********************************************************

function mostrarCaja()
{
	var filto="";
 
        var porNombre=document.getElementsByName("filtro");
        
        for(var i=0;i<porNombre.length;i++)
        {
            if(porNombre[i].checked)
                filto=porNombre[i].value;
        }

	var  trasDato;
	trasDato = 1;
	
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/cajaControlador.php",
            data:' tipo=' +  filto + '&trasDato=' + trasDato,
            success: function(resp)
            {
                {
                    
					
					 $('#tablaMostrar').html(resp); 
					 
					 $('#tabla').DataTable( {

                                            "order": [[ 0, "desc" ]],
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
function cargarDepositos(id)
{
	var  trasDato;
	trasDato = 5;
    fecha="";
		if(document.getElementById('fechaCorte')){
            fecha=document.getElementById('fechaCorte').value;
        }
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/cajaControlador.php",
            data:' id=' +  id + '&fecha=' + fecha + '&trasDato=' + trasDato,
            success: function(resp)
            {

            
					  $('#resumenCEdit').html(resp);
                      if(verEdita==0){
                        $(".modaleliminarFila").hide();
                      }else
                      {$(".modaleliminarFila").show();}
				
            }     
        });
}
function limpiarAbono()
{
	document.getElementById('Monto').value='';
	document.getElementById('descripcion').value='';
	document.getElementById('Monto').focus();
	document.getElementById('descripcion').focus();
}
function Depositar()
{
	 
    trasDato = 6;
	var id=document.getElementById('codigo').value;
	var fechaAct=document.getElementById('fechaAct').value;
	var comprobante=document.getElementById('comprobante').value;
	var nocuenta=document.getElementById('nocuenta').value;
	var banco=document.getElementById('banco').value;
	var monto=document.getElementById('monto').value;

    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/cajaControlador.php",
        data:'id=' + id  + '&fechaAct=' + fechaAct  + '&comprobante=' + comprobante  + '&nocuenta=' + nocuenta  + '&banco=' + banco  + '&monto=' + monto  + '&trasDato=' + trasDato,
        success: function(resp)
        {
            $('#mensajecc').html(resp); 
        }     
    });            

}
function editar(id)
{
	 
    var idedit, trasDato; 

    $('#modal1').openModal();
    
    verEdita=1;
   
    trasDato = 4;


    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/cajaControlador.php",
        data:'id=' + id  + '&trasDato=' + trasDato,
        success: function(resp)
        {



            
            document.getElementById('fechaAct').disabled=false;
            //document.getElementById('fechaAct').value='';
            document.getElementById('fechaAct').focus();
            document.getElementById('fechaAct').disabled=false;

            document.getElementById('comprobante').disabled=false;
            document.getElementById('comprobante').value='';
            document.getElementById('comprobante').focus();
            document.getElementById('comprobante').disabled=false;

            document.getElementById('nocuenta').disabled=false;
            document.getElementById('nocuenta').value='';
            document.getElementById('nocuenta').focus();
            document.getElementById('nocuenta').disabled=false;

            document.getElementById('banco').disabled=false;
            document.getElementById('banco').value='';
            document.getElementById('banco').focus();
            document.getElementById('banco').disabled=false;

            document.getElementById('monto').disabled=false;
            document.getElementById('monto').value='';
            document.getElementById('monto').focus();
            document.getElementById('monto').disabled=false; 
            $('#guardar').show();
            $('#mensajecc').html(resp); 




        }     
    });            

}
function ver(id)
{
	 
    var idedit, trasDato; 

    $('#modal1').openModal();
    verEdita=0;
    trasDato = 4;


    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/cajaControlador.php",
        data:'id=' + id  + '&trasDato=' + trasDato,
        success: function(resp)
        {



            
            document.getElementById('fechaAct').disabled=false;
            //document.getElementById('fechaAct').value='';
            document.getElementById('fechaAct').focus();
            document.getElementById('fechaAct').disabled=true;

            document.getElementById('comprobante').disabled=false;
            document.getElementById('comprobante').value='';
            document.getElementById('comprobante').focus();
            document.getElementById('comprobante').disabled=true;

            document.getElementById('nocuenta').disabled=false;
            document.getElementById('nocuenta').value='';
            document.getElementById('nocuenta').focus();
            document.getElementById('nocuenta').disabled=true;

            document.getElementById('banco').disabled=false;
            document.getElementById('banco').value='';
            document.getElementById('banco').focus();
            document.getElementById('banco').disabled=true;

            document.getElementById('monto').disabled=false;
            document.getElementById('monto').value='';
            document.getElementById('monto').focus();
            document.getElementById('monto').disabled=true;  
            $('#guardar').hide();
            $('#resumenCVer').html(resp); 


        }     
    });            

}


function eliminar(id,caja){
    var idedit, trasDato; 

    trasDato = 8;


    $.ajax
    ({
        type:"POST",
        url:"../core/controlador/cajaControlador.php",
        data:'id=' + id  + '&caja=' + caja  + '&trasDato=' + trasDato,
        success: function(resp)
        {



            $('#mensajecc').html(resp); 


        }     
    }); 
}