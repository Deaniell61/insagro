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


$('#tablaProD').DataTable( {

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

//*********************************************************

//*************** modal ***********************************
function abrirProdNuevo(){

    $('#btnActualizar').hide();
    $('#btnInsertar').show();
    $('#modal1Pr').openModal();
}

function seleccionar(id)
{
	//$('#modal4').closeModal();
	
	buscarNIT(id);
}
$('.modaleliminarPr').click(function(){

    event.preventDefault();

    gobIDElim = event.target.dataset.elim;

    $('#modal3Pr').openModal();

});






$(".dropdown-button").dropdown();

//*********************************************************




//comprobaciones

//**********************



function ingresarProductoP()
{


    var  nombre, descripcion, codigo,  trasDato;
	
        nombre = $('#nombrePr').val();
		descripcion = $('#descripcionPr').val();
		codigo = $('#codigoPr').val();
		
        trasDato = 1;
        $.ajax
        ({
            type:"POST",
            url:"../core/controlador/productoControlador.php",
            data:' nombre=' +  nombre + '&descripcion=' + descripcion + '&codigo=' + codigo + '&trasDato=' + trasDato,
            success: function(resp)
            {

                if(resp == '1')
                {


                    //$('#mensaje').html('Datos Incorrectos.');         
                    //$('#precargar').hide();    
                }
                else
                {
                    $('#modal5').closeModal();
                }


            }     
        });
    


}


