<?php

class Darzove {

    public function augintiDarzove($kiek) {
        $this->kiekis = $this->kiekis + $kiek;
    }

    public function nuskintiVisus() {
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