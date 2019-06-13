const URL_BASE = "http://localhost/mvcphp/alumno",
    btnEliminar = document.querySelectorAll("#btnEliminar");

function borrar(id) {
    let respuesta = fetch(`${URL_BASE}/delete/${id}`)
    .then(response =>{
        console.log("Se borro el registro");
        return response.status
        })
    .catch(error =>{
        console.log("Hubo un error: " + error);
        })
}

btnEliminar.forEach(boton => {
    boton.addEventListener('click', function (e) {
        let id = boton.dataset.id;
        let resultado = borrar(id);
        if (resultado == 200) {
            const tbody = document.querySelector("#tabla-estudiantes");
            const fila  = document.querySelector(`#fila-${id}`);
            tbody.removeChild(fila);
            M.toast({
                html: 'Registro eliminado',
            });
        }
    });
});

