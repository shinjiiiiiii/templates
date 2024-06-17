<?php

namespace Test\Controllers;
use Test\Models\ArticleManager;

use Test\Validator;
 class TestController extends Controller{

    private $manager;
    public function __construct() {
        parent::__construct();
        // $this->manager = new ArticleManager(); 
    }

    public function index() :void {
        // renvoie sur la page home en appellant getAll
        // $Test = $this->manager->getAll();
        require VIEWS . 'Test/homepage.php';
    }

    public function store() :void {
        // verifie si connecter 
         if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        // renvoie sur la page store 
        require VIEWS . 'Test/store.php';
    }
}