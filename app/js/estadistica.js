function cargarGrafico(tipo,mas)
{
	var  trasDato;
	trasDato = tipo;
	fechaini =document.getElementById('fechaI').value;
	fechafin =document.getElementById('fechaF').value;
	
            $.ajax({
                url:"../core/controlador/estadisticaControlador.php",
                type: 'POST',
                data: 'fechaini='+fechaini+'&fechafin='+fechafin+'&mas='+mas+'&trasDato=' + trasDato,
                success: function (resp) {
                    $('#comoGraficar').html(resp);
                }
            });
           
    
}

function SumaCostos()
{
	compras=parseFloat(document.getElementById('compras111').value.replace("Q","").replace(",",""));
	gastos=parseFloat(document.getElementById('gVarios111').value.replace("Q","").replace(",",""));
	creditos=parseFloat(document.getElementById('creditosP111').value.replace("Q","").replace(",",""));
	sueldos=parseFloat(document.getElementById('sueldos111').value.replace("Q","").replace(",",""));

	document.getElementById('totalC111').innerHTML=(compras+gastos+creditos+sueldos);
		
	document.getElementById('totalC111').innerHTML=currency(document.getElementById('totalC111').innerHTML);
	utilidad();
}

function SumaIngresos()
{
	ventas=parseFloat(document.getElementById('ventas111').value.replace("Q","").replace(",",""));
	abonospagados=parseFloat(document.getElementById('abonosCobrados1111').value.replace("Q","").replace(",",""));
	
	document.getElementById('totalV111').innerHTML=(ventas+abonospagados);
		
	document.getElementById('totalV111').innerHTML=currency(document.getElementById('totalV111').innerHTML);
	utilidad();
}
function utilidad()
{
	ventas=parseFloat(document.getElementById('totalV111').innerHTML.replace("Q","").replace(",",""));
	compras=parseFloat(document.getElementById('totalC111').innerHTML.replace("Q","").replace(",",""));
	
	document.getElementById('totalUtil111').innerHTML=(ventas-compras);
		
	document.getElementById('totalUtil111').innerHTML=currency(document.getElementById('totalUtil111').innerHTML);
	
}
