<?php

// planas
class Nso {
    private $ufoCount = 2;
    protected $color = 'black';
    private $tail = false;

    public function __constructor($color = 'null'){
        $this->color = $color ?? $this->color;
        echo 'labas';
    }

    public function addOneUfo(){
        $this->ufoCount++;
    }
    public function setUfo(int $ufoCount){
        $this->yfoCount = (int) $ufoCount;
    }
    public function getUfo() {
        return $this->ufoCount;
    }
    public function addMoreUfo($ufoCount){
        $this->ufoCount + $ufoCount;
    }
    public function removeMoreUfo($ufo){
        $this->ufoCount = $this->ufoCount - $ufo;
    }
}

// gamyba
$ufo1 = new Nso();
$ufo2 = new Nso;
$ufo3 = new Nso;

// tyrimas
echo "<pre>";
var_dump($ufo1);
// var_dump($ufo2);
// var_dump($ufo3);

// echo $ufo1->ufoCount;
// $ufo1->addOneUfo();
// $ufo1->addMoreUfo(40);
// $ufo1->removeMoreUfo(90);
// echo $ufo1->ufoCount;