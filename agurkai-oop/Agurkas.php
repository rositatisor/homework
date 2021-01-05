<?php

class Agurkas {
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

    public function addAgurkas($addAgurkas) {
        $this->kiekis = $this->kiekis + $addAgurkas;
    }

    public function nuskintiVisus(){
        $this->kiekis = 0;
    }

    public static function nuimtiVisaDerliu($allAgurkai) {
        foreach ($allAgurkai as $key => $agurkas) {
            $agurkas = unserialize($agurkas);
            $agurkas->nuskintiVisus();
            $agurkas = serialize($agurkas);
            $allAgurkai[$key] = $agurkas;
        }
        return $allAgurkai;
    }
}