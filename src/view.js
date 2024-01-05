window.addEventListener('DOMContentLoaded', (event) => {
    // Busca el elemento que contiene el texto "Envío"
    let envioElement = document.querySelector('th:contains("Envío")');
    if (envioElement) {
        // Cambia el texto
        envioElement.innerHTML = 'Envío. La paquetería asignada va a depender del peso, medidas y ubicación de entrega.';
    }
});
