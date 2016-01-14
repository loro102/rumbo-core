<html>
<head>
    <title>Principal</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style type="text/css">
    </style>
</head>
<body>

<script language="JavaScript" src="menu.js"></script>

<? if ($_SESSION['MM_UserAuthorization']=="admin")
{
?>
<p><a href="listadoUsuarios.php">Administracion usuarios</a></p>
<? } ?>
<table width="100%" border="0">
    <tr>
        <td><form name="form1" method="post" action="ClienteResultadoBusqueda2.php">
            <p> Buscar cliente:<br>
                <input name="txtNombre" type="text" id="txtNombre">
                <input type="submit" name="Submit" value="Buscar">
            </p>
        </form>  <script language="JavaScript">form1.txtNombre.focus();
        </script>
        </td>
        <td><form name="form2" method="get" action="SiniestroResultadoBusqueda.php">
            <p> Buscar siniestro:<br>
                Nº de Procedimiento,Diligencias Previas o Matricula:
                <input name="diligencias" type="text" id="diligencias">
                <input type="submit" name="Submit" value="Buscar">
            </p>
        </form></td>
    </tr>
</table>
<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
    <tr>
        <td><table width="100%" border="0" bgcolor="#CCCCCC">
            <tr>
                <td>Citas</td>
                <td><div align="right"><a href="#" onClick="document.getElementById('citas').style.display='none'"><img src="Imagenes/minimize.gif" width="14" height="14" alt="Contraer"></a><a href="PrincipalCitas.php" target="citas" onClick="document.getElementById('citas').style.display='block'"><img src="Imagenes/maximize.gif" width="14" height="14" alt="Expandir"></a></div></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><iframe id="citas" name="citas" src="cargando.htm" style="display:none;width:100%;height:300px" AllowTransparency frameborder="0" marginwidth="0"></iframe></td>
    </tr>
</table><br>
<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
    <tr>
        <td><table width="100%" border="0" bgcolor="#CCCCCC">
            <tr>
                <td>Expedientes con m&aacute;s de 20 d&iacute;as sin Revisar</td>
                <td><div align="right"><a href="#" onClick="document.getElementById('SinVisita').style.display='none'"><img src="Imagenes/minimize.gif" width="14" height="14" alt="Contraer"></a><a href="PrincipalSinVisita.php" target="SinVisita" onClick="document.getElementById('SinVisita').style.display='block'"><img src="Imagenes/maximize.gif" width="14" height="14" alt="Expandir"></a></div></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><iframe id="SinVisita" name="SinVisita" src="cargando.htm" style="display:none;width:100%;height:300px" AllowTransparency frameborder="0" marginwidth="0" scrolling="no"></iframe></td>
    </tr>
</table><br><table width="100%" border="1" cellspacing="0" bordercolor="#000000">
    <tr>
        <td><table width="100%" border="0" bgcolor="#CCCCCC">
            <tr>
                <td>Fines de procedimiento penal</td>
                <td><div align="right"><a href="#" onClick="document.getElementById('finproc').style.display='none'"><img src="Imagenes/minimize.gif" width="14" height="14" alt="Contraer"></a><a href="PrincipalFinProc.php" target="finproc" onClick="document.getElementById('finproc').style.display='block'"><img src="Imagenes/maximize.gif" width="14" height="14" alt="Expandir"></a></div></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><iframe id="finproc" name="finproc" src="cargando.htm" style="display:none;width:100%;height:300px" AllowTransparency frameborder="0" marginwidth="0" scrolling="no"></iframe></td>
    </tr>
</table><br><table width="100%" border="1" cellspacing="0" bordercolor="#000000">
    <tr>
        <td><table width="100%" border="0" bgcolor="#CCCCCC">
            <tr>
                <td>Asuntos con m&aacute;s de 1 mes Pendientes de Asistencia Juridica</td>
                <td><div align="right"><a href="#" onClick="document.getElementById('DosmesesAJ').style.display='none'"><img src="Imagenes/minimize.gif" width="14" height="14" alt="Contraer"></a><a href="PrincipalDosmesesAJ.php" target="DosmesesAJ" onClick="document.getElementById('DosmesesAJ').style.display='block'"><img src="Imagenes/maximize.gif" width="14" height="14" alt="Expandir"></a></div></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><iframe id="DosmesesAJ" name="DosmesesAJ" src="cargando.htm" style="display:none;width:100%;height:300px" AllowTransparency frameborder="0" marginwidth="0" scrolling="no"></iframe></td>
    </tr>
</table><br>
<? if (($_SESSION['CFacturas']==true))
{
?><table width="100%" border="1" cellspacing="0" bordercolor="#000000">
    <tr>
        <td><table width="100%" border="0" bgcolor="#CCCCCC">
            <tr>
                <td>Expedientes que llevan m&aacute;s de quince d&iacute;as Pendientes de Facturas</td>
                <td><div align="right"><a href="#" onClick="document.getElementById('PteFras').style.display='none'"><img src="Imagenes/minimize.gif" width="14" height="14" alt="Contraer"></a><a href="PrincipalPteFras.php" target="PteFras" onClick="document.getElementById('PteFras').style.display='block'"><img src="Imagenes/maximize.gif" width="14" height="14" alt="Expandir"></a></div></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><iframe id="PteFras" name="PteFras" src="cargando.htm" style="display:none;width:100%;height:300px" AllowTransparency frameborder="0" marginwidth="0" scrolling="no"></iframe></td>
    </tr>
</table><br>
<? } ?>
<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
    <tr>
        <td><table width="100%" border="0" bgcolor="#CCCCCC">
            <tr>
                <td>M&aacute;s de 20 d&iacute;as con Alta Forense y SIN Informe</td>
                <td><div align="right"><a href="#" onClick="document.getElementById('Forense').style.display='none'"><img src="Imagenes/minimize.gif" width="14" height="14" alt="Contraer"></a><a href="PrincipalForense.php" target="Forense" onClick="document.getElementById('Forense').style.display='block'"><img src="Imagenes/maximize.gif" width="14" height="14" alt="Expandir"></a></div></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><iframe id="Forense" name="Forense" src="cargando.htm" style="display:none;width:100%;height:300px" AllowTransparency frameborder="0" marginwidth="0" scrolling="no"></iframe></td>
    </tr>
</table><br>
<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
    <tr>
        <td><table width="100%" border="0" bgcolor="#CCCCCC">
            <tr>
                <td>Expedientes que ten&iacute;an que haber llegado el Tal&oacute;n</td>
                <td><div align="right"><a href="#" onClick="document.getElementById('Talones').style.display='none'"><img src="Imagenes/minimize.gif" width="14" height="14" alt="Contraer"></a><a href="PrincipalTalones.php" target="Talones" onClick="document.getElementById('Talones').style.display='block'"><img src="Imagenes/maximize.gif" width="14" height="14" alt="Expandir"></a></div></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><iframe id="Talones" name="Talones" src="cargando.htm" style="display:none;width:100%;height:300px" AllowTransparency frameborder="0" marginwidth="0" scrolling="no"></iframe></td>
    </tr>
</table><br>
<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
    <tr>
        <td><table width="100%" border="0" bgcolor="#CCCCCC">
            <tr>
                <td>Expedientes Pendientes de Cobro Empresa</td>
                <td><div align="right"><a href="#" onClick="document.getElementById('PtesPago').style.display='none'"><img src="Imagenes/minimize.gif" width="14" height="14" alt="Contraer"></a><a href="PrincipalPtesPago.php" target="PtesPago" onClick="document.getElementById('PtesPago').style.display='block'"><img src="Imagenes/maximize.gif" width="14" height="14" alt="Expandir"></a></div></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><iframe id="PtesPago" name="PtesPago" src="cargando.htm" style="display:none;width:100%;height:300px" AllowTransparency frameborder="0" marginwidth="0" scrolling="no"></iframe></td>
    </tr>
</table><br>
<? if ($_SESSION['CFacturas']==true)
{
?>
<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
    <tr>
        <td><table width="100%" border="0" bgcolor="#CCCCCC">
            <tr>
                <td>Expedientes con Facturas Pendientes de Pago</td>
                <td><div align="right"><a href="#" onClick="document.getElementById('Facturas').style.display='none'"><img src="Imagenes/minimize.gif" width="14" height="14" alt="Contraer"></a><a href="PrincipalFacturas.php" target="Facturas" onClick="document.getElementById('Facturas').style.display='block'"><img src="Imagenes/maximize.gif" width="14" height="14" alt="Expandir"></a></div></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><iframe id="Facturas" name="Facturas" src="cargando.htm" style="display:none;width:100%;height:300px" AllowTransparency frameborder="0" marginwidth="0" scrolling="no"></iframe></td>
    </tr>
</table><br><? } ?>
<table width="100%" border="1" cellspacing="0" bordercolor="#000000">
    <tr>
        <td><table width="100%" border="0" bgcolor="#CCCCCC">
            <tr>
                <td>Clientes a los que le caduca en carnet de conducir en 30 d&iacute;as</td>
                <td><div align="right"><a href="#" onClick="document.getElementById('CadCarnet').style.display='none'"><img src="Imagenes/minimize.gif" width="14" height="14" alt="Contraer"></a><a href="PrincipalCadCarnet.php" target="CadCarnet" onClick="document.getElementById('CadCarnet').style.display='block'"><img src="Imagenes/maximize.gif" width="14" height="14" alt="Expandir"></a></div></td>
            </tr>
        </table></td>
    </tr>
    <tr>
        <td><iframe id="CadCarnet" name="CadCarnet" src="cargando.htm" style="display:none;width:100%;height:300px" AllowTransparency frameborder="0" marginwidth="0" scrolling="no"></iframe></td>
    </tr>
</table>


</body>
</html>