<?php

if(!isset($_SESSION['correo'])) {
    echo "No se ha especificado un correo";
    exit();
}

$correo = $_SESSION['correo'];

$url = 'https://api.resend.com/emails';
$data = array(
    "from" => "onboarding@resend.dev",
    "to" => $correo,
    "subject" => "Gracias por su pedido",
    // html esta en ../Pedidos.html
    "html" => file_get_contents('../Confirmacion.html')
);

$token = 're_CFokSBt7_9QEWCmkC7iZDhDqt8L1QLXjQ';

$headers = array(
    'Authorization: Bearer ' . $token,
    'Content-Type: application/json'
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if ($response === false) {
    echo 'Error al enviar la solicitud: ' . curl_error($ch);
} else {
    echo 'Respuesta del servidor: ' . $response;
}

curl_close($ch);

?>
