function openModal(titulo, otraInfo, edicion, material, publicacion, descripcion, serie, notas, normalizado, dispo, signatura) {
    // Obtén el modal
    let modal = document.getElementById("modal");
    
    // Actualiza dinámicamente el título del modal
    let modalTitle = modal.querySelector(".card-title");
    modalTitle.textContent = titulo;

    // Actualiza dinámicamente la otra info del modal
    let modalOtraInfo = modal.querySelector(".modal-otra-info");
    modalOtraInfo.textContent = otraInfo;

    // Actualiza dinámicamente la edición del modal
    let modalEdicion = modal.querySelector(".modal-edicion");
    modalEdicion.textContent = "Edición: " + edicion;

    // Actualiza dinámicamente la material del modal
    let modalMaterial = modal.querySelector(".modal-material");
    modalMaterial.textContent = "Material: " + material;

    // Actualiza dinámicamente la publicación del modal
    let modalPubli = modal.querySelector(".modal-publi");
    modalPubli.textContent = "Publicación: " + publicacion;

    // Actualiza dinámicamente la descripción física del modal
    let modalDescripcion = modal.querySelector(".modal-descripcion");
    modalDescripcion.textContent = "Descripción física: " + descripcion;

    // Actualiza dinámicamente la serie del modal
    let modalSerie = modal.querySelector(".modal-serie");
    modalSerie.textContent = "Serie: " + serie;

    // Actualiza dinámicamente la notas del modal
    let modalNotas = modal.querySelector(".modal-notas");
    modalNotas.textContent = "Notas: " + notas;

    // Actualiza dinámicamente la número normalizado del modal
    let modalNormalizado = modal.querySelector(".modal-normalizado");
    modalNormalizado.textContent = "Número normalizado: " + normalizado;

    // Actualiza dinámicamente la disponibilidad del modal
    let modalDispo = modal.querySelector(".modal-dispo");
    modalDispo.textContent = "Disponibilidad: " + dispo;

    // Actualiza dinámicamente la signatura del modal
    let modalSignatura = modal.querySelector(".modal-signatura");
    modalSignatura.textContent = "Signatura topográfica: " + signatura;

    
    // Muestra el modal
    modal.classList.remove("hidden");
}

function closeModal() {
    // Obtén el modal
    let modal = document.getElementById("modal");
    
    // Oculta el modal
    modal.classList.add("hidden");
}