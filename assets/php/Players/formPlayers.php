<form action='./pagePlayers.php' method="POST">
    <div class="titre">
        <label for="ADD">ADD</label>
    </div>
    <div class="input-container">
        <label for="first_name">First Name</label>
        <input type="text" name="first_name" id="first_name">
    </div>
    <div class="input-container">
        <label for="second_name">Second Name</label>
        <input type="text" name="second_name" id="second_name">
    </div>

    <div class="input-container">
        <label for="city">City</label>
        <input type="text" name="city" id="city">
    </div>

    <div class="input-container">
        <label for="team_id">Team</label>
        <select name="team_id" id="team_id">
            <?php
            foreach ($allTeams as $team) {
                echo ('<option value="' . $team->getId() . '">' . $team->getName() . '</option>');
            }
            ?>
        </select>
    </div>

    <div class="input-container">
        <label for="game_id">Game</label>
        <select name="game_id" id="game_id">
            <?php
            foreach ($allGames as $game) {
                echo ('<option value="' . $game->getId() . '">' . $game->getName() . '</option>');
            }
            ?>
        </select>
    </div>
    <input type="submit" value="Enregistrer">
</form>

<form action='./pagePlayers.php' method="POST">
    <div class="titre">
        <label for="EDIT">EDIT</label>
    </div>

    <div class="input-container">
        <label for="new_id">Player</label>
        <select name="new_id" id="new_id">
            <?php
            foreach ($allPlayers as $player) {
                echo ('<option value="' . $player->getId() . '">' . $player->getFirstName() . '</option>');
            }
            ?>
        </select>
    </div>
    <div class="input-container">
        <label for="new_first_name">New first Name</label>
        <input type="text" name="new_first_name" id="new_first_name">
    </div>
    <div class="input-container">
        <label for="new_second_name">New second Name</label>
        <input type="text" name="new_second_name" id="new_second_name">
    </div>

    <div class="input-container">
        <label for="new_city">New city</label>
        <input type="text" name="new_city" id="new_city">
    </div>

    <div class="input-container">
        <label for="new_team_id">New team</label>
        <select name="new_team_id" id="new_team_id">
            <?php
            foreach ($allTeams as $team) {
                echo ('<option value="' . $team->getId() . '">' . $team->getName() . '</option>');
            }
            ?>
        </select>
    </div>

    <div class="input-container">
        <label for="new_game_id">New game</label>
        <select name="new_game_id" id="new_game_id">
            <?php
            foreach ($allGames as $game) {
                echo ('<option value="' . $game->getId() . '">' . $game->getName() . '</option>');
            }
            ?>
        </select>
    </div>
    <input type="submit" value="Enregistrer">
</form>