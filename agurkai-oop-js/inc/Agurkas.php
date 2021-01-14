<?php
namespace Cucumber;

use Veggies\Darzove;

class Agurkas extends Darzove {
    private $kiekis, $id, $imgPath, $name;

    public function __construct($id) {
        $this->id = $id + 1;
        $this->imgPath = rand(1, 6);
        $this->kiekis = 0;
        $this->name = 'Agurkas';
    }

    public function __get($propertyName) {
        return $this->$propertyName;
    }

    public function __set($propertyName, $value) {
        $this->$propertyName = $value;
    }

    public function kiekAugti() {
        return rand(2, 9);
    }
}