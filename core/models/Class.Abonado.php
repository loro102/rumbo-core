<?php

/**
 * Created by PhpStorm.
 * User: adminstracion
 * Date: 11/01/2016
 * Time: 15:43
 */
Class Abonado
{

    private $nombre;
    private $apellido1;
    private $apellido2;
    private $agente;
    private $colectivo;
    private $precio;
    private $descuento;
    private $nif;
    private $direccion;
    private $codigopostal;
    private $localidad;
    private $provincia;
    private $fechanacimiento;
    private $fechaalta;
    private $telefono1;
    private $telefono2;
    private $telefono3;
    private $email;
    private $iban;
    private $notas;

    //Función que sirve para validar el dni

    private function check_nif_cif_nie($nif)
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
        if (!ereg('((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)', $cif)) {
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
        if (ereg('^[KLM]{1}', $cif)) {
            if ($num[8] == chr(64 + $n)) {
                return 1;
            } else {
                return -1;
            }
        }
        //comprobacion de CIFs
        if (ereg('^[ABCDEFGHJNPQRSUVW]{1}', $cif)) {
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
        if (ereg('^[T]{1}', $cif)) {
            if ($num[8] == ereg('^[T]{1}[A-Z0-9]{8}$', $cif)) {
                return 3;
            } else {
                return -3;
            }
        }
        //XYZ
        if (ereg('^[XYZ]{1}', $cif)) {
            if ($num[8] == substr('TRWAGMYFPDXBNJZSQVHLCKE', substr(str_replace(array('X', 'Y', 'Z'), array('0', '1', '2'), $cif), 0, 8) % 23, 1)) {
                return 3;
            } else {
                return -3;
            }
        }
        //si todavia no se ha verificado devuelve error
        return 0;
    }

    /**
     * Valor para validar una cuenta bancaria IBAN
     */
    private function comprobar_iban($iban)
    {
        # definimos un array de valores con el valor de cada letra
        $letras = array("A" => 10, "B" => 11, "C" => 12, "D" => 13, "E" => 14, "F" => 15, "G" => 16, "H" => 17, "I" => 18, "J" => 19, "K" => 20, "L" => 21, "M" => 22, "N" => 23, "O" => 24, "P" => 25, "Q" => 26, "R" => 27, "S" => 28, "T" => 29, "U" => 30, "V" => 31, "W" => 32, "X" => 33, "Y" => 34, "Z" => 35);
        # Eliminamos los posibles espacios al inicio y final
        $iban = trim($iban);
        # Convertimos en mayusculas
        $iban = strtoupper($iban);
        # eliminamos espacio y guiones que haya en el iban
        $iban = str_replace(array(" ", "-"), "", $iban);
        if (strlen($iban) == 24) {
            # obtenemos los codigos de las dos letras
            $valorLetra1 = $letras[substr($iban, 0, 1)];
            $valorLetra2 = $letras[substr($iban, 1, 1)];
            # obtenemos los siguientes dos valores
            $siguienteNumeros = substr($iban, 2, 2);
            $valor = substr($iban, 4, strlen($iban)) . $valorLetra1 . $valorLetra2 . $siguienteNumeros;
            if (bcmod($valor, 97) == 1) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    private function validar_dni($dni)
    {
        $letra = substr($dni, -1);
        $numeros = substr($dni, 0, -1);
        if (substr("TRWAGMYFPDXBNJZSQVHLCKE", $numeros % 23, 1) == $letra && strlen($letra) == 1 && strlen($numeros) == 8) {
            echo 'valido';
        } else {
            echo 'no valido';
        }
        //validar_dni('73547889F'); // válido
        //validar_dni('73547889M'); // no válido
        //validar_dni('73547889'); // no válido


    }
    public function Nuevo()
    {
        try {
            /*
             * Errores cuando no pasa
             * 2 - precio
             * 3 - nif
             * 4 - fechanacimiento
             * 5 - fechaalta
             * 6 - email
             * 7 - iban
             *
             *
             */
            if (!empty($_POST['nombre']) and !empty($_POST['apellido1']) and !empty($_POST['apellido2']) and !empty($_POST['agente']) and !empty($_POST['nif']) and !empty($_POST['direccion']) and !empty($_POST['codigopostal']) and !empty($_POST['localidad']) and !empty($_POST['provincia']) and !empty($_POST['fechanacimiento']) and !empty($_POST['fechaalta']) and !empty($_POST['telefono1'])) {
                $db = new Conexion();
                $this->nombre = $db->real_escape_string($_POST['nombre']);
                $this->apellido1 = $db->real_escape_string($_POST['apellido1']);
                $this->apellido2 = $db->real_escape_string($_POST['apellido2']);
                $this->agente = $db->real_escape_string($_POST['agente']);
                $this->colectivo = $db->real_escape_string($_POST['colectivo']);
                $this->precio = $db->real_escape_string($_POST['precio']);
                $this->descuento = $db->real_escape_string($_POST['descuento']);
                $this->nif = $db->real_escape_string($_POST['nif']);
                $this->direccion = $db->real_escape_string($_POST['direccion']);
                $this->codigopostal = $db->real_escape_string($_POST['codigopostal']);
                $this->localidad = $db->real_escape_string($_POST['localidad']);
                $this->provincia = $db->real_escape_string($_POST['provincia']);
                $this->fechanacimiento = $db->real_escape_string($_POST['fechanacimiento']);
                $this->fechaalta = $db->real_escape_string($_POST['fechaalta']);
                $this->telefono1 = $db->real_escape_string($_POST['telefono1']);
                $this->telefono2 = $db->real_escape_string($_POST['telefono2']);
                $this->telefono3 = $db->real_escape_string($_POST['telefono3']);
                $this->email = $db->real_escape_string($_POST['email']);
                $this->iban = $db->real_escape_string($_POST['iban']);
                $this->notas = $db->real_escape_string($_POST['notas']);
                //Control de error:Comprueba que precio sea numerico
                if (is_numeric($this->precio) == False) {
                    echo 2;
                }

                //Control de error:Comprueba que el nif sea válido
                if ($this->check_nif_cif_nie($this->nif) < 0) {
                    echo 3;
                    echo $this->check_nif_cif_nie($this->nif);
                }

                //control de error:Comprueba que la fecha de nacimiento sea valida
                if (!empty($this->fechanacimiento)) {
                    $explode = explode('-', $this->fecha);
                    if (!($explode[0] >= 1 and $explode[0] <= 31 //dia
                        or $explode[1] >= 1 and $explode[1] <= 12 //mes
                        or $explode[2] >= 1900 and $explode[2] <= 3000)
                    ) {//año
                        echo 4;
                        exit;
                    }
                }
                unset($explode);
                //control de error:Comprueba que la fecha de alta sea valida
                if (!empty($this->fechaalta)) {
                    $explode = explode('-', $this->fecha);
                    if (!($explode[0] >= 1 and $explode[0] <= 31 //dia
                        or $explode[1] >= 1 and $explode[1] <= 12 //mes
                        or $explode[2] >= 1900 and $explode[2] <= 3000)
                    ) {//año
                        echo 5;
                        exit;
                    }
                }
                unset($explode);
                //Control de error:Comprueba que el email sea valida
                if (!empty($this->email)) {
                    if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                        echo 6;
                        exit;
                    }

                }
                //Control de error:Comprueba que el iban sea valido
                if (!empty($iban)) {
                    if ($this->comprobar_iban($iban) == false) {
                        echo 7;
                    }
                }


                $sql = $db->query("SELECT * FROM users WHERE user='$this->user' OR email='$this->email';");
                if ($db->rows($sql) == 0) {


                    echo 1;
                } else {
                    throw new Exception(2);
                }
                $db->liberar($sql);
                $db->close();
            } else {
                throw new exception('Error: Datos vacios.');

            }

        } catch (exception $login) {
            echo $login->getMessage();
        }
    }



}

?>