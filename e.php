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
$email='loro102gmail.com';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'es valido';
}else{
    echo 'no es valido';
}




?>