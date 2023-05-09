<?php 
class DBManager
{
    private $bdd;

    public function __construct()
    {
        try{
            $this->bdd = new PDO(
                'mysql:host=localhost;dbname=esport;charset=utf8',
                'root',
                '12345678' //MDP
            );
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    public function getConnexion() {
        return $this->bdd;
    }
}
