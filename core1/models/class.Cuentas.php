<?php

class Cuentas
{
    private $user;
    private $email;
    private $fecha;
    private $id;
    private $nombres;
    private $apellidos;

    public function EditUser()
    {
        if (!empty($_POST['user']) and !empty($_POST['email'])) {

            $db = new conexion();
            $this->user = $db->real_escape_string($_POST['user']);
            $this->email = $db->real_escape_string($_POST['email']);
            $this->id = $_SESSION['id'];

            //Control de error para usuario
            if (strtolower($this->user) != strtolower($_SESSION['user'])) {
                $time = time();

                $sql = $db->query("SELECT id FROM users WHERE cambio >'$time' AND cambio <>'0' AND id='$this->id';");
                $sql2 = $db->query("SELECT user FROM users WHERE user='$this->user' AND id <> '$this->id';");

                if ($db->rows($sql) > 0) {
                        $db->liberar($sql2, $sql);
                        $db->close();
                        header('location: ?view=cuenta&error=5');
                        exit;
                }

                if ($db->rows($sql2) > 0) {
                    $db->liberar($sql2, $sql);
                    $db->close();
                    header('location: ?view=cuenta&error=2');
                    exit;
                }
                $c_cambio=1;
            }
            //Fin Control de error para usuario
            //Control de error para email
            if (strtolower($this->email) != strtolower($_SESSION['email'])) {
                //Control de error para email
                $sql = $db->query("SELECT email FROM users WHERE email='$this->email' AND id<>'$this->id';");
                if ($db->rows($sql) > 0) {
                    $db->liberar($sql);
                    $db->close();
                    header('location: ?view=cuenta&error=3');
                    exit;
                }
            }
            //Fin Control de error para email
            //Control de error para la fecha
            $this->fecha = $db->real_escape_string($_POST['fecha']);
            if(!empty($this->fecha)){
                $explode = explode('-', $this->fecha);

                if (!($explode[0] >= 1 and $explode[0] <= 31 //dia
                    or $explode[1] >= 1 and $explode[1] <= 12 //mes
                    or $explode[2] >= 1900 and $explode[2] <= 3000)
                ) {//año
                    header('location: ?view=cuenta&error=4');
                    exit;
                }
            }


            unset($explode);

            //Fin Control de error para la fecha
            //Control de error para la subida de imagen
            if ($_FILES['foto']['name'] != '') {
                $ext = end(explode('.', $_FILES['foto']['name']));
                $extensiones = array('jpg', 'png', 'gif', 'jpeg', 'JPG', 'PNG', 'GIF', 'JPEG');
                if (!in_array($ext, $extensiones)) {
                    header('location: ?view=cuenta&error=6');
                    exit;
                }
                $ruta = 'uploads/avatar/' . $this->id.'.'.$_SESSION['ext'];
                if(file_exists($ruta)){
                    unlink($ruta);
                }
                $ruta = 'uploads/avatar/' . $this->id .'.'. $ext;
                move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
            }
            //Fin Control de error para la subida de imagen

           // $tiempo_cambio = $c_cambio== 1 ? time()+(60*60*24*31):0;
            if(isset($c_cambio)){
                $tiempo_cambio=time()+(60*60*24*31);
            }else{
                $tiempo_cambio=$_SESSION['cambio'];
            }


            $this->nombres=$db->real_escape_string($_POST['names']);
            $this->apellidos=$db->real_escape_string($_POST['lastnames']);
            $_SESSION['nombre']=$this->nombres;
            $_SESSION['apellidos']=$this->apellidos;
            $_SESSION['fecha']=$this->fecha;
            $_SESSION['user']=$this->user;
            $_SESSION['email'] = $this->email;
            $_SESSION['cambio']=$tiempo_cambio;
            $_SESSION['ext']=$ext;


            $update=$db->query("UPDATE users SET user='$this->user',email='$this->email',nombre='$this->nombres',apellidos='$this->apellidos',fecha='$this->fecha',cambio='$tiempo_cambio' WHERE id='$this->id'");
            $db->liberar($update);
            $db->close();
            header('location: ?view=cuenta&success=1');

        } else {
            header('location: ?view=cuenta&error=1');
        }

    }
}