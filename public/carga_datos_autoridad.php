<?php
include 'conexion.php'; // Incluye el archivo de conexión

// $conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$forma_autorizada = $_POST['autorizada'];
$forma_directa = $_POST['directa'];


// Preparar la consulta SQL
$sql = "INSERT INTO autoridades (forma_autorizada, forma_directa) VALUES ('$forma_autorizada', '$forma_directa')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    // Redireccionar a carga.php si la consulta se ejecuta con éxito
    header("Location: ../carga_autoridad.php");
    exit(); // Asegura que el script se detenga después de la redirección
} else {
    echo "Error al insertar registro: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
