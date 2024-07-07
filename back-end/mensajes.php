<?php
include "conexion.php";

// Consulta que nos permitirá acceder a los mensajes por destinatario
function obtenerMensajesPorDestinatario($destinatario_id) {
    $con = crearConexion();
    $sql = "SELECT * FROM MENSAJES WHERE destinatario_id = ? OR remitente_id = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ii", $destinatario_id, $destinatario_id);
    
    $stmt->execute();
    
    // Obtener el resultado
    $result = $stmt->get_result();
    
    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        $mensajes = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($mensajes);
    } else {
        echo json_encode(array("mensaje" => "No se encontraron mensajes para el destinatario"));
    }
    
    $stmt->close();
    cerrarConexion($con);
}

// Consulta que nos permitirá acceder a los mensajes y los ordenara por destinatario DUDA
function obtenerTodosLosMensajes() {
    $con = crearConexion();
    
    // Obtener todos los destinatario_id únicos
    $sql = "SELECT DISTINCT destinatario_id FROM MENSAJES";
    $result = $con->query($sql);
    
    $mensajesPorDestinatario = array();
    
    while ($row = $result->fetch_assoc()) {
        $destinatario_id = $row['destinatario_id'];
        
        // Obtener los mensajes para este destinatario_id
        $sql = "SELECT * FROM MENSAJES WHERE destinatario_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $destinatario_id);
        $stmt->execute();
        
        $mensajesResult = $stmt->get_result();
        $mensajes = $mensajesResult->fetch_all(MYSQLI_ASSOC);
        
        // Agregar los mensajes a la matriz de mensajes por destinatario
        $mensajesPorDestinatario[$destinatario_id] = $mensajes;
        
        $stmt->close();
    }
        
    echo json_encode($mensajesPorDestinatario);
    
    cerrarConexion($con);
}

// Esta consulta servirá para Crear un mensaje
function crearMensaje($mensaje, $remitente_id, $destinatario_id) {
    $conexion = crearConexion();
    $sql = "INSERT INTO MENSAJES (mensaje, remitente_id, destinatario_id) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    // sii son los tipos de datos que se van a insertar s, string, i, integer
    $stmt->bind_param("sii", $mensaje, $remitente_id, $destinatario_id);

    if ($stmt->execute()) {
        echo json_encode(array("mensaje" => "Mensaje creado correctamente", "id" => $stmt->insert_id));
    } else {
        echo json_encode(array("mensaje" => "Error al crear el mensaje"));
    }

    $stmt->close();
    cerrarConexion($conexion);
}

// Si el método de solicitud es GET y se ha proporcionado un ID, se obtienen los datos del usuario
// Si el método de solicitud es POST, se crea un nuevo usuario
// En cualquier otro caso, se devuelve un mensaje de error

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['id'])){
        $destinatario_id = intval($_GET['id']);
        obtenerMensajesPorDestinatario($destinatario_id);
    } else {
        obtenerTodosLosMensajes();
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = json_decode(file_get_contents('php://input'), true);

    $mensaje = $datos['mensaje'] ?? '';
    $remitente_id = $datos['remitente_id'] ?? '';
    $destinatario_id = $datos['destinatario_id'] ?? '';

    if($mensaje && $remitente_id && $destinatario_id) {
        crearMensaje($mensaje, $remitente_id, $destinatario_id);
    } else {
        echo json_encode(array(
            "mensaje" => "Faltan datos",
            "datos_enviados" => array(
                "mensaje" => $mensaje, 
                "remitente_id" => $remitente_id, 
                "destinatario_id" => $destinatario_id
            )
            ));
    }
} else {
    echo json_encode(array("mensaje" => "Solicitud no válida"));
}
?>