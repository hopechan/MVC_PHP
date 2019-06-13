
const URL_BASE = "http://localhost/mvcphp/alumno",
    btnEliminar = document.querySelectorAll("#btnEliminar");

const btnEditar = document.querySelectorAll("#btnEditar"),
    btnGuardar = document.getElementById('btnGuardar'),
    formulario = document.getElementById("frmEditar"),
    txtId = document.getElementById("idAlumno"),
    txtNombre = document.getElementById("nombre"),
    txtApellido = document.getElementById("apellido"),
    txtTelefono = document.getElementById("telefono");

function eliminar(id, callback) {
    console.log(`${URL_BASE}/delete/${id}`);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", `${URL_BASE}/delete/${id}`);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            callback.apply(xmlhttp);
            console.log('Se elimino el registro');
        }
    }
}

function getById(id, callback) {
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("GET", `${URL_BASE}/getById/${id}`);
    xmlhttp.send();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            var alumno = JSON.parse(xmlhttp.responseText);
            console.log(alumno);
            txtId.value = alumno.id;
            txtNombre.value = alumno.nombre;
            txtApellido.value = alumno.apellido;
            txtTelefono.value = alumno.telefono;
        }
        //return alumno;
    }
}

function editar(datos) {
    let data = `id=${datos[0]}&nombre=${datos[1]}&apellido=${datos[2]}&telefono=${datos[3]}`;
    console.log(data);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.open("POST", `${URL_BASE}/update/`, true);
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 3 && this.status == 200) {
            console.log('Se actualizo el registro');
        }
    };
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
    xmlhttp.send(data);
}

btnEliminar.forEach(boton => {
    boton.addEventListener('click', function (e) {
        let id = boton.dataset.id;
        eliminar(id, function () {
            const tbody = document.querySelector("#tabla-estudiantes");
            const fila  = document.querySelector(`#fila-${id}`);
            tbody.removeChild(fila);
            console.log(this.responseText);
            M.toast({
                html: 'Registro eliminado',
            });
        })
    });
});


btnEditar.forEach(boton => {
    boton.addEventListener('click', function (e) {
        let id = boton.dataset.id;
        console.log(id);
        let datos = getById(id);
        formulario.style.display = "block";
    })
});

btnGuardar.addEventListener('click', function (e) {
    let id = txtId.value;
    let nombre = txtNombre.value;
    let apellido = txtApellido.value;
    let telefono = txtTelefono.value;
    datos = [id, nombre, apellido, telefono]
    editar(datos);
    M.toast({
        html: 'Registro actualizado',
    });
    formulario.style.display = 'hidden';
});