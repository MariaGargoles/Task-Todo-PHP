<?php

$TaskTitle = $_POST['Task_Title'] ?? '';
$TaskDescription = $_POST['Task_Description'] ?? '';
//Limpiamos los espacios en blanco
$TaskTitle = trim($TaskTitle);
$TaskDescription = trim($TaskDescription);

if ($TaskTitle && $TaskDescription) {
    $filePath = __DIR__ . '/../data/tasks.json';
    if (file_exists($filePath)) {
        $json = file_get_contents($filePath);
        $jsonArray = json_decode($json, true);
    } else {
        $jsonArray = [];
    }

    //Determina el siguiente ID disponible para la tarea que queramos añadir
    $nextId = 1;
    if (!empty($jsonArray)) {
        $lastItem = end($jsonArray);
        $nextId = $lastItem['id'] + 1;
    }

    $newTask = [
        'id' => $nextId,
        'title' => $TaskTitle,
        'description' => $TaskDescription,
        'completed' => false
    ];

    $jsonArray[] = $newTask;
    file_put_contents($filePath, json_encode($jsonArray, JSON_PRETTY_PRINT));
}

header('Location: index.php');
exit();
