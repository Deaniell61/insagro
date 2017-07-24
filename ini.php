<?php
	define('HOST','localhost');
	define('USER','root');
	define('PASS','1234');
	define('DB','denuncialo');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Documento sin título</title>

</head>

<body>

<div id="demo"></div>
<div id="mapholder"></div>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<div id='ubicacion'></div>
<script type="text/javascript">
	if (navigator.geolocation) 
	{
		navigator.geolocation.getCurrentPosition(mostrarUbicacion);
	} 
	else 
	{
		alert("¡Error! Este navegador no soporta la Geolocalización.");
	}
	
function mostrarUbicacion(position) 
{
    var times = position.timestamp;
	var latitud = position.coords.latitude;
	var longitud = position.coords.longitude;
    var altitud = position.coords.altitude;	
	var exactitud = position.coords.accuracy;	
	var div = document.getElementById("ubicacion");
	div.innerHTML = "Timestamp: " + times + "<br>Latitud: " + latitud + "<br>Longitud: " + longitud + "<br>Altura en metros: " + altitud + "<br>Exactitud: " + exactitud;
}	

function refrescarUbicacion() 
{	
	navigator.geolocation.watchPosition(mostrarUbicacion);
}	
</script>

<!-- Se escribe un mapa con la localizacion anterior-->


<script type="text/javascript">
var x=document.getElementById("demo");
cargarmap();
function cargarmap()
{
	navigator.geolocation.getCurrentPosition(showPosition,showError);

		function showPosition(position)
		  {
			
		  lat=position.coords.latitude;
		  lon=position.coords.longitude;
		  latlon=new google.maps.LatLng(lat, lon)
		  mapholder=document.getElementById('mapholder')
		  mapholder.style.height='250px';
		  mapholder.style.width='500px';
		  var myOptions={
		  center:latlon,zoom:17,
		  mapTypeId:google.maps.MapTypeId.ROADMAP,
		  mapTypeControl:false,
		  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
		  };
		  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
		  <?php
			 marcadores();
		  ?>
  			}
		function showError(error)
		  {
		  switch(error.code) 
			{
			case error.PERMISSION_DENIED:
			  x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
			  break;
			case error.POSITION_UNAVAILABLE:
			  x.innerHTML="La información de la localización no esta disponible."
			  break;
			case error.TIMEOUT:
			  x.innerHTML="El tiempo de petición ha expirado."
			  break;
			case error.UNKNOWN_ERROR:
			  x.innerHTML="Ha ocurrido un error desconocido."
			  break;
			}
		  }
}
</script>

</body>
</html>

<?php
function marcadores()
{
	

$conexion = new mysqli(HOST,USER,PASS,DB);

 $mysql = $conexion;
    $form="";
    $sql = "SELECT latitud,longitud FROM ubicaciones";
 
    if($resultado = $mysql->query($sql))
    {
      $cont=0;
		   while($fila = $resultado->fetch_row())
		   {    
			echo "
			lat".$cont."=".$fila[0].";
			lon".$cont."=".$fila[1].";
			latlon".$cont."=new google.maps.LatLng(lat".$cont.", lon".$cont.")
			var marker".$cont."=new google.maps.Marker({position:latlon".$cont.",map:map,title:\"You are here!".$cont."\"});	";
			$cont++;
		   }
	}
	
	$mysql->close();
}
?>
