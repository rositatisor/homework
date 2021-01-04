<?php

class Miskas {
    private $area = 1000;
    protected $animals = 0;
    protected $name = 'Gyvulys';
    public static $title = 'Misko Giria';

    public function __construct() {
        echo '<h3>Misko konstruktorius</h3>';
    }

    public function makeNoise() {
        echo '<h1>'.$this->voice.'</h1>';
    }

    public function getArea() {
        return $this->area;
    }

    public function getTitle() {
        return self::$title;
    }

    public static function getSelfName() {
        return self::$title;
    }

    public static function getStaticName() {
        return static::$title;
    }
}