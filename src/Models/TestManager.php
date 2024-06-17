<?php
namespace Test\Models;

use Test\Models\Test;

class TestManager extends Manager {


    public function __construct() {
        parent::__construct();
    }

    public function find($titre, $userId)
    {
        // regarde si un utilisateur a deja cree un article avec le meme titre 
        $stmt = $this->bdd->prepare("SELECT * FROM Article WHERE titre = ? AND id_user = ?");
        $stmt->execute(array(
            $titre,
            $userId
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Test\Models\article");

        return $stmt->fetch();
    }

    public function store() : void{
        // creation d'un article ;
        $stmt = $this->bdd->prepare("INSERT INTO article(titre, date, photo, texte, id_user) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array(
            $_POST["titre"],
            date('y-m-d'),
            "text.png",
            $_POST["description"],
            $_SESSION["user"]["id"]
        ));
    }

    public function delete() :void {
        // supprime un article 
        $stmt = $this->bdd->prepare("DELETE FROM article WHERE id_article = ?");
        $stmt->execute(array(
            $_POST["id"],
        ));
    }

    public function getAll() :array
    {
        // appelle tout les articles 
        $stmt = $this->bdd->prepare('SELECT * FROM article');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Test\Models\article");
    }
}