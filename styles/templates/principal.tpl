{include 'overall/header.tpl'}
<body>
{include 'overall/nav.tpl'}
<div class="container-fluid" style="margin-top: 60px;">
    <div class="row">
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <h2 class="sub-header">{$titulo}</h2>
            <div class="panel-group" id="accordion">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                Citas</a>
                        </h4>
                    </div>
                    <div id="collapse1" class="panel-collapse collapse in">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Alerta</th>
                                    </tr>
                                    </thead>
                                    {if isset($citas)}
                                    {foreach from=$citas item=pt}
                                    <tr>
                                        <td><a href="?view=cita&id={$pt.id}">{$pt.fecha|date_format:'%d-%m-%Y'}</a></td>
                                        <td style="text-align: center;width: 80%;">{$pt.alerta}</td>
                                    </tr>
                                    {/foreach}
                                    {else}
                                    <tr>
                                        <td colspan="4">Sin Citas</td>
                                    </tr>
                                    {/if}
                                </table>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Expedientes con más de 20 días sin revisar</a>
                        </h4>
                    </div>
                    <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 70%;">Nombre</th>
                                        <th>Fecha</th>
                                        <th>Última Revisión</th>
                                    </tr>
                                    </thead>
                                    {if isset($pterev)}
                                    {foreach from=$pterev item=ptr}
                                    <tr>
                                        <td><a href="?view=siniestro&id={$ptr.id}">{$ptr.nombre} {$ptr.apellido1} {$ptr.apellido2}</a></td>
                                        <td>{$ptr.fecha|date_format:'%d-%m-%Y'}</td>
                                        <td>{$ptr.ultima|date_format:'%d-%m-%Y'}</td>
                                    </tr>
                                    {/foreach}
                                    {else}
                                    <tr>
                                        <td colspan="4">Sin expedientes pendientes de revisión</td>
                                    </tr>
                                    {/if}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                Fines de procedimiento penal</a>
                        </h4>
                    </div>
                    <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 70%;">Nombre</th>
                                        <th>Fecha de siniestro</th>
                                        <th>Dias que faltan</th>
                                    </tr>
                                    </thead>
                                    {if isset($finproc)}
                                    {foreach from=$finproc item=finpro}
                                    <tr>
                                        <td><a href="?view=siniestro&id={$finpro.id}">{$finpro.nombre} {$finpro.apellido1} {$finpro.apellido2}</a></td>
                                        <td>{$finpro.fecha|date_format:'%d-%m-%Y'}</td>
                                        <td>{date_diff date1=$finpro.fecha date2=$smarty.now interval="days"}</td>
                                    </tr>
                                    {/foreach}
                                    {else}
                                    <tr>
                                        <td colspan="4">Sin expedientes pendientes de revisión</td>
                                    </tr>
                                    {/if}
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Asuntos con más de 1 mes Pendientes de Asistencia Juridica</a>
                        </h4>
                    </div>
                    <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 70%;">Nombre</th>
                                        <th>Fecha</th>
                                        <th>Última Revisión</th>
                                    </tr>
                                    </thead>
                                    {if isset($pterev)}
                                    {foreach from=$pterev item=ptr}
                                    <tr>
                                        <td><a href="?view=siniestro&id={$ptr.id}">{$ptr.nombre} {$ptr.apellido1} {$ptr.apellido2}</a></td>
                                        <td>{$ptr.fecha|date_format:'%d-%m-%Y'}</td>
                                        <td>{$ptr.ultima|date_format:'%d-%m-%Y'}</td>
                                    </tr>
                                    {/foreach}
                                    {else}
                                    <tr>
                                        <td colspan="4">Sin expedientes pendientes de revisión</td>
                                    </tr>
                                    {/if}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Expedientes que llevan más de quince días Pendientes de Facturas</a>
                        </h4>
                    </div>
                    <div id="collapse5" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 70%;">Nombre</th>
                                        <th>Fecha de Alta</th>
                                    </tr>
                                    </thead>
                                    {if isset($ptefac)}
                                    {foreach from=$ptefac item=ptf}
                                    <tr>
                                        <td><a href="?view=siniestro&id={$ptr.id}">{$ptf.nombre} {$ptf.apellido1} {$ptf.apellido2}</a></td>
                                        <td>{$ptf.fecha|date_format:'%d-%m-%Y'}</td>
                                    </tr>
                                    {/foreach}
                                    {else}
                                    <tr>
                                        <td colspan="4">Sin expedientes pendientes de Factura</td>
                                    </tr>
                                    {/if}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Más de 20 días con Alta Forense y SIN Informe</a>
                        </h4>
                    </div>
                    <div id="collapse6" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 70%;">Nombre</th>
                                        <th>Fecha</th>
                                        <th>Fecha Alta Forense</th>
                                    </tr>
                                    </thead>
                                    {if isset($forense)}
                                    {foreach from=forense item=ptf}
                                    <tr>
                                        <td><a href="?view=siniestro&id={$ptr.id}">{$ptf.nombre} {$ptr.apellido1} {$ptr.apellido2}</a></td>
                                        <td>{$ptf.fecha|date_format:'%d-%m-%Y'}</td>
                                        <td>{$ptf.fechaf|date_format:'%d-%m-%Y'}</td>
                                    </tr>
                                    {/foreach}
                                    {else}
                                    <tr>
                                        <td colspan="4">Sin expedientes con alta forense y sin informe</td>
                                    </tr>
                                    {/if}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">Expedientes que tenían que haber llegado el Talón</a>
                        </h4>
                    </div>
                    <div id="collapse7" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 70%;">Nombre</th>
                                        <th>Fecha</th>
                                        <th>Última Revisión</th>
                                    </tr>
                                    </thead>
                                    {if isset($talon)}
                                    {foreach from=$talon item=tal}
                                    <tr>
                                        <td><a href="?view=siniestro&id={$ptr.id}">{$tal.nombre} {$tal.apellido1} {$tal.apellido2}</a></td>
                                        <td>{$tal.fecha|date_format:'%d-%m-%Y'}</td>
                                        <td>{$tal.fechat|date_format:'%d-%m-%Y'}</td>
                                    </tr>
                                    {/foreach}
                                    {else}
                                    <tr>
                                        <td colspan="4">Sin expedientes pendientes de talón</td>
                                    </tr>
                                    {/if}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Expedientes Pendientes de Cobro Empresa</a>
                        </h4>
                    </div>
                    <div id="collapse8" class="panel-collapse collapse">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 70%;">Nombre</th>
                                        <th>Fecha</th>
                                        <th>Última Revisión</th>
                                    </tr>
                                    </thead>
                                    {if isset($pterev)}
                                    {foreach from=$pterev item=ptr}
                                    <tr>
                                        <td><a href="?view=siniestro&id={$ptr.id}">{$ptr.nombre} {$ptr.apellido1} {$ptr.apellido2}</a></td>
                                        <td>{$ptr.fecha|date_format:'%d-%m-%Y'}</td>
                                        <td>{$ptr.ultima|date_format:'%d-%m-%Y'}</td>
                                    </tr>
                                    {/foreach}
                                    {else}
                                    <tr>
                                        <td colspan="4">Sin expedientes pendientes de cobro empresa</td>
                                    </tr>
                                    {/if}
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{include 'overall/footer.tpl'}
</body>
</html>