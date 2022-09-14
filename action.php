<?php
    require_once 'config/_connect.php';
    require_once 'config/_header.php';

    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $dateReminder = $_POST['task-date-reminder'];
    $taskColor = $_POST['task-color'];
    $done = $_POST['task-done'];
    // $idUser = $_POST['id-user'];
    
    // $addTaks = $dbCo->query("INSERT INTO `task` (`id_task`, `description`, `color`, `priority`, `date_reminder`, `done`, `id_user`) VALUES (NULL, '$description', '$taskColor', '$priority', '$dateReminder', '$done', '$idUser'");
    // $addTaks = $addTaks->fetchAll();
    
    $query = $dbCo->prepare("INSERT INTO `task` (`id_task`, `description`, `color`, `priority`, `date_reminder`, `done`, `id_user`) VALUES (:description, :taskColor , :priority: , :dateReminder, :done");
    
    $query->execute([
    "description" => $description,
    "taskColor" => $taskColor,
    "priority" => $priority,
    "dateReminder" => $dateReminder,
    "done" => $done]);


    $newId = $dbCo->lastInsertId();

    header('Location:/');

?>

<!-- echo htmlspecialchars($_POST['new-task']); -->

