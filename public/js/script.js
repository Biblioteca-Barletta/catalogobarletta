function openModal(titulo, otraInfo) {
    // Obtén el modal
    let modal = document.getElementById("modal");
    
    // Actualiza dinámicamente el título del modal
    let modalTitle = modal.querySelector(".card-title");
    modalTitle.textContent = titulo;

    // Actualiza dinámicamente la otra info del modal
    let modalOtraInfo = modal.querySelector(".modal-otra-info");
    modalOtraInfo.textContent = otraInfo;
    
    // Muestra el modal
    modal.classList.remove("hidden");
}

function closeModal() {
    // Obtén el modal
    let modal = document.getElementById("modal");
    
    // Oculta el modal
    modal.classList.add("hidden");
}