<?php
// Se recuperan los datos enviados por POST desde el formulario
$cliente  = $_POST['cliente'];
$producto = $_POST['producto'];
$precio   = (float) $_POST['precio'];
$cantidad = (int) $_POST['cantidad'];

// Cálculo del subtotal
$subtotal = $precio * $cantidad;

// Determinación del porcentaje de descuento según el subtotal
if ($subtotal < 100) {
    $porcentajeDescuento = 0;
} elseif ($subtotal >= 100 && $subtotal <= 299.99) {
    $porcentajeDescuento = 5;
} elseif ($subtotal >= 300 && $subtotal <= 499.99) {
    $porcentajeDescuento = 10;
} else {
    $porcentajeDescuento = 15;
}

// Cálculo del monto de descuento y del total a pagar
$montoDescuento = $subtotal * ($porcentajeDescuento / 100);
$total = $subtotal - $montoDescuento;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado de la compra</title>
</head>
<body>
    <h1>Resultado de la compra</h1>

    <p><strong>Cliente:</strong> <?php echo htmlspecialchars($cliente); ?></p>
    <p><strong>Producto:</strong> <?php echo htmlspecialchars($producto); ?></p>
    <p><strong>Subtotal:</strong> S/ <?php echo number_format($subtotal, 2); ?></p>
    <p><strong>Descuento aplicado:</strong> <?php echo $porcentajeDescuento; ?>% (S/ <?php echo number_format($montoDescuento, 2); ?>)</p>
    <p><strong>Total a pagar:</strong> S/ <?php echo number_format($total, 2); ?></p>

    <br>
    <a href="index.php">Registrar otra compra</a>
</body>
</html>
