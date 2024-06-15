<!--metadatos-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0  maximum-scale=1.0, user-scalable=no">
    <!--Titulo e icono de barra de navegación-->
    <title>Bunnielody - NewJeans</title>
    <link rel="icon" href="/imagenes/conejito.png" type="image/x-icon">

    <!--enlaces a hojas de estilo-->
    <link rel="stylesheet" href="/styles/njMain.css">

    <!--Importación de fuentes externas: tipografías-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
    

<!--inicio del body-->
<body>
    <header> <!--Parte superior de la página-->

        <div> <!--Logo-->
           <a href="/index.html"><img id="logobunny" src="/sobreMi/imagenes/logo.jpg" alt="logo de la página"></a> 
        </div>
    
        <nav> <!--Barra de navegación-->
            <ul>
                <a href="/bts/bts.php"><li>BTS</li></a>
                <a href="/nj/newJeans.php"><li>NewJeans</li></a>
                <a href="/txt/tubatu.php"><li>TXT</li></a>
                <a href="/quienesSomos/quienesSomos.html"><li>Quienes Somos</li></a>
                <a href="/carrito/carrito.php"><img id="carrito" src="/imagenes/carrito.png" alt="carrito"></a>  
            </ul>
        </nav>
    </header>

    <main>
        <!--presentación de formulario-->
            <section id="presentacion">
               <h2>Compra tus productos favoritos de NewJeans</h2> 
               <br>
               <p>La nueva sensación del K-pop está marcando tendencias con su estilo único y música innovadora. Descubre los álbumes y DVDs de NewJeans en diferentes formatos y ediciones. Prepara todo lo necesario para sus presentaciones en vivo con nuestros lightsticks y merchandising de conciertos.</p>
            </section>
            
            <section id="sectionGroup">
                <img id="imgGroup" src="https://i.pinimg.com/564x/d2/8f/ae/d28fae83b289d573de3fbf0e2c140302.jpg" alt="icono de grupo">
            </section>
    </main>

    <div class="separacion"> <!--Seṕaración y título de sección-->
        <h2>Productos disponibles</h2>
    </div>

<!--Sección de productos en venta-->
    <section id="productos">

        <div class="album py-5 bg-body-tertiary">
            <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                <div class="card shadow-sm">
                    <img src="https://i.pinimg.com/564x/90/f0/f9/90f0f9afeccf7d4ae77a3aa381f19f89.jpg" alt="album get up">
                    <div class="card-body">
                    <h5 class="card-title">Get Up, versión especial (TPG x NJ)</h5>
                    <p class="card-text">$579.00 MXN</p>
                    <div class="d-flex justify-content-between align-items-center"></div>
                        <div class="btn-group">
                            <a href="" class="btn btn-success">Al carrito</a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col">
                <div class="card shadow-sm">
                    <img src="https://i.pinimg.com/564x/64/4c/32/644c3257b1e147ec52c5e1c76002dae9.jpg" alt="">
                    <div class="card-body">
                    <h5 class="card-title"> 1st EP 'New Jeans' Weverse Albums version</h5>
                    <p class="card-text">$420.00 MXN</p>
                    <div class="d-flex justify-content-between align-items-center"></div>
                        <div class="btn-group">
                            <a href="" class="btn btn-success">Al carrito</a>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="col">
                <div class="card shadow-sm">
                    <img src="https://i.pinimg.com/564x/27/ec/63/27ec63a6bd5926a9d7635bc1a3a20ebe.jpg" alt="">
                    <div class="card-body">
                    <h5 class="card-title">NewJeans Lightstick</h5>
                    <p class="card-text"> $980.00 MXN</p>
                    <div class="d-flex justify-content-between align-items-center"></div>
                        <div class="btn-group">
                            <a href="" class="btn btn-success">Al carrito</a>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>

    </section>

    <footer>
        <section id="etiquetas">
            <h4>Sitios de interés</h4> <br>
            <ul id="sitiosInteres">
                <a href="/index.html"><li>Inicio</li></a>
                <a href="/sobreMi/sobreMi.html"><li>¿Quién creó el sitio?</li></a>
                <a href="/formContacto/formContacto.html"><li>Contáctanos</li></a>
                <a href="/metodoPago/pago.html"><li>Métodos de pago</li></a>
            </ul>
        </section>
        <section id="logo">
            <img src="/sobreMi/imagenes/logo.jpg" alt="logo">
            <p>© 2024. Metztli Huertero Granada</p>
        </section>
    </footer>

</body>
</html>
