<?php
/**
 * Created by PhpStorm.
 * User: loro102
 * Date: 09/01/2016
 * Time: 17:37
 */

if (!isset($_SESSION['id'], $_SESSION['usuario'], $_SESSION['session'])){
    if ($_POST) {
        include('core/models/class.Acceso.php');
        $acceso = new Acceso();
        $acceso->Login();
    } else {
        $template = new Smarty();
        $msg=isset($_GET['msg']) ? $_GET['msg'] : null;
        switch ($msg) {
            case '1':
                $template->assign('msg','Has cerrado la sesión correctamente');
                break;
            case '2':

                break;
            case '3':

                break;
            case '4':

                break;
            default:

                break;
        }
        $template->assign('titulo', 'Login');
        $template->display('login.tpl');
    }

}else {

    header('location:?view=principal');
}
