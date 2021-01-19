<?php

namespace Controllers;

use Main\Store;
use Main\App;
use Main\Catche;
use Cucumber\Agurkas;
use Pea\Zirnis;

class SodinimasController {

    private $store, $rawData, $DATA, $rate;

    public function __construct() {
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $this->store = new Store('darzoves');
            $this->DATA = new Catche;
            $this->rate = App::getRate($this->DATA);
            $this->rawData = file_get_contents("php://input");
            $this->rawData = json_decode($this->rawData, 1);
        }
    }

    public function index() {
        include DIR.'/views/index.php';
    }

    public function list() {
        $store = new Store('darzoves');
        $rate = $this->rate;
        ob_start();
        include DIR.'/views/list-plant.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }

    public function plantCucumber() {
        $kiekis = $this->rawData['kiekis'];

        if (0 >= $kiekis || 4 < $kiekis) {
            if (0 == $kiekis) $error = 0;
            elseif (0 > $kiekis) $error = 1;
            elseif (4 < $kiekis) $error = 2;
            ob_start();
            include DIR.'/views/error.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            die;
        }

        foreach(range(1, $kiekis) as $_) {
            $agurkasObj = new Agurkas($this->store->getNewId());
            $this->store->addNewCucumber($agurkasObj);
        }
        $store = $this->store;
        $rate = $this->rate;
        ob_start();
        include DIR.'/views/list-plant.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
    }
        
    public function plantPea() {
        $kiekis = $this->rawData['kiekis'];

        if (0 >= $kiekis || 4 < $kiekis) {
            if (0 == $kiekis) $error = 0;
            elseif (0 > $kiekis) $error = 1;
            elseif(4 < $kiekis) $error = 2;
            ob_start();
            include DIR.'/views/error.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            die;
        }

        foreach(range(1, $kiekis) as $_) {
            $zirnisObj = new Zirnis($this->store->getNewId());
            $this->store->addNewPea($zirnisObj);
        }
        $store = $this->store;
        $rate = $this->rate;
        ob_start();
        include DIR.'/views/list-plant.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(201);
        echo $json;
        die;
        }

    public function remove() {
        $this->store->remove($this->rawData['id']);

        $store = $this->store;
        $rate = $this->rate;
        ob_start();
        include DIR.'/views/list-plant.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }
}