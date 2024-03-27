// eliminar_item.js

$(document).ready(function() {
    // Maneja el clic en el botón "Eliminar"
    $("button.eliminar-item").click(function() {
        let itemId = $(this).closest(".bg-gris").find(".id-items").text(); // Obtiene el ID del item
        // Envía una solicitud AJAX para eliminar el item
        $.ajax({
            url: "eliminar_item.php",
            type: "POST",
            data: { id: itemId },
            success: function(response) {
                // Actualiza la página o muestra un mensaje de éxito si es necesario
                // Aquí puedes recargar la página o actualizar la lista de items
                location.reload(); // Recarga la página después de eliminar el item
            },
            error: function(xhr, status, error) {
                // Maneja errores si es necesario
                console.error(xhr.responseText);
            }
        });
    });
});
