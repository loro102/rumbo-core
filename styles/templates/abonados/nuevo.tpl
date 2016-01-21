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
        <div class="container" >
            <div class="form-sign" style="width:500px;">
                <h2 class="form-signin-heading">Nuevo Cliente</h2>
                <label for="nombre"  class="sr-only">Nombre</label>
                <input type="text" id="nombre" class="form-control" placeholder="Introduzca el nombre del cliente" required="" autofocus="" >
                <label for="apellido1"  class="sr-only">Apellido</label>
                <input type="text" id="apellido1" class="form-control" placeholder="Introduzca el primer apellido" required="" autofocus="">
                <label for="apellido1"  class="sr-only">Apellido2</label>
                <input type="text" id="apellido2" class="form-control" placeholder="Introduzca el segundo apellido" required="" autofocus="">

                <label for="agente"  class="sr-only">Agente</label>
                <select  id="agente" class="form-control" >
                    <option value="" selected>Ninguno</option>
                    {foreach from=$agente item=agt}
                    {if (isset($agente))}
                    <option value="{$agt.id}">{$agt.Nombre}</option>
                    {/if}

                    {/foreach}
                </select>
                <label for="colectivo"  class="sr-only">Colectivo</label>
                <input type="text" id="colectivo" class="form-control" placeholder="Introduzca el colectivo" required="" autofocus="">
                <label for="precio"  class="sr-only">Precio</label>
                <input type="text" id="precio" class="form-control" placeholder="Introduzca el precio" required="" autofocus="">
                <label for="descuento"  class="sr-only">Descuento</label>
                <input type="text" id="descuento" class="form-control" placeholder="Introduzca el descuento" required="" autofocus="">
                <label for="nif"  class="sr-only">NIF</label>
                <input type="text" id="nif" class="form-control" placeholder="Introduzca el NIF" required="" autofocus="">
                <label for="direccion"  class="sr-only">Dirección</label>
                <input type="text" id="direccion" class="form-control" placeholder="Introduzca la dirección" required="" autofocus="">
                <label for="codigopostal"  class="sr-only">Código Postal</label>
                <input type="text" id="codigopostal" class="form-control" placeholder="Introduzca el código postal" required="" autofocus="">
                <label for="localidad"  class="sr-only">Localidad</label>
                <input type="text" id="localidad" class="form-control" placeholder="Introduzca la localidad" required="" autofocus="">
                <label for="provincia"  class="sr-only">Provincia</label>
                <input type="text" id="provincia" class="form-control" placeholder="Introduzca la provincia" required="" autofocus="">
                <label for="fechanacimiento"  class="sr-only">Fecha de nacimiento</label>
                <input type="date" id="fechanacimiento" class="form-control" placeholder="Introduzca la fecha de nacimiento" required="" autofocus="">
                <label for="fechaalta"  class="sr-only">Fecha de Alta</label>
                <input type="text" id="fechaalta" class="form-control" placeholder="Introduzca la fecha de alta" required="" autofocus="">
                <label for="telefono1"  class="sr-only">Teléfono 1</label>
                <input type="text" id="telefono1" class="form-control" placeholder="Introduzca el primer número de teléfono" required="" autofocus="">
                <label for="telefono2"  class="sr-only">Teléfono 2</label>
                <input type="text" id="telefono2" class="form-control" placeholder="Introduzca el segundo número de teléfono" required="" autofocus="">
                <label for="telefono3"  class="sr-only">Teléfono 3</label>
                <input type="text" id="telefono3" class="form-control" placeholder="Introduzca el tercer número de teléfono" required="" autofocus="">
                <label for="email"  class="sr-only">Correo Electrónico</label>
                <input type="email" id="email" class="form-control" placeholder="Introduzca el correo electrónico" required="" autofocus="">
                <label for="iban"  class="sr-only">IBAN</label>
                <input type="text" id="iban" class="form-control" placeholder="Introduzca el IBAN" required="" autofocus="">
                <label for="notas"  class="sr-only">Notas</label>
                <textarea id="notas" class="form-control" placeholder="Introduzca las notas" required="" autofocus=""></textarea>


                <button class="btn btn-primary btn-block" id="send_request" type="button">Iniciar Sesion</button>
            </div>

        </div>
    </center>
        </div>
        {include 'overall/footer.tpl'}
    <script src='styles/js/abonado.js' language="javascript" type="text/javascript"></script>


</body>
</html>