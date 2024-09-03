<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
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
                <li class="relative float-left me-4 hover:underline md:me-6">
                    <a href="./index.php">Inicio</a>
                </li>
                <li class="relative float-left me-4 hover:underline md:me-6">
                    <a href="./novedades.php">Novedades</a>
                </li>
                <li class="relative float-left me-4 hover:underline md:me-6">
                    <a href="./carga.php">Cargar</a>
                </li>
                <li class="relative float-left me-4 hover:underline md:me-6">
                    <a href="./lista_items.php">Lista Items</a>
                </li>
                <li class="relative float-left me-4 hover:underline md:me-6">
                    <a href="./lista_autoridades.php">Lista autoridades</a>
                </li>
                <li class="relative float-left me-4 hover:underline md:me-6">
                    <a href="./lista_clas.php">Lista clasificación</a>
                </li>
                <!-- <li class="relative float-left">Listas
                    <ul class="absolute hidden bg-white border border-gray-200 py-1 mt-2 rounded-md shadow-lg">
                        <li class="float-none hover:block"><a href="./lista_items.php">Items</a></li>
                        <li class="float-none hover:block"><a href="./lista_autoridades.php">Autoridades</a></li>
                    </ul>
                </li> -->
            </ul>
            <ul class="flex flex-wrap items-center justify-end text-gray-900 m-4">
                <li class="me-4 hover:underline md:me-6">Ingresar</li>
            </ul>
    </header>

    <!-- Section 1: contiene la caja de búsqueda -->

    <section class="flex flex-wrap items-center justify-center text-gray-900 bg-gris border-t-0 border-l-0 border-r-0 border-b-4 border-b-rojo">
    <p>Ordenar por:</p>
        <button class="bg-blanco shadow-xl border rounded p-1 m-1">Id</button>
        <button class="bg-blanco shadow-xl border rounded p-1 m-1">Autor</button>
        <button class="bg-blanco shadow-xl border rounded p-1 m-1">Items</button>
    </section>
    <section class="m-2 p-2">

    <?php
    header('Content-Type: text/html; charset=utf-8');
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

// // Configuración la codificación de caracteres a UTF-8
// if (!$conn->set_charset("utf8")) {
//     printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
//     exit();
// }

// Consulta SQL para obtener la cantidad de items
$sqlAut = "SELECT COUNT(*) AS cantidad_aut FROM autoridades";
$resultAut = $conn->query($sqlAut);
$rowAut = $resultAut->fetch_assoc();
$cantidad_Aut = $rowAut["cantidad_aut"];

echo "
    <div class='flex flex-col'>
        <label class='text-center font-bold'>Cantidad de autoridades</label>
        <p class='text-center'>" . $cantidad_Aut . "</p>
    </div>
    ";


// // Consulta SQL para seleccionar todas las filas de la tabla 'items'
// $sql = "SELECT * FROM autoridades  ORDER BY `autoridades`.`forma_autorizada` ASC";
// $result = $conn->query($sql);

// Consulta SQL para seleccionar todas las filas de la tabla 'autoridades' y los títulos de libros de la tabla 'items'
$sql = "SELECT autoridades.id_autor, autoridades.forma_autorizada, autoridades.cutter, items.titulo, items.otra_info, items.edicion, items.material, items.publi_distribucion, items.descripcion_fisica, items.serie, items.notas, items.numero_normalizado, items.disponibilidad, items.signatura 
        FROM autoridades 
        LEFT JOIN items ON autoridades.id_autor = items.id_autor 
        ORDER BY autoridades.forma_autorizada ASC";
$result = $conn->query($sql);

// Verificar si hay filas devueltas
if ($result->num_rows > 0) {
    // Inicializar un array para agrupar los datos por autor
    $autores = [];

    // Procesar los resultados
    while ($row = $result->fetch_assoc()) {
        $id_autor = $row["id_autor"];

        // Agrupar los datos de cada autor
        if (!isset($autores[$id_autor])) {
            $autores[$id_autor] = [
                'forma_autorizada' => $row["forma_autorizada"],
                'cutter' => $row["cutter"],
                'titulos' => []
            ];
        }

        // Añadir el título al autor si existe
        if ($row["titulo"]) {
            $autores[$id_autor]['titulos'][] = [
                'titulo' => $row["titulo"],
                'otra_info' => $row["otra_info"],
                'edicion' => $row["edicion"],
                'material' => $row["material"],
                'publicacion' => $row["publi_distribucion"],
                'descripcion' => $row["descripcion_fisica"],
                'serie' => $row["serie"],
                'notas' => $row["notas"],
                'normalizado' => $row["numero_normalizado"],
                'disponibilidad' => $row["disponibilidad"],
                'signatura' => $row["signatura"]
            ];
        }
    }

    // Imprimir los datos de cada autor
    foreach ($autores as $id_autor => $autor) {
        echo "
        <div class='bg-gris m-1 p-1 rounded'>
        <p class='ml-2'>ID: " . $id_autor . "</p>
        <p class='ml-2'>Autor: " . $autor["forma_autorizada"] . "</p><br>
        <p class='ml-2'>Cutter: " . $autor["cutter"] . "</p><br>";

        // Mostrar la lista de títulos
        if (!empty($autor['titulos'])) {
            echo "<p class='ml-2'>Títulos:</p><ul>";
            foreach ($autor['titulos'] as $tituloData) {
                echo "<li> - <a href='#' class='modal-trigger text-blue-600 hover:underline' 
                onclick=\"openModal(
                    '" . addslashes($tituloData['titulo']) . "', 
                    '" . addslashes($tituloData['otra_info']) . "', 
                    '" . addslashes($tituloData['edicion']) . "', 
                    '" . addslashes($tituloData['material']) . "', 
                    '" . addslashes($tituloData['publicacion']) . "', 
                    '" . addslashes($tituloData['descripcion']) . "', 
                    '" . addslashes($tituloData['serie']) . "', 
                    '" . addslashes($tituloData['notas']) . "', 
                    '" . addslashes($tituloData['normalizado']) . "', 
                    '" . addslashes($tituloData['disponibilidad']) . "', 
                    '" . addslashes($tituloData['signatura']) . "'
                )\">" . $tituloData['titulo'] . "</a></li>";
            }
            echo "</ul>";
        } else {
            echo "<p class='ml-2'>Títulos: No tiene títulos asociados</p>";
        }

        echo "<br><button id='eliminar-item'>Eliminar</button>
        </div> <hr>";
    }
} else {
    echo "No se encontraron resultados en la tabla 'autoridades'.";
}

// Cerrar conexión
$conn->close();
?>

<!-- Modal -->
<div id="modal" class="modal hidden fixed z-20 left-0 top-0 w-full h-full overflow-auto bg-blanco text-left">
    <div class="modal-content relative inset-y-1/4 p-5 border bg-gris">
        <span class="close float-right text-xl font-bold hover:cursor-pointer" onclick="closeModal()">&times;</span>
        <div class="flex justify-between items-center">
            <div class="w-full">
                <h2 class="card-title m-2 text-2xl text-center"></h2>
                <h4 class="modal-otra-info text-wrap text-center"></h4>
                <hr class="m-2">
                <ol class="m-2">
                    <li class="modal-edicion"></li>
                    <li class="modal-material"></li>
                    <li class="modal-publi"></li>
                    <li class="modal-descripcion"></li>
                    <li class="modal-serie"></li>
                    <li class="modal-notas"></li>
                    <li class="modal-normalizado"></li>
                </ol>
                <hr class="m-2">
                <ol class="m-2">
                    <li class="modal-dispo"></li>
                    <li class="modal-signatura"></li>
                </ol>
            </div>
            <img src="./img/portadas/Portada.jpg" alt="Imagen de la Card" class="modal-image h-52 m-4 rounded">
        </div>
        <hr class="m-2">
        <div class="flex">
            <button class="modal-button block w-full py-2.5 px-5 bg-azul text-blanco rounded cursor-pointer text-base m-2">Reservar</button>
            <button class="modal-button block w-full py-2.5 px-5 bg-rojo text-blanco rounded cursor-pointer text-base m-2">Devolver</button>
        </div>
    </div>
</div>

    </section>

    <!-- Footer: legales, etc. -->
    <footer class= "flex flex-wrap items-left justify-left bg-gris border-t-0 border-l-0 border-r-0 border-b-4 border-b-rojo h-22 md:h-20  lg:h-20">
        <div class="m-4">
            <h6>©Biblioteca Popular Sanlorencista "Leónidas Barletta"</h6>
            <h6>Desarrollado por <a href="https://github.com/i-bruno" target="_blank"  class="font-bold">BrunoDev</a></h6>
        </div>
    
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/eliminar_item.js"></script>
</body>

</html>

