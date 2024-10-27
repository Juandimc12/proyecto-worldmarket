<?php
$serverName = "JUANDI\\SQLEXPRESS"; // Cambia esto por tu servidor de base de datos
$connectionOptions = array(
    "Database" => "Facturacion_worldmarket", // Nombre de tu base de datos
    "Uid" => "your_username", // Cambia esto por tu usuario de base de datos
    "PWD" => "your_password"  // Cambia esto por tu contraseña de base de datos
);

// Establecer la conexión
$conn = sqlsrv_connect($serverName, $connectionOptions);

// Verificar conexión
if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// Ejemplo de código para verificar el login de un usuario
$username = "usuario_prueba"; // Reemplaza con el nombre de usuario que quieras probar
$password = "contraseña_prueba"; // Reemplaza con la contraseña que quieras probar

// Consulta para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE username = ? AND password = ?";
$params = array($username, $password);
$stmt = sqlsrv_query($conn, $sql, $params);

// Verificar si se obtuvo un resultado
if ($stmt === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
    echo "Inicio de sesión exitoso.";
} else {
    echo "Usuario o contraseña incorrectos.";
}

// Cerrar la conexión
sqlsrv_close($conn);
?>