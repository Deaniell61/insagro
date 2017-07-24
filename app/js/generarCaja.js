/* *******funciones************************ */

function llamarCorte() {

    var trasDato;
    trasDato = 2;
    tipo=1;
    $.ajax({
        type: "POST",
        dataType: "json",
        url: "../core/controlador/cajaControlador.php",
        data: ' tipo=' + tipo + '&trasDato=' + trasDato,
        success: function(resp) {

           //alert(resp['ventasC']);
                $('#ventas111').val(resp['ventas']);
                $('#VentasCredito111').val(resp['ventasC']);
                $('#abonos111').val(resp['abonos']);
                $('#saldoAnt111').val(resp['saldoAnt']);
                $('#Gastos').val(resp['Gastos']);
                ventas=parseFloat(resp['ventas'].replace('Q','').replace(',',''));
                abonos=parseFloat(resp['abonos'].replace('Q','').replace(',',''));
                sal=parseFloat(resp['saldoAnt'].replace('Q','').replace(',',''));
                gasto=parseFloat(resp['Gastos'].replace('Q','').replace(',',''));
                $('#totalI111').html(currency(""+(ventas+abonos+sal)));
                $('#totalE111').html(currency(gasto+""));
                $('#totalCC111').html(currency(""+((ventas+abonos+sal)-gasto)));
                $('#fechaI').val(resp['fechaI']);
                $('#fechaF').val(resp['fechaF']);

                //alert(resp['abonosSQL'])


        }
    });
}

function ingresarCorte() {

    var trasDato;
    trasDato = 3;
    tipo=1;
    var fechaI=$('#fechaI').val();
    var fechaF=$('#fechaF').val();
    var descripcion=$('#descripcion').val();
    var total=$('#totalCC111').html().replace('Q','').replace(',','');
    var saldoAnt=$('#saldoAnt111').val().replace('Q','').replace(',','');
    if(fechaF==fechaI){
        alert('El corte de caja con fecha '+fechaF+' ya fue creado');
        
        location.href="?Caja";
    }else{
       
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../core/controlador/cajaControlador.php",
            data: ' tipo=' + tipo + '&fechaI=' + fechaI + '&saldoAnt=' + saldoAnt + '&descripcion=' + descripcion + '&fechaF=' + fechaF + '&total=' + total + '&trasDato=' + trasDato,
            success: function(resp) {
                if(resp['estatus']){
                    //alert(resp['estatus']);
                    alert('Se ha Creado Corte de caja con fecha '+fechaF);
                    location.href="?Caja";
                }else{
                    alert('Algo salio mal.');

                }
            
            },
            error: function( jqXHR, textStatus, errorThrown ) {

          if (jqXHR.status === 0) {

            alert('Not connect: Verify Network.');

          } else if (jqXHR.status == 404) {

            alert('Requested page not found [404]');

          } else if (jqXHR.status == 500) {

            alert('Internal Server Error [500].');

          } else if (textStatus === 'parsererror') {

            alert('Requested JSON parse failed.');

          } else if (textStatus === 'timeout') {

            alert('Time out error.');

          } else if (textStatus === 'abort') {

            alert('Ajax request aborted.');

          } else {

            alert('Uncaught Error: ' + jqXHR.responseText);

          }

        }   
        });
    }
}
//**********************
