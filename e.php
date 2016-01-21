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
    echo "HAY COINCIDENCIA<br/>";
} else
{
    echo "NO HAY COINCIDENCIA<br/>";
}


$iban='FR1420041010050500013M02606';
# definimos un array de valores con el valor de cada letra
$iban = strtoupper(str_replace(' ', '', $iban));

if (preg_match('/^[A-Z]{2}[0-9]{2}[A-Z0-9]{1,30}$/', $iban)) {
    $country = substr($iban, 0, 2);
    $check = intval(substr($iban, 2, 2));
    $account = substr($iban, 4);

    // To numeric representation
    $search = range('A','Z');
    foreach (range(10,35) as $tmp)
        $replace[]=strval($tmp);
    $numstr=str_replace($search, $replace, $account.$country.'00');

    // Calculate checksum
    $checksum = intval(substr($numstr, 0, 1));
    for ($pos = 1; $pos < strlen($numstr); $pos++) {
        $checksum *= 10;
        $checksum += intval(substr($numstr, $pos,1));
        $checksum %= 97;
    }

    if ((98-$checksum) == $check){
        echo 'iban valido';
    } else
    echo 'iban no valido';
}
*/
try {
    $x=3;
    if ($x==1){
        throw new Exception (1);
    }
    if ($x>0 and $x <3){
        throw new Exception (2);
    }

    if ($x<5){
        throw new Exception (3);
    }



    throw new Exception ('Error:El campo vapullo no es valido');
} catch (exception $nuevo) {
    echo $nuevo->getMessage();
}