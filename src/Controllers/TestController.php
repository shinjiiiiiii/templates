<?php

namespace Test\Controllers;
use Test\Models\ArticleManager;

use Test\Models\TestManager;
use Test\Validator;
 class TestController extends Controller{

    private $manager;
    public function __construct() {
        parent::__construct();
        $this->manager = new TestManager(); 
    }

    public function index() :void {
        // renvoie sur la page home en appellant getAll
        $Test = $this->manager->getAll();
        require VIEWS . 'Test/homepage.php';
    }

    public function store(){
        $store = $this->manager->find($_POST['content']);
        // verifie dans find si 

        if ($store) {
            header("Location: /error");
        } else{
            $this->manager->store();
        } 
    }
}