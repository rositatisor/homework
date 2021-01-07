<?php
namespace Veggies;

class Darzove {

    public function augintiDarzove($kiek) {
        $this->kiekis = $this->kiekis + $kiek;
    }

    public function nuskintiVisus() {
        $this->kiekis = 0;
    }
}