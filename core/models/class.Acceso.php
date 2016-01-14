<?php
Class Acceso{
    private $usuario;
    private $password;

    private function Encript($string){
        $sizeof=strlen($string) - 1;
        $result='';
        for ($x=$sizeof;$x >=0;$x--){
            $result .= $string[$x];
        }
        $result =md5($result);
        return $result;
    }

    public function Login(){
        try{
            if(!empty($_POST['usuario']) and !empty($_POST['password']) and !empty($_POST['session'])){
                $db=new Conexion();
                $this->usuario=$db->real_escape_string($_POST['usuario']);
                $this->password = $db->real_escape_string($_POST['password']);
                //$this->password = $this->Encript($_POST['password']);

                $sql=$db->query("SELECT * FROM claves WHERE Nombre='$this->usuario' AND Clave='$this->password';");
                if ($db->rows($sql)>0){
                    $datos=$db->recorrer($sql);
                    $id=$datos['Id'];
                    $_SESSION['id']=$id;
                    $_SESSION['usuario']=$datos['Nombre'];
                    $_SESSION['nivel']=$datos['Nivel'];
                    $_SESSION['controlfases']=$datos['ControlFases'];
                    $_SESSION['cuentaverexpedientes']=$datos['CuentaVerExpedientes'];
                    $_SESSION['indemnizacion']=$datos['Indemnizacion'];
                    $_SESSION['modificaraseguradora']=$datos['Modaseguradora'];
                    $_SESSION['verfacturas']=$datos['VerFacturas'];
                    $_SESSION['beneficio']=$datos['beneficio'];
                    $_SESSION['facturas']=$datos['facturas'];
                    $_SESSION['modificarsiniestro']=$datos['modsiniestro'];
                    $_SESSION['tramitadores']=$datos['tramitadores'];
                    $log = new Log("log", "./logs/");
                    $log->insert('Acceso al programa por el usuario '.$_SESSION['usuario'], false, false, false);
                    if($_POST['session']==true){
                        ini_set('session.cookie_lifetime',time() + (60*60*24*2));
                    }
                    echo 1;
                }else{
                    $log = new Log("log", "./logs/");
                    $log->insert('Acceso no autorizado', false, false, false);
                    throw new Exception(2);
                }
                $db->liberar($sql);
                $db->close();
            }else{
                throw new exception ('Error: Datos vacios');
            }

        }catch (exception $login){
            echo $login->getMessage();

        }
    }
}


?>