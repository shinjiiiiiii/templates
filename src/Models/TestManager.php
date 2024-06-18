<?php
namespace Test\Models;

use Test\Models\Test;

class TestManager extends Manager {


    public function __construct() {
        parent::__construct();
    }

    public function find($titre)
    {
        // regarde si un utilisateur a deja cree un article avec le meme titre 
        $stmt = $this->bdd->prepare("SELECT * FROM todo WHERE content = ?");
        $stmt->execute(array(
            $titre
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Test\Models\Test");

        return $stmt->fetch();
    }

    public function store() : void{
        // creation d'un article ;
        $stmt = $this->bdd->prepare("INSERT INTO todo(content) VALUES (?)");
        $stmt->execute(array(
            $_POST["content"],
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
        $stmt = $this->bdd->prepare('SELECT * FROM todo');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Test\Models\Test");
    }
}