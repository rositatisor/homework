<?php
namespace Pea;

use Veggies\Darzove;

class Zirnis extends Darzove {
    private $kiekis, $id, $imgPath, $name, $kiekAugti, $price;

    public function __construct($id) {
        $this->id = $id + 1;
        $this->imgPath = rand(1, 6);
        $this->kiekis = 0;
        $this->name = 'Zirnis';
        $this->kiekAugti = rand(1, 3);
        $this->price = 0.09;
    }

    public function __get($propertyName) {
        return $this->$propertyName;
    }

    public function __set($propertyName, $value) {
        $this->$propertyName = $value;
    }

    public function kiekAugti() {
        $this->kiekAugti = rand(1, 3);
        return $this->kiekAugti;
    }
}