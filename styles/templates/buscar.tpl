{include 'overall/header.tpl'}
<body>
{include 'overall/nav.tpl'}

<div class="container-fluid" style="margin-top: 60px;">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header">{$titulo}</h2>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 65%;">Abonado</th>
                        <th style="width: 5%;text-align: center;">NIF</th>
                    </tr>
                    </thead>
                    <tbody>
                    {if isset($abonados)}
                    {foreach from=$abonados item=pt}
                    <tr>
                        <td><a href="?view=abonado&id={$pt.id}">{$pt.apellido1} {$pt.apellido2},{$pt.nombre}</a></td>
                        <td style="text-align: center;width: 5%;">{$pt.nif}</td>
                    </tr>
                    {/foreach}
                    {else}
                    <tr>
                        <td colspan="4">Sin clientes</td>
                    </tr>
                    {/if}

                    </tbody>
                </table>
                <h2 class="sub-header">Otros enlazados</h2>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th style="width: 65%;">Abonado</th>
                        <th style="width: 5%;text-align: center;">NIF</th>
                    </tr>
                    </thead>
                    <tbody>
                {if isset($enlazados)}

                {foreach from=$enlazados item=enla}
                <tr>
                    <td><a href="?view=abonado&id={$enla.id}">{$enla.nombre}</a></td>
                    <td style="width: 5%;text-align: center;">{$enla.nif}</td>
                </tr>
                {/foreach}
                {else}
                <tr>
                    <td colspan="4">Sin otros enlazados</td>
                </tr>
                {/if}
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

{include 'overall/footer.tpl'}
</body>
</html>