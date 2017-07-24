function limpiarCuerposModales() {
    $('#cuerpoModal1').html("");
    $('#cuerpoModal2').html("");
    $('#cuerpoModal3').html("");
    $('#cuerpoModal4').html("");
    $('#cuerpoModal5').html("");
    $('#cuerpoModal6').html("");
}

$('#modalVentas').click(function() {

    limpiarCuerposModales();
    $('#modal1').openModal();
    filto = '1';
    var trasDato, fechaini, fechafin;
    trasDato = 18;

    fechaini = $('#fechaI').val();
    fechafin = $('#fechaF').val();

    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' tipo=' + filto + '&fechaini=' + fechaini + '&fechafin=' + fechafin + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');         
                //$('#precargar').hide();    
            } else {


                $('#cuerpoModal1').html(resp);

                $('#tabla').DataTable({

                    info: false,



                    language: {

                        search: "Buscar",
                        sLengthMenu: " _MENU_ ",

                        paginate: {

                            previous: "Anterior",
                            next: "Siguiente",

                        },

                    },
                    /*
                    		   "scrollY":        "375px",
                    	"scrollCollapse": true,
                    	"paging":         true
                    	 */
                });
                $('#tabla_length').material_select();

            }


        }
    });


});


$('#modalAbonos').click(function() {

    limpiarCuerposModales();
    $('#modal2').openModal();
    filto = "";
    var trasDato, fechaini, fechafin;
    trasDato = 6;

    fechaini = $('#fechaI').val();
    fechafin = $('#fechaF').val();

    $.ajax({
        type: "POST",
        url: "../core/controlador/cuentasCobrarControlador.php",
        data: ' tipo=' + filto + '&fechaini=' + fechaini + '&fechafin=' + fechafin + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');         
                //$('#precargar').hide();    
            } else {


                $('#cuerpoModal2').html(resp);

                $('#tabla').DataTable({

                    info: false,



                    language: {

                        search: "Buscar",
                        sLengthMenu: " _MENU_ ",

                        paginate: {

                            previous: "Anterior",
                            next: "Siguiente",

                        },

                    },
                    /*
                    		   "scrollY":        "375px",
                    	"scrollCollapse": true,
                    	"paging":         true
                    	 */
                });
                $('#tabla_length').material_select();

            }


        }
    });


});



$('#modalCompras').click(function() {
    limpiarCuerposModales();
    $('#modal3').openModal();
    filto = 1;
    var trasDato, fechaini, fechafin;
    trasDato = 19;

    fechaini = $('#fechaI').val();
    fechafin = $('#fechaF').val();

    $.ajax({
        type: "POST",
        url: "../core/controlador/comprasControlador.php",
        data: ' tipo=' + filto + '&fechaini=' + fechaini + '&fechafin=' + fechafin + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');         
                //$('#precargar').hide();    
            } else {


                $('#cuerpoModal3').html(resp);

                $('#tabla').DataTable({

                    info: false,



                    language: {

                        search: "Buscar",
                        sLengthMenu: " _MENU_ ",

                        paginate: {

                            previous: "Anterior",
                            next: "Siguiente",

                        },

                    },
                    /*
                    		   "scrollY":        "375px",
                    	"scrollCollapse": true,
                    	"paging":         true
                    	 */
                });
                $('#tabla_length').material_select();

            }


        }
    });


});
$('#modalSueldos').click(function() {

    limpiarCuerposModales();
    $('#modal4').openModal();
    filto = "";
    var trasDato, fechaini, fechafin;
    trasDato = 11;

    fechaini = $('#fechaI').val();
    fechafin = $('#fechaF').val();

    $.ajax({
        type: "POST",
        url: "../core/controlador/pagosControlador.php",
        data: ' tipo=' + filto + '&fechaini=' + fechaini + '&fechafin=' + fechafin + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');         
                //$('#precargar').hide();    
            } else {


                $('#cuerpoModal4').html(resp);

                $('#tabla').DataTable({

                    info: false,



                    language: {

                        search: "Buscar",
                        sLengthMenu: " _MENU_ ",

                        paginate: {

                            previous: "Anterior",
                            next: "Siguiente",

                        },

                    },
                    /*
                    		   "scrollY":        "375px",
                    	"scrollCollapse": true,
                    	"paging":         true
                    	 */
                });
                $('#tabla_length').material_select();

            }


        }
    });


});
$('#modalCreditos').click(function() {


    limpiarCuerposModales();
    $('#modal5').openModal();
    filto = "";
    var trasDato, fechaini, fechafin;
    trasDato = 6;

    fechaini = $('#fechaI').val();
    fechafin = $('#fechaF').val();

    $.ajax({
        type: "POST",
        url: "../core/controlador/cuentasPagarControlador.php",
        data: ' tipo=' + filto + '&fechaini=' + fechaini + '&fechafin=' + fechafin + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');         
                //$('#precargar').hide();    
            } else {


                $('#cuerpoModal5').html(resp);

                $('#tabla').DataTable({

                    info: false,



                    language: {

                        search: "Buscar",
                        sLengthMenu: " _MENU_ ",

                        paginate: {

                            previous: "Anterior",
                            next: "Siguiente",

                        },

                    },
                    /*
                    		   "scrollY":        "375px",
                    	"scrollCollapse": true,
                    	"paging":         true
                    	 */
                });
                $('#tabla_length').material_select();

            }


        }
    });


});

$('#modalGastos').click(function() {

    limpiarCuerposModales();
    $('#modal6').openModal();
    filto = "";
    var trasDato, fechaini, fechafin;
    trasDato = 12;

    fechaini = $('#fechaI').val();
    fechafin = $('#fechaF').val();

    $.ajax({
        type: "POST",
        url: "../core/controlador/pagosControlador.php",
        data: ' tipo=' + filto + '&fechaini=' + fechaini + '&fechafin=' + fechafin + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');         
                //$('#precargar').hide();    
            } else {


                $('#cuerpoModal6').html(resp);

                $('#tabla').DataTable({

                    info: false,



                    language: {

                        search: "Buscar",
                        sLengthMenu: " _MENU_ ",

                        paginate: {

                            previous: "Anterior",
                            next: "Siguiente",

                        },

                    },
                    /*
                    		   "scrollY":        "375px",
                    	"scrollCollapse": true,
                    	"paging":         true
                    	 */
                });
                $('#tabla_length').material_select();

            }


        }
    });

});

$('#modalVentasCredito').click(function() {

    limpiarCuerposModales();
    $('#modal1').openModal();
    filto = '1';
    var trasDato, fechaini, fechafin;
    trasDato = 21;

    fechaini = $('#fechaI').val();
    fechafin = $('#fechaF').val();

    $.ajax({
        type: "POST",
        url: "../core/controlador/ventasControlador.php",
        data: ' tipo=' + filto + '&fechaini=' + fechaini + '&fechafin=' + fechafin + '&trasDato=' + trasDato,
        success: function(resp) {

            if (resp == '1') {


                //$('#mensaje').html('Datos Incorrectos.');         
                //$('#precargar').hide();    
            } else {


                $('#cuerpoModal1').html(resp);

                $('#tabla').DataTable({

                    info: false,



                    language: {

                        search: "Buscar",
                        sLengthMenu: " _MENU_ ",

                        paginate: {

                            previous: "Anterior",
                            next: "Siguiente",

                        },

                    },
                    /*
                    		   "scrollY":        "375px",
                    	"scrollCollapse": true,
                    	"paging":         true
                    	 */
                });
                $('#tabla_length').material_select();

            }


        }
    });


});