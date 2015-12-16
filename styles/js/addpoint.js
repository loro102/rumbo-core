function Addpoints($points) {
    var connect, session, form, result;
    if (parseInt($points) >= 1 && parseInt($points)<= 10){
        form = 'points=' + points;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

        connect.onreadystatechange = function () {
            if (connect.readyState == 4 && connect.status == 200) {
                if (parseInt(connect.responseText) == 1) {
                    //Conectado con exito
                    //Se redirecciona
                    result = '<div class="alert alert-dismissible alert-success" style="width:500px">';
                    result += '<button type="button" class="close" data-dismiss="alert">X</button>';
                    result += '<strong>Conectado. Entrando</strong>';
                    result += '</div>';
                    location.href = '?view=index';
                    document.getElementById('_AJAX_').innerHTML = result;
                } else {
                    //ERROR: Los datos son incorrectos
                    result = '<div class="alert alert-dismissible alert-danger" style="width:500px">';
                    result += '<button type="button" class="close" data-dismiss="alert">X</button>';
                    result += '<strong>ERROR:</strong> Credenciales incorrectas.';
                    result += '</div>';
                    document.getElementById('_AJAX_').innerHTML = result;
                }
            } else if (connect.readyState != 4) {
                //procesando

            }
        };
        connect.open('POST', '?view= post&id={smarty.get.id}&mode=puntos', true);
        connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        connect.send(form);
    }
}

