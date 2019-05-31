<?php
require_once "../controllers/PavilionController.php";
require_once "../controllers/FootbalFieldController.php";
require_once "../controllers/PaddleController.php";
require_once "../controllers/AdminController.php";
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
        <link href="navbar-top-fixed.css" rel="stylesheet">
    </head>
    <body>
        <?php
        if (isset($_SESSION['activeUser'])) {
            if(isset($_REQUEST['pay'])){
                AdminController::payRentPavilion($_REQUEST['pist'], $_REQUEST['date'], $_REQUEST['timeInt'], $_REQUEST['timeOut'], $_REQUEST['user']);
            }
            $rentsPavilion = PavilionController::getAllPavilionRents();
            $rentsPaddle= PaddleController::getAllPaddleRents();
            $rentsFootbalField = FootbalFieldController::getAllFootbalFieldRents();
            ?>
            <!-- Creacion de la tabla Pabellon  -->
            <br><br><br>
            <div class="container-fluid">
                <div class="row text-center justify-content-center">
                    <div class="col-sm-9">
                        <h2>Pabellon</h2>
                        <table class="table table-bordered table-hover">
                            <thead>

                                <tr>
                                    <th scope="col" class="text-light bg-info text-center">Pista</th>
                                    <th scope="col" class="text-light bg-info text-center">Usuario</th>
                                    <th scope="col" class="text-light bg-info text-center">DNI</th>
                                    <th scope="col" class="text-light bg-info text-center">Fecha</th>
                                    <th scope="col" class="text-light bg-info text-center">Entrada</th>
                                    <th scope="col" class="text-light bg-info text-center">Salida</th>
                                    <th scope="col" class="text-light bg-info text-center">Dinero a pagar</th>
                                    <th scope="col" class="text-light bg-info text-center">Estado de pago</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $fecha = PavilionController::reOrderDate($dateAcc = date("Y-m-d"));
                                $timeIn = 10;
                                $timeOut = 11;

                                foreach ($rentsPavilion as $key => $value) {
                                     
                                     
                                    
                                    ?>

                                    <tr class="text-center  <?php
                                    if ($i % 2 == 0) {
                                        echo 'table-secondary';
                                    }
                                    ?> ">
                                        <td> <?php echo $value->id_pista; ?></td>
                                        <td> <?php echo AdminController::getUserName($value->id_usuario); ?></td>
                                        <td> <?php echo AdminController::getUserDni($value->id_usuario); ?></td>
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
                                                        <input type="hidden" value="<?php echo $value->id_usuario; ?>" name="user"/>
                                                        No pagado  <button type="sumbit" name="pay" class="btn btn-primary btn-sm">Pagar</button>
                                                    </form>
                                                </div>
                                                <?php } else {
                                                ?>
                                                <div style="color:green;">
                                                    
                                                        Pagado 
                                                    
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
                    <!--Tabla de padel-->

                    <div class="col-sm-8">
                        <h2>Padel</h2>
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
                                $fecha = PavilionController::reOrderDate($dateAcc = date("Y-m-d"));
                                $timeIn = 10;
                                $timeOut = 11;

                                foreach ($rentsPaddle as $key => $value) {
                                    ?>

                                    <tr class="text-center  <?php
                                    if ($i % 2 == 0) {
                                        echo 'table-secondary';
                                    }
                                    ?> ">
                                        <td> <?php echo $value->id_pista; ?></td>
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
                                                <?php } else {
                                                ?>
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


 <!--Tabla de padel-->

                    <div class="col-sm-8">
                        <h2>Campo de Futbol</h2>
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
                                $fecha = PavilionController::reOrderDate($dateAcc = date("Y-m-d"));
                                $timeIn = 10;
                                $timeOut = 11;

                                foreach ($rentsFootbalField as $key => $value) {
                                    ?>

                                    <tr class="text-center  <?php
                                    if ($i % 2 == 0) {
                                        echo 'table-secondary';
                                    }
                                    ?> ">
                                        <td> <?php echo $value->id_pista; ?></td>
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
                                                <?php } else {
                                                ?>
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

    echo 'ehhhhh, que haces aqui? a la puta calleeee';
}
?>