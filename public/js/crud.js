//Se crea una constante para manejar la URL
const URL_BASE = "http://localhost/mvcphp/alumno",
    btnEliminar = document.querySelectorAll("#btnEliminar");

function eliminar(id, callback) { 
    console.log(`${URL_BASE}/delete/${id}`);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", `${URL_BASE}/delete/${id}`, true);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function () { 
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(xmlhttp); 
            console.log('Se elimino el registro');
        }
     }
 }

btnEliminar.forEach(boton => {
    boton.addEventListener('click', function (e) { 
        console.log("Click en eliminar");
        let id = boton.dataset.id;
        console.log(id);
        eliminar(id, function () {  
            console.log(this.responseText);
            const tbody = document.querySelector("#cuerpoTabla");
            const fila = document.querySelector(`fila-${id}`);
            tbody.removeChild(fila);
        })
     });
});

 