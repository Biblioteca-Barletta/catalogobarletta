// Obtener elementos del DOM
const modal = document.getElementById('editModal');
const closeModalBtn = document.querySelector('.close');

// Función para abrir el modal y rellenar el formulario
function openEditModal(button) {
    const itemDiv = button.parentNode;
    const item = {
        id_items: itemDiv.querySelector('.id_items').innerText.split(': ')[1],
        titulo: itemDiv.querySelector('.titulo').innerText.split(': ')[1],
        nombre_autor: itemDiv.querySelector('.nombre_autor').innerText.split(': ')[1]
        // Añade aquí otros campos si es necesario
    };

    document.getElementById('editItemId').value = item.id_items;
    document.getElementById('editTitulo').value = item.titulo;
    document.getElementById('editAutor').value = item.nombre_autor;
    // Rellenar otros campos si es necesario

    modal.classList.remove('hidden');
}

// Función para cerrar el modal
function closeEditModal() {
    modal.classList.add('hidden');
}

// Asignar evento al botón de cerrar
closeModalBtn.addEventListener('click', closeEditModal);

// Cerrar el modal al hacer clic fuera de él
window.addEventListener('click', function(event) {
    if (event.target == modal) {
        closeEditModal();
    }
});
