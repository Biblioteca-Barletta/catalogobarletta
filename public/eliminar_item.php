<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "c2030171_opac";
$password = "su87TEmavu";
$database = "c2030171_opac";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener el ID del item a eliminar
$itemId = $_POST['id'];

// Consulta SQL para eliminar el item
$sql = "DELETE FROM items WHERE id_items = $itemId";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "El item ha sido eliminado exitosamente.";
} else {
    echo "Error al eliminar el item: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
