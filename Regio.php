<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Regio
 *
 * @author napalm
 */
class Regio extends Database {
    private $regio;
    
    public function receive(){
        $this->regio = array(
            "naam" => htmlspecialchars($_POST['naam']),
            "klimaat" => htmlspecialchars($_POST['klimaat']),
            "beschrijving" => htmlspecialchars($_POST['beschrijving'])
        );
    }
    public function get_regios_json() {
        return json_encode($this->select("regio"));
    }

    public function get_regios() {
        return $this->select("regio");
    }

    public function insert_regio() {
        $this->insert("regio", $this->regio);
    }

    public function insert_regio_json() {
        $json = json_decode(file_get_contents('php://input'));

        $this->insert("regio", array(
            "naam" => $json->{"naam"},
            "klimaat" => $json->{"klimaat"},
            "beschrijving" => $json->{"beschrijving"}
        ));
    }

    public function delete_regio($id) {
        $this->delete("regio", $id);
    }

    public function update_regio_json() {
        $json = json_decode(file_get_contents('php://input'));

        $this->update("regio", array(
            "naam" => $json->{"naam"},
            "klimaat" => $json->{"klimaat"},
            "beschrijving" => $json->{"beschrijving"}
        ));
    }

    public function update_regio() {
        $this->update("regio", $this->regio);
    }

}
