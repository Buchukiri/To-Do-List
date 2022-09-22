<?php
  require_once 'config/_connect.php';
  include 'config/_header.php';
?>

      <div calss="add-task" id="add-task">
        <form action="action.php" method="post" class="task-form">
          <div class="task-input">
            <label name="new-task" for="description">Enter New Task :</label>
            <input type="text" name="description" class="description" value="<?=isset($_GET['modify']) ? $_GET['description'] : ""?>" required>
          </div>
            <div class="tasks-configs">
              <div class="task-priority">
                <label name="new-priority" for="priority">Priority :</label>
                <input type="number" value="1" min="1" max="11" name="priority" value="<?=isset($_GET['modify']) ? $_GET['priority'] : ""?>" required>
              </div>
                <div class="task-date-reminder">
                <label name="task-date-reminder" for="date_reminder">Date Reminder :</label>
              <input type="date" name="task-date-reminder" value="<?=isset($_GET['modify']) ? $_GET['date_reminder'] : ""?>" required>
              </div>
              <div class="task-Color">
                <label for="color">Select color :</label>
                <input type="color" id="favcolor" name="task-color" value="#ff0000" value="<?=isset($_GET['modify']) ? $_GET['color'] : ""?>" required>
              </div>
              <div class="task-done">
                <label name="task-done" for="done">Situation :</label>
                <input type="number" min="0" max="1" value="0" name="task-done" value="<?=isset($_GET['modify']) ? $_GET['done'] : ""?>" required>
              </div>
              <div class="task-id-user">
                <label name="id-user" for="id_user">ID user :</label>
                <input type="number"  min="1" max="5" value="1" name="id-user" value="<?=isset($_GET['modify']) ? $_GET['id_user'] : ""?>" required>
              </div>
              </div>
          <div class="form-submit">
            <input type="submit" value="Add" class="add" id="add">
          </div>
        </form>
      </div>

      <div class="task-list">
        <div class="task-list-description">
          <p>Task</p>
          <p>Color</p>
          <p>Priority</p>
          <p>Date Reminder</p>
          <p>Done</p>
          <p>User</p>
          <p>Config</p>
        </div>
          <?php

              $tasks = $dbCo->query("SELECT id_task,description,priority,color,date_reminder,done,id_user FROM task WHERE done=0");
              $tasks = $tasks->fetchAll();
              
              foreach($tasks as $task) {
                echo  "<div class=\"task\">".$task["description"]."
                <p>".$task["color"]."</p>
                <p>".$task["priority"]."</p>
                <p>".$task["date_reminder"]."</p>
                <p>".$task["done"]."</p>
                <p>".$task["id_user"]."</p>
                <li class=\"config-task\">
                <a href=\"action.php?action=modify&id_task=".$task["id_task"]."\"><img class=\"pen\" src=\"img/pen.png\" alt=\"pen_button\"></a>
                <a href=\"action.php?action=done&id_task=".$task["id_task"]."\"><img class=\"check\" src=\"img/check.png\" alt=\"check_button\"></a>
                <a href=\"action.php?action=delete&id_task=".$task["id_task"]."\"><img class=\"delete\" src=\"img/delete.png\" alt=\"delete_button\"></a>
                </li>
                </div>";
              };
          ?>
    </div>




  <script type="text/javascript" src="js/javascript.js"></script>
  </body>
</html>