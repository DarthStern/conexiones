<?php
include 'conexion.php';

function getChatGptResponse($message) {
    global $conexion;

    $message = mysqli_real_escape_string($conexion, $message);
    $query = "INSERT INTO chat_messages (message) VALUES ('$message')";

    if (mysqli_query($conexion, $query)) {
        // Aquí debes implementar la lógica para obtener la respuesta de GPT-3.5
        $response = "Respuesta de GPT-3.5";
        return $response;
    } else {
        return "Error al guardar el mensaje: " . mysqli_error($conexion);
    }
}

function getChatMessages() {
    global $conexion;

    $query = "SELECT message FROM chat_messages";
    $result = mysqli_query($conexion, $query);

    $messages = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row['message'];
    }

    return $messages;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['newMessage'])) {
        $newMessage = $_POST['newMessage'];

        if (!empty($newMessage)) {
            $response = getChatGptResponse($newMessage);
            echo $response;
        }
    }
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $messages = getChatMessages();
    echo json_encode($messages);
    exit;
}
