<?php
namespace Test\Models;

/** Class Test **/
class Test {

    // recupere tout les information de la bdd avec les requete du manager 
    private $content;
    private $id;

    public function getContent() :string{
        return $this->content;
    }

    public function setContent(string $content) :void {
        $this->content = $content;
    }


    public function getId() :int{
        return $this->id;
    }

    public function setId(int $id) :void {
        $this->id = $id;
    }


}