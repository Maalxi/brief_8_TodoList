<?php
require("./ManagerTodo.php");
$managerTodoList = new ManagerTodoList();

if (isset($_GET['delete'])) {
  $managerTodoList->delete($_GET['delete']);
  header("Location: ./index.php?deleted=true");
  exit();
}

$allTodoList = $managerTodoList->getAllTodo();

if (!empty($_POST['title']) && !empty($_POST['description'])) {
  $newTodoList = new TodoList();
  $newTodoList -> setTitle($_POST['title']);
  $newTodoList -> setDescription($_POST['description']);

  $newTodoList -> setImportant(isset($_POST['important']) ? 1 : 0);;

  $managerTodoList->create($newTodoList);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../css/style.css">

</head>

<body>
  <?php
  include("../../nav-bar/nav_bar.php");
  ?>
  <section class="container">
    <h1>Todo List</h1>
    <div class="display">
      <div class="table-container">
        <?php
         include("./listTodo.php")
        ?>
      </div>
      <div class="form-container">
        <?php
         include("./formTodo.php")
        ?>
      </div>
    </div>
  </section>
  <script src="../../js/script.js" type="module"></script>
</body>
</html>