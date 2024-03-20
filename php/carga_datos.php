<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "c2030171_opac";
$password = "su87TEmavu";
$database = "c2030171_opac";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener los datos del formulario
$titulo = $_POST['titulo'];
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
$sql = "INSERT INTO items (titulo, edicion, material, publi_distribucion, descripcion_fisica, serie, notas, numero_normalizado, portada, signatura, disponibilidad) VALUES ('$titulo', '$edicion', '$material','$publicacion','$descripcion','$serie','$notas','$normalizado','$portada','$signatura','$disponibilidad')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "Registro insertado exitosamente";
} else {
    echo "Error al insertar registro: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
