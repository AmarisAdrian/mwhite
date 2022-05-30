<?php

/*!
 * Creditos MWhite v2.0.0 (https://creditos.mwhite.com.co/)
 * Copyright 2019-2020 Muto Estudio
 * Copyright 2019-2020 MWhite Store.
 * 
 */

/* validate if installed */
$config_file =  __DIR__ . '/includes/config.php';
if (!file_exists($config_file)) {
    $new_config_file = fopen('includes/config.php', "w");
    if ($new_config_file) {
        header('Location: install/index.php');
    }
    echo "You don't have the necessary permissions please contact technical support";
    exit;
}

/* initialize webapp */

require_once("./includes/initialize.php");

$title =  $syatem_title;

date_default_timezone_set($time_zone);
if (isset($_SESSION['accountStatus'])) {
    if ($_SESSION['accountStatus'] == 2) {
        redirectTo($url . "client/index.php");
    }
    if ($_SESSION['accountStatus'] == 1) {
        redirectTo($url . "admin/index.php");
    }
    if ($_SESSION['accountStatus'] == 3) {
        redirectTo($url . "staff/index.php");
    }
}
?>

<?php include("templates/frontend-header.php"); ?>

<?php if (isset($_GET['message']) == 'installed') : ?>
    <div class="error-message">
        Congratulations! Your System Installed Successfully, Please remove 'Install' folder from your installation directory to secure your Installation.
    </div>
<?php endif; ?>
<main>
    <header class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm">
        <div class="my-0 mr-md-auto">
            <a class="logo" href="<?php echo $url; ?>">
                <?php if ($login_page_logo) : ?>
                    <img class="img-fluid" src="<?php echo $url . $img_path . $login_page_logo; ?>" alt="<?php echo $title; ?>" />
                <?php else : ?>
                    <img class="img-fluid" src="<?php echo $url; ?>assets/images/login-logo.png" alt="<?php echo $title; ?>" />
                <?php endif; ?>
            </a>
        </div>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 scroll-to" href="#inicio">Inicio</a>
            <a class="p-2 scroll-to" href="#">Nosotros</a>
            <a class="p-2 scroll-to" href="#">¿Qué comprar?</a>
            <a class="p-2 scroll-to" href="#">Simula tu crédito</a>
            <a class="p-2 scroll-to" href="#">Ayuda</a>
        </nav>
        <a class="btn btn-outline-primary" href="register.php">Crear cuenta</a>
        <a class="btn mx-2 btn-primary" href="login.php">Ingresar</a>
    </header>
    <section class="banner-top" id="inicio">
        <div class="row">
            <div class="col col-sm-12 col-md-4 col-lg-5 banner-top__left">
                <h2>Compra eso que más quieres y págalo sin complicaciones</h2>
                <a href="register.php" class="btn mt-2">Descubre cómo <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
            </div>
            <div class="col col-sm-12 col-md-4 col-lg-7 banner-top__right">
                <!-- <img src="./assets/images/banner-top__mosaico.png" alt="Mosaico productos"> -->
            </div>

        </div>
        <div class="row">
            <div class="col col-sm-12 m12 l12 banner-top__botton">
                <ul class="nav justify-content-center nav-justified py-4">
                    <li class="nav-item"><a href="#" class="nav-link">GAFAS</a></li>
                    <li class="nav-item"><a href="#" class="nav-link nav-divider">|</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">RELOJES</a></li>
                    <li class="nav-item"><a href="#" class="nav-link nav-divider">|</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">PERFUMERÍA</a></li>
                    <li class="nav-item"><a href="#" class="nav-link nav-divider">|</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">VIDEOJUEGOS</a></li>
                    <li class="nav-item"><a href="#" class="nav-link nav-divider">|</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">CELULARES</a></li>
                    <li class="nav-item"><a href="#" class="nav-link nav-divider">|</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">PARLANTES</a></li>
                    <li class="nav-item"><a href="#" class="nav-link nav-divider">|</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">CÁMARAS</a></li>
                    <li class="nav-item"><a href="#" class="nav-link nav-divider">|</a></li>
                    <li class="nav-item"><a href="#" class="nav-link">BOLSOS</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="para-comprar">
        <div class="">
            <h1 class="para-comprar__title">Créditos online para que compres <br> todo lo que quieras</h1>
            <h3 class="para-comprar__subtitle">Solicita tu cupo de crédito en sólo 15 minutos y recibe el cupo en máximo un día hábil en tu cuenta Mwhite. <br> Sin trámites, filas, codeudores, anticipos y cargos ocultos. ¿Qué necesitas?</h3>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-sm-12 col-md-4 col-lg-3">
                    <div class="para-comprar__item">
                        <span class="para-comprar__item__text">Solo debes Ser mayor de Edad</span>
                        <div class="para-comprar__item__icon"><img src="<?php echo $url; ?>assets/images/icon-cedula.png" class="img-fluid"></div>
                    </div>
                    <div class="para-comprar__item">
                        <span class="para-comprar__item__text">Contar con un Número celular Propio</span>
                        <div class="para-comprar__item__icon"><img src="<?php echo $url; ?>assets/images/icon-telefono.png" class="img-fluid"></div>
                    </div>
                </div>
                <div class="col col-sm-12 col-md-4 col-lg-6">
                    <img src="<?php echo $url; ?>assets/images/mockup-tarjeta.png" class="img-fluid">
                </div>
                <div class="col col-sm-12 col-md-4 col-lg-3">
                    <div class="para-comprar__item">
                        <span class="para-comprar__item__text">Tener un Correo electrónico Activo</span>
                        <div class="para-comprar__item__icon"><img src="https://mwhite.com.co:81/img/Grupo 175.png" class="img-fluid"></div>
                    </div>
                    <div class="para-comprar__item">
                        <span class="para-comprar__item__text">Ser residente En Colombia</span>
                        <div class="para-comprar__item__icon"><img src="https://mwhite.com.co:81/img/Grupo 173.png" class="img-fluid"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="nosotros" id="nosotros">
        <a class="logo" href="<?php echo $url; ?>">
            <img class="img-fluid" src="<?php echo $url; ?>assets/images/logo-mwhite-light.png" alt="<?php echo $title; ?>" />
        </a>
        <p>
            Somos una empresa joven e innovadora que desde el año 2012 ofrece productos de alta
            calidad, 100% originales de las mejores marcas a nivel mundial. Hoy presenta su nueva
            solución de crédito que se ajusta a las necesidades de nuestros clientes de adquirir sus
            productos favoritos con plazos de pago cómodos.
        </p>
        <hr>
        <p>
            Nuestro modelo nos permite llegar a una población que históricamente no ha tenido acceso a créditos
            formales, por lo que servimos como puerta de entrada al sistema financiero tradicional. Con Mwhite cualquier
            persona en Colombia puede solicitar su cupo de crédito por internet, desde dónde esté y a cualquier hora. En
            solo 15 minutos realizas el proceso y en un día hábil podrás contar con el cupo que estabas necesitando.
        </p>
    </section>
    <section class="categorias">
        <h2 class="categorias__title">Más de 3.000 productos para <br> comprar a cuotas</h2>
        <h3 class="categorias__subtitle">Tenemos una gran variedad de referencias en diferentes categorías de productos, entre relojes de todas las <br> gamas, gafas 100% originales, alta perfumería, accesorios y mucho más.</h3>
    </section>
    <section class="pasos">
        <div class="pasos__container">
            <h2 class="pasos__title">Rápido, fácil y sin restricciones</h2>
            <h3 class="pasos__subtitle">Así es, tan fácil como completar un formulario que no tomará más de 15 minutos, solo debes seguir estos tres simples pasos:</h3>

            <div class="pasos__lista">
                <h6 class="pasos__list__item"><span class="pasos__list__number">1.</span> Completa todos los campos del formulario para formalizar la solicitud.</h6>
                <h6 class="pasos__list__item"><span class="pasos__list__number">2.</span> Sube una foto o escáner de tu documento de identidad por ambas caras.</h6>
                <h6 class="pasos__list__item"><span class="pasos__list__number">3.</span> Cancela el valor del estudio de crédito para finalizar la solicitud y listo!</h6>
            </div>

            <a href="register.php" class="btn mt-2">Descubre cómo <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
        </div>
    </section>
    <section class="cuotas py-3">
        <div class="container">
            <h2 class="cuotas__title">Calcula tus cuotas</h2>
            <div class="row">
                <div class="col col-sm-12 col-md-6 col-lg-6">
                    <div class="cuotas__card">
                        <div class="alert alert-light" role="alert">
                            Selecciona el monto que deseas financiar y luego el número de cuotas. Podrás solicitar tu crédito en tan solo 15 minutos en 3 simples pasos.
                        </div>
                        <h4 class="cuotas__title">¿Cuánto cupo necesitas?</h4>
                        <form oninput="output.value = range.valueAsNumber">
                            <div class="row">
                                <div class="col-sm-12 col-md-3 col-lg-2">
                                    <span class="cuotas__amount">$ 230.000</span>
                                </div>
                                <div class="col-sm-12 col-md-5 col-lg-7">
                                    <div class="range">
                                        <input name="range" type="range" min="230000" max="10000000" value="230000">
                                        <div class="range-output">
                                            <output class="output" name="output" for="range">0</output>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-lg-3">
                                <span class="cuotas__amount">$ 10'000.000</span>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="col col-sm-12 col-md-6 col-lg-6">
                    <div class="cuotas__card">

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php include("templates/frontend-footer.php");

?>