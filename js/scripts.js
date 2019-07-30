const registrar = document.querySelector('#registrarUsuario'),
      listadoUsuario = document.querySelector('.listado-usuarios');

eventListenner();

function eventListenner() {
    if (registrar) {
        registrar.addEventListener('click', registrarUsuario);
    }
    if (listadoUsuario) {
        listadoUsuario.addEventListener('click', eliminarUsuario);
    }
}

function notificacionFlotante(tipo, texto) {
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });
      
      Toast.fire({
        type: tipo,
        title: texto
      })
}

function registrarUsuario(e) {
    e.preventDefault();
    
    const nombre = document.querySelector('#nombre').value,
          apellido = document.querySelector('#apellido').value,
          usuario = document.querySelector('#usuario').value,
          password = document.querySelector('#password').value,
          tipo = document.querySelector('#usuarioTipo').value;

          if (nombre === '' || apellido === '' || usuario === '' || password === '' || tipo === '') {
              notificacionFlotante('error', 'Todos los campos son obligatorios');
          } else {
              datosUsuario = new FormData();

              datosUsuario.append('nombre', nombre);
              datosUsuario.append('apellido', apellido);
              datosUsuario.append('usuario', usuario);
              datosUsuario.append('password', password);
              datosUsuario.append('tipo', tipo);

              const xhr = new XMLHttpRequest();

              xhr.open('POST', 'include/model/registro.php', true);

              xhr.onload = function() {
                  if (this.status === 200) {
                      const respuesta = JSON.parse(xhr.responseText);
                      console.log(respuesta);
                      if (respuesta.respuesta === 'correcto') {
                          notificacionFlotante('success', 'Datos Ingresados');
                          document.querySelector('#formulario-usuario').reset();
                      }
                      if (respuesta.respuesta === 'existe') {
                          notificacionFlotante('error', 'El Usuario ya existe');
                      }
                      if (respuesta.respuesta === "error") {
                          notificacionFlotante('error', 'Hubo un error');
                      }

                  }
                  
              }
              xhr.send(datosUsuario);
          }

}

function eliminarUsuario(e) {
    if(e.target.parentElement.classList.contains('borrar')) {
      const id = e.target.parentElement.getAttribute('data-id');
      console.log(id);

      Swal.fire({
        title: '¿Estas seguro(a)?',
        text: "Esta acción no se podrá deshacer",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#1d9e19',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si, borrar',
        cancelButtonText: 'Cancelar'
      }).then((result) => {
        if (result.value) {
          
            const xhr = new XMLHttpRequest();
            
            xhr.open('GET', `include/model/borrar.php?id=${id}`, true);
  
            xhr.onload = function() {
              if (this.status === 200) {
                const respuesta = JSON.parse(xhr.responseText);
                 console.log(respuesta);
                if (respuesta.respuesta === 'correcto') {
                   //Eliminar el registro del DOM
                  // console.log(e.target.parentElement.parentElement.parentElement);
                  e.target.parentElement.parentElement.parentElement.remove();
                  if (result.value) {
                    Swal.fire(
                      'Eliminado',
                      'Usuario eliminado correctamente',
                      'success'
                    )
                  }
                  
                }
                if (respuesta.respuesta === 'error') {
                  if (result.value) {
                    Swal.fire(
                      'Error',
                      'No se puede eliminar el usuario',
                      'error'
                    )
                  }
                }
              }
            }
  
            xhr.send();
        }
      })
    }
}


