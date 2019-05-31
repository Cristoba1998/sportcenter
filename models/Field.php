<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Field
 *
 * @author crist
 */
class Field {
    private $id_field;
    private $type;
    private $description;
    
    function __construct($id_field, $type, $description) {
        $this->id_field = $id_field;
        $this->type = $type;
        $this->description = $description;
    }

    
     public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
}
