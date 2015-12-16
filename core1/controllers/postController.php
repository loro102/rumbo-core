<?php




if(isset($_GET['id'])and is_numeric($_GET['id']) and $_GET['id'] >=1){



    $mode = isset($_GET['mode']) ? $_GET['mode'] : null;
    $id=intval($_GET['id']);
    $db=new Conexion();
    $sql=$db->query("SELECT titulo,contenido,dueno,votantes FROM posts WHERE id='$id';");
    $template=new smarty();
    $post=$db->recorrer($sql);

    switch($mode){
        case 'puntos':
            if ( isset($_SESSION['id'],$_POST) and is_numeric($_POST['points']) and $_POST['points']>=1 and $_POST['points']<=10 and $_SESSION['id']!=$post['dueno']){


                $id_user=$_SESSION['id'];
                $votantes=explode(';',$post['votantes']);


                if (!in_array($id_user,$votantes)){


                    $puntos=intval($_POST['points']);
                    $votantes=$post['votantes'].$id_user.';';
                    $sql2=$db->query("UPDATE posts SET puntos=puntos+'$puntos',votantes='$votantes' WHERE id='$id';");
                    echo 1;

                }else{
                    echo 2;
                }
                $db->liberar($sql);
                exit;
            } else{
                $db->liberar($sql);
                $db->close();

                header('location:?view=post&id='.$id);
            }
            break;
        case 'comentario':
            if ($_POST and isset($_SESSION['user'])){
                //codigo comentarios
            } else{
                $db->liberar($sql);
                $db->close();
                header('location:?view=post&id='.$id);
            }
            break;

    }
    //Visualizacion de post


    if ($db->rows($sql)>0){
        require('core/libs/BBcode/BBcode.class.php');
        //$post=$db->recorrer($sql);
        $id_creator=$post['dueno'];
        $sql2=$db->query("SELECT user,online,ext FROM users WHERE id='$id_creator';");
        $user=$db->recorrer($sql2);
        //Estado
        if ($user['online']<= time()){
            $estado='Offline';
            $color_estado='#FF0000';
        } else{
            $estado='Online';
            $color_estado='#00FF00';
        }
        //Avatar
        if (file_exists('uploads/avatar/' . $id_creator. '.' . $user['ext'])) {
            $ruta = 'uploads/avatar/' . $id_creator. '.' . $user['ext'];

        } else {
            $ruta = 'uploads/avatar/default.png';

        }
        $contenido=BBcode($post['contenido']);
        $template->assign(array(
            'contenido'=>$contenido,
            'post'=>$post,
            'user'=>$user['user'],
            'estado'=>$estado,
            'c_estado'=>$color_estado,
            'image'=>$ruta

        ));
        $db->liberar($sql2);
    }

    $db->liberar($sql);
    $db->close();
    $template->display('posts/posts.tpl');

}else{
    header('location:?view=index');
}




