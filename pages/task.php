<?php

$Task_Name = $_POST['Task_Name'] ?? '';
$Task_Name = trim($Task_Name);

if ($Task_Name) {
    $filePath = __DIR__ . '/../data/tasks.json';
    $json = file_get_contents($filePath);
    $jsonArray = json_decode($json, true);
    $jsonArray[] = [
        'name' => $Task_Name,
        'completed' => false
    ];

    // var_dump($jsonArray);
    file_put_contents($filePath, json_encode($jsonArray, JSON_PRETTY_PRINT));
}
