<?php

namespace Test\Controllers;

use Test\Controllers\Controller;
use Test\Models\UserManager;
use Test\Validator;

/** Class UserController **/
class UserController extends Controller{
    private $manager;

    public function __construct() {
        parent::__construct();
        $this->manager = new UserManager();
    }

    public function showLogin() : void {
        // redirige sur la page login
        require VIEWS . 'Auth/login.php';
    }

    public function showRegister() : void {
        // redirige sur la page register 
        require VIEWS . 'Auth/register.php';
    }

    public function logout() :void 
    {
        // deconnect l'utilisateur
        session_start();
        session_destroy();
        header('Location: /login/');
    }

    public function register() :void {
        // regarde si les informations donner sont correct 
        // si oui et que le nom d'utilisateur existe pas on cree l'utilisateur
        $this->validator->validate([
            "username"=>["required", "min:3", "alphaNum"],
            "password"=>["required", "min:6", "alphaNum", "confirm"],
            "passwordConfirm"=>["required", "min:6", "alphaNum"]
        ]);
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->manager->find($_POST["username"]);

            if (empty($res)) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->manager->store($password);

                $_SESSION["user"] = [
                    "id" => $this->manager->getBdd()->lastInsertId(),
                    "username" => $_POST["username"],
                    "role" => 1
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['username'] = "Le username choisi est déjà utilisé !";
                header("Location: /register");
            }
        } else {
            header("Location: /register");
        }
    }

    public function login() :void {
        // pareille que le register mais ici on ne cree pas on connecte
        $this->validator->validate([
            "username"=>["required", "min:3", "max:9", "alphaNum"],
            "password"=>["required", "min:6", "alphaNum"]
        ]);

        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->manager->find($_POST["username"]);

            if ($res && password_verify($_POST['password'], $res->getPassword())) {
                $_SESSION["user"] = [
                    "id" => $res->getid_user(),
                    "username" => $res->getUsername(),
                    "role" => 1
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['message'] = "Une erreur sur les identifiants";
                header("Location: /login");
            }
        } else {
            header("Location: /login");
        }
    }
}