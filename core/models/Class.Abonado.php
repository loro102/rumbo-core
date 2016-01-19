<?php

/**
 * Created by PhpStorm.
 * User: adminstracion
 * Date: 11/01/2016
 * Time: 15:43
 */
Class Abonado
{

    private $nombre,$apellido1,$apellido2;
    private $agente;
    private $colectivo;
    private $precio;
    private $descuento;
    private $nif;
    private $direccion,$codigopostal,$localidad,$provincia;
    private $fechanacimiento;
    private $fechaalta;
    private $telefono1,$telefono2,$telefono3;
    private $email;
    private $iban;
    private $notas;

    public function Nuevo()
    {
        try {

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

                //Si encuentra algun dato que no este correctamente validado devuelve un numero indicando los errores encontrados
                $sql=$db->query("SELECT abonados.NIF FROM abonados WHERE abonados.NIF like '%$this->nif%';");

                if ($db->rows($sql)<=0){
                    if ($this->validar_texto($this->nombre)===false){
                        throw new exception(1);
                    }

                    if ($this->validar_texto($this->apellido1));



                }


                if ($this->nombre === true){

                }

                $db=new conexion();

                $sql = $db->query("SELECT * FROM abonados WHERE NIF='$this->nif';");
                //Si no encuentra el DNI introducido en la base de datos procede a insertar los datos
                if ($db->rows($sql) == 0) {
                    $sql=$db->query("INSERT INTO abonados ( Nombre, Apellido1, Apellido2, Direccion, Codigo Postal, Localidad, Provincia, NIF, FechaNacimiento, FechaPrimerAbono, `Telefono 1`, `Telefono 2`, `Telefono 3`, Email, Notas, Colectivo, Agente, Precio, CCC, Descuento) VALUES ('$this->nombre','$this->apellido1','$this->apellido2','$this->direccion','$this->codigopostal','$this->localidad','$this->provincia','$this->nif','$this->fechanacimiento','$this->fechaalta','$this->telefono1','$this->telefono2','$this->telefono3)','$this->email','$this->notas','$this->colectivo','$this->agente','$this->precio','$this->iban','$this->descuento');");
                    echo 1;
                } else {
                    throw new Exception(2);
                }
                $db->liberar($sql);
                $db->close();
            } else {
                throw new exception('Error: Datos vacios.');

            }

        } catch (exception $nuevo) {
            echo $nuevo->getMessage();
        }
    }



}

?>