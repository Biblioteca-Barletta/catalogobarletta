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
        <input type="search" name="buscar" id="buscar" class="border border-solid w-4/5 h-10 rounded p-1 m-4"
            placeholder="Buscar...">
        <a href="">Búsqueda avanzada</a>
    </section>

    <!-- Section 2: contiene las novedades con cardbox -->
    <section class="flex flex-col items-center border border-solid border-b-4 border-l-0 border-r-0 border-b-azul">
        <h1 class="font-bold m-4">
    Novedades
</h1>
<!-- Probando el flex responsive: flex flex-col text-center md:flex-row  -->
<div class="flex flex-col text-center md:flex-row">
    <?php
    header('Content-Type: text/html; charset=utf-8');
       include 'conexion.php'; // Incluye el archivo de conexión

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Configuración la codificación de caracteres a UTF-8
if (!$conn->set_charset("utf8")) {
    printf("Error cargando el conjunto de caracteres utf8: %s\n", $conn->error);
    exit();
}

    // Realiza la consulta SQL
    $sql="SELECT items.*, autoridades.forma_autorizada AS nombre_autor FROM items JOIN autoridades ON items.id_autor = autoridades.id_autor ORDER BY id_items DESC LIMIT 5";
    //$sql = "SELECT * FROM items ORDER BY id_items DESC LIMIT 5";
    $result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

    if ($result->num_rows > 0) {
        // Imprime los datos dentro de la card
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="card flex flex-col items-center justify-between m-4 p-4 border rounded bg-gris">
                <div>
                    <h2 class="card-title m-2 text-2xl text-wrap">
                        <?php echo $row["titulo"]; ?>
                    </h2>
                    <h4 class="card-title text-wrap">
                        <?php echo $row["otra_info"]; ?>
                    </h4>
                    <h4 class="card-title text-wrap">
                        <?php echo $row["nombre_autor"]; ?>
                    </h4>
                </div>
                <!-- Se saca la imagen por el momento hasta que se pueda trabajar mejor con las portadas -->
                <!-- <img src="./img/portadas/portada.png" alt="Imagen de la Card" class="card-image m-4 w-1 h-1 rounded shadow-xl"> -->
                <button class="card-button bg-azul border border-solid rounded p-2 m-1 text-blanco cursor-pointer" onclick="openModal('<?php echo $row["titulo"]; ?>', '<?php echo $row["otra_info"]; ?>')">Ver más...</button>

                <!-- Modal -->
                <div id="modal" class="modal hidden fixed z-20 left-0 top-0 w-full h-full overflow-auto bg-blanco">
                    <div class="modal-content relative inset-y-1/4 p-5 border bg-gris">
                        <span class="close float-right text-xl font-bold hover:cursor-pointer" onclick="closeModal()">&times;</span>
                        <div class="flex justify-between">
                            <div class="w-full">
                                <h2 class="card-title m-2 text-2xl"><?php echo $row["titulo"], ["nombre_autor"]; ?></h2>
                                <h4 class="modal-otra-info text-wrap"><?php echo $row["otra_info"]; ?></h4>
                                <hr>
                                <ol>
                                    <li>Edición: <?php echo $row["edicion"]; ?></li>
                                    <li>Material: <?php echo $row["material"]; ?></li>
                                    <li>Publicación: <?php echo $row["publi_distribucion"]; ?></li>
                                    <li>Descripción física: <?php echo $row["descripcion_fisica"]; ?></li>
                                    <li>Serie: <?php echo $row["serie"]; ?></li>
                                    <li>Notas: <?php echo $row["notas"]; ?></li>
                                    <li>Número normalizado: <?php echo $row["numero_normalizado"]; ?></li>
                                </ol>
                                <hr class="m-2">
                                <ol>
                                    <li>Disponibilidad: <?php echo $row["disponibilidad"]; ?></li>
                                    <li>Signatura topográfica: <?php echo $row["signatura"]; ?></li>
                                </ol>
                            </div>
                            <img src="./img/portadas/portada.png" alt="Imagen de la Card" class="modal-image h-52 m-4 rounded">
                        </div>
                        <hr class="m-2">
                        <div class="flex">
                            <button class="modal-button block w-full py-2.5 px-5 bg-azul text-blanco rounded cursor-pointer text-base m-2">Reservar</button>
                            <button class="modal-button block w-full py-2.5 px-5 bg-rojo text-blanco rounded cursor-pointer text-base m-2">Devolver</button>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        echo "0 resultados";
    }
    $conn->close();
    ?>
</div>
</section>


    <!-- Footer: legales, etc. -->
    <footer class= "flex flex-wrap items-left justify-left bg-gris border-t-0 border-l-0 border-r-0 border-b-4 border-b-rojo h-22 md:h-20  lg:h-20">
        <div class="m-4">
            <h6>©Biblioteca Popular Sanlorencista "Leónidas Barletta"</h6>
            <h6>Desarrollado por <a href="https://github.com/i-bruno" target="_blank"  class="font-bold">BrunoDev</a></h6>
        </div>
    
    </footer>

    <script src="./js/script.js"></script>
</body>

</html>