<?php

class App {
    
    public static function redirect($fileName) {
        header("Location: http://localhost/homework/agurkai-oop/$fileName.php");
        exit;
    }
}