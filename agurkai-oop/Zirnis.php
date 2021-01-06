<?php

class Zirnis extends Darzove{
    private $kiekis, $id, $imgPath;

     public function __construct($id) {
        $this->id = $id + 1;
        $this->imgPath = rand(1, 6);
        $this->kiekis = 0;
    }

    public function __get($propertyName) {
        return $this->$propertyName;
    }

    public function __set($propertyName, $value) {
        $this->$propertyName = $value;
    }

    public function kiekAugti() {
        return rand(1, 3);
    }
}