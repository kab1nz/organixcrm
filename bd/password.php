<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="estilo.css">
    <link rel="stylesheet" href="Estilo/medialogin.css">


    <title>Document</title>

</head>

<body>
    <center>
        <img src="Imagenes/LogoOrganix.png" alt="">
        <br>
        <h3 class="h3">Solicitud para restablecer la contraseña

        </h3>
        <div class="mt"></div>
        <p style="width:30%;">Escriba su dirección de correo electrónico o número de móvil registrado en el espacio a continuación y le enviaremos las instrucciones de restablecimiento de contraseña.
        </p>
        <br>
        <form id="frmRestablecer" action="cambiarpassword.php" method="post">
            <label for="email">Email:</label>
            <input type="email" class="form-control w20" id="email" placeholder="Enter email" name="email">
            </div>


            <br>
            <div class="g-recaptcha" data-sitekey="6LdLiEIUAAAAAAZ5INZvBx5BtJf491qVwivA2O4u"></div>
            <br>
            <small>The letters are case-sensitive
                </small>
            <br>

            <button type="submit" class="btn btnrojo">Solicitud</button>
            <a href="login.html"><button type="button" class="btn btn-default" style="margin-left:40px;height:35px;"> Volver a iniciar sesión</button></a>
        </form>
        <footer>
            <div class="mt"></div>
            <div class="copyright sm-text-center">
                <p class="small no-margin pull-left sm-pull-reset text-center">
                    <span class="hint-text">Copyright © 2017 </span>
                    <span class="font-montserrat">Navarro Rubio Informática</span>
                    <span class="hint-text p-r-10">Todos los derechos reservados.</span>
                    <span class="sm-block"><a href="#/Backend/Home/Terms" class="m-r-10">Términos de uso</a> | <a href="#/Backend/Home/Privacy" class="m-l-10 m-r-10">Política de privacidad</a> | <a id="lng" href="javascript:void(0);" class="m-l-10 dropup"><span>Idioma</span>:
                    <span id="lngtxt">Español</span></a>
                    </span>
                    <span class="hint-text p-r-10 text-right">Versión: 2017.6.23.1502</span>

                </p>


            </div>
        </footer>
    </center>
    <script src='https://www.google.com/recaptcha/api.js?hl=es'></script>

</body>

</html>