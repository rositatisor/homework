<?php
namespace Veggies;

use Greenhouse\Siltnamis;

abstract class Darzove implements Siltnamis {

    public function augintiDarzove($kiek) {
        $this->kiekis = $this->kiekis + $kiek;
    }

    public function nuskintiVisus() {
        $this->kiekis = 0;
    }

    abstract public function kiekAugti();
}