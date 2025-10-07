<?php
// Configuración de conexión a la base de datos
$servername = "localhost"; // Servidor local
$dbusername = "root";       // Usuario por defecto de XAMPP
$dbpassword = "";           // Contraseña por defecto de XAMPP
$dbname = "SIA";            // Nombre de la base de datos

// Crear conexión a MySQL
$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Verificar si hay error de conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibir datos enviados desde el formulario de registro
$Nombre = $_POST['username']; // Nombre del usuario
$Correo = $_POST['email'];    // Correo del usuario
$Contraseña = $_POST['password']; // Contraseña del usuario

// Encriptar la contraseña antes de guardarla por seguridad
$hashed_pass = password_hash($Contraseña, PASSWORD_DEFAULT);

// Preparar la consulta SQL para insertar el nuevo usuario
$sql = "INSERT INTO usuarios (`Nombre`, `Correo`, `Contraseña`) 
        VALUES ('$Nombre', '$Correo', '$hashed_pass')";

// Ejecutar la consulta y verificar si fue exitosa
if ($conn->query($sql) === TRUE) {
    echo " Registro exitoso. Ahora puedes <a href='index.html'>iniciar sesión</a>";
} else {
    echo " Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
