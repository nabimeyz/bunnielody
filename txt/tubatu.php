<?php 
    //conexión de base de datos y funciones de carrito
    require __DIR__ . '/../carrito/database.php';
    require  __DIR__ . '/../carrito/carrito.php';
    $db = new Database ();
    $con = $db->conectar();

    $sql = $con->prepare("SELECT id_productos, nombre, precio FROM productos WHERE existencia = 1 AND id_grupo = 2");
    $sql->execute();
    $resultado = $sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!--metadatos-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0  maximum-scale=1.0, user-scalable=no">
    <!--Titulo e icono de barra de navegación-->
    <title>Bunnielody - TXT</title>
    <link rel="icon" href="/imagenes/conejito.png" type="image/x-icon">

    <!--enlaces a hojas de estilo-->
    <link rel="stylesheet" href="/styles/txtMain.css">

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
           <a href="/index.php"><img id="logobunny" src="/sobreMi/imagenes/logo.jpg" alt="logo de la página"></a> 
        </div>
    
        <nav> <!--Barra de navegación-->
            <ul>
                <a href="/bts/bts.php"><li>BTS</li></a>
                <a href="/nj/newJeans.php"><li>NewJeans</li></a>
                <a href="/txt/tubatu.php"><li>TXT</li></a>
                <a href="/quienesSomos/quienesSomos.html"><li>Quienes Somos</li></a>
                <a href="/carrito/carritoPag.php"><li>Carrito (<?php
                    echo (empty($_SESSION['CARRITO']))?0:count($_SESSION['CARRITO']);?>)</li></a>  
            </ul>
        </nav>
    </header>

    <main>
        <!--presentación de formulario-->
            <section id="presentacion">
               <h2>Compra tus productos favoritos de TXT</h2> 
               <br>
               <p>La banda de chicos que ha capturado corazones con su frescura y energía juvenil. Aquí podrás adquirir álbumes y DVDs, incluyendo versiones limitadas y con firmas de autógrafos. Nuestra colección de ropa y accesorios presenta diseños únicos en camisetas, mochilas y pulseras. También contamos con lightsticks y merchandising de conciertos para que disfrutes al máximo de las presentaciones de TXT. <br> <br><strong>Nota:</strong> por el momento solo contamos con stock de albumes, espera al restock del siguiente mes.</p>
            </section>
            
            <section id="sectionGroup">
                <img id="imgGroup" src="https://i.pinimg.com/564x/8c/29/b3/8c29b3557ac36df96edbe05c15ee6c3b.jpg" alt="icono de duda">
            </section>
    </main>

    <div class="separacion"> <!--Seṕaración y título de sección-->
        <h2>Productos disponibles</h2>
    </div>

    <!--Listado de productos en venta-->
<section id="productos">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        <?php foreach ($resultado as $row) { ?>
            <div class="col">
            <div class="card shadow-sm">

            <?php 
            $id = $row["id_productos"];
            $imagen = "../imagenes/productos/$id/item.jpg";

            if (!file_exists(__DIR__ . "/$imagen")) {
                $imagen = "../imagenes/nofoto.jpg"; // Ruta a la imagen de "No disponible"
            }
            ?>
            
            <img src="<?php echo $imagen?>" alt="imagen del producto">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $row['nombre']; ?></h5>
                    <p class="card-text">$<?php echo $row['precio']; ?> MXN</p>
                <div class="d-flex justify-content-between align-items-center"></div>
                    <div class="btn-group">
                        <form action="" method="post">
                        <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($row['id_productos'],COD,KEY); ?>">
                        <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($row['nombre'],COD,KEY); ?>">
                        <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($row['precio'],COD,KEY); ?>">
                        <input type="hidden" name="cantidad" value="1" min="1">

                        <button class="btn btn-outline-primary"
                             type="submit"
                             value="agregar"
                             name="btnAccion">Agregar al carrito</button> 
                        </form>    
                    </div>
                </div>
                </div>
            </div>
        <?php  }?>
        </div>
    </div>

    <?php
    if ($mensaje!=""){?>
    <div class="alert alert-success" id="estadoCompra">
        <?php echo ("Producto agregado al carrito");?>
    </div>
    <?php } ?>

</section>     

    <footer>
        <section id="etiquetas">
            <h4>Sitios de interés</h4> <br>
            <ul id="sitiosInteres">
                <a href="/index.php"><li>Inicio</li></a>
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