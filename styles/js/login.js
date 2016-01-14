/**
 * Created by loro102 on 09/01/2016.
 */
window.onload = function(){
    document.getElementById('send_request').onclick = function() {
        var connect, usuario, password, session, form, result;
        usuario = document.getElementById('usuario').value;
        password = document.getElementById('password').value;
        session = !!document.getElementById('session').checked;
        if(usuario != '' && password != ''){
            form =  'usuario=' + usuario + '&password=' + password + '&session=' + session;
            connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

            connect.onreadystatechange = function() {
                if(connect.readyState == 4 && connect.status == 200) {
                    if(parseInt(connect.responseText) == 1) {
                        //Conectado con exito
                        //Se redirecciona
                        result = '<div class="alert alert-dismissible alert-success" style="width:500px">';
                        result += '<button type="button" class="close" data-dismiss="alert">X</button>';
                        result += '<strong>Conectado. Entrando</strong>';
                        result += '</div>';
                        location.href = '?view=principal';
                        document.getElementById('_AJAX_').innerHTML = result;
                    }else{
                        //ERROR: Los datos son incorrectos
                        result = '<div class="alert alert-dismissible alert-danger" style="width:500px">';
                        result += '<button type="button" class="close" data-dismiss="alert">X</button>';
                        result += '<strong>ERROR:</strong> Credenciales incorrectas.';
                        result += '</div>';
                        document.getElementById('_AJAX_').innerHTML = result;
                    }
                }else if(connect.readyState != 4) {
                    //procesando
                    result = '<div class="alert alert-dismissible alert-warning" style="width:500px">';
                    result += '<button type="button" class="close" data-dismiss="alert">X</button>';
                    result += '<strong>PROCESANDO . . .</strong>';
                    result += '</div>';
                    document.getElementById('_AJAX_').innerHTML = result;
                }
            };
            connect.open('POST','?view=login',true);
            connect.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
            connect.send(form);
        }else{
            //ERROR:Campos vacios
            result = '<div class="alert alert-dismissible alert-danger" style="width:500px">';
            result += '<button type="button" class="close" data-dismiss="alert">X</button>';
            result += '<strong>ERROR:</strong> El usuario y la contraseña no pueden estar vacios.';
            result += '</div>';
            document.getElementById('_AJAX_').innerHTML = result;
        }
    }
}