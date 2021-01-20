<?php
    
namespace Controllers;

use Main\Store;
use Main\App;
use Main\Catche;
use Cucumber\Agurkas;
use Pea\Zirnis;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class SkynimasController {

    private $store, $rawData, $DATA, $rate;

    public function __construct() {
        if ('POST' == $_SERVER['REQUEST_METHOD']) {
            $this->store = new Store('darzoves');
            $this->DATA = new Catche;
            $this->rate = App::getRate($this->DATA);
            $this->rawData = App::$request->getContent();
            $this->rawData = json_decode($this->rawData, 1);
        }
    }

    public function index() {
        $response = new Response(
            'Content',
            200,
            ['content-type' => 'text/html']
        );
        ob_start();
        include DIR.'/views/skynimas/index.php';
        $out = ob_get_contents();
        ob_end_clean();
        $response->setContent($out);
        $response->prepare(App::$request);
        return $response;
    }

    public function list() {
        $store = new Store('darzoves');
        $rate = $this->rate;
        ob_start();
        include DIR.'/views/skynimas/list-harvest.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(App::$request);
        return $response;
    }

    public function harvest() {
        $kiekis = (int) $this->rawData['kiek-skinti'];
        $this->store->harvest($this->rawData['id'], $kiekis);
        
        if ($kiekis <= 0) {
            if (0 == $kiekis) $error = 0;
            elseif (0 > $kiekis) $error = 1;
            // elseif ($kiekis >= X) $error = 3;
            ob_start();
            include DIR.'/views/sodinimas/error.php';
            $out = ob_get_contents();
            ob_end_clean();
            $json = ['msg' => $out];
            $json = json_encode($json);
            header('Content-type: application/json');
            http_response_code(400);
            echo $json;
            die;
        }
    
        $store = $this->store;
        $rate = $this->rate;
        ob_start();
        include DIR.'/views/skynimas/list-harvest.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }
        
    public function harvestOne() {
        $this->store->harvestOne($this->rawData['id']);

        $store = $this->store;
        $rate = $this->rate;
        ob_start();
        include DIR.'/views/skynimas/list-harvest.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $json = json_encode($json);
        header('Content-type: application/json');
        http_response_code(200);
        echo $json;
        die;
    }

    public function harvestAll() {
        $this->store->harvestAll();

        $store = $this->store;
        $rate = $this->rate;
        ob_start();
        include DIR.'/views/skynimas/list-harvest.php';
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