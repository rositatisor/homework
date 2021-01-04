<?php

echo 'Labas, miske<br>';

include __DIR__.'/Miskas.php';
include __DIR__.'/Vovere.php';
include __DIR__.'/Egle.php';
include __DIR__.'/Lape.php';

echo "<br>";
echo Miskas::$title;

// $animal1 = new Lape;
// $animal2 = new Vovere;
$animal3 = new Egle;

// $animal1->makeNoise();
// $animal2->makeBigNoise();

echo $animal3->getTitle();

// var_dump($animal1->getArea());
// var_dump($animal2->getArea());

echo "<pre>";
// var_dump($animal1);
// echo "<br>";
// var_dump($animal2);
echo "<br>";
var_dump($animal3);
echo "</pre>";