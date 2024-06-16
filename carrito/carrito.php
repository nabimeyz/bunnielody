<?php
//inicio de sesion php
session_start();
//Variables
$mensaje="";
$ID="";
$NOMBRE="";
$CANTIDAD="";
$PRECIO="";

if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'agregar':
            //validacion id
            if(is_numeric(openssl_decrypt ( $_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt ( $_POST['id'], COD, KEY);
                $mensaje = "Recibido id: ".$ID;
            } else {
                $mensaje = "id incorrecto: ".$ID;
            }

            //validacion nombre
            if(is_string(openssl_decrypt ( $_POST['nombre'], COD, KEY))) {
                $NOMBRE = openssl_decrypt ( $_POST['nombre'], COD, KEY);
                $mensaje = "Recibido nombre: ".$NOMBRE;
            } else {
                $mensaje = "nombre incorrecto: ".$NOMBRE;
            }

             //validacion cantidad
             if (is_numeric($_POST['cantidad'])) {
                $CANTIDAD = intval($_POST['cantidad']);
                $mensaje .= "Recibido cantidad: " . $CANTIDAD . "<br>";
            } else {
                $mensaje .= "Cantidad incorrecta: " . $CANTIDAD . "<br>";
            }

            //validacion precio
            if(is_numeric(openssl_decrypt ( $_POST['precio'], COD, KEY))) {
                $PRECIO = openssl_decrypt ( $_POST['precio'], COD, KEY);
                $mensaje = "Recibido precio: ".$PRECIO;
            } else {
                $mensaje = "precio incorrecto: ".$PRECIO;
            }    

            //agregar valores al carrito por sesion
            if (!isset($_SESSION['CARRITO'])){
                $producto = array (
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO
                );
                $_SESSION ['CARRITO'] [0] = $producto;
            } else {
                $numProd = count ($_SESSION['CARRITO']);
                $producto = array (
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO
                );
                $_SESSION ['CARRITO'] [$numProd] = $producto;
            }

            $mensaje= print_r($_SESSION, true);

        break; }
}

?>