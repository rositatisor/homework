<?php

class Vovere extends Miskas {
    protected $name = 'Vovere';
    private $type = 'Grauziklis';
    protected $voice = 'Skviki-skviki';
    public static $title = 'Voveres giria';

    public function __construct() {
        echo '<h3>Voveres konstruktorius</h3>';
        parent::__construct();
    }

    public function makeNoise() {
        echo '<h1 style="color:brown">'.$this->voice.'</h1>';
    }

    public function makeBigNoise() {
        $this->makeNoise(); // Voveres metodas
        parent::makeNoise(); // Misko metodas
    }

    public function getTitle() {
        // return self::$title; // jei Miskas::$title --> Misko Giria
        echo $this->getSelfName();
        echo "<br>";
        echo $this->getStaticName();
    }
}