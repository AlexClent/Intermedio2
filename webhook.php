<?php
$secret = "miClaveSecreta12345";

// Asegúrate de que la cabecera HTTP_X_HUB_SIGNATURE esté presente
if (!isset($_SERVER['HTTP_X_HUB_SIGNATURE'])) {
    http_response_code(400);
    echo 'HTTP_X_HUB_SIGNATURE not found';
    exit;
}

$hubSignature = $_SERVER['HTTP_X_HUB_SIGNATURE'];

// Calcula la firma
$calculatedSignature = 'sha1=' . hash_hmac('sha1', file_get_contents('php://input'), $secret);

// Compara la firma calculada con la firma recibida
if (!hash_equals($calculatedSignature, $hubSignature)) {
    http_response_code(403);
    echo 'Invalid signature';
    exit;
}

// Continua con el procesamiento del webhook
// ...

http_response_code(200);
echo 'Webhook received and verified';
?>

