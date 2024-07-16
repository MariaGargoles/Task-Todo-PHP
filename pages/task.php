<?php


$Task_Name = $_POST['Task_Name'] ?? '';
$Task_Name = trim($Task_Name);

if ($Task_Name) {
    $filePath = __DIR__ . '/../data/tasks.json';
    if (file_exists($filePath)) {

        $json = file_get_contents($filePath);
        $jsonArray = json_decode($json, true);
    } else {
        $jsonArray = [];
    }

    $jsonArray[] = [
        'name' => $Task_Name,
        'completed' => false
    ];
    file_put_contents($filePath, json_encode($jsonArray, JSON_PRETTY_PRINT));
}

header('Location: index.php');
