<?php
/**
 * Created by PhpStorm.
 * User: adminstracion
 * Date: 11/01/2016
 * Time: 15:24
 */
// Comprueba si el usuario esta logueado
include('core/models/class.Abonado.php');
if (isset($_SESSION['id'],$_SESSION['usuario'])) {
    $template = new Smarty();
    $template->assign('titulo', 'Abonados');
    $db = new Conexion();

    //Comprueba que lo que recibe en accion sea alguno de esta lista,sino es ninguno de estos o esta vacio va directamente a default
    $accion=isset($_GET['accion']) ? $_GET['accion'] : null;
    switch ($accion) {
        case 'listar':

            break;
        case 'nuevo':
            //Obtengo todos los agentes ordenados por orden alfabetico descendente
            $sql=$db->query("SELECT Id,Nombre FROM agentes ORDER BY Nombre ASC;");
            if ($db->rows($sql)>0){
                while ($x=$db->recorrer($sql)){
                    $agente[]=array(
                        'Nombre'=>$x['Nombre'],
                        'id' => $x['Id'],
                    );
                }
                $template->assign('agente',$agente);

            }

            $db->liberar($sql);
            $db->close();
            $template->nuevo();
            $template->assign('titulo', 'Registrar nuevo cliente');
            $template->display('abonados/nuevo.tpl');

            break;
        case 'modificar':

            break;
        case '4':

            break;
        default:

            break;
    }


















}