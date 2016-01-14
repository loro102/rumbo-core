{include 'overall/header.tpl'}
<body>
<table class="table table-striped">
    <thead>
    <tr>
        <th style="width: 65%;">fecha</th>
        <th style="width: 5%;text-align: center;">Alerta</th>
    </tr>
    </thead>
    <tbody>
    {if isset($citas)}
    {foreach from=$citas item=pt}
    <tr>
        <td><a href="?view=abonado&id={$pt.id}">{$pt.Fecha}</a></td>
        <td style="text-align: center;width: 5%;">{$pt.alerta}</td>
    </tr>
    {/foreach}
    {else}
    <tr>
        <td colspan="4">Sin clientes</td>
    </tr>
    {/if}

    </tbody>
</table>
{include 'overall/footer.tpl'}
</body>
</html>