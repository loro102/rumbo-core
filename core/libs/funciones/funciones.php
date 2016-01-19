<?php
/**
 * Created by PhpStorm.
 * User: loro102
 * Date: 11/01/2016
 * Time: 1:38
 */
///////////////////////////////////////////////////
//Convierte fecha de mysql a español
////////////////////////////////////////////////////
function cambiaf_mysql($fechadb){
//vamos a suponer que recibmos el formato MySQL básico de YYYY-MM-DD
//lo primero es separar cada elemento en una variable
    list($yy,$mm,$dd)=explode("-",$fechadb);
//si viniera en otro formato, adaptad el explode y el orden de las variables a lo que necesitéis
//creamos un objeto DateTime (existe desde PHP 5.2)
    $fecha = new DateTime();
//definimos la fecha pasándole las variabes antes extraídas
    $fecha->setDate($yy, $mm, $dd);
//y ahora el propio objeto nos permite definir el formato de fecha para imprimir que queramos
    echo $fecha->format('d-m-Y');
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////
//Comprueba si es nombre
////////////////////////////////////////////////////

function validar_texto($texto){
    if (preg_match('/^[a-zñÑáéíóú\s]{4,28}$/i',$texto)){
        return true;
    }else{
        return false;
    }
}
function es_alfabetico($c) {
    $re = '/^[a-zA-ZñÑ]+$/';

    return (preg_match($re, $c));
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////
//Comprueba si telefono o movil es valido
////////////////////////////////////////////////////
/*****************************/
/*       Teléfono fijo       */
/*****************************/

function fijo_valido($n) {
    $re = '/^(8|9)[0-9]{8}$/';

    return (preg_match($re, $n));
}

/******************************/
/*       Teléfono móvil       */
/******************************/

function movil_valido($n) {
    $re = '/^(6|7)[0-9]{8}$/';

    return (preg_match($re, $n));
}

/*************************************/
/*       Teléfono fijo o móvil       */
/*************************************/

function telefono_valido($n) {
    return (fijo_valido($n) || movil_valido($n));
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////
//Comprueba si http,https,ftp,sftp es valido
////////////////////////////////////////////////////
function url_valido($url) {
    $re = '/^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])|(%[\da-f]{2})|[!\$&\'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])|(([a-z]|\d|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])([a-z]|\d|-|\.|_|~|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])*([a-z]|\d|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])))\.)+(([a-z]|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])|(([a-z]|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])([a-z]|\d|-|\.|_|~|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])*([a-z]|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])|(%[\da-f]{2})|[!\$&\'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])|(%[\da-f]{2})|[!\$&\'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])|(%[\da-f]{2})|[!\$&\'\(\)\*\+,;=]|:|@)|[\x{E000}-\x{F8FF}]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\x{00A0}-\x{D7FF}\x{F900}-\x{FDCF}\x{FDF0}-\x{FFEF}])|(%[\da-f]{2})|[!\$&\'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/ui';

    return preg_match($re, $url);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////
//Comprueba si codigo postal es valido
////////////////////////////////////////////////////
function cp_valido($cp) {
    $re = '/^(0[1-9]|[1-4][0-9]|5[0-2])[0-9]{3}$/';

    return preg_match($re, $cp);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////
//Comprueba si es numerico
////////////////////////////////////////////////////
function validar_numero($numero){
    if (is_numeric($numero)){
        return true;
    }else{
        return false;
    }

}
function es_numero($numero, $cero_valido = false) {
    if (!$cero_valido) $re = '/^[1-9]+[0-9]*$/';   // {1,...,n}
    else $re = '/^(0|([1-9]+[0-9]*))$/';           // {0,...,n}

    return preg_match($re, $numero);
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////
//Comprueba si es fecha valida
////////////////////////////////////////////////////
function validar_fecha($fecha){

    $explode = explode('-', $fecha);
    if (!($explode[0] >= 1 and $explode[0] <= 31
        or $explode[1] >= 1 and $explode[1] <= 12
        or $explode[2] >= 1900 and $explode[2] <= 3000)) {
        return true;

    }else{
        return false;
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////
//Comprueba si email esta formato válido
////////////////////////////////////////////////////
function validar_email($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }else{
        return false;
    }
}
function email_valido($email) {
    $email = strtolower($email);

    $re1 = '/^[a-zA-Z0-9.!#$%&\'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/i';
    $re2 = '/^.+@.+\.[a-z]{2,4}$/i';

    return (preg_match($re1, $email) && preg_match($re2, $email));
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////
//Comprueba si nif cif o nie es valido
////////////////////////////////////////////////////
function validar_nif_cif_nie($nif)
{
    $nif = strtoupper($nif);
    $patron_nif = '/^[0-9]{8}[A-Z]$/i';
    $patron_nie = '/^[XYZ][0-9]{7}[A-Z]$/i';
    $patron_cif = '/^[ABEH][0-9]{8}$/i';
    $patron_cif1 = '/^[KPQS][0-9]{7}[A-J]$/i';
    $patron_cif2 = '/^[CDFGJLMNRUVW][0-9]{7}[0-9A-J]$/i';
    $letras = 'TRWAGMYFPDXBNJZSQVHLCKE';

    if (preg_match($patron_nif, $nif)) {
        if ($letras[substr($nif, 0, 8) % 23] == $nif[8]) {
            return 1;
        }
    } else if (preg_match($patron_nie, $nif)) {
        if ($nif[0] === 'X') {
            $nif[0] = 0;
        } elseif ($nif[0] === 'Y') {
            $nif[0] = 1;
        } elseif ($nif[0] === 'Z') {
            $nif[0] = 2;
        }
        if ($letras[(substr($nif, 0, 8) % 23)] == $nif[8]) {
            return 1;
        }

    }else if (preg_match($patron_cif,$nif) or preg_match($patron_cif1,$nif) or preg_match($patron_cif2,$nif)){
    $control = $nif[strlen($nif) - 1];
    $suma_A = 0;
    $suma_B = 0;

    for ($i=1;$i <8; $i++) {
        if ($i % 2 === 0) {
            $suma_A += (int)$nif[$i];
        }else {
            $t = ((int)$nif[$i])*2;
            $p = 0;
            for ($j=0;$j<(int)strlen($t);$j++){
                $p .= substr($t,$j,1);
            }
            $suma_B +=$p;
        }
    }
        $suma_C=(int)($suma_A+$suma_B).'';
        $suma_D=(10-(int)($suma_C[strlen($suma_C)-1]))%10;
        $letras_cif= 'JABCDEFGHI';

        if ($control >= 0 && $control <=9){
            if ($control == $suma_D) {
                return 1;
            }
        }else{
            if (strtoupper($control) == $letras[$suma_D]){
                return 1;
            }
        }

    } else {
        return 0;
    }
    return 0;
}

/*
function check_nif_cif_nie($cif)
{
    //Returns:
    // 1 = NIF ok,
    // 2 = CIF ok,
    // 3 = NIE ok,
    //-1 = NIF bad,
    //-2 = CIF bad,
    //-3 = NIE bad, 0 = ??? bad

    $cif = strtoupper($cif);

    for ($i = 0; $i < 9; $i++) {
        $num[$i] = substr($cif, $i, 1);
    }
    //si no tiene un formato valido devuelve error
    if (!preg_match('((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)', $cif)) {
        return 0;
    }
    //comprobacion de NIFs estandar

    if (ereg('(^[0-9]{8}[A-Z]{1}$)', $cif)) {
        if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr($cif, 0, 8) % 23, 1)) {
            return 1;
        } else {
            return -1;
        }
    }
    //algoritmo para comprobacion de codigos tipo CIF
    $suma = $num[2] + $num[4] + $num[6];
    for ($i = 1; $i < 8; $i += 2) {
        $suma += substr(2 * $num[$i], 0, 1) + substr(2 * $num[$i], 1, 1);
    }
    $n = 10 - substr($suma, strlen($suma) - 1, 1);
    //comprobacion de NIFs especiales (se calculan como CIFs)
    if (preg_match('^[KLM]{1}', $cif)) {
        if ($num[8] == chr(64 + $n)) {
            return 1;
        } else {
            return -1;
        }
    }
    //comprobacion de CIFs
    if (preg_match('^[ABCDEFGHJNPQRSUVW]{1}', $cif)) {
        if ($num[8] == chr(64 + $n) || $num[8] ==

            substr($n, strlen($n) - 1, 1)
        ) {
            return 2;
        } else {
            return -2;
        }
    }
    //comprobacion de NIEs
    //T
    if (preg_match('^[T]{1}', $cif)) {
        if ($num[8] == ereg('^[T]{1}[A-Z0-9]{8}$', $cif)) {
            return 3;
        } else {
            return -3;
        }
    }
    //XYZ
    if (preg_match('^[XYZ]{1}', $cif)) {
        if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X', 'Y', 'Z'), array('0', '1', '2'), $cif), 0, 8) % 23, 1)) {
            return 3;
        } else {
            return -3;
        }
    }
    //si todavia no se ha verificado devuelve error
    return 0;
}
*/

?>