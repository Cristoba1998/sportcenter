<nav class="navbar navbar-expand-md navbar-dark bg-info fixed-top">
    <a class="navbar-brand" href="http://localhost/Centro%20Deportivo%20Benameji/">
        <i class="fa fa-gamepad" aria-hidden="true">
            &nbsp;
        </i>
        <img alt="Brand" src="http://localhost/Centro%20Deportivo%20Benameji/sources/benameji_escudo.png" height="40px" whith="40px">
    </a>
    <a class="navbar-brand" href="http://localhost/Centro%20Deportivo%20Benameji/">C.D. Benameji</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="http://localhost/Centro%20Deportivo%20Benameji/">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Instalaciones
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="http://localhost/Centro%20Deportivo%20Benameji/views/PavilionView.php">Fútbol Sala</a>
                    <a class="dropdown-item" href="http://localhost/Centro%20Deportivo%20Benameji/views/PaddleView.php">Padel</a>
                    <a class="dropdown-item" href="http://localhost/Centro%20Deportivo%20Benameji/views/PavilionView.php">Baloncestoe</a>
                    <a class="dropdown-item" href="http://localhost/Centro%20Deportivo%20Benameji/views/FootbalFieldView.php">Fútbol 11</a>
                    <a class="dropdown-item" href="http://localhost/Centro%20Deportivo%20Benameji/views/FootbalFieldView.php">Fútbol 7</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Información e la web</a>
            </li>
        </ul>
        <?php 
        
       // if (@$_SESSION['usuarioNegativo'] !=2 ) { 
            //echo $_SESSION['usuarioNegativo'];
            ?>
            <ul class="navbar-nav  float-right mt-2 mt-md-0">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Centro%20Deportivo%20Benameji/views/user/Loging.php">Iniciar Sesión</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="http://localhost/Centro%20Deportivo%20Benameji/views/user/Register.php">Registrarse</a>
                </li>
            </ul> 
            <?php
      //  }
        ?>
    </div>
</nav>
