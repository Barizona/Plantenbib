<?php

class Plant extends Database {
    private $plant;
    
    public function receive(){
        $this->plant = array(
            "naam" => htmlspecialchars($_POST['naam']),
            "latijnse_naam" => htmlspecialchars($_POST['latijnse_naam']),
            "beschrijving" => htmlspecialchars($_POST['beschrijving']),
            "familie" => htmlspecialchars($_POST['familie']),
            "klasse" => htmlspecialchars($_POST['klasse'])
        );
    }
    
    public function get_planten_json() {
        return json_encode($this->select("plant"));
    }
    
    public function get_planten() {
        return $this->select("plant");
    }

    public function insert_plant_json() {
        $json = json_decode(file_get_contents('php://input'));

        $this->insert("plant", array(
            "naam" => $json->{"naam"},
            "latijnse_naam" => $json->{"latijnse_naam"},
            "beschrijving" => $json->{"beschrijving"},
            "familie" => $json->{"familie"},
            "klasse" => $json->{"klasse"}
        ));
    }

    public function insert_plant() {
        $this->insert("plant", $this->plant);
    }

    public function delete_plant($id) {
        $this->delete("plant", $id);
    }

    public function update_plant_json() {
        $json = json_decode(file_get_contents('php://input'));

        $this->update("plant", array(
            "naam" => $json->{"naam"},
            "latijnse_naam" => $json->{"latijnse_naam"},
            "beschrijving" => $json->{"beschrijving"},
            "familie" => $json->{"familie"},
            "klasse" => $json->{"klasse"}
        ));
    }

    public function update_plant() {
        $this->update("plant", $this->plant);
    }

}
