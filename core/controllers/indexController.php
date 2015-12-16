<?php
/**
 * Created by PhpStorm.
 * User: loro102
 * Date: 28/11/2015
 * Time: 14:37
 */
if (!isset($_SESSION['id'], $_SESSION['user'], $_SESSION['session'])){
    if ($_POST) {
        include('core/models/class.Acceso.php');
        $acceso = new Acceso();
        $acceso->Login();
    } else {
        $template = new Smarty();
        $template->display('public/login.tpl');

    }

}else {
    header('location:?view=index');
}