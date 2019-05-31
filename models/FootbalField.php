<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Paddle
 *
 * @author crist
 */
class FootbalField {
    //put your code here
    private $id_rent_field;
    private $id_pista;
    private $date;
    private $entry_time;
    private $closing_time;
    private $id_usuario;
    private $amount;
    private $paid;
    
    function __construct($id_rent_field, $id_pista, $date, $entry_time, $closing_time, $id_usuario, $amount, $paid) {
        $this->id_rent_field = $id_rent_field;
        $this->id_pista = $id_pista;
        $this->date = $date;
        $this->entry_time = $entry_time;
        $this->closing_time = $closing_time;
        $this->id_usuario = $id_usuario;
        $this->amount = $amount;
        $this->paid = $paid;
    }

       public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
}
