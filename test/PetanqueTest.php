<?php
namespace Todo;

use PHPUnit\Framework\InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Todo\Models\Catalogue;
use Todo\Models\TournoiManager;

include 'src/config/config.php';
final class PetanqueTest extends TestCase
{

    protected $manager;
    public function setUp(): Void 
    {
        $this->manager =  new TournoiManager();
    }

    public function testmodels() : void
    {
        $this->assertEquals('1',$this->manager->find(1)[0]->getId());
        // je verifie avec le find si il y a un tournoi avec l'id 1
    }

    public function testNegativeTestcaseForAssertEmpty() 
    { 
        $this->assertEmpty( 
            $this->manager->find(1)[0]->getName(), 
            "name is not empty"
        ); 
        // je verifie si la le champ name de mon tournoi est vide
    } 
    // il y aura une erreur car le champ name est pas vide
}