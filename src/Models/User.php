<?php
namespace Test\Models;

/** Class User **/
class User {

    // recupere tout les information de la bdd avec les requete du manager 
    private $username;
    private $password;
    private $id_user;
    private $role_id;

    public function getrole_id() :int{
        return $this->role_id;
    }

    public function setrole_id(int $role_id) :void {
        $this->role_id = $role_id;
    }


    public function getUsername() : string {
        return $this->username;
    }

    public function getPassword() :string {
        return $this->password;
    }

    public function getid_user() :int {
        return $this->id_user;
    }

    public function setUsername(String $username) : void{
        $this->username = $username;
    }

    public function setPassword(String $password) :void {
        $this->password = $password;
    }

    public function setid_user(Int $id_user) :void{
        $this->id_user = $id_user;
    }
}