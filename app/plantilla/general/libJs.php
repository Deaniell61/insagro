<script type="text/javascript" src="../app/js/lib/jquery.min.js"></script>
<script type="text/javascript" src="../app/js/lib/jquery-ui.min.js"></script>
<script type="text/javascript" src="../app/js/lib/datatable.js"></script>
<script type="text/javascript" src="../app/js/lib/materialize.js"></script>
<script type="text/javascript" src="../app/js/lib/Ventanas.js"></script>

<script type="text/javascript" src="../app/js/lib/ajax.js"></script>



<?php
//&& $_SESSION['notified1'][0]!=""
			if(count($_SESSION['notified1'])>0 && $_SESSION['notified1'][0]!="")
			{
				echo "<script>envioCorreo('".$_SESSION['SOFT_DESTINO_EMAIL']."','Cobrar','jdanielr61@gmail.com');</script>";
			}
			
			if(count($_SESSION['notified22'])>0 && $_SESSION['notified22'][0]!="")
			{
				echo "<script>envioCorreo('".$_SESSION['SOFT_DESTINO_EMAIL']."','Pagar','jdanielr61@gmail.com');</script>";
			}
?>
