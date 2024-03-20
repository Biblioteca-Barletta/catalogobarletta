document.addEventListener("DOMContentLoaded", function () {
    const selector = document.getElementById("selector");
    const formularioDinamico = document.getElementById("formulario-dinamico");

    // Define las opciones para cada selección
    const opciones = {
        opcion1: ["Título:", "Edición:", "Material:", "Publicación:", "Descripción física:", "Serie:", "Notas:", "Número normalizado:", "Portada:", "Signatura topográfica:", "Disponibilidad:"],
        opcion2: ["Campo 3:", "Campo 4:"]
    };

    // Función para actualizar el formulario según la opción seleccionada
    function actualizarFormulario() {
        const opcionSeleccionada = selector.value;
        const campos = opciones[opcionSeleccionada];
        formularioDinamico.innerHTML = ""; // Borra los campos anteriores

        // Agrega los nuevos campos al formulario
        campos.forEach(function (labelText) {
            const label = document.createElement("label");
            label.textContent = labelText;
            const input = document.createElement("input");

            // Verifica si el campo debe ser un campo de archivo
            if (labelText.includes("Portada")) {
                input.setAttribute("type", "file");
            } else {
                input.setAttribute("type", "text");
            }

            formularioDinamico.appendChild(label);
            formularioDinamico.appendChild(input);
        });
    }

    // Llama a la función inicialmente para mostrar los campos para la opción predeterminada
    actualizarFormulario();

    // Agrega un listener para detectar cambios en el selector
    selector.addEventListener("change", actualizarFormulario);
});
