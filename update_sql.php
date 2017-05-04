<?php
ini_set('max_execution_time', 60);

$conexion=mysql_connect("localhost","root","") or  die("Problemas en la conexion");
mysql_select_db("test",$conexion) or  die("Problemas en la seleccion de la base de datos");


$entries = 10000;
$tiempo_inicio = microtime(true);

for ($i = 1; $i <= $entries; $i++)      {       
        if ($i % 50 == 0)     {
        	mysql_query("UPDATE bench SET datetime = CURRENT_TIMESTAMP WHERE id = $i");
        	$data = mysql_query("SELECT * FROM bench WHERE id = $i");

        	  while($reg=mysql_fetch_array($data))
  				{
					echo("Registro nº".$i."-->".$reg['datetime']."<br>"); 
				}             
        }

}
$tiempo_fin = microtime(true);

echo "Tiempo empleado: " . ($tiempo_fin - $tiempo_inicio); 
?>
