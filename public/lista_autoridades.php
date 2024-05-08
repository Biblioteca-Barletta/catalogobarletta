<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="./img/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./img/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./img/favicon-16x16.png">
    <link rel="manifest" href="./img/site.webmanifest">
    <link rel="stylesheet" href="styles.css">
    <title>Catálogo Biblioteca Barletta</title>
</head>

<body>

    <!-- Header: contiene el navbar -->
    <header class="flex justify-between border-t-0 border-l-0 border-r-0 border-b-4 border-b-azul h-20  border border-solid">
        <ul class="flex flex-wrap items-center justify-center text-gray-900 m-4">
            <li class="me-4 hover:underline md:me-6">
            <a href="./index.php">Inicio</a>
            </li>
            <li class="me-4 hover:underline md:me-6">
                <a href="./novedades.php">Novedades</a>
            </li>
            <li class="me-4 hover:underline md:me-6">
                <a href="./carga.php">Cargar</a>
            </li>
            <li class="me-4 hover:underline md:me-6">
                <a href="./lista_items.php">Lista Items</a>
            </li>
            <li class="relative group">Listas
                <ul class="absolute hidden bg-white border border-gray-200 py-1 mt-2 rounded-md shadow-lg group-hover:block">
                    <li><a href="#">Items</a></li>
                    <li><a href="#">Autoridades</a></li>
                </ul>
            </li>
        </ul>
        <li class="flex flex-wrap items-center justify-end text-gray-900 m-4">
            <ul class="me-4 hover:underline md:me-6">Ingresar</ul>
        </li>
    </header>

    <!-- Section 1: contiene la caja de búsqueda -->

    <section class="flex flex-wrap items-center justify-center text-gray-900 bg-gris border-t-0 border-l-0 border-r-0 border-b-4 border-b-rojo">
    <p>Ordenar por:</p>
        <button class="bg-blanco shadow-xl border rounded p-1 m-1">Id</button>
        <button class="bg-blanco shadow-xl border rounded p-1 m-1">Titulo</button>
        <button class="bg-blanco shadow-xl border rounded p-1 m-1">Items</button>
    </section>
    <section class="m-2 p-2">

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
$sql = "SELECT * FROM autoridades  ORDER BY `autoridades`.`forma_autorizada` ASC";
$result = $conn->query($sql);

// Verificar si hay filas devueltas
if ($result->num_rows > 0) {
    // Imprimir los datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo "
        <div class='bg-gris m-1 p-1 rounded'>
        <p class='ml-2'>ID:" . $row["id_autor"] . "</p>
        <p class='ml-2'>Autor: " . $row["forma_autorizada"] . "</p><br>
        <button id='eliminar-item'>Eliminar</button>
        </div> <hr>";
        // Puedes ajustar los nombres de las columnas según tu tabla
    }
} else {
    echo "No se encontraron resultados en la tabla 'items'.";
}

// Cerrar conexión
$conn->close();
?>
    </section>

    <!-- Footer: legales, etc. -->
    <footer class= "flex flex-wrap items-left justify-left bg-gris border-t-0 border-l-0 border-r-0 border-b-4 border-b-rojo h-22 md:h-20  lg:h-20">
        <div class="m-4">
            <h6>©Biblioteca Popular Sanlorencista "Leónidas Barletta"</h6>
            <h6>Desarrollado por <a href="https://github.com/i-bruno" target="_blank"  class="font-bold">BrunoDev</a></h6>
        </div>
    
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="./js/eliminar_item.js"></script>
</body>

</html>

