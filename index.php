<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css?<?=time()?>">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@100;200&display=swap" rel="stylesheet">
    <title>To Do List</title>
</head>
  <body class="dark-body">
    <?php
        try {
          $dbCo = new PDO(
            'mysql:host=localhost;dbname=to_do_list;charset=utf8',
            'tima',
            'XsDtj@x@.0YLKET('
            );
          $dbCo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,
            PDO::FETCH_ASSOC);
            }
            catch (Exception $e) {
            die("Unable to connect to the database.
            ".$e->getMessage());
            };
          $resultTask = $dbCo->query("SELECT description FROM task WHERE done=0");
          $resultTask = $resultTask->fetchAll();
      ?>
    <div class="container">
      <header class="header">
        <h1>
          To Do List
        </h1>
      </header>

      <div calss="new-task">

        <form action="" method="post" class="task-form">
          <div class="task-input">
            <label for="description">Enter New Task</label>
            <input type="text" name="description" required>
          </div>
          <div class="form-example">
            <input type="submit" value="Add">
          </div>
        </form>


      </div>



      <?php
        foreach($resultTask as $task) {
          echo "<li>".$task["description"]."</li>"; 
        }
        $_POST = $dbCo->query("INSERT INTO 'description' FROM task");
      
        
        var_dump($_POST);


      ?>
    </div>




  <script type="text/javascript" src="js/javascript.js"></script>
  </body>
</html>