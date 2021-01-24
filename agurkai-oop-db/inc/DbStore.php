<?php
namespace Main;

use Cucumber\Agurkas;
use Pea\Zirnis;
use Main\Store;
use PDO;

class DbStore implements Store {

    private $pdo;

    public function __construct($o = null) {
        $host = '127.0.0.1';
        $db   = 'darzoviu_sodas';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

    public function getAll() {
        // READ
        $sql = "SELECT * FROM vegetables;";
        $stmt = $this->pdo->query($sql); // BUG: <---nesaugu
        
        $masyvas = [];
        while ($row = $stmt->fetch()) {
            if ($row['name'] == 'Agurkas') {
                $obj = new Agurkas(null);
            }
            if ($row['name'] == 'Zirnis') {
                $obj = new Zirnis(null);
            }
            $obj->id = $row['id'];
            $obj->name = $row['name'];
            $obj->imgPath = $row['imgPath'];
            $obj->kiekis = $row['count'];
            $obj->price = $row['price'];
            $masyvas[] = $obj;
            }
        return $masyvas;
    }

    public function getNewId() {
        return null;
    }

    public function addNewCucumber(Agurkas $agurkasObj) {
        $sql = "INSERT INTO `vegetables` (`name`,`imgPath`, `count`, `price`)
        VALUES ('$agurkasObj->name', 
                '$agurkasObj->imgPath',
                '$agurkasObj->kiekis', 
                '$agurkasObj->price')";
        $this->pdo->query($sql);
    }

    public function addNewPea(Zirnis $zirnisObj) {
        $sql = "INSERT INTO `vegetables` (`name`,`imgPath`, `count`, `price`)
        VALUES ('$zirnisObj->name', 
                '$zirnisObj->imgPath',
                '$zirnisObj->kiekis', 
                '$zirnisObj->price')";
        $this->pdo->query($sql);
    }

    public function remove($id) {
        $sql = "DELETE FROM vegetables
        WHERE id = '".$id."';";
        $this->pdo->query($sql);
    }
}