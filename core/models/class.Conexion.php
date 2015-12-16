<?php

Class Conexion extends mysqli{

    public function __construct(){
        parent::__construct('localhost','root','','phpavanzado');
        $this->query("SET NAMES utf8");
        $this->connect_errno ? die('ERROR: Conexion a la base de datos fallida'): $x = 'conectado';
    }

    public function rows($x){
        return mysqli_num_rows($x);
    }

    public function recorrer($x){
        return mysqli_fetch_array($x);
    }

    public function liberar($x){
        return mysqli_free_result($x);
    }

    public function preparada(){
        return mysqli_stmt_init();
    }
}