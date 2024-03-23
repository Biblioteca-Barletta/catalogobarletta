<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Catálogo Biblioteca Barletta</title>
</head>

<body>

    <!-- Header: contiene el navbar -->
    <header class="border-t-0 border-l-0 border-r-0 border-b-4 border-b-azul h-20 flex border border-solid">
        <li class="flex flex-wrap items-center justify-center text-gray-900 m-4">
            <ul class="me-4 hover:underline md:me-6">Inicio</ul>
            <ul class="me-4 hover:underline md:me-6">Novedades</ul>
            <ul class="me-4 hover:underline md:me-6"><a href="./carga.php">Cargar</a></ul>
        </li>
    </header>

    <!-- Section 1: contiene la caja de búsqueda -->

    <section class="flex flex-wrap items-center justify-center text-gray-900 bg-gris border-t-0 border-l-0 border-r-0 border-b-4 border-b-rojo">
        <input type="search" name="buscar" id="buscar" class="border border-solid w-4/5 h-10 rounded p-1 m-4"
            placeholder="Buscar...">
        <a href="">Búsqueda avanzada</a>
    </section>

    <!-- Section 2: contiene las novedades con cardbox -->
    <section>
    


        <h1 class="font-bold m-4">
    Novedades
</h1>
<div class="flex flex-wrap justify-center">
    <?php
       include 'conexion.php'; // Incluye el archivo de conexión

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

    // Realiza la consulta SQL
    $sql = "SELECT * FROM items ORDER BY id_items DESC LIMIT 5";
    $result = $conn->query($sql);

if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

    if ($result->num_rows > 0) {
        // Imprime los datos dentro de la card
        while ($row = $result->fetch_assoc()) {
    ?>
            <div class="card m-4 w-fit p-5 text-center border rounded border-gray-50 bg-gris flex flex-col">
                <h2 class="card-title mt-1 text-2xl"><?php echo $row["titulo"]; ?></h2>
                <img src="./img/portadas/portada.jpg" alt="Imagen de la Card" class="card-image h-52 m-4 rounded">
                <button class="card-button bg-azul border border-solid rounded p-2 m-1 text-blanco cursor-pointer" onclick="openModal('<?php echo $row["titulo"]; ?>')">Ver más...</button>

                <!-- Modal -->
                <div id="modal" class="modal hidden fixed z-20 left-0 top-0 w-full h-full overflow-auto bg-blanco">
                    <div class="modal-content relative inset-y-1/4 p-5 border bg-gris">
                        <span class="close float-right text-xl font-bold hover:cursor-pointer" onclick="closeModal()">&times;</span>
                        <div class="flex justify-between">
                            <div>
                                <h2 class="card-title mt-1 text-2xl"><?php echo $row["titulo"]; ?></h2>
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
                            <img src="./img/portadas/portada.jpg" alt="Imagen de la Card" class="modal-image h-52 m-4 rounded">
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
    <footer>

    </footer>

    <script src="./js/script.js"></script>
</body>

</html>