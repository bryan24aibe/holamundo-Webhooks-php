<?php
// Configura los encabezados para permitir solicitudes desde cualquier origen
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Verifica si la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura el cuerpo de la solicitud
    $input = file_get_contents("php://input");

    // Decodifica el JSON recibido
    $data = json_decode($input, true);

    // Responde con un mensaje
    $response = [
        "message" => "¡Hola Mundo desde un Webhook!",
        "received_data" => $data
    ];

    // Envía la respuesta como JSON
    echo json_encode($response);
} else {
    // Si no es POST, responde con un error
    http_response_code(405);
    echo json_encode([
        "error" => "Método no permitido. Usa POST."
    ]);
}
?>
