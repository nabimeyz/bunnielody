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
    <link rel="stylesheet" href="/styles/carritoStyle.css">
    
    <!--Titulo e icono de barra de navegación-->
    <title>Bunnielody - Carrito</title>
    <link rel="icon" href="/imagenes/conejito.png" type="image/x-icon">

    <!--importación de elementos para funcionamiento del carrusel-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

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


<!--Resumen del carrito-->
<section id="resumen">
<h2 id="titlecarrito">Carrito</h2>
<p id="resumenP">Este es el resumen de tu compra:</p>
    <?php if (!empty($_SESSION['CARRITO'])){?>
    <table class="table table-bordered table-light">
        <tbody>
            <tr>
                <th width="40%">Descripción</th>
                <th width="15%">Cantidad</th>
                <th width="20%">Precio</th>
                <th width="20%">Total</th>
                <th width="5%">--</th>
            </tr>
            <?php $total=0;?>
            <?php foreach ($_SESSION['CARRITO'] as $indice => $producto){?>
                <tr>
                <td width="40%" class="tdDescripcion"><?php echo htmlspecialchars($producto['NOMBRE']); ?></td>
                <td width="15%"><?php echo intval($producto['CANTIDAD']); ?></td>
                <td width="20%">$<?php echo number_format(floatval($producto['PRECIO']), 2); ?></td>
                <td width="20%">$<?php echo number_format(floatval($producto['PRECIO']) * intval($producto['CANTIDAD']), 2); ?></td>
                <td width="5%">
                    <form action="" method="post">
                    <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY); ?>">
                       <button 
                       class="btn btn-danger"
                       type="submit"
                       name="btnAccion"
                       value="eliminar">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php $total += floatval($producto['PRECIO']) * intval($producto['CANTIDAD']); ?>
            <?php } ?>
            <tr>
                <td colspan="5"></td>
            </tr>
            <tr class="totalinfo">
                <td></td>
                <td colspan="2" align="right"><strong>Total</strong></td>
                <td align="right">$<?php echo number_format($total, 2); ?></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    
    <section id="procesaCompra">
    <form action="pagar.php" method="post">
        <div class="alert alert-info">
            <div class="form-group">
            <p id="resumenP">Por favor, ingrese el correo de contacto a donde le haremos llegar la información de su pedido.</p>
            <input id="email" name="email" class="form-control" type="email" placeholder="Ingrese un correo valido" required>
            </div>
        </div>
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnAccion" value="proceder" id="btnpago">Continúe con el pago</button>
        <br>
        <br>
        <a href="/index.php#introduccion"> o puede regresar a la tienda</a>
    </form>
    </section>
<?php } else {?>
<div class="alert alert-success">
    No hay productos en el carrito
</div>
<?php }?>
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