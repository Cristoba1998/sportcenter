<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once "BBDDController.php";
require_once "../models/Paddle.php";

/**
 * Description of PaddleController
 *
 * @author crist
 */
class PaddleController {

    public static function getAllPaddleRents() {
        $connect = BBDDController::getConnect();
        $sql = "SELECT * FROM padel";
        $result = $connect->query($sql);
        while ($row = $result->fetch_object()) {
            $rents [] = new Paddle($row->id_rent_field, $row->id_pista, $row->date, $row->entry_time, $row->closing_time, $row->id_usuario, $row->amount, $row->paid);
        }
        return $rents;
    }

    public static function getAllPaddleRentsUser($user) {
        $connect = BBDDController::getConnect();
        $sql5 = "SELECT * FROM padel WHERE id_usuario=" . $user . "";

        $result = $connect->query($sql5);

        while ($row = $result->fetch_object()) {
            $rents [] = new Paddle($row->id_rent_field, $row->id_pista, $row->date, $row->entry_time, $row->closing_time, $row->id_usuario, $row->amount, $row->paid);
        }
        return $rents;
    }

    public static function cancelPist($pista, $fecha, $e_time, $c_time, $user) {


        $connect = BBDDController::getConnect();



        $sql = "DELETE FROM padel WHERE id_pista=" . $pista . " && date='" . $fecha . "' && entry_time='" . $e_time . "' && closing_time='" . $c_time . "' && id_usuario=" . $user . ";";
        $query = mysqli_query($connect, $sql);
        $sql = "UPDATE `users` SET `field_renting`=field_renting-1 WHERE id_user=" . $user . " ";
        $query = mysqli_query($connect, $sql);
        if ($query) {
            echo '<br><br><br><br><div class="container-fluid"><div class="row text-center justify-content-center"><div class="bg-warning text-white" style="width:900px;height:60px;">';
            echo 'Alquiler anulado';
            echo '</div></div></div>';
        } else {
            mysqli_error($sql2);
        }
    }

    public static function rentPist($pista, $fecha, $e_time, $c_time, $user) {



        $connect = BBDDController::getConnect();
        if (date("l") == "Saturday") {
            $amount = 5;
        } else {
            $amount = 3;
        }




        $sql = "SELECT id_pista FROM padel WHERE  id_pista=" . $pista . " && date='" . $fecha . "' && entry_time='" . $e_time . "' && closing_time='" . $c_time . "' ";
        $result = $connect->query($sql);


        while ($row = $result->fetch_object()) {
            @$g = $row->id_pista;
        }
        if (@$g == $pista) {
            echo '.';
        } else {


            $sql = "SELECT field_renting FROM users WHERE  id_user=" . $user . "";
            @$result2 = $connect->query($sql);
            while ($row = $result2->fetch_object()) {
                @$h = $row->field_renting;
            }

            if ($h < 3) {
                $sql = "INSERT INTO padel ( id_pista, date, entry_time, closing_time, id_usuario, amount, paid ) VALUES ( " . $pista . ", '" . $fecha . "','" . $e_time . "','" . $c_time . "'," . $user . "," . $amount . " ,0);";
                $query = mysqli_query($connect, $sql);
                $sql = "UPDATE `users` SET `field_renting`=field_renting+1 WHERE id_user=" . $user . " ";
                $query = mysqli_query($connect, $sql);
                if ($query) {
                    echo '<br><br><br><br><div class="container-fluid"><div class="row text-center justify-content-center"><div class="bg-success text-white" style="width:900px;height:60px;">';
                    echo 'Alquiler correctamente realizado<br> Recuerde que ha de efectuar el pago del alquiler de la pista antes de dos horas de la fecha de alquiler';
                    echo '</div></div></div>';
                } else {
                    mysqli_error($sql2);
                }
            } else {
                echo '<br><br><br><br><div class="container-fluid"><div class="row text-center justify-content-center"><div class="bg-danger text-white" style="width:900px;height:60px;">';
                echo 'No puedes alquilar mas de 3 horas';
                echo '</div></div></div>';
            }
        }
    }

    public static function reOrderDate($dateIn) {
        $yy = substr($dateIn, 0, 4);
        $mm = substr($dateIn, 5, 2);
        $dd = substr($dateIn, 8, 2);

        $dateOut = $dd . "/" . $mm . "/" . $yy;
        return $dateOut;
    }

}
