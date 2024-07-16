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
            <button type="submit">Enviar</button>
        </form>
    </section>
    <?php foreach ($TaskItem as $taskName => $task) : ?>
    <div>
        <input type="checkbox" <?php echo $task['completed'] ? 'checked' : '' ?> />
        <?php echo htmlspecialchars($taskName); ?>
        <form action="delete.php" method="post" style="display:inline;">
            <input type="hidden" name="TaskName" value="<?php echo htmlspecialchars($taskName); ?>" />
            <button type="submit">Delete</button>
        </form>
    </div>
    <?php endforeach; ?>
</body>

</html>