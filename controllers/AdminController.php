<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "BBDDController.php";
require_once "../models/Paddle.php";
require_once "../models/Pavilion.php";
require_once "../models/FootbalField.php";
require_once "../models/User.php";
/**
 * Description of AdminController
 *
 * @author crist
 */
class AdminController {
    
    public static function getUserName($id) {
        $connect = BBDDController::getConnect();
        $sql = "SELECT name FROM users WHERE id_user=".$id." ";
        $result = $connect->query($sql);
         while ($row = $result->fetch_object()) {
                @$h = $row->name;
            }
       echo $h;
        
    }
    public static function getUserDni($id) {
        $connect = BBDDController::getConnect();
        $sql = "SELECT dni FROM users WHERE id_user=".$id." ";
        $result = $connect->query($sql);
         while ($row = $result->fetch_object()) {
                @$h = $row->dni;
            }
       echo $h;
        
    }

     public static function payRentPavilion($pista, $fecha, $e_time, $c_time, $user) {
         echo "<br><br><br>".$pista,$fecha,$e_time,$user;
         $connect = BBDDController::getConnect();
          $sql = "UPDATE `pavilion` SET `paid`=1 WHERE id_usuario=" . $user . " &&  id_pista=" . $pista . " &&  date='" . $fecha . "' &&  entry_time='" . $e_time . "' &&  closing_time='" . $c_time . "'; ";
       
          $query = mysqli_query($connect, $sql);
          
          
     }
    
}
