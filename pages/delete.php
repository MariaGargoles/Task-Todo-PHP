<?php

$filePath = __DIR__ . '/../data/tasks.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['TaskName'])) {
    $TaskName = trim($_POST['TaskName']);

    if (file_exists($filePath)) {
        $json = file_get_contents($filePath);
        $jsonArray = json_decode($json, true);

        if (isset($jsonArray[$TaskName])) {
            unset($jsonArray[$TaskName]);
            file_put_contents($filePath, json_encode($jsonArray, JSON_PRETTY_PRINT));
        }
    }
}

header('Location: index.php');
exit();
