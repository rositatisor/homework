<?php
namespace Veggies;

use Greenhouse\Siltnamis;

class Darzove implements Siltnamis {

    public function augintiDarzove($kiek) {
        $this->kiekis = $this->kiekis + $kiek;
    }

    public function nuskintiVisus() {
        $this->kiekis = 0;
    }
}