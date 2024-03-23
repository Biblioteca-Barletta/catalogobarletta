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
            <ul class="me-4 hover:underline md:me-6"><a href="./index.php">Inicio</a></ul>
            <ul class="me-4 hover:underline md:me-6">Novedades</ul>
            <ul class="me-4 hover:underline md:me-6"><a href="./carga.php">Carga</a></ul>
        </li>
    </header>

    <h1 class="ml-5 mt-5">Carga de autoridades</h1>
    <form action='carga_datos_autoridad.php' method="post" enctype="multipart/form-data" class="m-5 flex flex-col p-2 rounded">
        <label for="selector">Seleccione qué cargará</label>
        <select name="select" id="selector" class="rounded m-2 p-1 border border-solid">
            <option value="opcion1">
                Item
            </option>
            <option value="opcion2">
                Autoridad
            </option>
        </select>
        <hr>
        <div class="bg-gris flex flex-col p-2 rounded mb-2 mt-2">
            <label for="autorizada">Foma autorizada:</label>
            <input type="text" id="autorizada" name="autorizada" class="border border-solid rounded">
            
            <label for="directa">Forma directa:</label>
            <input id="directa" name="directa" class="border border-solid rounded">
        </div>
        <button type="submit"
            class="bg-azul border border-solid rounded p-2 m-1 text-blanco cursor-pointer">Enviar</button>
        <button type="reset"
            class="bg-rojo border border-solid rounded p-2 m-1 text-blanco cursor-pointer">Reset</button>
    </form>
    <!-- Footer: legales, etc. -->
    <footer class="border-t-0 border-l-0 border-r-0 border-b-4 border-b-azul h-20 flex border border-solid">
    <h6>©Biblioteca Popular Sanlorencista "Leónidas Barletta"</h6>
    </footer>

    <script src="./js/cambio_form.js"></script>
</body>

</html>