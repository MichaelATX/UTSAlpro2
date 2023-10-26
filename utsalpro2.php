<?php
function csvToJson($fname) {
    if (!($fp = fopen($fname, 'r'))) {
        die("Can't open file...");
    }
    
    $key = fgetcsv($fp,"1024",",");
    
    $json = array();
        while ($row = fgetcsv($fp,"1024",",")) {
        $json[] = array_combine($key, $row);
    }
    
    fclose($fp);
    
    return json_encode($json);
}

$jsondata = csvToJson("coffee.csv");

header('Content-Type: application/json');

echo $jsonData;
?>