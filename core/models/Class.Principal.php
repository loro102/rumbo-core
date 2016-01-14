<?php
/**
 * Created by PhpStorm.
 * User: loro102
 * Date: 10/01/2016
 * Time: 19:26
 */
Class principal{
    private $sql;

    public function citas(){
        $template =new Smarty();
        $db=new Conexion();
        $sql=$db->query("SELECT * FROM alertas WHERE Activada=-1 and Fecha date_add(NOW(),INTERVAL 1 MONTH) ORDER BY Fecha ASC;");
        if ($db->rows($sql)>0){
            while ($x=$db->recorrer($sql)){
                $citas[]=array(
                    'id'=>$x['Id'],
                    'fecha'=>$x['Fecha'],
                    'alerta'=>$x['Alerta'],
                );
            }
            $template->assign('citas',$citas);



        }
        $template->assign('principal/citas.tpl');

    }
}