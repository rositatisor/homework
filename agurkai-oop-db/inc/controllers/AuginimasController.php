<?php

namespace Controllers;

use Main\Store;
use Main\App;
use Main\Catche;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class AuginimasController {

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
        include DIR.'/views/auginimas/index.php';
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
        include DIR.'/views/auginimas/list-grow.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(App::$request);
        return $response;
    }

    public function grow() {
        $this->store->grow();
        $rate = $this->rate;
        $store = $this->store;
        ob_start();
        include DIR.'/views/auginimas/list-grow.php';
        $out = ob_get_contents();
        ob_end_clean();
        $json = ['list' => $out];
        $response = new JsonResponse($json);
        $response->prepare(App::$request);
        return $response;
    }
}
