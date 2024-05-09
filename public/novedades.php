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

<header class="flex justify-between border-t-0 border-l-0 border-r-0 border-b-4 border-b-azul h-20  border border-solid">
            <ul class="flex flex-wrap items-center justify-center text-gray-900 m-4">
                <li class="relative float-left me-4 hover:underline md:me-6">
                    Inicio
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

    <!-- Section 1: contiene la caja de búsqueda -->

    <section class="flex flex-wrap items-center justify-center text-gray-900 bg-gris border-t-0 border-l-0 border-r-0 border-b-4 border-b-rojo">
    <h1>NOVEDADES</h1>
    </section>

    <!-- Section 2: contiene las novedades con cardbox -->
    <section class="border border-solid border-b-4 border-l-0 border-r-0 border-b-azul grid grid-cols-5">


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