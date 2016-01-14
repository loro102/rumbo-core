<?php
/**
 * Created by PhpStorm.
 * User: loro102
 * Date: 09/01/2016
 * Time: 20:56
 */
if($_POST OR (isset($_SESSION['busqueda']) AND isset($_GET['pag']))){
    $template = new Smarty();
    $db = new Conexion();
    if (isset($_SESSION['busqueda']) and !isset($_POST['busqueda'])){
        $busqueda=$_SESSION['busqueda'];
    }else {
        $busqueda=$_POST['busqueda'];
    }
    $_SESSION['busqueda']=$busqueda;
    $tramitadores="()";
    if ($_SESSION['tramitadores']!="")
    {

        $tramitadores=$_SESSION['tramitadores'];
    }
    $tramitadores=$_SESSION['tramitadores'];
    $sql = $db->query("SELECT *  FROM abonados  WHERE Nombre like '%$busqueda%' OR Apellido1 like '%$busqueda%' OR Apellido2 like '%$busqueda%'  or NIF like '%$busqueda%' ORDER BY Apellido1 ASC;");
    if ($db->rows($sql) > 0) {
        // PREPARADA
        while ($x = $db->recorrer($sql)) {
            $abonados[] = array(
                'id' => $x['Id'],
                'nombre' => $x['Nombre'],
                'apellido1' => $x['Apellido1'],
                'apellido2' => $x['Apellido2'],
                'nif' => $x['NIF'],
            );
        }
        $template->assign('abonados',$abonados);
    }
    $sql2= $db->query("SELECT Id, Nombre, DNIRepresentado  FROM siniestro  WHERE Representado=true and Nombre like '%$busqueda%' and Tramitador IN $tramitadores ORDER BY Nombre ASC;");
    if ($db->rows($sql2) > 0) {
        // PREPARADA
        while ($y = $db->recorrer($sql2)) {
            $enlazados[] = array(
                'id' => $y['Id'],
                'nombre' => $y['Nombre'],
                'nif' => $y['DNIRepresentado'],
            );
        }
        $template->assign('enlazados',$enlazados);
    }
    $db->liberar($sql,$sql2);
    $db->close();
    $template->assign('titulo', 'Resultado de Búsqueda');
    $template->display('buscar.tpl');
}else{
    header('location: ?view=index');
}