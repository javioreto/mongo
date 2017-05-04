<?php
ini_set('max_execution_time', 60);

$m = new MongoClient();
$db = $m->selectDB('test');
$collection = new MongoCollection($db, 'bench');

$entries = 10000;
$tiempo_inicio = microtime(true);

for ($i = 1; $i <= $entries; $i++)      {
        $document = array(
                '_id' => $i,
                'datetime' => new MongoDate(time()),
                );
        $collection->insert($document);

        if ($i % 1000 == 0)     {
                printf ("%d (of %s) entries saved in MongoDB<br>", $i, $entries);
        }
}
$tiempo_fin = microtime(true);

echo "Tiempo empleado: " . ($tiempo_fin - $tiempo_inicio); 
?>
