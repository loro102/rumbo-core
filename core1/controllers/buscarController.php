<?php
/**
 * Created by PhpStorm.
 * User: loro102
 * Date: 29/11/2015
 * Time: 13:21
 */
if($_POST OR (isset($_SESSION['busqueda']) AND isset($_GET['pag']))){
    $template = new Smarty();
    $type = isset($_GET['type']) ? $_GET['type'] : null;
    //$pagina=(isset($_GET['pag']) and is_numeric($_GET['pag']) and $_GET['pag']>=1)? $_GET['pag']:1;
    if (isset($_GET['pag']) and is_numeric($_GET['pag']) and $_GET['pag'] >= 1) {
        $pagina = $_GET['pag'];
    } else {
        $pagina = 1;
    }

    $db = new Conexion();
    $paginado = 5;
    $inicio = ($pagina - 1) * $paginado;

    if (isset($_SESSION['busqueda']) and !isset($_POST['busqueda'])){
        $busqueda=$_SESSION['busqueda'];
    }else {
        $busqueda=$_POST['busqueda'];
    }
    $_SESSION['busqueda']=$busqueda;
    //$busqueda= isset($_SESSION['busqueda']) ? $_SESSION['busqueda'] : $_POST['busqueda'];


    $cantidad = $db->query("SELECT COUNT(*) FROM posts WHERE titulo LIKE '%$busqueda%';");
    $sql = $db->query("SELECT * FROM posts WHERE titulo LIKE '%$busqueda%' ORDER BY id DESC LIMIT $inicio,$paginado;");

    $result = $db->recorrer($cantidad);
    $result = $result[0];

    $paginas = ceil($result / $paginado);

    if ($db->rows($sql) > 0) {
        // PREPARADA
        $psql = "SELECT user FROM users ORDER BY id=?";
        $prepare_sql = $db->prepare($psql);
        $prepare_sql->bind_param('i', $id);
        while ($x = $db->recorrer($sql)) {
            $id = $x['dueno'];
            $prepare_sql->execute();
            $prepare_sql->bind_result($autor);
            $prepare_sql->fetch();
            //TERMINA SENTENCIA PREPARADA
            $posts[] = array(
                'id' => $x['id'],
                'titulo' => $x['titulo'],
                'contenido' => $x['contenido'],
                'dueno' => $autor,
                'id_dueno' => $id,
                'puntos' => $x['puntos']
            );
        }
        $prepare_sql->close();
        $template->assign('posts', $posts);
    }
    $db->liberar($sql);
    $db->close();
    $template->assign('titulo', 'Resultado de Búsqueda');
    $template->assign('pags',$paginas);
    $template->display('home/index.tpl');
}else{
    header('location: ?view=index');
}
