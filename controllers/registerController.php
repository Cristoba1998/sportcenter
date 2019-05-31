<?php

require_once "BBDDController1.php";
 require_once "../../models/User.php";
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of registerController
 *
 * @author crist
 */
class registerController {
    //put your code here
     public static function insertUser(User $user) {
        $connect = BBDDController::getConnect(); 
                $sql = "INSERT INTO users (name, surnames, dni, phone_number, email,password, company) VALUES ('$user->name', '$user->surnames', '$user->dni', $user->phone_number, '$user->email', '$user->password','$user->company')";
                $connect->query($sql);
    }  
}
