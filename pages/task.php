<?php

$Task_Name = $_POST['Task_Name'] ?? '';
$Task_Name = trim($Task_Name);

if ($Task_Name) {
    echo "Save To-do";
}
