<?php
namespace Test\Models;

use Test\Models\User;
/** Class UserManager **/
class UserManager extends Manager{


    public function __construct() {
        parent::__construct();
    }
    public function getBdd()
    {
        return $this->bdd;
    }

    public function find($username) {
        // regarde si le nom d'utilisateur existe deja
        $stmt = $this->bdd->prepare("SELECT * FROM user WHERE username = ?");
        $stmt->execute(array(
            $username
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Test\Models\User");

        return $stmt->fetch();
    }

    public function all() :array {
        // recupere tout les utilisateurs 
        $stmt = $this->bdd->query('SELECT * FROM User');

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Test\Models\User");
    }

    public function store($password) : void {
        // cree l'utilisateur
        $stmt = $this->bdd->prepare("INSERT INTO User(username, password, role_id) VALUES (?, ?, ?)");
        $stmt->execute(array(
            $_POST["username"],
            $password,
            0
        ));
    }
}