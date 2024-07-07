<?php 
	// Este archivo nos permitirá conectarnos a la base de datos
	// y cerrar la conexión una vez que hayamos terminado de usarla

	// Permite el acceso desde cualquier origen (dominio) a la API RESTful 
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Headers: *");
	header("Access-Control-Allow-Methods: *");
	header("Content-Type: application/json"); // Devuelve un JSON
	header("Access-Control-Allow-Credentials: true"); // Permite el acceso a las credenciales

	function crearConexion() {
		$host = "localhost";
		$user = "root";
		$pass = "";
		$baseDatos = "basedatosadl";

		// Mantenemos los parámetros de la conexión previamente dados y añadimos la conexión con dichos datos
		$conexion = mysqli_connect($host, $user, $pass, $baseDatos);

		// si algún dato de la conexón es erróneo nos mandará un mensaje de error
		if (!$conexion) 
		{ 
			echo "Eror de conexión";
			die("<br> Error de conexión co nla base de datos: " . mysqli_connect_error());
		}

		// en caso de funcionar bien la conexión nos la devolverá
		return $conexion;
	}

	// Esta función nos cerrará la conexión que creamos en la función anterior
	function cerrarConexion($conexion) {
		mysqli_close($conexion);
	}
?>