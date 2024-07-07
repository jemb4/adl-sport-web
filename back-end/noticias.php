<?php 
include "conexion.php";

// Consulta que nos permitirá acceder a los datos de la tabla usuarios
function obtenerTodasLasNoticias() {
    $con = crearConexion();

    $sql = "SELECT * FROM NOTICIAS";
    
    $result = $con->query($sql);
    
    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        $noticias = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($noticias);
    } else {
        echo json_encode(array("mensaje" => "No se encontraron noticias"));
    }
    
    cerrarConexion($con);
}

// Consulta que nos permitirá acceder a los datos de la tabla usuarios
function obtenerNoticias($noticias_id) {
    $con = crearConexion();

    $sql = "SELECT * FROM NOTICIAS WHERE id = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $noticias_id);
    
    $stmt->execute();
    
    // Obtener el resultado
    $result = $stmt->get_result();
    
    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        $noticia = $result->fetch_assoc();
        echo json_encode($noticia);
    } else {
        echo json_encode(array("mensaje" => "Noticia no encontrada"));
    }
    
    $stmt->close();
    cerrarConexion($con);
}

// Esta consulta servirá para Crear una noticia
function crearNoticia($titulo, $descripcion, $autor, $activa) {
    $conexion = crearConexion();
    $sql = "INSERT INTO NOTICIAS (titulo, descripcion, autor, activa) VALUES (?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    // sssi son los tipos de datos que se van a insertar, s = string, i = integer 
    $stmt->bind_param("sssi", $titulo, $descripcion, $autor, $activa);
    
    if ($stmt->execute()) {
        echo json_encode(array("mensaje" => "Noticia creada correctamente", "id" => $stmt->insert_id));
    } else {
        echo json_encode(array("mensaje" => "Error al crear la noticia"));
    }
    
    $stmt->close();
    cerrarConexion($conexion);
}

// Esta consulta servirá para Actualizar una noticia
function actualizarNoticia($noticia_id, $titulo, $descripcion, $autor, $activa) {
    $conexion = crearConexion();
    $sql = "UPDATE NOTICIAS SET titulo = ?, descripcion = ?, autor = ?, activa = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssii", $titulo, $descripcion, $autor, $activa, $noticia_id);
    
    // Ejecutar la consulta y verificar si se actualizó correctamente
    if ($stmt->execute()) {
        echo json_encode(array("mensaje" => "Noticia actualizada correctamente"));
    } else {
        echo json_encode(array("mensaje" => "Error al actualizar la noticia"));
    }
    
    $stmt->close();
    cerrarConexion($conexion);
}

// Esta consulta servirá para Eliminar una noticia
function eliminarNoticia($noticia_id) {
    $conexion = crearConexion();
    $sql = "DELETE FROM NOTICIAS WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $noticia_id);
    
    if ($stmt->execute()) {
        echo json_encode(array("mensaje" => "Noticia eliminada correctamente"));
    } else {
        echo json_encode(array("mensaje" => "Error al eliminar la noticia"));
    }
    
    $stmt->close();
    cerrarConexion($conexion);
}

// Si el método de solicitud es GET y se ha proporcionado un ID, se obtienen los datos del usuario
// Si el método de solicitud es GET y no se proporciona ID, devuelve todas las noticias
// Si el método de solicitud es POST, se crea un nuevo usuario
// En cualquier otro caso, se devuelve un mensaje de error

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id'])) {
        $noticia_id = intval($_GET['id']);
        obtenerNoticias($noticia_id);
    } else {
        obtenerTodasLasNoticias();
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = json_decode(file_get_contents('php://input'), true);
    $titulo = $datos['titulo'] ?? '';
    $descripcion = $datos['descripcion'] ?? '';
    $autor = $datos['autor'] ?? '';
    $activa = $datos['activa'] ?? '';

    if ($titulo && $descripcion && $autor && $activa) {
        crearNoticia($titulo, $descripcion, $autor, $activa);
    } else {
        echo json_encode(array("mensaje" => "Datos incompletos para crear noticia"));
    }
} else {
    echo json_encode(array("mensaje" => "Solicitud no válida"));
}
?>