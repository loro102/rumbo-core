<?php
/*
 *  echo memory_get_usage()/1024;

 */
/*
$bbcode=['[b]','[/b]','[img]','[/img]','/n'];
$html=['<b>','</b>','<img src="','"/>','<br/>'];
$string=nl2br(htmlentities('[b]Hola mundo[/b] esto furrula.

<br>

Esto es un salto de linea
'));
$resultado=str_replace($bbcode,$html,$string);

echo $resultado;
*/

include('core/models/class.Conexion.php');
$db= new Conexion();
$string='Esto es el contenido del post.

Estamos probando saltos de linea y [b]bbcode[/b],para ver si todo marcha bien

[img]http://gickr.com/results4/anim_d9d22f5c-3d4f-2a14-6198-fdca54635830.gif[/img]';

$db->query("UPDATE posts SET contenido='$string' WHERE id='1'");




?>