<?php
    require_once 'config/_connect.php';
    require_once 'config/_header.php';

    if (isset($_GET["action"])&& isset($_GET["id_task"])&& ($_GET["action"]==="done")){
        $query = $dbCo->prepare("UPDATE task SET done = :done  WHERE id_task = :id_task;");
        $query->execute([
            "id_task" => $_GET["id_task"],
            "done" => 1
        ]);
    }    
    elseif (isset($_GET["action"])&& isset($_GET["id_task"])&& ($_GET["action"]==="delete")){
        $query = $dbCo->prepare("DELETE FROM task WHERE id_task = :id_task;");
        $query->execute([
            "id_task" => $_GET["id_task"],
        ]);
    } 

    elseif (isset($_GET["action"])&& isset($_GET["id_task"])&& ($_GET["action"]==="modify")) {
        $query = $dbCo->prepare("UPDATE `task` SET `id_task`=:id_task,`description`=:description,`color`=:color,`priority`= :priority,`date_reminder`=:date_reminder,`done`=:done,`id_user`=:id_user WHERE id_task = :id_task;");
        $query->execute([
            "id_task" => $_GET["id_task"],
            "description" => $_GET["description"],
            "taskColor" => $_GET["task-color"],
            "priority" => $_GET["description"],
            "date_reminder" => $_GET["task-date-reminder"],
            "done" => $_GET["task-done"],
            "id_user" => $_GET["id-user"]
        ]);
    } 
    else {
        $description = $_POST['description'];
        $description = ucfirst($description);
        $priority = $_POST['priority'];
        $dateReminder = $_POST['task-date-reminder'];
        $taskColor = $_POST['task-color'];
        $done = $_POST['task-done'];
        $idUser = $_POST['id-user'];
        
        $query = $dbCo->prepare("INSERT INTO `task` (`id_task`, `description`, `color`, `priority`, `date_reminder`, `done`, `id_user`) VALUES (NULL, :description, :taskColor, :priority, :date_reminder, :done, :id_user)");
        $newColor = strtoupper(str_replace("#",NULL,$taskColor));
        $query->execute([
            "description" => $description,
            "taskColor" => $newColor,
            "priority" => $priority,
            "date_reminder" => $dateReminder,
            "done" => $done,
            "id_user" => $idUser
        ]);
    }

    

    $newId = $dbCo->lastInsertId();
    
    header('Location:/to_do_list');
    ?>    


<!-- echo htmlspecialchars($_POST['new-task']); -->

