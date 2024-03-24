function openModal(titulo) {
    // Obtén el modal
    let modal = document.getElementById("modal");
    
    // Actualiza dinámicamente el título del modal
    let modalTitle = modal.querySelector(".card-title");
    modalTitle.textContent = titulo;
    
    // Muestra el modal
    modal.classList.remove("hidden");
}

function closeModal() {
    // Obtén el modal
    let modal = document.getElementById("modal");
    
    // Oculta el modal
    modal.classList.add("hidden");
}