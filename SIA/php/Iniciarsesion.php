<?php
// Configuración de conexión a la base de datos
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "SIA";

// Crear conexión a MySQL
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Verificar si hay error de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos enviados desde el formulario de login
$Nombre = $_POST['username'];    // Nombre del usuario ingresado
$Contraseña = $_POST['password']; // Contraseña ingresada

// Preparar consulta SQL para buscar el usuario en la tabla usuarios
$sql = "SELECT * FROM usuarios WHERE `Nombre`='$Nombre'";
$result = $conn->query($sql);

// Verificar si se encontró algún usuario
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc(); // Obtener datos del usuario
    // Verificar que la contraseña ingresada coincida con la guardada (hash)
    if (password_verify($Contraseña, $row['Contraseña'])) {
        echo "Bienvenido, " . $row['Nombre'];
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario no encontrado.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
