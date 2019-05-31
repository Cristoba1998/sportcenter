<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author crist
 */
class User {
    //put your code here
    private $id_user;
    private $name;
    private $surnames;
    private $dni;
    private $phone_number;
    private $email;
    private $password;
    private $company;
    private $rol;
    private $field_renting;
    
    function __construct($id_user, $name, $surnames, $dni, $phone_number, $email, $password, $company, $rol, $field_renting) {
        $this->id_user = $id_user;
        $this->name = $name;
        $this->surnames = $surnames;
        $this->dni = $dni;
        $this->phone_number = $phone_number;
        $this->email = $email;
        $this->password = $password;
        $this->company = $company;
        $this->rol = $rol;
        $this->field_renting = $field_renting;
    }

    public function __get($name) {
        return $this->$name;
    }

    public function __set($name, $value) {
        $this->$name = $value;
    }
}
