SQUID GAME : <br><br>
Le jeu des billes <br>

<?php
@include_once("utils.php");

 //creer une classe character constituer des attributs nom, billes

//creer une classe hero qui herite de character et qui a en plus des attributs bonus, malus, scream_war

class Character {
    private $name;
    private $billes;

    public function __construct($name, $billes) {
        $this->name = $name;
        $this->billes = $billes;
    }

    public function getName() {
        return $this->name;
    }

    public function getBilles() {
        return $this->billes;
    }

    public function setBilles($billes) {
        $this->billes = $billes;
    }
}

class Hero extends Character {
    private $bonus;
    private $malus;
    private $screamWar;

    public function __construct($name, $billes, $bonus, $malus, $screamWar) {
        parent::__construct($name, $billes);
        $this->bonus = $bonus;
        $this->malus = $malus;
        $this->screamWar = $screamWar;
    }

    public function getBonus() {
        return $this->bonus;
    }

    public function getMalus() {
        return $this->malus;
    }

    public function getScreamWar() {
        return $this->screamWar;
    }
}

// creer une classe méchant qui hérite de character et qui a comme attribut son age
class Mechant extends Character {
    private $age;

    public function __construct($name, $billes, $age) {
        parent::__construct($name, $billes);
        $this->age = $age;
    }

    public function getAge() {
        return $this->age;
    }
}



    
    class Game{
        private $difficulte = array();
        private $characters;
        private $enemies;

        public function __construct()
        {
            $this->ChooseDifficulty();
            $this->createCharacters();
            $this->createEnemies();
        }

        public function ChooseDifficulty()
        {
            $niveau1 = ("Facile");
            $niveau2 = ("Moyen");
            $niveau3 = ("Difficile");
            $this->difficulte = array($niveau1, $niveau2, $niveau3);
        }

        public function createCharacters()
        {
            $player1 = new Hero("Seong Gi-hun", 15, 2, 1, "Wahouuuuu");
            $player2 = new Hero("Kang Sae-byeok", 25, 1, 2, "LetsgOOOOOO");
            $player3 = new Hero("Cho Sang-woo", 35, 0, 3, "Yihawww");

            $this->characters = array($player1, $player2, $player3);
        }

        public function createEnemies()
        {
            $enemy1 = new Mechant("Randall", rand(1, 20), rand(18, 90));
            $enemy2 = new Mechant("Baptiste", rand(1, 20), rand(18, 90));
            $enemy3 = new Mechant("Louca", rand(1, 20), rand(18, 90));
            $enemy4 = new Mechant("Leora", rand(1, 20), rand(18, 90));
            $enemy5 = new Mechant("Leo", rand(1, 20), rand(18, 90));
            $enemy6 = new Mechant("Nicolas", rand(1, 20), rand(18, 90));
            $enemy7 = new Mechant("Alexis", rand(1, 20), rand(18, 90));
            $enemy8 = new Mechant("Tibo", rand(1, 20), rand(18, 90));
            $enemy9 = new Mechant("Eleanore", rand(1, 20), rand(18, 90));
            $enemy10 = new Mechant("Antoine", rand(1, 20), rand(18, 90));
            $enemy11 = new Mechant("Noah", rand(1, 20), rand(18, 90));
            $enemy12 = new Mechant("Julien", rand(1, 20), rand(18, 90));
            $enemy13 = new Mechant("Adrian", rand(1, 20), rand(18, 90));
            $enemy14 = new Mechant("Assia", rand(1, 20), rand(18, 90));
            $enemy15 = new Mechant("Alexandre", rand(1, 20), rand(18, 90));
            $enemy16 = new Mechant("Samaël", rand(1, 20), rand(18, 90));
            $enemy17 = new Mechant("Thomas", rand(1, 20), rand(18, 90));
            $enemy18 = new Mechant("Amélie", rand(1, 20), rand(18, 90));
            $enemy19 = new Mechant("Sophia", rand(1, 20), rand(18, 90));
            $enemy20 = new Mechant("Alyssia", rand(1, 20), rand(18, 90));
            

            $this->enemies = array($enemy1, $enemy2, $enemy3, $enemy4, 
            $enemy5, $enemy6, $enemy7, $enemy8, $enemy9, $enemy10, 
            $enemy11, $enemy12, $enemy13, $enemy14, $enemy15, $enemy16, 
            $enemy17, $enemy18, $enemy19, $enemy20);
        }
    public function startGame()
    {
        $randomDifficulty = $this->difficulte[array_rand($this->difficulte)];
            if ($randomDifficulty == "Facile") {
                $niveau = 5;
            } elseif ($randomDifficulty == "Moyen") {
                $niveau = 10;
            } else {
                $niveau = 20;
            }

            // Rejouer le jeu autant de fois que le niveau de difficulté

        echo "La difficulté est : " . $randomDifficulty;
        echo "<br>";
        $randomHero = $this->characters[array_rand($this->characters)];
        echo "Votre héros est : " . $randomHero->getName();
        echo "<br>";
        echo "Il possède " . $randomHero->getBilles() . " billes";
        echo "<br>";
        $randomEnemy = $this->enemies[array_rand($this->enemies)];
        echo "Il affrontera " . $randomEnemy->getName();
        echo "<br>";
        echo "Il a " . $randomEnemy->getAge() . " ans";
        echo "<br>";

        while ($randomHero->getBilles() > 0 && count($this->enemies) > 0) {
            $randomHero->setBilles($randomHero->getBilles() - 1);
            echo $randomHero->getName() . " a perdu une bille";
            echo "<br>";
            echo "Il lui reste " . $randomHero->getBilles() . " billes";
            echo "<br>";
            array_splice($this->enemies, array_rand($this->enemies), 1);
        }

        $guess = Utils::generateRandomNumber(0, 1);
        if ($guess == 0) {
            echo "Le héros a choisi pair";
        } else {
            echo "Le héros a choisi impair";
        }
        echo "<br>";
        if ($randomHero->getBilles() > 1) {
            echo "La partie est finie, " . $randomHero->getName() . " a gagné !";
        } else {
            echo "La partie est finie, " . $randomHero->getName() . " a perdu !";
        }
    }
    
}


$game = new Game();

$game->startGame();
// for ($i = 0; $i < $niveau; $i++) {
//     $game->startGame();
//     echo "<br>";
// }

?>