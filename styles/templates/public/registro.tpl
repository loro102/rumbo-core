{include 'overall/header.tpl'}
<body>

    {include 'overall/nav.tpl'}
    <div class="container" style="margin-top: 30px;">
        <center>
            <div id="_AJAX_">

            </div>
            <div class="container">
                <div class="form-signin" style="width:500px;">
                    <h2 class="form-signin-heading">Registrate</h2>
                    <label for="user" class="sr-only">Usuario</label>
                    <input type="text" id="user" class="form-control" placeholder="Introduce tu usuario" required=""
                           autofocus="">
                    <label for="pass" class="sr-only">Contraseña</label>
                    <input type="password" id="pass" class="form-control" placeholder="Introduce tu contraseña"
                           required="">
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Introduce tu correo electronico"
                           required=""><br>
                    <button class="btn btn-primary btn-block" id="send_request" type="button">Registrar</button>
                </div>
            </div>
        </center>
    </div>
    {include 'overall/footer.tpl'}
    <script>
        window.onload = function () {
            document.getElementById('send_request').onclick = function () {
                var connect, user, pass, email, form, result;
                user = document.getElementById('user').value;
                pass = document.getElementById('pass').value;
                email = document.getElementById('email').value;
                if (user != '' && pass != '' && email != '') {
                    form = 'user=' + user + '&pass=' + pass + '&email=' + email;
                    connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

                    connect.onreadystatechange = function () {
                        if (connect.readyState == 4 && connect.status == 200) {
                            if (parseInt(connect.responseText) == 1) {
                                result = '<div class="alert alert-dismissible alert-success" style="width:500px">';
                                result += '<button type="button" class="close" data-dismiss="alert">X</button>';
                                result += '<strong>Registro Completado</strong>';
                                result += '</div>';
                                location.href = '?view=index';
                                document.getElementById('_AJAX_').innerHTML = result;
                            } else if (parseInt(connect.responseText) == 2) {
                                //ERROR: Los datos son incorrectos
                                result = '<div class="alert alert-dismissible alert-danger" style="width:500px">';
                                result += '<button type="button" class="close" data-dismiss="alert">X</button>';
                                result += '<strong>ERROR:</strong> El usuario ya existe.';
                                result += '</div>';
                                document.getElementById('_AJAX_').innerHTML = result;
                            } else if (parseInt(connect.responseText) == 3) {
                                result = '<div class="alert alert-dismissible alert-danger" style="width:500px">';
                                result += '<button type="button" class="close" data-dismiss="alert">X</button>';
                                result += '<strong>ERROR:</strong> El email ya existe.';
                                result += '</div>';
                                document.getElementById('_AJAX_').innerHTML = result;
                            }else{
                                result = '<div class="alert alert-dismissible alert-danger" style="width:500px">';
                                result += '<button type="button" class="close" data-dismiss="alert">X</button>';
                                result += '<strong>ERROR:</strong> Credenciales incorrectas.';
                                result += '</div>';
                                document.getElementById('_AJAX_').innerHTML = result;
                            }
                        } else if (connect.readyState != 4) {
                            result = '<div class="alert alert-dismissible alert-warning" style="width:500px">';
                            result += '<button type="button" class="close" data-dismiss="alert">X</button>';
                            result += '<strong>REGISTRANDO . . .</strong>';
                            result += '</div>';
                            document.getElementById('_AJAX_').innerHTML = result;
                        }
                    };
                    connect.open('POST', '?view=reg', true);
                    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    connect.send(form);
                } else {
                    //ERROR:Campos vacios
                    result = '<div class="alert alert-dismissible alert-danger" style="width:500px">';
                    result += '<button type="button" class="close" data-dismiss="alert">X</button>';
                    result += '<strong>ERROR:</strong> Todos los campos no pueden estar vacios.';
                    result += '</div>';
                    document.getElementById('_AJAX_').innerHTML = result;
                }
            }
        }
    </script>


</body>
</html>