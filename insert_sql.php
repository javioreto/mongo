<?php
ini_set('max_execution_time', 60);

$conexion=mysql_connect("localhost","root","") or  die("Problemas en la conexion");
mysql_select_db("test",$conexion) or  die("Problemas en la seleccion de la base de datos");


$entries = 10000;
$tiempo_inicio = microtime(true);

for ($i = 1; $i <= $entries; $i++)      {
		mysql_query("INSERT INTO `bench` (`id`, `datetime`) VALUES (NULL, CURRENT_TIMESTAMP);");
        if ($i % 1000 == 0)     {
                printf ("%d (of %s) entries saved in MongoDB<br>", $i, $entries);
        }
}
$tiempo_fin = microtime(true);

echo "Tiempo empleado: " . ($tiempo_fin - $tiempo_inicio); 
?>
