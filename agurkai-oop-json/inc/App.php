<?php
namespace Main;

use Cucumber\Agurkas;
use Pea\Zirnis;

class App {
    
    // Router
    public static function route() {
        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
        $uri = explode('/', $uri);

        if('sodinimas' == $uri[0]) include DIR.'/sodinimas.php';
        elseif('auginimas' == $uri[0]) include DIR.'/auginimas.php';
        elseif('skynimas' == $uri[0]) include DIR.'/skynimas.php';
    }

    public static function setSession() {
        if(!isset($_SESSION['darzoves'])) {
            $_SESSION['darzoves'] = [];
            $_SESSION['darzoviu id'] = 0;
        }
    }

    public static function save($value, $key) {
        $value = serialize($value);
        $_SESSION['darzoves'][$key] = $value;
    }

    public static function plantAgurkas() {
        $agurkasObj = new Agurkas($_SESSION['darzoviu id']);
        $_SESSION['darzoviu id']++;
        $_SESSION['darzoves'][] = serialize($agurkasObj);
    }

    public static function plantZirnis() {
        $zirnisObj = new Zirnis($_SESSION['darzoviu id']);
        $_SESSION['darzoviu id']++;
        $_SESSION['darzoves'][] = serialize($zirnisObj);
    }

    public static function remove() {
        foreach ($_SESSION['darzoves'] as $key => $value) {
            $value = unserialize($value);
            if($_POST['rauti'] == $value->id){
                unset($_SESSION['darzoves'][$key]);
            }
        }
    }

    public static function grow() {
        foreach ($_SESSION['darzoves'] as $key => $value) {
            $value = unserialize($value);
            $value->augintiDarzove($_POST['kiekis'][$value->id]);
            self::save($value, $key);
        }
    }

    public static function harvest() {
        foreach ($_SESSION['darzoves'] as $key => $value) {
            $value = unserialize($value);
            if($_POST['skinti'] == $value->id){

                $kiek = (int) $_POST['kiek'];
                if($value->kiekis < $kiek || $kiek < 0) {
                    $_SESSION['error'] = 1;
                    break;
                }
                $value->kiekis -= $kiek;
                self::save($value, $key);
            }
        }
    }

    public static function harvestOne() {
        foreach ($_SESSION['darzoves'] as $key => $value) {
            $value = unserialize($value);
            if($_POST['skinti-visus'] == $value->id){
                $value->nuskintiVisus();
                self::save($value, $key);
            }
        }
    }

    public static function harvestAll() {
        foreach ($_SESSION['darzoves'] as $key => $value) {
            $value = unserialize($value);
            $value->nuskintiVisus();
            self::save($value, $key);
        }
    }

    public static function redirect($fileName) {
        header("Location: ".URL.$fileName);
        exit;
    }
}