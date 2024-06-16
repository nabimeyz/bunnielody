<!--Metztli Huertero Granada, Proyecto final Sitios web con transacciones en linea-->
<?php 
    //conexión de base de datos y funciones de carrito
    require __DIR__ . '/../carrito/database.php';
    require  __DIR__ . '/../carrito/carrito.php';
    $db = new Database ();
    $con = $db->conectar();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!--hoja de estilos - bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/styles/pagPago.css">
    
    <!--Titulo e icono de barra de navegación-->
    <title>Bunnielody - Procesando tu pago</title>
    <link rel="icon" href="/imagenes/conejito.png" type="image/x-icon">

    <!--Script de funciones de paypal-->
    <script src="https://www.paypal.com/sdk/js?client-id=AQkBZPZfUgfEenEcSfqAQJHAVsRaZCByw9cdLuIZ_cgHPvmPxZUV4x2csDo42uF2LfMOP5cRsffKKE5g&currency=MXN" data-sdk-integration-source="button-factory"></script>

</head>

<body> <!--Cuerpo de la página-->
<header> <!--Parte superior de la página-->
    <div> <!--Logo-->
       <a href="/index.php"><img id="logobunny" src="/sobreMi/imagenes/logo.jpg" alt="logo de la página"></a> 
    </div>
    <nav>
        <ul>
            <p class="lead" id="procesoMsj">Vamos a procesar tu pago</p>
        </ul>
    </nav>
</header>

<section id="resumen">
<?php
if($_POST) {
    $total = 0;
    $SID =session_id(); //tomar el id de la sesion activa
    $Correo = $_POST['email'];

    foreach($_SESSION['CARRITO'] as $indice => $producto) {
        $total += ($producto['PRECIO'] * $producto['CANTIDAD']);}
}
$sentencia = $con ->prepare ("INSERT INTO `venta` (`id_venta`, `claveTransaccion`, `paypalDatos`, `fecha`, `correo`, `total`, `status`) VALUES (NULL,:claveTransaccion, '', NOW(), :correo, :total, 'pendiente');");

$sentencia->bindParam(":claveTransaccion", $SID);
$sentencia->bindParam(":correo", $Correo);
$sentencia->bindParam(":total", $total);
$sentencia->execute();

//recuperar id de venta
$idVenta = $con->lastInsertId();

foreach($_SESSION['CARRITO'] as $indice => $producto) {
    $sentencia = $con ->prepare ("INSERT INTO `detalleventa` (`id_detalle`, `id_venta`, `id_producto`, `precioUnitario`, `cantidad`, `entrega`) VALUES (NULL, :id_venta, :id_producto, :precioUnitario, :cantidad, '0');");

    $sentencia->bindParam(":id_venta", $idVenta);
    $sentencia->bindParam(":id_producto", $producto['ID']); //SI NO ES, ES id_producto
    $sentencia->bindParam(":precioUnitario", $producto['PRECIO']);
    $sentencia->bindParam(":cantidad", $producto['CANTIDAD']);
    $sentencia->execute();
}
?>

<!--Empieza sección de mensaje de redireccionamiento-->

<div class="jumbotron">
    <h1 class="display-4">Ya casi está</h1>
    <hr class="my-4">
    <p class="lead">Estas a punto de pagar con Paypal, la cantidad de: <strong>$<?php echo number_format($total, 2); ?> MXN</strong></p>
    
    <br> <br>
    <p class="lead">Podras descargar tu comprobante de pago una vez que éste se procese.<br>En caso de alguna duda o aclaración, envíe un mensaje con su número de pedido al correo <strong>metztli.hugr@gmail.com</strong></p>
    <br> <br> 
    <div id="smart-button-container">
      <div style="text-align: center;">
        <div id="paypal-button-container"></div>
      </div>
    </div>
</div>

<!--Aqui empieza el script de paypal-->
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'rect',
          color: 'gold',
          layout: 'vertical',
          label: 'pay',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"description":"Compra en Bunnielody","amount":{"currency_code":"MXN","value":"<?php echo $total; ?>"}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
            
            // Full available details
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            window.location.href = '/carrito/gracias.php';
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
<!--Aquí termina el script de paypal-->
</section>

</body>

</html>