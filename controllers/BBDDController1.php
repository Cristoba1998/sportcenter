<?php
require_once "../../models/User.php";

    class BBDDController extends mysqli{
        //Obtener la conexion
        public static function getConnect()
        {
            return new mysqli("localhost","admin","admin","sport_center");
        }
        //Obtener los datos del usuario
        public static function getUser($email,$pass)
        {
            $query ="SELECT * FROM users WHERE email = '$email' and password = '$pass'";
            $u = self::getConnect()->query($query)->fetch_object();
            return new User($u->id_user,$u->name,$u->surnames,$u->dni,$u->phone_number,$u->email,$u->password,$u->company,$u->rol,$u->field_renting);
        }   
        
    }
    
?>