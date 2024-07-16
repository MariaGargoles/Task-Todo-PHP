<?php

$Task_Name = $_POST['Task_Name'] ?? '';
$Task_Name = trim($Task_Name);

if ($Task_Name) {
    $filePath = __DIR__ . '/../data/tasks.json';

    if (file_exists($filePath)) {
        $json = file_get_contents($filePath);
        echo $json;
    }
}
