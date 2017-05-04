<?php
ini_set('max_execution_time', 60);

$m = new MongoClient();
$db = $m->selectDB('test');
$collection = new MongoCollection($db, 'bench');

$entries = 10000;
$tiempo_inicio = microtime(true);

for ($i = 1; $i <= $entries; $i++)      {
        if ($i % 50 == 0)     {
        	$cursor = $collection->find(array('_id' => $i));
        	  foreach($cursor as $result)
  				{
  				
					echo("Registro nº".$i."-->".date('Y-m-d H:i:s', $result['datetime']->sec)."<br>"); 
				}             
        }
}
$tiempo_fin = microtime(true);

echo "Tiempo empleado: " . ($tiempo_fin - $tiempo_inicio); 
?>
