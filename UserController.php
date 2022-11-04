<?php

class UserController
{
    private PDO $db;

    public function __construct()
    {
        $dbName = "bd";
        $port = 3306;
        $userName = "root";

        try {
            $this->setDb(new PDO("mysql:host=localhost;dbname=$dbName;port=$port;charset=utf8mb4", $userName));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function setDb(PDO $db)
    {
        $this->db = $db;
        return $this;
    }

    public function create(User $user)
    {
        $req = $this->db->prepare("INSERT INTO `user` (first_name, last_name, username, email, password ) VALUES (:first_name, :last_name, :username, :email, :password)");
        $req->bindValue(":first_name", $user->getFirst_name(), PDO::PARAM_STR);
        $req->bindValue(":last_name", $user->getLast_name(), PDO::PARAM_STR);
        $req->bindValue(":username", $user->getUsername(), PDO::PARAM_STR);
        $req->bindValue(":email", $user->getEmail(), PDO::PARAM_STR);
        $req->bindValue(":password", $user->getPassword(), PDO::PARAM_STR);
        $req->execute();
    }
}
/** Penser à traiter la suppression ou la modification d'un compte par l'utilisateur
 * après son authentification
 */
