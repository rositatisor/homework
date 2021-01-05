<?php

class Zirnis {
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

    public function addZirnis($addZirnis) {
        $this->kiekis = $this->kiekis + $addZirnis;
    }
    public function kiekAugti() {
        return rand(1, 3);
    }

    public function nuskintiVisus() {
        $this->kiekis = 0;
    }

    public static function nuimtiVisaDerliu($allZirniai) {
        foreach ($allZirniai as $key => $zirnis) {
            $zirnis = unserialize($zirnis);
            $zirnis->nuskintiVisus();
            $zirnis = serialize($zirnis);
            $allZirniai[$key] = $zirnis;
        }
        return $allZirniai;
    }
}