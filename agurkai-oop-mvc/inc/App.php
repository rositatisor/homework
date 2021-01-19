<?php
namespace Main;

use Controllers\SodinimasController;
use Symfony\Component\HttpFoundation\Request;

class App {
    public static $request;

    public static function start() {
        self::$request = Request::createFromGlobals();
        return self::route();
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
        }
        elseif('auginimas' == $uri[0]) include DIR.'/auginimas.php';
        elseif('skynimas' == $uri[0]) include DIR.'/skynimas.php';
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