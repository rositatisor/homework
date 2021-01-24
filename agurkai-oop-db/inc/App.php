<?php
namespace Main;

use Controllers\SodinimasController;
use Controllers\AuginimasController;
use Controllers\SkynimasController;
use Symfony\Component\HttpFoundation\Request;
use PDO;

class App {
    public static $request;
    private static $storeSetting = 'db'; // json OR db

    public static function start() {
        self::$request = Request::createFromGlobals();
        return self::route();
    }

    public static function store($type) { // <-- factory
        if (self::$storeSetting  == 'json') return new JsonStore($type);
        if (self::$storeSetting  == 'db') return new DbStore($type);
    }

    public static function route() {
        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
        $uri = explode('/', $uri);

        if('sodinimas' == $uri[0]) {
            if (!isset($uri[1])) return (new SodinimasController)->index();
            if ('list' == $uri[1]) return (new SodinimasController)->list();
            if ('remove' == $uri[1]) return (new SodinimasController)->remove();
            if ('plantCucumber' == $uri[1]) return (new SodinimasController)->plantCucumber();
            if ('plantPea' == $uri[1]) return (new SodinimasController)->plantPea();
            //TODO: add 404 page
        } elseif ('auginimas' == $uri[0]) {
            if (!isset($uri[1])) return (new AuginimasController)->index();
            if ('list' == $uri[1]) return (new AuginimasController)->list();
            if ('grow' == $uri[1]) return (new AuginimasController)->grow();
            //TODO: add 404 page
        }
        elseif ('skynimas' == $uri[0]) {
            if (!isset($uri[1])) return (new SkynimasController)->index();
            if ('list' == $uri[1]) return (new SkynimasController)->list();
            if ('harvest' == $uri[1]) return (new SkynimasController)->harvest();
            if ('harvestOne' == $uri[1]) return (new SkynimasController)->harvestOne();
            if ('harvestAll' == $uri[1]) return (new SkynimasController)->harvestAll();
            //TODO: add 404 page
        }
    }

    public static function redirect($fileName) {
        header('Location: '.URL.$fileName);
        exit;
    }

    public static function getRate($DATA) {
        $answer = $DATA->get();

        // $_SESSION['method'] = ($answer === false) ? 'API' : 'CATCHE';
        // _d($_SESSION['method']);

        if ($answer === false) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://api.exchangeratesapi.io/latest');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $answer = curl_exec($ch);
            $answer = json_decode($answer);
            $DATA->set($answer);
        }
        $rate = $answer->rates->HUF;
        return $rate;
    }
}