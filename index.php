<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/index.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <script src="https://kit.fontawesome.com/cef286b8a7.js" crossorigin="anonymous"></script>
    <title>Inicio</title>
</head>
<body>
    <header>
        <div id="logoh">
            <img class="icono" src="img/logo.png" alt="icono empresarial">
            <h1 class="nombre">Megavinilos</h1>
        </div>

        <div id="buscador">
            <input type="text" placeholder="Buscar...">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>

        <nav id="menu">
            <ul class="nav">
                <li><a href="index.php">Inicio</a></li>
                <li>
                    <a href="#">Categorías</a>
                    <ul class="Submenu">
                        <li><a href="#">Interiores</a></li>
                        <li><a href="#">Exteriores</a></li>
                        <li><a href="#">Accesorios</a></li>
                    </ul>
                </li>
                <li><a href="#">Carrito</a></li>
                <li><a href="#">¿Quiénes somos?</a></li>

                <li><a href="#"><i class="fa-solid fa-user fa-lg"></i></a>
                    <ul class="Submenu">
                        <?php if (isset($_SESSION['username'])): ?>
                            <li><a href="#">Hola, <?php echo htmlspecialchars($_SESSION['username']); ?></a></li>
                            <li><a href="php/logout.php">Cerrar sesión</a></li>
                        <?php else: ?>
                            <li><a href="login.php">Iniciar Sesión</a></li>
                            <li><a href="register.php">Registrarse</a></li>
                            <li><a href="#">PQRS</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="carrusel">
            <ul>
                <li><img src="img/carrusel 1.jpg" alt=""></li>
                <li><img src="img/carrusel 2.jpg" alt=""></li>
                <li><img src="img/carrusel 3.jpg" alt=""></li>
                <li><img src="img/carrusel 4.jpg" alt=""></li>
            </ul>
        </div>

        <div class="categorias">
            <div class="carta" style="--clr: #009688">
                <div class="categoria-img">
                    <img src="img/is.png" alt="">
                </div>
                <div class="contenido">
                    <h2>Interiores</h2>
                    <p>Vinilos ideales para transformar espacios interiores con estilo, color y durabilidad. Diseños modernos y fáciles de aplicar para renovar cualquier ambiente.</p>
                    <a href="#">Ver Más</a>
                </div>
            </div>

            <div class="carta" style="--clr: #FF3E7F">
                <div class="categoria-img">
                    <img src="img/is.png" alt="">
                </div>
                <div class="contenido">
                    <h2>Exteriores</h2>
                    <p>Vinilos resistentes al clima, perfectos para fachadas y superficies al aire libre. Protege y decora con calidad profesional.</p>
                    <a href="#">Ver Más</a>
                </div>
            </div>

            <div class="carta" style="--clr: #180047">
                <div class="categoria-img">
                    <img src="img/is.png" alt="">
                </div>
                <div class="contenido">
                    <h2>Accesorios</h2>
                    <p>Todo lo que necesitas para una aplicación perfecta: brochas, rodillos, escaleras y más. Herramientas prácticas para resultados impecables.</p>
                    <a href="#">Ver Más</a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <div class="contenedor">
            <div class="logof">
                <img src="img/logo.png" alt="">
                <p>CLL. 14 #20-58 LA CHE <br>Armenia, Quindío</p>
            </div>

            <div class="columna">
                <ul class="ftr">
                    <li><a href="index.php">Inicio</a></li>
                    <li><a href="#">Carrito</a></li>
                    <li><a href="#">¿Quiénes Somos?</a></li>
                </ul>
            </div>

            <div class="columna">
                <ul>
                    <li><a href="login.php">Iniciar Sesión</a></li>
                    <li><a href="register.php">Registrarse</a></li>
                    <li><a href="#">Política de Privacidad</a></li>
                </ul>
            </div>

            <div class="columna">
                <p>Comuníquese con nosotros</p>
                <div class="contactos">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/mega_vinilos?igsh=ZnB6am1xdDZveHcw"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
                    <a href="#"><i class="fa-solid fa-envelope"></i></a>
                </div>
            </div>
        </div>

        <div class="creditos">
            <p>&copy; Grupo 8. All rights reserved. Designed by Melanie Ariza</p>
        </div>
    </footer>
</body>
</html>
