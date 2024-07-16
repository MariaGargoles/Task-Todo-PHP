<?php
$filePath = __DIR__ . '/../data/tasks.json';
$TaskItem = [];


if (file_exists($filePath)) {
    $json = file_get_contents($filePath);
    $TaskItem = json_decode($json, true);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP To-do List</title>
</head>

<body>
    <section>
        <form action="task.php" method="post">
            <input type="text" name="Task_Name" placeholder="Introduce tu tarea " />
            <button>Enviar</button>
    </section>
    <?php
    foreach ($TaskItem as $TaskName => $TaskItem) :  ?>
        <div>
            <input type="checkbox" <?php echo $TaskItem['completed'] ? 'checked' : ''   ?> />
            <?php echo $TaskName ?>
            <button>Delete</button>
        </div>
    <?php endforeach; ?>

</body>

</html>