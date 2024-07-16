<?php

$filePath = __DIR__ . '/../data/tasks.json';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['TaskID'])) {
    $TaskID = (int)$_POST['TaskID'];

    if (file_exists($filePath)) {
        $json = file_get_contents($filePath);
        $jsonArray = json_decode($json, true);

        foreach ($jsonArray as $index => $task) {
            if ($task['id'] === $TaskID) {
                unset($jsonArray[$index]);
                $jsonArray = array_values($jsonArray);
                break;
            }
        }

        file_put_contents($filePath, json_encode($jsonArray, JSON_PRETTY_PRINT));
    }
}

header('Location: index.php');
exit();
