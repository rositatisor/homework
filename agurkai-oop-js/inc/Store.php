<?php
namespace Main;

use Cucumber\Agurkas;
use Pea\Zirnis;

class Store {

    private const PATH = DIR.'/data/';

    private $fileName = 'sodas';
    private $data;

    public function __construct($file) {
        $this->fileName = $file;
        if (!file_exists(self::PATH.$this->fileName.'.json')) {
            file_put_contents(self::PATH.$this->fileName.'.json', json_encode(['darzoves' => [], 'darzoviu id' => 0]));
            $this->data = ['darzoves' => [], 'darzoviu id' => 0];
        } else {
            $this->data = file_get_contents(self::PATH.$this->fileName.'.json');
            $this->data = json_decode($this->data, 1);
        }
    }

    public function __destruct() {
        file_put_contents(self::PATH.$this->fileName.'.json', json_encode($this->data));
    }

    public function getData() {
        return $this->data;
    }

    public function setData() {
        $this->data = $data;
    }

    public function getNewId() {
        $id = $this->data['darzoviu id'];
        $this->data['darzoviu id']++;
        return $id;        
    }

    public function save($darzove, $key) {
        $darzove = serialize($darzove);
        $this->data['darzoves'][$key] = $darzove;
    }

    public function addNewCucumber(Agurkas $agurkasObj) {
        $this->data['darzoves'][] = serialize($agurkasObj);
    }

    public function addNewPea(Zirnis $zirnisObj) {
        $this->data['darzoves'][] = serialize($zirnisObj);
    }

    public function getAll() {
        $allVeggies = [];
        foreach ($this->data['darzoves'] as $darzove) {
            $allVeggies[] = unserialize($darzove);
        }
        return $allVeggies;
    }

    public function remove($id) {
        foreach ($this->data['darzoves'] as $key => $darzove) {
            $darzove = unserialize($darzove);
            if ($darzove->id == $id) {
                unset($this->data['darzoves'][$key]);
            }
        }
    }

    public function grow() {
        foreach ($this->data['darzoves'] as $key => $darzove) {
            $darzove = unserialize($darzove);
            $darzove->augintiDarzove($darzove->kiekAugti);
            $darzove->kiekAugti();
            self::save($darzove, $key);
        }
    }
    
    public function harvest($id, $kiek) {
        foreach ($this->data['darzoves'] as $key => $darzove) {
            $darzove = unserialize($darzove);
            if ($darzove->id == $id) {
                if ($darzove->kiekis < $kiek) break;
                $darzove->kiekis -= $kiek;
                self::save($darzove, $key);
            }
        }
    }

    public function harvestOne($id) {
        foreach ($this->data['darzoves'] as $key => $darzove) {
            $darzove = unserialize($darzove);
            if ($darzove->id == $id) {
                $darzove->nuskintiVisus();
                self::save($darzove, $key);
            }
        }
    }

    public function harvestAll() {
        foreach ($this->data['darzoves'] as $key => $darzove) {
            $darzove = unserialize($darzove);
            $darzove->nuskintiVisus();
            self::save($darzove, $key);
        }
    }

}