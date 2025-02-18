<?php
// Lee los datos recibidos del webhook
$payload = file_get_contents('php://input');

// Verifica la firma si has configurado un secreto
$secret = 'MiSecretoSeguro'; // Reemplaza con tu secreto
$signature = 'sha1=' . hash_hmac('sha1', $payload, $secret);
$githubSignature = $_SERVER['HTTP_X_HUB_SIGNATURE'];

if (hash_equals($signature, $githubSignature)) {
    // Procesa el payload
    $data = json_decode($payload, true);
    
    // Aquí puedes añadir el código para manejar los datos del webhook
    file_put_contents('webhook.log', print_r($data, true), FILE_APPEND);
} else {
    http_response_code(403);
}
?>
