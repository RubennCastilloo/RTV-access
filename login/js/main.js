
(function ($) {
    "use strict";


    /*==================================================================
    [ Focus input ]*/
    $('.input100').each(function(){
        $(this).on('blur', function(){
            if($(this).val().trim() != "") {
                $(this).addClass('has-val');
            }
            else {
                $(this).removeClass('has-val');
            }
        })    
    })
  
  
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    /*==================================================================
    [ Show pass ]*/
    var showPass = 0;
    $('.btn-show-pass').on('click', function(){
        if(showPass == 0) {
            $(this).next('input').attr('type','text');
            $(this).find('i').removeClass('zmdi-eye');
            $(this).find('i').addClass('zmdi-eye-off');
            showPass = 1;
        }
        else {
            $(this).next('input').attr('type','password');
            $(this).find('i').addClass('zmdi-eye');
            $(this).find('i').removeClass('zmdi-eye-off');
            showPass = 0;
        }
        
    });


})(jQuery);


const login = document.querySelector('#login');

eventListenners();

function eventListenners() {
    if (login) {
        login.addEventListener('click', loginPage);
    }
}


function loginPage(e) {
    e.preventDefault();

    const usuario = document.querySelector('#usuario').value,
          password = document.querySelector('#password').value;

    if (usuario === '' || password === '') {
        notificacionFlotante('error', 'Todos los campos son obligatorios');
    } else {
        const datosLogin = new FormData();
        datosLogin.append('usuario', usuario);
        datosLogin.append('password', password);

        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'include/model/sesion.php', true);
        xhr.onload = function() {
            const respuesta = JSON.parse(xhr.responseText);
            if (respuesta.respuesta === 'correcto') {
                notificacionFlotante('success', 'Todo Correcto');
                window.location.href = '/radio';
            }
            if (respuesta.respuesta === 'incorrecto') {
                notificacionFlotante('error', 'Password Incorrecto');
            }
            if (respuesta.respuesta === 'noexiste') {
                notificacionFlotante('error', 'Usuario no existe');
            }

            
        }
        xhr.send(datosLogin);
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