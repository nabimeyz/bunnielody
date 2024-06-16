<!--Metztli Huertero Granada, Proyecto final Sitios web con transacciones en linea-->
<?php 
    //conexión de base de datos y funciones de carrito
    require __DIR__ . '/../carrito/database.php';
    require  __DIR__ . '/../carrito/carrito.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--hoja de estilos - bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/graciasStyle.css">
    
    <!--Titulo e icono de barra de navegación-->
    <title>Bunnielody - Gracias por tu compra</title>
    <link rel="icon" href="/imagenes/conejito.png" type="image/x-icon">

<body> <!--Cuerpo de la página-->
<header> <!--Parte superior de la página-->
    <div> <!--Logo-->
       <a href="/index.php"><img id="logobunny" src="/sobreMi/imagenes/logo.jpg" alt="logo de la página"></a> 
    </div>
    <nav>
        <ul>
                <a href="/bts/bts.php"><li>BTS</li></a>
                <a href="/nj/newJeans.php"><li>NewJeans</li></a>
                <a href="/txt/tubatu.php"><li>TXT</li></a>
                <a href="/quienesSomos/quienesSomos.html"><li>Quienes Somos</li></a>
        </ul>
    </nav>
</header>

<?php // Destruye todos los datos de la sesión actual
session_destroy();?>

<!--Resumen del carrito-->
<section id="resumen">
    <h2 id="titlecarrito">Muchas gracias por tu compra</h2>
    <p id="resumenP">En breve recibirás un correo con los detalles de tu compra, así como los plazos y detalles del proceso de entrega de tus productos. Esperamos que tu experiencia con Bunnielody haya sido la mejor.</p>
</section>

    <section id="redireccionamiento">
        <a href="/index.php#introduccion">Regresar a la tienda</a>
    </section>
        

<!--Footer-->
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