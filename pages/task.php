<?php

$TaskName = $_POST['Task_Name'] ?? '';
$TaskName = trim($TaskName);

if ($TaskName) {
    $filePath = __DIR__ . '/../data/tasks.json';
    if (file_exists($filePath)) {
        $json = file_get_contents($filePath);
        $jsonArray = json_decode($json, true);
    } else {
        $jsonArray = [];
    }

    $jsonArray[$TaskName] = ['completed' => false];
    file_put_contents($filePath, json_encode($jsonArray, JSON_PRETTY_PRINT));
}

header('Location: index.php');
exit();
