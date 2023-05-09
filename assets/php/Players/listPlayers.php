<table>
    <tr>
        <th>Delete</th>
        <th>First Name</th>
        <th>Second Name</th>
        <th>City</th>
        <th>Team</th>
        <th>Game</th>
    </tr>
    <?php 
        foreach ($allPlayers as $player){
            $removeUrl = 'delete=' . $player->getId();
            $removeLink = '<a href="./pagePlayers.php?' . $removeUrl . '"><img class="button-delete" src="../../img/Capture_decran_du_2023-04-27_13-31-15.png" alt=""></a>';

            echo ('<tr>');
            echo ('<td>' . $removeLink . '</td>');
            echo ('<td>'. $player->getFirstName(). '</td>');
            echo ('<td>'. $player->getSecondName(). '</td>');
            echo ('<td>'. $player->getCity(). '</td>');
            echo ('<td>'. $player->getTeamName(). '</td>');
            echo ('<td>'. $player->getGameName(). '</td>');
            echo ('</tr>');
        }
    ?>
</table>