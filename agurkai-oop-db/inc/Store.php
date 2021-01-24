<?php
namespace Main;

use Main\Store;
use Main\App;
use Main\Catche;
use Cucumber\Agurkas;
use Pea\Zirnis;

interface Store {

    // function getData();

    // function setData();

    function getNewId();

    // function save($darzove, $key);

    function addNewCucumber(Agurkas $agurkasObj);

    function addNewPea(Zirnis $zirnisObj);

    function getAll();

    function remove($id);

    // function grow();
    
    // function harvest($id, $kiek);

    // function harvestOne($id);

    // function harvestAll();
}