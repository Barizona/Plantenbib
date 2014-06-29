<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Eigenschap
 *
 * @author napalm
 */
class Eigenschap extends Database {
    private $eigenschap;
    
    public function receive(){
        $this->regio = array(
            "naam" => htmlspecialchars($_POST['naam']),
            "beschrijving" => htmlspecialchars($_POST['beschrijving'])
        );
    }
    
    public function get_eigenschappen_json() {
        return json_encode($this->select("eigenschap"));
    }

    public function get_eigenschappen() {
        return $this->select("eigenschap");
    }

    public function insert_eigenschap() {
        $this->insert("eigenschap", $this->eigenschap);
    }

    public function insert_eigenschap_json() {
        $json = json_decode(file_get_contents('php://input'));

        $this->insert("eigenschap", array(
            "naam" => $json->{"naam"},
            "beschrijving" => $json->{"beschrijving"}
        ));
    }

    public function delete_eigenschap($id) {
        $this->delete("eigenschap", $id);
    }

    public function update_eigenschap_json() {
        $json = json_decode(file_get_contents('php://input'));

        $this->update("eigenschap", array(
            "naam" => $json->{"naam"},
            "beschrijving" => $json->{"beschrijving"}
        ));
    }

    public function update_eigenschap() {
        $this->update("eigenschap", $this->eigenschap);
    }

}
