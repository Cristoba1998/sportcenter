<?php
require_once "../controllers/FootbalFieldController.php";
require_once "../controllers/BBDDController.php";
require_once "../models/User.php";
include '../components/general-components/Navbar.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Centro Deportivo Benameji</title>
        <link rel="stylesheet" type="text/css" href="../css/nav.css"> 


        <!-- Custom styles for this template -->
        <link href="navbar-top-fixed.css" rel="stylesheet">
    </head>
    <body>
        <?php
        if (isset($_SESSION['activeUser'])) {
            if (isset($_REQUEST['renting'])) {

                FootbalFieldController::rentPist($_REQUEST['pist'], $_REQUEST['date'], $_REQUEST['timeInt'], $_REQUEST['timeOut'], $_SESSION['activeUser']->id_user);
            }
            if (isset($_REQUEST['cancel'])) {
                FootbalFieldController::cancelPist($_REQUEST['pist'], $_REQUEST['date'], $_REQUEST['timeInt'], $_REQUEST['timeOut'], $_SESSION['activeUser']->id_user);
            }
            $rents = FootbalFieldController::getAllFootbalFieldRents();
            ?>
            <!-- Creacion de la tabla y de sus atributos  -->
            <br><br><br>

            <div class="container-fluid">
                <div class="row text-center justify-content-center">

                    <div class="col-sm-8">
                        <h1>Alquiler de campo de fútbol</h1><br>
                        <h2>Campo de Futból 11</h2>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-light bg-info text-center">Fecha</th>
                                    <th scope="col" class="text-light bg-info text-center">Entrada</th>
                                    <th scope="col" class="text-light bg-info text-center">Salida</th>
                                    <th scope="col" class="text-light bg-info text-center">Precio</th>
                                    <th scope="col" class="text-light bg-info text-center">Disponibilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fecha = FootbalFieldController::reOrderDate($dateAcc = date("Y-m-d"));
                                $timeIn = 10;
                                $timeOut = 11;
                                for ($i = 0; $i < 10; $i++) {
                                    ?>

                                    <tr class="text-center  <?php
                                    if ($i % 2 == 0) {
                                        echo 'table-secondary';
                                    }
                                    ?> ">

                                        <td> <?php echo $fecha; ?></td>
                                        <td> <?php
                                            if ($i < 4) {
                                                $tI = $timeIn + $i;
                                                echo $tI . ':00';
                                            } else {
                                                $tI = $timeIn + $i + 2;
                                                echo $tI . ':00';
                                            }
                                            ?></td>
                                        <td> <?php
                                            if ($i < 4) {
                                                $tO = $timeOut + $i;
                                                echo $tO . ':00';
                                            } else {
                                                $tO = $timeOut + $i + 2;
                                                echo $tO . ':00';
                                            }
                                            ?></td>
                                        <td> <?php
                                            if (date("l") == "Saturday") {
                                                echo '20 €';
                                            } else {
                                                echo '16 €';
                                            }
                                            ?></td>
                                        <td> <?php
                                            $p = FALSE;

                                            foreach ($rents as $key => $value) {
                                                @$ultra = substr($value->date, 0, 10);
                                                if ($value->entry_time == $tI . ":00" && $value->closing_time == $tO . ":00" && $fecha == $ultra) {
                                                    $p = TRUE;
                                                }
                                            }





                                            if ($p == TRUE) {
                                                echo '<button type="button" class="btn btn-danger btn-sm">Ocupado</button>';
                                                $p = FALSE;
                                            } else {
                                                ?>
                                                <form action="" method="post">
                                                    <input type="hidden" value="<?php echo $fecha; ?> " name="date"/>
                                                    <input type="hidden" value="<?php echo $tI . ':00'; ?>" name="timeInt"/>
                                                    <input type="hidden" value="<?php echo $tO . ':00'; ?>" name="timeOut"/>
                                                    <input type="hidden" value="1" name="pist"/>
                                                    <button type="submit" class="btn btn-success btn-sm" name="renting">Disponible</button>  
                                                </form>
                                                <?php
                                            }
                                            $p = FALSE;
                                            ?></td>
                                    </tr>

                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>


                    <!-- tabla pista 2-------------------------------------->


                    <div class="col-sm-8">
                        <h2>Campos de Fútbol 7</h2>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-light bg-info text-center">Fecha</th>
                                    <th scope="col" class="text-light bg-info text-center">Entrada</th>
                                    <th scope="col" class="text-light bg-info text-center">Salida</th>
                                    <th scope="col" class="text-light bg-info text-center">Precio</th>
                                    <th scope="col" class="text-light bg-info text-center">Disponibilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for ($i = 0; $i < 10; $i++) {
                                    ?>

                                    <tr class="text-center  <?php
                                    if ($i % 2 == 0) {
                                        echo 'table-secondary';
                                    }
                                    ?> ">

                                        <td> <?php echo $fecha; ?></td>
                                        <td> <?php
                                            if ($i < 4) {
                                                $tI = $timeIn + $i;
                                                echo $tI . ':00';
                                            } else {
                                                $tI = $timeIn + $i + 2;
                                                echo $tI . ':00';
                                            }
                                            ?></td>
                                        <td> <?php
                                            if ($i < 4) {
                                                $tO = $timeOut + $i;
                                                echo $tO . ':00';
                                            } else {
                                                $tO = $timeOut + $i + 2;
                                                echo $tO . ':00';
                                            }
                                            ?></td>
                                        <td> <?php
                                            if (date("l") == "Saturday") {
                                                echo '20 €';
                                            } else {
                                                echo '16 €';
                                            }
                                            ?></td>
                                        <td> <?php
                                            $p = FALSE;
                                            $m = 0;
                                            $s = 0;

                                            foreach ($rents as $key => $value) {
                                                @$ultra = substr($value->date, 0, 10);
                                                if ($value->entry_time == $tI . ":00" && $value->closing_time == $tO . ":00" && $fecha == $ultra) {
                                                    $p = TRUE;
                                                    $m = 1;
                                                }
                                                if ($value->entry_time == $tI . ":00" && $value->id_pista == 2 && $value->closing_time == $tO . ":00" && $fecha == $ultra) {
                                                    $m = 2;
                                                }
                                                if ($value->entry_time == $tI . ":00" && $value->id_pista == 3 && $value->closing_time == $tO . ":00" && $fecha == $ultra) {
                                                    $s = 3;
                                                }
                                            }





                                            if ($p == TRUE) {
                                                if ($m == 2) {
                                                    echo 'Campo 1:<button type="button" class="btn btn-danger btn-sm">Ocupado</button><br>';
                                                    if ($s != 3) {
                                                        ?>
                                                        <br>
                                                        <form action="" method="post">
                                                            <input type="hidden" value="<?php echo $fecha; ?> " name="date"/>
                                                            <input type="hidden" value="<?php echo $tI . ':00'; ?>" name="timeInt"/>
                                                            <input type="hidden" value="<?php echo $tO . ':00'; ?>" name="timeOut"/>
                                                            <input type="hidden" value="3" name="pist"/>
                                                            Campo 2:<button type="submit" class="btn btn-success btn-sm" name="renting">Disponible</button>  
                                                        </form>
                                                        <?php
                                                    }
                                                }
                                                if ($s == 3) {
                                                    echo 'Campo 2:<button type="button" class="btn btn-danger btn-sm">Ocupado</button><br>';
                                                    if ($m != 3) {
                                                        ?>
                                                        <br>
                                                        <form action="" method="post">
                                                            <input type="hidden" value="<?php echo $fecha; ?> " name="date"/>
                                                            <input type="hidden" value="<?php echo $tI . ':00'; ?>" name="timeInt"/>
                                                            <input type="hidden" value="<?php echo $tO . ':00'; ?>" name="timeOut"/>
                                                            <input type="hidden" value="2" name="pist"/>
                                                            Campo 1:<button type="submit" class="btn btn-success btn-sm" name="renting">Disponible</button>  
                                                        </form>
                                                        <?php
                                                    }
                                                }
                                                if ($m == 1) {
                                                    if ($s != 3 && $m != 2) {
                                                        echo 'Campo 1:<button type="button" class="btn btn-danger btn-sm">Ocupado</button><br><br>';
                                                        echo 'Campo 2:<button type="button" class="btn btn-danger btn-sm">Ocupado</button>';
                                                    }
                                                }

                                                $p = FALSE;
                                            } else {
                                                if ($m != 1) {
                                                    ?>

                                                    <form action="" method="post">
                                                        <input type="hidden" value="<?php echo $fecha; ?> " name="date"/>
                                                        <input type="hidden" value="<?php echo $tI . ':00'; ?>" name="timeInt"/>
                                                        <input type="hidden" value="<?php echo $tO . ':00'; ?>" name="timeOut"/>
                                                        <input type="hidden" value="2" name="pist"/>
                                                        Campo 1: <button type="submit" class="btn btn-success btn-sm" name="renting">Disponible</button>  
                                                    </form> 

                                                    <br>
                                                    <form action="" method="post">
                                                        <input type="hidden" value="<?php echo $fecha; ?> " name="date"/>
                                                        <input type="hidden" value="<?php echo $tI . ':00'; ?>" name="timeInt"/>
                                                        <input type="hidden" value="<?php echo $tO . ':00'; ?>" name="timeOut"/>
                                                        <input type="hidden" value="3" name="pist"/>
                                                        Campo 2:<button type="submit" class="btn btn-success btn-sm" name="renting">Disponible</button>  
                                                    </form>
                                                    <?php
                                                }
                                            }
                                            $p = FALSE;
                                            ?></td>
                                    </tr>

                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!--Pists mias------------------->

                    <div class="col-sm-8">
                        <h2>Mis Alquileres</h2>
                        <table class="table table-bordered table-hover">
                            <thead>

                                <tr>
                                    <th scope="col" class="text-light bg-info text-center">Pista</th>
                                    <th scope="col" class="text-light bg-info text-center">Fecha</th>
                                    <th scope="col" class="text-light bg-info text-center">Entrada</th>
                                    <th scope="col" class="text-light bg-info text-center">Salida</th>
                                    <th scope="col" class="text-light bg-info text-center">Precio</th>
                                    <th scope="col" class="text-light bg-info text-center">Estado de pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fecha = FootbalFieldController::reOrderDate($dateAcc = date("Y-m-d"));
                                $timeIn = 10;
                                $timeOut = 11;
                                $rentsMy = FootbalFieldController::getAllFootbalFieldRentsUser($_SESSION['activeUser']->id_user);
                                foreach ($rentsMy as $key => $value) {
                                    ?>

                                    <tr class="text-center  <?php
                            if ($i % 2 == 0) {
                                echo 'table-secondary';
                            }
                                    ?> ">
                                        <td> <?php if ($value->id_pista == 1) {
                                echo 'F11';
                            }if ($value->id_pista == 2) {
                                echo 'F7(campo 1)';
                            }if ($value->id_pista == 3) {
                                echo 'F7(Campo 2)';
                            }
                            ?></td>
                                        }
                                        <td> <?php echo $value->date; ?></td>
                                        <td> <?php echo $value->entry_time; ?></td>
                                        <td> <?php echo $value->closing_time; ?></td>
                                        <td> <?php echo $value->amount; ?></td>
                                        <td> <?php if ($value->paid == 0) { ?>
                                                <div style="color:red">
                                                    <form action="" method="post">
                                                        <input type="hidden" value="<?php echo $value->date; ?> " name="date"/>
                                                        <input type="hidden" value="<?php echo $value->entry_time; ?>" name="timeInt"/>
                                                        <input type="hidden" value="<?php echo $value->closing_time; ?>" name="timeOut"/>
                                                        <input type="hidden" value="<?php echo $value->id_pista; ?>" name="pist"/>
                                                        No pagado  <button type="sumbit" name="cancel" class="btn btn-warning btn-sm">Anular</button>
                                                    </form>
                                                </div>
                                                <?php
                                            } else {  ?>
                                                <div style="text-green">
                                                    <form action="" method="post">
                                                        <input type="hidden" value="<?php echo $value->date; ?> " name="date"/>
                                                        <input type="hidden" value="<?php echo $value->entry_time; ?>" name="timeInt"/>
                                                        <input type="hidden" value="<?php echo $value->closing_time; ?>" name="timeOut"/>
                                                        <input type="hidden" value="<?php echo $value->id_pista; ?>" name="pist"/>
                                                    Pagado <button type="submit" name="cancel" class="btn btn-warning btn-sm">Anular</button>
                                                    </form>
                                                </div>
                                                
                                                <?php
                                            }
                                            ?>

                                        </td>

                                    </tr>

        <?php
    }
    ?>
                            </tbody>
                        </table>
                    </div>




                </div>
            </div>


        </body>
    </html>
    <?php
} else {
    $rents = FootbalFieldController::getAllFootbalFieldRents();
    ?>
    <!-- Creacion de la tabla y de sus atributos  -->
    <br><br><br>

    <div class="container-fluid">
        <div class="row text-center justify-content-center">

            <div class="col-sm-8">
                <h1>Alquiler de campo de fútbol</h1><br>
                <h2>Campo de Futból 11</h2>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-light bg-info text-center">Fecha</th>
                            <th scope="col" class="text-light bg-info text-center">Entrada</th>
                            <th scope="col" class="text-light bg-info text-center">Salida</th>
                            <th scope="col" class="text-light bg-info text-center">Precio</th>
                            <th scope="col" class="text-light bg-info text-center">Disponibilidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $fecha = FootbalFieldController::reOrderDate($dateAcc = date("Y-m-d"));
                        $timeIn = 10;
                        $timeOut = 11;
                        for ($i = 0; $i < 10; $i++) {
                            ?>

                            <tr class="text-center  <?php
                    if ($i % 2 == 0) {
                        echo 'table-secondary';
                    }
                            ?> ">

                                <td> <?php echo $fecha; ?></td>
                                <td> <?php
                                    if ($i < 4) {
                                        $tI = $timeIn + $i;
                                        echo $tI . ':00';
                                    } else {
                                        $tI = $timeIn + $i + 2;
                                        echo $tI . ':00';
                                    }
                                    ?></td>
                                <td> <?php
                                    if ($i < 4) {
                                        $tO = $timeOut + $i;
                                        echo $tO . ':00';
                                    } else {
                                        $tO = $timeOut + $i + 2;
                                        echo $tO . ':00';
                                    }
                                    ?></td>
                                <td> <?php
                                    if (date("l") == "Saturday") {
                                        echo '20 €';
                                    } else {
                                        echo '16 €';
                                    }
                                    ?></td>
                                <td> <?php
                                    $p = FALSE;

                                    foreach ($rents as $key => $value) {
                                        @$ultra = substr($value->date, 0, 10);
                                        if ($value->entry_time == $tI . ":00" && $value->closing_time == $tO . ":00" && $fecha == $ultra) {
                                            $p = TRUE;
                                        }
                                    }





                                    if ($p == TRUE) {
                                        echo '<button type="button" class="btn btn-danger btn-sm">Ocupado</button>';
                                        $p = FALSE;
                                    } else {
                                        ?>

                                        <button type="submit" class="btn btn-success btn-sm" name="renting">Disponible</button>  

            <?php
        }
        $p = FALSE;
        ?></td>
                            </tr>

        <?php
    }
    ?>
                    </tbody>
                </table>
            </div>


            <!-- tabla pista 2-------------------------------------->


            <div class="col-sm-8">
                <h2>Campos de Fútbol 7</h2>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col" class="text-light bg-info text-center">Fecha</th>
                            <th scope="col" class="text-light bg-info text-center">Entrada</th>
                            <th scope="col" class="text-light bg-info text-center">Salida</th>
                            <th scope="col" class="text-light bg-info text-center">Precio</th>
                            <th scope="col" class="text-light bg-info text-center">Disponibilidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < 10; $i++) {
                            ?>

                            <tr class="text-center  <?php
                    if ($i % 2 == 0) {
                        echo 'table-secondary';
                    }
                            ?> ">

                                <td> <?php echo $fecha; ?></td>
                                <td> <?php
                                    if ($i < 4) {
                                        $tI = $timeIn + $i;
                                        echo $tI . ':00';
                                    } else {
                                        $tI = $timeIn + $i + 2;
                                        echo $tI . ':00';
                                    }
                                    ?></td>
                                <td> <?php
                                    if ($i < 4) {
                                        $tO = $timeOut + $i;
                                        echo $tO . ':00';
                                    } else {
                                        $tO = $timeOut + $i + 2;
                                        echo $tO . ':00';
                                    }
                                    ?></td>
                                <td> <?php
                                    if (date("l") == "Saturday") {
                                        echo '20 €';
                                    } else {
                                        echo '16 €';
                                    }
                                    ?></td>
                                <td> <?php
                                    $p = FALSE;
                                    $m = 0;
                                    $s = 0;

                                    foreach ($rents as $key => $value) {
                                        @$ultra = substr($value->date, 0, 10);
                                        if ($value->entry_time == $tI . ":00" && $value->closing_time == $tO . ":00" && $fecha == $ultra) {
                                            $p = TRUE;
                                            $m = 1;
                                        }
                                        if ($value->entry_time == $tI . ":00" && $value->id_pista == 2 && $value->closing_time == $tO . ":00" && $fecha == $ultra) {
                                            $m = 2;
                                        }
                                        if ($value->entry_time == $tI . ":00" && $value->id_pista == 3 && $value->closing_time == $tO . ":00" && $fecha == $ultra) {
                                            $s = 3;
                                        }
                                    }





                                    if ($p == TRUE) {
                                        if ($m == 2) {
                                            echo 'Campo 1:<button type="button" class="btn btn-danger btn-sm">Ocupado</button><br>';
                                            if ($s != 3) {
                                                ?>
                                                <br>

                                                Campo 2:<button type="submit" class="btn btn-success btn-sm" name="renting">Disponible</button>  

                                                <?php
                                            }
                                        }
                                        if ($s == 3) {
                                            echo 'Campo 2:<button type="button" class="btn btn-danger btn-sm">Ocupado</button><br>';
                                            if ($m != 3) {
                                                ?>
                                                <br>

                                                Campo 1:<button type="submit" class="btn btn-success btn-sm" name="renting">Disponible</button>  

                                                <?php
                                            }
                                        }
                                        if ($m == 1) {
                                            if ($s != 3 && $m != 2) {
                                                echo 'Campo 1:<button type="button" class="btn btn-danger btn-sm">Ocupado</button><br><br>';
                                                echo 'Campo 2:<button type="button" class="btn btn-danger btn-sm">Ocupado</button>';
                                            }
                                        }

                                        $p = FALSE;
                                    } else {
                                        if ($m != 1) {
                                            ?>


                                            Campo 1: <button type="submit" class="btn btn-success btn-sm" name="renting">Disponible</button>  


                                            <br>

                                            Campo 2:<button type="submit" class="btn btn-success btn-sm" name="renting">Disponible</button>  

                                            <?php
                                        }
                                    }
                                    $p = FALSE;
                                    ?></td>
                            </tr>

        <?php
    }
    ?>
                    </tbody>
                </table>
            </div>
    <?php
}
?>