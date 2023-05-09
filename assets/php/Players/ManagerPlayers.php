<?php 

class Player
{
    private $id;
    private $first_name;
    private $second_name;
    private $city;
    private $team_id;
    private $game_id;
    private $tname;
    private $gname;
 
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function getFirstName()
    {
        return $this->first_name;
    }

    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;
    }

    public function getSecondName()
    {
        return $this->second_name;
    }

    public function setSecondName($second_name)
    {
        $this->second_name = $second_name;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getTeamId()
    {
        return $this->team_id;
    }

    public function setTeamId($team_id)
    {
        $this->team_id = $team_id;
    }

    public function getGameId()
    {
        return $this->game_id;
    }

    public function setGameId($game_id)
    {
        $this->game_id = $game_id;
    }

    public function getGameName()
    {
        return $this->gname;
    }

    public function setGameName($gname)
    {
        $this->gname = $gname;
    }

    public function getTeamName()
    {
        return $this->tname;
    }

    public function setTeamName($tname)
    {
        $this->tname = $tname;
    }
}
require_once ('../DBManager.php');
class ManagerPlayers extends DBManager
{
    public function getAll()
    {
        $res = $this->getConnexion()->query('SELECT player.id as pid, player.first_name, player.second_name, player.city, player.team_id AS tid, player.game_id AS gid, team.name AS tname, game.name AS gname FROM player, team, game WHERE player.game_id = game.id AND player.team_id = team.id ORDER BY tid;
        ');
        $players = [];

        foreach ($res as $player) {
            $newPlayer = new Player;
            $newPlayer->setFirstName($player['first_name']);
            $newPlayer->setSecondName($player['second_name']);
            $newPlayer->setCity($player['city']);
            $newPlayer->setTeamName($player['tname']);
            $newPlayer->setGameName($player['gname']);
            $newPlayer->setTeamId($player['tid']);
            $newPlayer->setGameId($player['gid']);
            $newPlayer->setId($player['pid']);

            $players[] = $newPlayer;

        }
        return $players; 
    }
    public function findById($player_id)
    {
        $request = 'SELECT * FROM player where id =' . $player_id;
        $query = $this->getConnexion()->query($request);
        $foundPlayer = $query->fetch();

        if ($foundPlayer) {
            $player = new Player();
            $player->setId($foundPlayer['id']);

            return $player;
        } else {
            return null;
        }
    }

    public function create($player) {
        $request = 'INSERT INTO player (first_name,second_name,city,team_id,game_id) VALUE (?,?,?,?,?)';
        $query = $this->getConnexion()->prepare($request);
        $query->execute([
            $player->getFirstName(), $player->getSecondName(), $player->getCity(),$player->getTeamId(),$player->getGameId()
        ]);
        header('Location:pagePlayers.php');
        return true;
    }
    public function edit ($player){
        $request = 'UPDATE player SET first_name = ?, second_name = ?,city = ?,team_id = ?,game_id = ? WHERE id = ?';
        $query = $this->getConnexion()->prepare($request);
        $query->execute([
          $player->getFirstName(), $player->getSecondName(), $player->getCity(), $player->getTeamId(), $player->getGameId(), $player->getId()
        ]);
        header('Location: pagePlayers.php');
        exit();
      }
    public function delete($player_id)
    {
        $teamToDelete = $this->findById($player_id);

        if ($teamToDelete) {
            $request = 'DELETE FROM player WHERE id =' . $player_id . ';' . 'UPDATE team SET team_id = 1
            WHERE ISNULL(team_id) = 1; UPDATE game SET game_id = 1 WHERE ISNULL(game_id) = 1;';
            $query = $this->getConnexion()->prepare($request);
            $query->execute();

            header('Location: pagePlayers.php');
            exit();
        }
    }
}
?>