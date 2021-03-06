<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Centro Deportivo Benameji</title>

        <style>
            @import url(//fonts.googleapis.com/css?family=Lato:300);



            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
            }

            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
            .carousel-caption { 
                position: absolute; 
                z-index: 1; 
                display:table; 
                width:100%; 
                height:100%; 
            } 

            .absolute-div { 
                position: absolute; 
                top: 0; 
                left: 0; 
                right: 400px; 
                bottom: 25%; 
            } 

            .carousel-caption h2 { 
                display:table-cell; 
                vertical-align: middle; 
                text-align:center; 
                color: white;
                font-family: fantasy;
                font-size: 100px;
                text-shadow: 2px 0 0 #000, -2px 0 0 #000, 0 2px 0 #000, 0 -2px 0 #000, 1px 1px #000, -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000;
            } 

            .item { 
                position:relative; 
            } 







            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            *:before, *:after {
                box-sizing: border-box;
                padding: 0;
                margin: 0;
            }

            body {
                font-family: Lato, Arial, "Hiragino Kaku Gothic Pro W3", Meiryo, sans-serif;
                background-color: #f1f1f1;
                color: #464646;
                text-align: center;
                margin: 0 auto;
            }
            body a, body a:visited {
                color: #555;
                text-decoration: none;
            }
            body a:hover {
                color: #444;
            }

            article figure::after, article figure .image, article figure .lighting, article .item-content {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
            }

            article .item-wrapper, article .item-content {
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
            }

            article .item-wrapper, article figure, article .item-content {
                -webkit-transform-style: preserve-3d;
                transform-style: preserve-3d;
            }

            article {
                position: relative;
                display: inline-block;
                vertical-align: top;
                width: calc(33.33% - 4%);
                height: 24vw;
                margin: 1.8%;
                -webkit-perspective: 1600px;
                perspective: 1600px;
                cursor: pointer;
            }
            article .item-wrapper {
                width: 100%;
                height: 100%;
                box-shadow: 0 0 4px rgba(0, 0, 0, 0.1);
            }
            article .item-wrapper::before {
                content: '';
                position: absolute;
                top: 5%;
                left: 5%;
                width: 90%;
                height: 90%;
                -webkit-transition: all .2s ease-in;
                transition: all .2s ease-in;
                box-shadow: 0 8px 38px rgba(0, 0, 0, 0.86);
            }
            article .item-wrapper:hover::before {
                box-shadow: 0 14px 64px rgba(0, 0, 0, 0.92);
            }
            article .item-wrapper.enter.ease, article .item-wrapper.leave {
                -webkit-transition: all .1s ease-in;
                transition: all .1s ease-in;
            }
            article figure {
                width: 100%;
                height: 100%;
            }
            article figure::after {
                content: '';
                background-color: rgba(0, 0, 0, 0.06);
            }
            article figure .image {
                background-position: center;
                background-size: cover;
            }
            article figure .lighting {
                background: -webkit-linear-gradient(315deg, rgba(255, 255, 255, 0.24) 0%, rgba(255, 255, 255, 0) 100%);
                background: linear-gradient(135deg, rgba(255, 255, 255, 0.24) 0%, rgba(255, 255, 255, 0) 100%);
            }
            article .item-content {
                pointer-events: none;
                padding: 20% 20px 20px;
                color: #fff;
                text-shadow: 0 3px 10px rgba(0, 0, 0, 0.76);
            }
            article .item-content h1 {
                margin-bottom: 5%;
                -webkit-transform: translateZ(100px);
                transform: translateZ(100px);
                font: 150% sans-serif;
                color: black;
                font-size: 40px;

            }
            article .item-content p {
                font-size: 13px;
                margin-bottom: 5%;
                -webkit-transform: translateZ(50px);
                transform: translateZ(50px);
                font-size: 30px;
            }
            article .item-content .author {
                -webkit-transform: translateZ(70px);
                transform: translateZ(70px);
            }

            @media (max-width: 860px) {
                article {
                    width: calc(50vw - 3.9vw);
                    height: 38vw;
                }
            }
            @media (max-width: 667px) {
                article {
                    width: calc(100vw - 3.9vw);
                    height: 60vw;
                }
            }
        </style>
        <script>
            $('.carousel').carousel({
                interval: 10000
            });
        </script>
        <!-- Custom styles for this template -->
        <link href="navbar-top-fixed.css" rel="stylesheet">
    </head>
    <body>
<?php
require_once "../../models/User.php";
require_once "../../controllers/registerController.php";
echo 'Registro';
 include '../../components/general-components/Navbar.php';
?>
        <br><br><br>
<form action="" method="post">
    Nombre:<input type="text" name="name"><br><br>
    Apellidos:<input type="text" name="surnames"><br><br>
    DNI:<input type="text" name="dni"><br><br>
    Numero de telefono:<input type="text" name="numberPhone"><br><br>
    Correo electrónico<input type="email" name="email"><br><br>
    Contraseña:<input type="password" name="pass"><br><br>
    Repita la contraseña:<input type="password" name="pass2"><br><br>
    Empresa:<input type="text" name="company"> <br><br>
    <input type="submit" value="Registrarse" name="register">
</form>

<?php
if (isset($_REQUEST['register'])) {
    $newUser = new User(1, $_REQUEST['name'], $_REQUEST['surnames'], $_REQUEST['dni'], $_REQUEST['numberPhone'], $_REQUEST['email'], $_REQUEST['pass'], $_REQUEST['company'], "usuario", 0);
    registerController::insertUser($newUser);
}
?>
    </body>
</html>
