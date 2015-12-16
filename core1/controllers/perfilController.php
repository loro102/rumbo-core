<?php

if (isset($_GET['id']) and is_numeric($_GET['id']) and $_GET['id'] >= 1) {
    $db = new Conexion();
    $id = intval($_GET['id']);
    $sql = $db->query("SELECT * FROM users WHERE id='$id'");
    $template = new Smarty();

    if ($db->rows($sql) > 0) {
        //paginado
        $pagina=(isset($_GET['pag']) and is_numeric($_GET['pag']) and $_GET['pag']>=1)? $_GET['pag']:1;
        $paginado = 10;
        $inicio = ($pagina - 1) * $paginado;



        $user = $db->recorrer($sql);

        //Avatar
        if (file_exists('uploads/avatar/' . $user['id'] . '.' . $user['ext'])) {
            $ruta = 'uploads/avatar/' . $user['id'] . '.' . $user['ext'];

        } else {
            $ruta = 'uploads/avatar/default.png';

        }
        //Nombres y Apellidos
        $sin_registros = 'Sin registros';
        if ($user['nombre'] == '' or $user['apellidos'] == '') {
            $nombres = $sin_registros;
        } else {
            $nombres = $user['nombre'] . ' ' . $user['apellidos'];
        }
        //Fecha
        if ($user['fecha'] == '') {
            $fecha = $sin_registros;
        } else {
            $fecha = $user['fecha'];
        }

        if ($user['online']<= time()){
            $estado='Offline';
            $color_estado='#FF0000';
        } else{
            $estado='Online';
            $color_estado='#00FF00';
        }
        //POST
        $cantidad=$db->query("SELECT COUNT(*) FROM posts WHERE dueno='$id';");
        $result= $db->recorrer($cantidad);
        $posts = $db->query("SELECT * FROM posts WHERE dueno='$id' ORDER BY id DESC LIMIT $inicio,$paginado;");
        $c_post = $result[0];
        //saqueo de post
        if($c_post >0 and $db->rows($posts)>0){
            $x=0;
            while($p = $db->recorrer($posts)){
                $x++;
                $z=$x%2;
                $post[]=array(
                    'id'=>$p['id'],
                    'titulo'=>$p['titulo'],
                    'puntos'=> number_format($p['puntos'],0,',','.'),
                    'z'=>$z
                );
            }
            $paginas = ceil($c_post / $paginado);
            $template->assign(array(
                'pags'=>$paginas,
                'posts'=>$post
            ));
        }
            $db->liberar($posts,$cantidad);
            $template->assign(array(
                'existe' => 1,
                'user' => $user,
                'fecha' => $fecha,
                'nombres' => $nombres,
                'c_posts' =>$c_post,
                'image' => $ruta,
                'estado'=>$estado,
                'c_estado'=>$color_estado

            ));
        }
        $template->Display('perfil/perfil.tpl');
        $db->liberar($sql);
        $db->close();

    } else {
        header('location:?view=index');
    }
