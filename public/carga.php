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

    <section class="border border-solid border-b-4 border-l-0 border-r-0 border-b-azul">
    <h1 class="ml-5 mt-5">Carga de items</h1>
    <form action='carga_datos.php' method="post" enctype="multipart/form-data" class="m-5 flex flex-col p-2 rounded">
        <label for="selector">Seleccione qué cargará</label>
        <select name="select" id="selector" class="rounded m-2 p-1 border border-solid">
            <option value="opcion1" selected>
                Item
            </option>
            <option value="opcion2">
                Autoridad
            </option>
            <option value="opcion3">
                Clasificación
            </option>
        </select>
        <hr>
        <div class="bg-gris flex flex-col p-2 rounded mb-2 mt-2">
            <label for="titulo">Título:</label>
            <input type="text" id="titulo" name="titulo" class="border border-solid rounded">

            <label for="otra_info">Otra información sobre el título:</label>
            <input type="text" id="otra_info" name="otra_info" class="border border-solid rounded">
            
            <label for="autor">Autor:</label>
            <select id="autor" name="autor" class="border border-solid rounded">
                <option value='blank' selected>
                <?php
                // Conexión a la base de datos
                    $servername = "localhost";
                    $username = "c2030171_opac";
                    $password = "su87TEmavu";
                    $database = "c2030171_opac";
    
                $conn = new mysqli($servername, $username, $password, $database);
    
                // // // Verificar conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }
    
                // Consulta SQL para obtener las opciones
                $sql = "SELECT id_autor, forma_autorizada FROM autoridades ORDER BY forma_autorizada ASC";

                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                    // Imprimir opciones en el cuadro desplegable
                    while($row = $result->fetch_assoc()) {
                        echo"
                        </option>
                        <option value='" . $row['id_autor'] . "'>
                            " . $row['forma_autorizada'] . "
                        </option>";
                    }
                } else {
                    echo "No se encontraron opciones.";
                }
    
                // Cerrar conexión
                $conn->close();
                ?>
            </select>


            <label for="">Edición:</label>
            <input type="text" id="edicion" name="edicion" class="border border-solid rounded">
            <label for="">Material:</label>
            <input type="text" id="material" name="material" class="border border-solid rounded">
            <label for="">Publicación:</label>
            <input type="text" id="publicacion" name="publicacion" class="border border-solid rounded">
            <label for="">Descripción física:</label>
            <input type="text" id="descripcion" name="descripcion" class="border border-solid rounded">
            <label for="">Serie:</label>
            <input type="text" id="serie" name="serie" class="border border-solid rounded">
            <label for="">Notas:</label>
            <input type="text" id="notas" name="notas" class="border border-solid rounded">
            <label for="">Número normalizado:</label>
            <input type="text" id="normalizado" name="normalizado" class="border border-solid rounded">
            <label for="">Portada:</label>
            <input type="file" name="portada" id="portada">
        </div>

        <div class="bg-gris flex flex-col p-2 rounded mt-2 mb-2">
            <label for="">Signatura topográfica:</label>
            <input type="text" id="signatura" name="signatura" class="border border-solid rounded">
            <label for="">Disponibilidad:</label>
            <input type="text" id="disponibilidad" name="disponibilidad" class="border border-solid rounded">
        </div>
        <button type="submit"
            class="bg-azul border border-solid rounded p-2 m-1 text-blanco cursor-pointer">Enviar</button>
        <button type="reset"
            class="bg-rojo border border-solid rounded p-2 m-1 text-blanco cursor-pointer">Reset</button>
    </form>
    </section>
    <!-- Footer: legales, etc. -->
    <footer class= "flex flex-wrap items-left justify-left bg-gris border-t-0 border-l-0 border-r-0 border-b-4 border-b-rojo h-22 md:h-20  lg:h-20">
        <div class="m-4">
            <h6>©Biblioteca Popular Sanlorencista "Leónidas Barletta"</h6>
            <h6>Desarrollado por <a href="https://github.com/i-bruno" target="_blank" class="font-bold">BrunoDev</a></h6>
        </div>
    
    </footer>

    <script src="./js/cambio_form.js"></script>
</body>

</html>