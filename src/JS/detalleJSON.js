let numPeticion=1;
let estadoTemp="";

function obtenerDetalle(estadoDelInventario,nombreArchivo) {
    if(estadoDelInventario!=estadoTemp){
        estadoTemp=estadoDelInventario;
        numPeticion=1;
    }else{
        numPeticion++;
    }
    fetch('../src/detalleInventario.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({nombreArchivo: nombreArchivo, estadoDelInventario: estadoDelInventario, numPeticion: numPeticion })
    })
    .then(function(response) {
        if (response.ok) {            
            return response.json();
        }
        throw new Error('Error al obtener el detalle del inventario.');
    })
    .then(function(data) {
        mostrarDetalle(data);
    })
    .catch(function(error) {
        alert(error.message);
    });
}

function mostrarDetalle(data) {
    let resultadoDiv = document.getElementById('resultado');
    resultadoDiv.innerHTML = ''; // Limpia el contenido actual

    // Itera sobre los elementos del resultado y crea el contenido HTML
    for (let clave in data) {
        let elemento = data[clave];
        let html = '<div class="card mb-3">' +
            '<div class="card-body">' +
            '<h5 class="card-title">' + clave + '</h5>' +
            '<p class="card-text">Nombre: ' + elemento.nombre + '</p>' +
            '<p class="card-text">Área: ' + elemento.area + '</p>' +
            '<p class="card-text">Ubicación: ' + elemento.ubicacion + '</p>' +
            '<p class="card-text">Observaciones: ' + elemento.observaciones + '</p>' +
            '</div>' +
            '</div>';

        resultadoDiv.innerHTML += html; // Agrega el contenido al contenedor
    }
}
