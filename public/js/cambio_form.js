// Obtener el elemento select
let select = document.getElementById("selector");

// Agregar un evento de cambio al select
select.addEventListener("change", function() {
    // Obtener el valor seleccionado
    let selectedValue = this.value;
    
    // Redirigir según la opción seleccionada
    if (selectedValue === "opcion1") {
        window.location.href = "carga.php";
    } else if (selectedValue === "opcion2") {
        window.location.href = "carga_autoridad.php";
    } else if (selectedValue === "opcion3") {
        window.location.href = "carga_clas.php";
    }
});