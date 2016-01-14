{include 'overall/header.tpl'}
<body>

    <div class="container" style="margin-top: 70px;">
        <div align="center">
            <img src="styles/images/logo.png" width="400">
        </div>
        <center>
            <div id="_AJAX_" ></div>
            {if isset($msg)}
            <br/>
            <div class="alert alert-dismissible alert-success" style="width:500px" >
                <button type="button" class="close" data-dismiss="alert">X</button>
                <strong>{$msg}</strong>
            </div>
            {else}
            {/if}
        <div class="container">
            <div class="form-signin" style="width:500px;">
                <h2 class="form-signin-heading">Inicia Sesion</h2>
                <label for="usuario"  class="sr-only">Usuario</label>
                <input type="text" id="usuario" class="form-control" placeholder="Introduce tu usuario" required="" autofocus="">
                <label for="password" class="sr-only">Contraseña</label>
                <input type="password" id="password"  class="form-control" placeholder="Introduce tu contraseña" required="">
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
    <script src='styles/js/login.js' language="javascript" type="text/javascript"></script>


</body>
</html>