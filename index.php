<?php
  require_once 'config/_connect.php';
  include 'config/_header.php';
?>

      <div calss="add-task" id="add-task">
        <form action="action.php" method="post" class="task-form">
          <div class="task-input">
            <label name="new-task" for="description">Enter New Task</label>
            <input type="text" name="description" required>
          </div>
            <div class="task-priority">
            <label name="new-priority" for="priority">Priority</label>
            <input type="number" value="0" min="0" max="11" name="priority" required>
          </div>
            <div class="task-date-reminder">
            <label name="task-date-reminder" for="date_reminder">Date Reminder</label>
            <input type="date" name="task-date-reminder" required>
          </div>
          <div class="task-Color">
            <label for="color">Select color:</label>
            <input type="color" id="favcolor" name="task-color" value="#ff0000" required>
          </div>
          <div class="task-done">
            <label name="task-done" for="done">Situation</label>
            <input type="number" min="0" max="1" value="0" name="task-done" required>
          </div>
          <!-- <div class="task-id-user">
            <label name="id-user" for="id_user">ID user</label>
            <input type="number"  min="0" max="5" value="0" name="id-user" required>
          </div> -->
          <div class="form-submit">
            <input type="submit" value="Add">
          </div>
        </form>
      </div>

      <div class="task-list">
        <?php
            $tasks = $dbCo->query("SELECT description FROM task WHERE done=0");
            $tasks = $tasks->fetchAll();

            foreach($tasks as $task) {
              echo "<li>".$task["description"]."</li>"; 
            }

            


      ?>

      </div>























    </div>




  <script type="text/javascript" src="js/javascript.js"></script>
  </body>
</html>