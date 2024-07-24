<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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
        <button class="bg-blanco shadow-xl border rounded p-1 m-1">Titulo</button>
        <button class="bg-blanco shadow-xl border rounded p-1 m-1">Disponibilidad</button>
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

    // Configuración la codificación de caracteres a UTF-8
    if (!$conn->set_charset("utf8")) {
        printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
        exit();
    }

    // Configuración de la paginación
    $per_page = 10; // Número de items por página
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;
    $offset = ($page - 1) * $per_page;

    // Consulta SQL para obtener la cantidad de items
    $sqlItems = "SELECT COUNT(*) AS cantidad_items FROM items";
    $resultItems = $conn->query($sqlItems);
    $rowItems = $resultItems->fetch_assoc();
    $cantidad_items = $rowItems["cantidad_items"];

    echo "
    <div class='flex flex-col'>
        <label class='text-center font-bold'>Cantidad de items</label>
        <p class='text-center'>" . $cantidad_items . "</p>
    </div>";

    // Calcular el número total de páginas
    $total_pages = ceil($cantidad_items / $per_page);

    // Consulta SQL para seleccionar las filas de la página actual
    $sql = "SELECT items.*, autoridades.forma_autorizada AS nombre_autor 
            FROM items 
            JOIN autoridades ON items.id_autor = autoridades.id_autor 
            ORDER BY items.id_items ASC 
            LIMIT $offset, $per_page";

    $result = $conn->query($sql);

    // Verificar si hay filas devueltas
    if ($result->num_rows > 0) {
        // Imprimir los datos de cada fila
        while ($row = $result->fetch_assoc()) {
            echo "
            <div class='bg-gris m-1 p-1 rounded'>
                <p class='ml-2 font-bold id_items'>ID: </p>" . $row["id_items"] . " 
                <p class='ml-2 font-bold titulo'>Titulo: </p>" . $row["titulo"] . "
                <p class='ml-2 font-bold nombre_autor'>Autor: </p>" . $row["nombre_autor"] . "
                <p class='ml-2 font-bold otra_info'>Otra información sobre el título: </p>" . $row["otra_info"] . " 
                <p class='ml-2 font-bold edicion'>Edición: </p>" . $row["edicion"] . " 
                <p class='ml-2 font-bold material'>Material: </p>" . $row["material"] . " 
                <p class='ml-2 font-bold publi_distribucion'>Publicación: </p>" . $row["publi_distribucion"] . " 
                <p class='ml-2 font-bold descripcion_fisica'>Descripción física: </p>" . $row["descripcion_fisica"] . " 
                <p class='ml-2 font-bold serie'>Serie: </p>" . $row["serie"] . " 
                <p class='ml-2 font-bold notas'>Notas: </p>" . $row["notas"] . " 
                <p class='ml-2 font-bold numero_normalizado'>Número normalizado: </p>" . $row["numero_normalizado"] . " 
                <p class='ml-2 font-bold disponibilidad'>Disponibilidad: </p>" . $row["disponibilidad"] . " 
                <p class='ml-2 font-bold signatura'>Signatura topográfica: </p>" . $row["signatura"] . " 
                <p class='ml-2 font-bold portada'>Portada: </p>" . $row["portada"] . "
                <button id='editar-item' class='card-button bg-azul border border-solid rounded p-2 m-1 text-blanco cursor-pointer' onclick='openEditModal(this)'>Editar</button>
                <button id='eliminar-item' class='card-button bg-azul border border-solid rounded p-2 m-1 text-blanco cursor-pointer'>Eliminar</button>
            </div> <hr>";
        }
    } else {
        echo "No se encontraron resultados en la tabla 'items'.";
    }

    // Cerrar conexión
    $conn->close();
    ?>

    <!-- Paginación -->
    <div class="flex justify-center mt-4">
        <?php 
        $range = 5; // Número de enlaces a mostrar a la vez
        $start = max(1, $page - floor($range / 2));
        $end = min($total_pages, $start + $range - 1);

        if ($start > 1): ?>
            <a href="?page=1" class="p-2 bg-blue-500 text-white rounded">Primero</a>
            <a href="?page=<?php echo $page - 1; ?>" class="p-2 bg-blue-500 text-white rounded">Anterior</a>
        <?php endif; 

        for ($i = $start; $i <= $end; $i++): ?>
            <a href="?page=<?php echo $i; ?>" class="p-2 <?php if ($i == $page) echo 'bg-blue-700 text-white'; else echo 'bg-blue-500 text-white'; ?> rounded"><?php echo $i; ?></a>
        <?php endfor; 

        if ($end < $total_pages): ?>
            <a href="?page=<?php echo $page + 1; ?>" class="p-2 bg-blue-500 text-white rounded">Siguiente</a>
            <a href="?page=<?php echo $total_pages; ?>" class="p-2 bg-blue-500 text-white rounded">Último</a>
        <?php endif; ?>
    </div>

    <!-- Modal -->
    <div id="editModal" class="modal hidden fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen">
            <div class="modal-content bg-white rounded-lg shadow-lg p-6 relative w-full max-w-md">
                <span class="close absolute top-2 right-2 text-gray-500 cursor-pointer">&times;</span>
                <h2 class="text-2xl mb-4">Editar Ítem</h2>
                <form id="editForm">
                    <input type="hidden" id="editItemId">
                    <div class="mb-4">
                        <label for="editTitulo" class="block text-gray-700">Título</label>
                        <input type="text" id="editTitulo" name="titulo" class="w-full border rounded px-2 py-1">
                    </div>
                    <div class="mb-4">
                        <label for="editAutor" class="block text-gray-700">Autor</label>
                        <input type="text" id="editAutor" name="autor" class="w-full border rounded px-2 py-1">
                    </div>
                    <!-- Añade aquí otros campos del formulario que necesitas editar -->
                    <button type="submit" class="bg-azul text-white px-4 py-2 rounded">Guardar</button>
                </form>
            </div>
        </div>
    </div>
    </section>

    <!-- Footer: legales, etc. -->
    <footer class="flex flex-wrap items-left justify-left bg-gris border-t-0 border-l-0 border-r-0 border-b-4 border-b-rojo h-22 md:h-20  lg:h-20">
        <div class="m-4">
            <h6>©Biblioteca Popular Sanlorencista "Leónidas Barletta"</h6>
            <h6>Desarrollado por <a href="https://github.com/i-bruno" target="_blank" class="font-bold">BrunoDev</a></h6>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="./js/editItem.js"></script> -->
    <!-- <script src="./js/eliminar_item.js"></script> -->
</body>
</html>
