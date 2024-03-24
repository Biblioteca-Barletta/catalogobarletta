<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "c2030171_opac";
$password = "su87TEmavu";
$database = "c2030171_opac";

// Crea una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta SQL para seleccionar todas las filas de la tabla 'items'
$sql = "SELECT * FROM items";
$result = $conn->query($sql);

// Verificar si hay filas devueltas
if ($result->num_rows > 0) {
    // Imprimir los datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id_items"] . " <br> Titulo: " . $row["titulo"] . " <br> Otra información sobre el título: " . $row["otra_info"] . " <br> Edición: " . $row["edicion"] . " <br> Material: " . $row["material"] . " <br> Publicación: " . $row["publi_distribucion"] . " <br> Descripción física: " . $row["descripcion_fisica"] . " <br> Serie: " . $row["serie"] . " <br> Notas: " . $row["notas"] . " <br> Número normalizado: " . $row["numero_normalizado"] . " <br> Disponibilidad: " . $row["disponibilidad"] . " <br> Signatura topográfica: " . $row["signatura"] . " <br> Portada: " . $row["portada"] . "<br> <hr>";
        // Puedes ajustar los nombres de las columnas según tu tabla
    }
} else {
    echo "No se encontraron resultados en la tabla 'items'.";
}

// Cerrar conexión
$conn->close();
?>