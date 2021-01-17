<?php
namespace Main;

class App {

    public static function route() {
        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
        $uri = explode('/', $uri);

        if('sodinimas' == $uri[0]) include DIR.'/sodinimas.php';
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