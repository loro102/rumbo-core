<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Rumbo Juridico</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                {if (isset($smarty.get.view) and $smarty.get.view =='index') or !isset($smarty.get.view)}
                <li class="active">{else}
                    <li>{/if}<a href="?view=principal">Inicio <span class="sr-only">(current)</span></a></li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Insertar ...<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="?view=">Abonado</a></li>
                        <li><a href="?view=">Profesional</a></li>
                        <li><a href="?view=">Aseguradora</a></li>
                        <li><a href="?view=">Agente</a></li>
                        <li><a href="?view=">Cita</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Listados de ... <span
                        class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="?view=">Siniestros</a></li>
                    <li><a href="?view=">Siniestros no tráfico</a></li>
                    <li><a href="?view=">Facturas</a></li>
                    <li><a href="?view=">Informes</a></li>
                    <li><a href="?view=">Profesionales</a></li>
                    <li><a href="?view=">Aseguradoras</a></li>
                </ul>
            </li>
                </ul>
            <form class="navbar-form navbar-left" role="search" action="?view=buscar" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Buscar un cliente..." name="busqueda" size="50" >
                </div>
                <button type="submit" class="btn btn-default">Buscar</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                {if isset($smarty.session.usuario)}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{$smarty.session.usuario}<span
                            class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="?view=perfil&id={$smarty.session.id}">Perfil</a></li>
                        <li><a href="?view=cuenta">Cuenta</a></li>
                        <li><a href="?view=logout">Logout</a></li>
                    </ul>
                </li>
                {else}
                    {if (isset($smarty.get.view) and $smarty.get.view == 'login')}
                <li class="active">
                    {else}
                <li>{/if}<a href="?view=login">Login</a></li>
                {if (isset($smarty.get.view) and $smarty.get.view == 'reg')}
                <li class="active">
                    {else}
                <li>{/if}<a href="?view=reg">Registrarme</a></li>
                {/if}
            </ul>
        </div>
    </div>
</nav>