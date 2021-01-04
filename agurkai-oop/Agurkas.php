<?php

class Agurkas {
    public $kiekis = 0;
    public $id = 0;
    public $imgPath = 1;

     public function __construct($id) {
        $this->id = $id;
        $this->imgPath = rand(1, 6);
        $this->kiekis = rand(1, 3);
        
    }
}