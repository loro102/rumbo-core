<?php
$template = new Smarty();
$template->clearAllCache();
$template->caching = false;
$type = isset($_GET['type']) ? $_GET['type'] : null;

/*if (isset($_GET['pag']) and is_numeric($_GET['pag']) and $_GET['pag'] >= 1) {
    $pagina = $_GET['pag'];
} else {
    $pagina = 1;
}*/
$db = new Conexion();
$pagina=(isset($_GET['pag']) and is_numeric($_GET['pag']) and $_GET['pag']>=1)? $_GET['pag']:1;
$paginado = 10;
$inicio = ($pagina - 1) * $paginado;

switch ($type) {
    case 'tops':
        $cantidad = $db->query("SELECT COUNT(*) FROM posts;");
        $sql = $db->query("SELECT * FROM posts ORDER BY puntos DESC LIMIT $inicio,$paginado;");
        $template->assign('titulo', 'Los mejores');
        break;
    case '1':
        $cantidad = $db->query("SELECT COUNT(*) FROM posts WHERE categoria=1;");
        $sql = $db->query("SELECT * FROM posts WHERE categoria=1 ORDER BY id DESC LIMIT $inicio,$paginado;;");
        $template->assign('titulo', 'Categoria 1');
        break;
    case '2':
        $cantidad = $db->query("SELECT COUNT(*) FROM posts WHERE categoria=2;");
        $sql = $db->query("SELECT * FROM posts WHERE categoria=2 ORDER BY id DESC LIMIT $inicio,$paginado;");
        $template->assign('titulo', 'Categoria 2');
        break;
    case '3':
        $cantidad = $db->query("SELECT COUNT(*) FROM posts WHERE categoria=3;");
        $sql = $db->query("SELECT * FROM posts WHERE categoria=3 ORDER BY id DESC LIMIT $inicio,$paginado;");
        $template->assign('titulo', 'Categoria 3');
        break;
    default:
        $cantidad = $db->query("SELECT COUNT(*) FROM posts;");
        $sql = $db->query("SELECT * FROM posts  ORDER BY id DESC LIMIT $inicio,$paginado;;");
        $template->assign('titulo','inicio');
        break;
}

//Paginado
$result = $db->recorrer($cantidad);
$result = $result[0];
$paginas = ceil($result / $paginado);

//Sentencia que muestra los posts y muestra el nombre del dueño en vez de la id
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
            'puntos' => number_format($x['puntos'],0,',','.')
        );
    }
    $prepare_sql->close();
    $template->assign('posts', $posts);
}
    $template->assign('pags',$paginas);
    $db->liberar($sql);
    $db->close();
    $template->display('home/index.tpl');

