<?php

class App {
    
    public static function setSession() {
        if(!isset($_SESSION['darzoves'])) {
            $_SESSION['darzoves'] = [];
            $_SESSION['darzoviu id'] = 0;
        }
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

    public static function redirect($fileName) {
        header("Location: http://localhost/homework/agurkai-oop/$fileName.php");
        exit;
    }
}