{include 'overall/header.tpl'}
<body>

    {include 'overall/nav.tpl'}
    <div class="container" style="margin-top: 30px;">
        <center>
            <div id="_AJAX_" >

            </div>
        <div class="container">
            <div class="form-signin" style="width:500px;">
                <h2 class="form-signin-heading">Inicia Sesion</h2>
                <label for="user"  class="sr-only">Usuario</label>
                <input type="text" id="user" class="form-control" placeholder="Introduce tu usuario" required="" autofocus="">
                <label for="pass" class="sr-only">Contraseña</label>
                <input type="password" id="pass"  class="form-control" placeholder="Introduce tu contraseña" required="">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id="session" value="1"> Recordarme
                    </label>
                </div>
                <button class="btn btn-primary btn-block" id="send_request" type="button">Iniciar Sesion</button>
            </div>

        </div>
    </center>
        </div>
        {include 'overall/footer.tpl'}
    <script>
        window.onload = function(){
            document.getElementById('send_request').onclick = function() {
                var connect, user, pass, session, form, result;
                user = document.getElementById('user').value;
                pass = document.getElementById('pass').value;
                session = !!document.getElementById('session').checked;
                if(user != '' && pass != ''){
                    form =  'user=' + user + '&pass=' + pass + '&session=' + session;
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
                                location.href = '?view=index';
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
    </script>



</body>
</html>