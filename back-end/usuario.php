<?php 
include "conexion.php";

// Consulta que nos permitirá acceder a los datos de la tabla usuarios
function obtenerTodosLosUsuarios() {
    $con = crearConexion();

    $sql = "SELECT * FROM USUARIO";
    
    $result = $con->query($sql);
    
    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($usuario);
    } else {
        echo json_encode(array("mensaje" => "No se encontraron usuarios"));
    }
    
    cerrarConexion($con);
}

function loginEmailPassword($email, $password){
    $con = crearConexion();

    $sql = "SELECT id FROM USUARIO WHERE email = ? AND password = ?";

    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $email, $password);

    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        obtenerDatosUsuario($usuario['id']);
    } else {
        echo json_encode(array("mensaje" => "Usuario no encontrado"));
    }
    $stmt->close();
    cerrarConexion($con);
}

function obtenerDatosUsuario($usuario_id) {
    $con = crearConexion();

    $sql = "SELECT * FROM USUARIO WHERE id = ?";
    
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    
    $stmt->execute();
    
    // Obtener el resultado
    $result = $stmt->get_result();
    
    // Verificar si se encontraron resultados
    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();
        echo json_encode($usuario);
    } else {
        echo json_encode(array("mensaje" => "Usuario no encontrado"));
    }
    
    $stmt->close();
    cerrarConexion($con);
}

// Esta consulta servirá para Crear un usuario
function crearUsuario($nombre, $apellido, $apellido2, $email, $password, $rol_id) {
    $conexion = crearConexion();
    $sql = "INSERT INTO USUARIO (nombre, apellido, apellido2, email, password, rol_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    // sssssi son los tipos de datos que se van a insertar, s = string, i = integer
    $stmt->bind_param("sssssi", $nombre, $apellido, $apellido2, $email, $password, $rol_id);
    
    if ($stmt->execute()) {
        echo json_encode(array("mensaje" => "Usuario creado correctamente", "id" => $stmt->insert_id));
    } else {
        echo json_encode(array("mensaje" => "Error al crear el usuario"));
    }
    
    $stmt->close();
    cerrarConexion($conexion);
}

// Esta consulta servirá para Actualizar un usuario
function actualizarUsuario($usuario_id, $nombre, $apellido, $apellido2, $email, $password, $rol_id) {
    $conexion = crearConexion();
    $sql = "UPDATE USUARIO SET nombre = ?, apellido = ?, apellido2 = ?, email = ?, password = ?, rol_id = ? WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sssssii", $nombre, $apellido, $apellido2, $email, $password, $rol_id, $usuario_id);
    
    if ($stmt->execute()) {
        echo json_encode(array("mensaje" => "Usuario actualizado correctamente"));
    } else {
        echo json_encode(array("mensaje" => "Error al actualizar el usuario"));
    }
    
    $stmt->close();
    cerrarConexion($conexion);
}

// Esta consulta servirá para Eliminar un usuario
function eliminarUsuario($usuario_id) {
    $conexion = crearConexion();
    $sql = "DELETE FROM USUARIO WHERE id = ?";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $usuario_id);
    
    if ($stmt->execute()) {
        echo json_encode(array("mensaje" => "Usuario eliminado correctamente"));
    } else {
        echo json_encode(array("mensaje" => "Error al eliminar el usuario"));
    }
    
    $stmt->close();
    cerrarConexion($conexion);
}

// Si el método de solicitud es GET y se ha proporcionado un ID, se obtienen los datos del usuario
// Si el método de solicitud es POST, se crea un nuevo usuario
// Si el método de solicitud es POST y se proporcionan email y password, se hace login
// En cualquier otro caso, se devuelve un mensaje de error

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if(isset($_GET['id'])){
        $usuario_id = intval($_GET['id']);
        obtenerDatosUsuario($usuario_id);
    } else {
        obtenerTodosLosUsuarios();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = json_decode(file_get_contents('php://input'), true);

    $nombre = $datos['nombre'] ?? '';
    $apellido = $datos['apellido'] ?? '';
    $apellido2 = $datos['apellido2'] ?? '';
    $email = $datos['email'] ?? '';
    $password = $datos['password'] ?? '';
    $rol_id = $datos['rol_id'] ?? 0;

    // Verifica si es una solicitud de login

    if ($nombre && $apellido && $email && $password && isset($datos['rol_id'])) {
        crearUsuario($nombre, $apellido, $apellido2, $email, $password, $rol_id);
    } else if(isset($datos['email']) && isset($datos['password'])){
        $email = $datos['email'];
        $password = $datos['password'];
        loginEmailPassword($email, $password);
    
    } else  {
        // Crear un nuevo usuario
        echo json_encode(array("mensaje" => "Faltan datos"));

    }
} else {
    echo json_encode(array("mensaje" => "Solicitud no válida"));
}
?>
