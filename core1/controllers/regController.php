<?php
/**
 * Registro del usuario.
 * User: loro102
 * Date: 27/11/2015
 * Time: 15:34
 */
if (!isset($_SESSION['id'], $_SESSION['user'], $_SESSION['email'])){
    if ($_POST) {
        include('core/models/class.Acceso.php');
        $acceso = new Acceso();
        $acceso->Registrar();
    } else {
        $template = new Smarty();
        $template->display('public/registro.tpl');

    }

}else {
    header('location:?view=index');}

    ?>