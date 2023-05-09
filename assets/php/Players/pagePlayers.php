<?php
require("../Teams/ManagerTeams.php");
require("../Games/ManagerGames.php");
require("./ManagerPlayers.php");
$managerPlayer = new ManagerPlayers();
$managerTeam = new ManagerTeams();
$managerGame = new ManagerGames();

if (isset($_GET['delete'])) {
  $managerPlayer->delete($_GET['delete']);
}

$allPlayers = $managerPlayer->getAll();
$allTeams = $managerTeam->getAllTeams();
$allGames = $managerGame->getAll();

if (!empty($_POST['first_name']) && isset($_POST['second_name']) && isset($_POST['city']) && isset($_POST['team_id']) && isset($_POST['game_id'])) {
  $newPlayer = new Player();
  $newPlayer -> setFirstName($_POST['first_name']);
  $newPlayer -> setSecondName($_POST['second_name']);
  $newPlayer -> setCity($_POST['city']);
  $newPlayer -> setTeamId(intval($_POST['team_id']));
  $newPlayer -> setGameId(intval($_POST['game_id']));

  $managerPlayer->create($newPlayer);

}
if (!empty($_POST['new_id']) && isset($_POST['new_first_name']) && isset($_POST['new_second_name']) && isset($_POST['new_city']) && isset($_POST['new_team_id']) && isset($_POST['new_game_id'])){
  $upPlayers = new Player();
  $upPlayers->setId($_POST['new_id']);
  $upPlayers->setFirstName($_POST['new_first_name']);
  $upPlayers->setSecondName($_POST['new_second_name']);
  $upPlayers->setCity($_POST['new_city']);
  $upPlayers->setTeamId($_POST['new_team_id']);
  $upPlayers->setGameId($_POST['new_game_id']);

  $managerPlayer->edit($upPlayers);
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
    <h1>Liste des joueurs</h1>
    <div class="display">
      <div class="table-container">
        <?php
         include("./listPlayers.php")
        ?>
      </div>
      <div class="form-container">
        <?php
         include("./formPlayers.php")
        ?>
      </div>
    </div>
  </section>
  <script src="../../js/script.js" type="module"></script>
</body>
</html>