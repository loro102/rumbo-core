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

$numero='10';

if (is_numeric($numero)){
    echo 'numero valido<br/>';
}else{
    echo 'numero no valida<br/>';
}

$texto= 10 ;
if (!preg_match('(^[a-zA-Z]${3,50}',$texto)){
    echo 'texto valido<br/>';
}else{
    echo 'texto no valida<br/>';
}


$explode = explode('-', 20-10-2005);
if (!($explode[0] >= 1 and $explode[0] <= 31
    or $explode[1] >= 1 and $explode[1] <= 12
    or $explode[2] >= 1900 and $explode[2] <= 3000)) {
    echo 'fecha valida<br/>';
    echo 'fecha valida<br/>';
}else{
    echo 'fecha no valida<br/>';
}


$email='loro102gmail.com';
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'email valido<br/>';
}else{
    echo 'emailno valido<br/>';
}


//buscando al menos 2 numeros seguidos en la cadena
if (preg_match('/^[a-z�������\s]{4,28}$/i',"alvaro aznar �u�ez"))
{
    echo "HAY COINCIDENCIA";
} else
{
    echo "NO HAY COINCIDENCIA";
}
