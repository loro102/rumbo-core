<?php
/**
 * Created by PhpStorm.
 * User: loro102
 * Date: 09/01/2016
 * Time: 20:50
 */
$log->insert('El usuario '.$_SESSION['usuario'].' ha cerrado la sesión', false, false, false);
unset(
    $_SESSION['id'],
    $_SESSION['usuario'],
    $_SESSION['nivel'],
    $_SESSION['controlfases'],
    $_SESSION['cuentaverexpedientes'],
    $_SESSION['indemnizacion'],
    $_SESSION['modificaraseguradora'],
    $_SESSION['verfacturas'],
    $_SESSION['beneficio'],
    $_SESSION['facturas'],
    $_SESSION['modificarsiniestro'],
    $_SESSION['tramitadores']
);
session_destroy();
header ('location:?view=login&msg=1');