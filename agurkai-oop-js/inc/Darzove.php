<?php
namespace Veggies;

use Greenhouse\Siltnamis;

abstract class Darzove implements Siltnamis {

    public function augintiDarzove($kiekAugti) {
        $this->kiekis = $this->kiekis + $kiekAugti;
    }

    public function nuskintiVisus() {
        $this->kiekis = 0;
    }

    abstract public function kiekAugti();
}