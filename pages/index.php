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
    <link rel="stylesheet" href="../styles/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My PHP To-do List</title>

</head>

<body>

    <section class="SectionForm">
        <h3 class="SectionForm__Title">TO - DO List</h3>
        <article class="ArticleTaskForm">
            <form class="ArticleTaskForm__Form" action="task.php" method="post">
                <input class="ArticleTaskForm__Input" type="text" name="Task_Title" placeholder="Task Title" required />
                <input class="ArticleTaskForm__Input" type="text" name="Task_Description" placeholder="Task Description" required />
                <button class="ArticleTaskForm__Button" type="submit">Add Task</button>
            </form>
        </article>
        <article class="ArticleTask__List">
            <?php foreach ($TaskItems as $task) : ?>
                <div>
                    <input type="checkbox" <?php echo $task['completed'] ? 'checked' : '' ?> disabled />
                    <?php echo ($task['title']); ?>:
                    <?php echo ($task['description']); ?>
                    <form action="delete.php" method="post" style="display:inline;">
                        <input type="hidden" name="TaskID" value="<?php echo ($task['id']); ?>" />
                        <button class="ArticleTask__Button" type="submit">Delete</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </article>
    </section>
</body>

</html>