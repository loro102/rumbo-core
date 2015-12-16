{include 'overall/header.tpl'}
<body>

    {include 'overall/nav.tpl'}
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                {include 'overall/menu.tpl'}
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                <h2 class="sub-header">{$titulo}</h2>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th style="width: 65%;">Post</th>
                            <th style="width: 25%;">Autor</th>
                            <th style="width: 5%;">Puntos</th>
                            <th style="width: 5%;">Comentarios</th>
                        </tr>
                        </thead>
                        <tbody>
                        {if isset($posts)}
                        {foreach from=$posts item=pt}
                        <tr>
                            <td><a href="?view=post&id={$pt.id}">{$pt.titulo}</a></td>
                            <td><a href="?view=perfil&id={$pt.id_dueno}">{$pt.dueno}</a></td>
                            <td style="text-align: center;">{$pt.puntos}</td>
                            <td style="text-align: center;">0</td>
                        </tr>
                        {/foreach}
                        {else}
                        <tr>
                            <td colspan="4">No Existen posts</td>
                        </tr>
                        {/if}
                        </tbody>
                    </table>
                </div>
                {if isset($posts)}
                <div class="btn-group btn-group-justified" role="group" aria-label="..." >
                    {if !isset($smarty.get.pag)}
                        <a type="button" class="btn btn-default disabled" href="#">Anterior</a>
                        {if $pags>1}
                            {if isset($smarty.get.type)}
                            <a type="button" class="btn btn-default" href="?view=index&type={$smarty.get.type}&pag=2">Siguiente</a>
                            {else if isset($smarty.get.view) and $smarty.get.view =='buscar'}
                            <a type="button" class="btn btn-default" href="?view=buscar&pag=2">Siguiente</a>
                            {else}
                            <a type="button" class="btn btn-default" href="?view=index&pag=2">Siguiente</a>
                            {/if}
                        {else}
                        <a type="button" class="btn btn-default disabled" href="#">Siguiente</a>
                        {/if}
                    {else}
                        {if $smarty.get.pag <= 1}
                        <a type="button" class="btn btn-default disabled" href="#">Anterior</a>
                        {else}
                            {if isset($smarty.get.type)}
                            <a type="button" class="btn btn-default" href="?view=index&type={$smarty.get.type}&pag={$smarty.get.pag-1}">Anterior</a>
                                {else if isset($smarty.get.view) and $smarty.get.view =='buscar'}
                            <a type="button" class="btn btn-default" href="?view=buscar&pag={$smarty.get.pag-1}">Anterior</a>
                            {else}
                            <a type="button" class="btn btn-default" href="?view=index&pag={$smarty.get.pag-1}">Anterior</a>
                            {/if}
                        {/if}
                        {if $pags>1 and $smarty.get.pag>=1 and $smarty.get.pag < $pags}
                            {if isset($smarty.get.type)}
                            <a type="button" class="btn btn-default" href="?view=index&type={$smarty.get.type}&pag={$smarty.get.pag+1}">Siguiente</a>
                                {else if isset($smarty.get.view) and $smarty.get.view =='buscar'}
                            <a type="button" class="btn btn-default" href="?view=buscar&pag={$smarty.get.pag+1}">Siguiente</a>
                            {else}
                            <a type="button" class="btn btn-default" href="?view=index&pag={$smarty.get.pag+1}">Siguiente</a>
                            {/if}
                        {else}
                        <a type="button" class="btn btn-default disabled" href="#">Siguiente</a>
                        {/if}
                    {/if}
                </div>
                {else}
                {/if}
            </div>
        </div>
    </div>

    {include 'overall/footer.tpl'}
</body>
</html>       