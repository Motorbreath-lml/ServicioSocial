function obtenerDatos() {
    
    // Obtener el valor de 'nombreArchivo' de la URL
    let urlParams = new URLSearchParams(window.location.search);
    let nombreArchivo = urlParams.get('nombreArchivo');

    // Usar el valor en tu código
    console.log(nombreArchivo); // Imprime el valor en la consola


    // Enviar una solicitud al archivo PHP usando fetch
    fetch("tuphparchivo.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ nombreArchivo: nombreArchivo }),
    })
        .then(function (response) {
            if (response.ok) {
                return response.json(); // Si la respuesta es JSON
                //return response.text(); // Si la respuesta es texto
            }
            throw new Error("Error al obtener los datos.");
        })
        .then(function (data) {
            // Manipular los datos recibidos
            mostrarDatos(data);
        })
        .catch(function (error) {
            console.error(error);
        });
}
