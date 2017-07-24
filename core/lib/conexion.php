<?php

function conexionMysql()
{


    $conexion = new mysqli(HOST,USER,PASS,DB);
    //php concatena con .
    // ejecutar un metodo o atributo ->
    if($conexion->connect_error)
    {

        /*


            function.sprinf.php

     */
        $error = "<div class='error'> Error de Conexión No: <b>%d</b> Mensaje del error: <mark>%s</mark></div>";


        printf($error,$conexion->connect_errno,$conexion->connect_error);

        die($error);
    }
    else
    {
        /*
        $formato = "<div class='mensaje'> Conexion exitosa: <b>%s</b> </div>";

        printf($formato,$conexion->host_info);
*/



    }

    // $conexion->query("SET CHARACTER SET UTF8");
    return $conexion;

}
//conexionMysql();
function toMoney($val,$symbol='Q',$r=2)
{


    $n = $val; 
    $c = is_float($n) ? 1 : number_format($n,$r);
    $d = '.';
    $t = ',';
    $sign = ($n < 0) ? '-' : '';
    $i = $n=number_format(abs($n),$r); 
    $j = (($j = strlen($i)-1) > 3) ? $j % 3 : 0; 

   return  $symbol.$sign .($j ? substr($i,0, $j) + $t : '').preg_replace('/(\d{3})(?=\d)/',"$1" + $t,substr($i,$j)) ;

}
?>