/**
 * Created by loro102 on 20/01/2016.
 */
window.onload = function(){
    document.getElementById('send_request').onclick = function() {
        var connect, nombre, apellido1, apellido2,agente,nif,colectivo,precio,descuento,direccion,codigopostal,localidad,provincia,fechanacimiento, fechaalta,telefono1,telefono2,telefono3,email,iban,notas,form, result;
        nombre = document.getElementById('nombre').value;
        apellido1 = document.getElementById('apellido1').value;
        apellido2 = document.getElementById('apellido2').value;
        agente = document.getElementById('agente').value;
        colectivo = document.getElementById('colectivo').value;
        precio = document.getElementById('precio').value;
        descuento = document.getElementById('descuento').value;
        nif = document.getElementById('nif').value;
        direccion = document.getElementById('direccion').value;
        codigopostal = document.getElementById('codigopostal').value;
        localidad = document.getElementById('localidad').value;
        provincia = document.getElementById('provincia').value;
        fechanacimiento = document.getElementById('fechanacimiento').value;
        fechaalta = document.getElementById('fechaalta').value;
        telefono1 = document.getElementById('telefono1').value;
        telefono2 = document.getElementById('telefono2').value;
        telefono3 = document.getElementById('telefono3').value;
        email = document.getElementById('email').value;
        iban = document.getElementById('iban').value;
        notas = document.getElementById('notas').value;
        if(nombre != '' && apellido1 != ''&& apellido2 != ''&& agente != ''&& nif != ''&& fechanacimiento != ''&& fechaalta != ''&& telefono1 != ''){
            form =  'nombre=' + nombre + '&apellido1=' + apellido1 + '&apellido2=' + apellido2 + '&agente=' + agente + '&nif=' + nif + '&colectivo=' + colectivo + '&precio=' + precio + '&descuento=' + descuento + '&direccion=' + direccion + '&codigopostal=' + codigopostal + '&localidad=' + localidad + '&provincia=' + provincia + '&fechanacimiento='+ fechanacimiento + '&fechaalta=' + fechaalta+ '&telefono1=' + telefono1 + '&telefono2=' + telefono2 + '&telefono3=' + telefono3 + '&email=' + email + '&iban=' + iban + '&notas=' + notas;
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
            connect.open('POST','?view=abonado',true);
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