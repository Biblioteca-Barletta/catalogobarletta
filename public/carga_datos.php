<?php
include 'conexion.php'; // Incluye el archivo de conexión

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$titulo = $_POST['titulo'];
$otra_info = $_POST['otra_info'];
$edicion = $_POST['edicion'];
$material = $_POST['material'];
$publicacion = $_POST['publicacion'];
$descripcion = $_POST['descripcion'];
$serie = $_POST['serie'];
$notas = $_POST['notas'];
$normalizado = $_POST['normalizado'];
$portada = $_POST['portada'];
$signatura = $_POST['signatura'];
$disponibilidad = $_POST['disponibilidad'];


// Preparar la consulta SQL
$sql = "INSERT INTO items (titulo, otra_info, edicion, material, publi_distribucion, descripcion_fisica, serie, notas, numero_normalizado, portada, signatura, disponibilidad) VALUES ('$titulo', '$otra_info, '$edicion', '$material','$publicacion','$descripcion','$serie','$notas','$normalizado','$portada','$signatura','$disponibilidad')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    // Redireccionar a carga.php si la consulta se ejecuta con éxito
    header("Location: ../carga.php");
    exit(); // Asegura que el script se detenga después de la redirección
} else {
    echo "Error al insertar registro: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
