<?php
/**
 * Created by PhpStorm.
 * User: loro102
 * Date: 27/11/2015
 * Time: 13:23
 */
session_start();


$view = isset($_GET['view']) ? $_GET['view'] : 'login';
require_once('core/libs/smarty/Smarty.class.php');
require_once('core/models/class.Conexion.php');
require_once('core/libs/funciones/log.php');
$log = new Log("log", "./logs/");

if (isset($_SESSION['online'], $_SESSION['id']) and $_SESSION['online'] <= time()) {
    $db = new Conexion();
    $user_id = $_SESSION['id'];
    $online = time() + (60 * 5);
    $update_status = $db->query("UPDATE users SET online='$online' WHERE id='$user_id';");
    $_SESSION['online'] = $online;
    $db->close();
    unset($db, $online, $update_status, $user_id);
}






if (file_exists('core/controllers/' . $view . 'Controller.php')) {
    include('core/controllers/' . $view . 'Controller.php');
} else {
    #pagina de error
    include('core/controllers/errorController.php');
}


?>