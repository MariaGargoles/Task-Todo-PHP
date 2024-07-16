<?php
$filePath = __DIR__ . '/../data/tasks.json';
$TaskItems = [];

if (file_exists($filePath)) {
    $json = file_get_contents($filePath);
    $TaskItems = json_decode($json, true);
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
            <input type="text" name="Task_Title" placeholder="Task Title" required />
            <input type="text" name="Task_Description" placeholder="Task Description" required />
            <button type="submit">Add Task</button>
        </form>
    </section>
    <section>
        <?php foreach ($TaskItems as $task) : ?>
            <div>
                <input type="checkbox" <?php echo $task['completed'] ? 'checked' : '' ?> disabled />
                <?php echo ($task['title']); ?>:
                <?php echo ($task['description']); ?>
                <form action="delete.php" method="post" style="display:inline;">
                    <input type="hidden" name="TaskID" value="<?php echo ($task['id']); ?>" />
                    <button type="submit">Delete</button>
                </form>
            </div>
        <?php endforeach; ?>
    </section>
</body>

</html>