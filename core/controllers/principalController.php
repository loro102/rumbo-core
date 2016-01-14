<?php
if (isset($_SESSION['id'],$_SESSION['usuario'])) {
    $template =new Smarty();
    $template->assign('titulo', 'Principal');
    $db=new Conexion();
    //Muestra las alertas de citas
    $sql=$db->query("SELECT * FROM alertas WHERE Activada=1 AND Fecha <= date_add(NOW(),INTERVAL 1 MONTH) ORDER BY Fecha ASC");
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
    //Muestra pendientes de revision con más de 20 dias
    $sql2=$db->query("SELECT abonados.Nombre, abonados.Apellido1, abonados.Apellido2, siniestro.UltimaVision, siniestro.Fase, siniestro.Id, fases.Texto, siniestro.`Fecha siniestro` FROM fases INNER JOIN ( abonados INNER JOIN siniestro ON abonados.Id = siniestro.Abonado ) ON fases.Id = siniestro.Fase WHERE siniestro.UltimaVision < DATE_SUB(NOW(), INTERVAL 20 DAY) AND siniestro.Fase < 40;");
    //$sql2=$db->query("SELECT abonados.Nombre, abonados.Apellido1, abonados.Apellido2, siniestro.UltimaVision, siniestro.Fase, siniestro.Id, fases.Texto, siniestro.`Fecha siniestro` FROM fases INNER JOIN ( abonados INNER JOIN siniestro ON abonados.Id = siniestro.Abonado ) ON fases.Id = siniestro.Fase WHERE siniestro.`Fecha siniestro` < DATE_SUB(NOW(), INTERVAL 20 DAY) AND siniestro.Fase < 40;");

    if ($db->rows($sql2)>0){
        while ($x=$db->recorrer($sql2)){
            $pterev[]=array(
                'nombre'=>$x['Nombre'],
                'apellido1'=>$x['Apellido1'],
                'apellido2'=>$x['Apellido2'],
                'ultima'=>$x['UltimaVision'],
                'fase'=>$x['Texto'],
                'fecha'=>$x['Fecha siniestro'],
                'id'=>$x['Id'],
            );
        }
        $template->assign('pterev',$pterev);
    }
    $tramitadores="()";
    if ($_SESSION['tramitadores']!="")
    {

        $tramitadores=$_SESSION['tramitadores'];
    }
    //Muestra asuntos con más de 1 mes pendiente de asistencia jurídica
    $sql3=$db->query("SELECT siniestro.Id, siniestro.`Fecha siniestro`, abonados.Nombre, abonados.Apellido1, abonados.Apellido2, siniestro.Representado, siniestro.Nombre AS RNombre FROM siniestro, abonados WHERE siniestro.Abonado = abonados.Id AND siniestro.`Fecha siniestro` BETWEEN DATE_SUB( siniestro.`Fecha siniestro`, INTERVAL 6 MONTH ) AND DATE_SUB( siniestro.`Fecha siniestro`, INTERVAL 26 WEEK ) AND DATE_SUB( siniestro.`Fecha siniestro`, INTERVAL 24 WEEK ) AND siniestro.PresentadaDenuncia = FALSE AND siniestro.Fase <= 30 AND Tramitador IN $tramitadores ORDER BY siniestro.`Fecha siniestro`;");
    if ($db->rows($sql3)>0){
        while ($x=$db->recorrer($sql3)){
            $finpro[]=array(
                'nombre'=>$x['Nombre'],
                'apellido1'=>$x['Apellido1'],
                'apellido2'=>$x['Apellido2'],
                'representado'=>$x['RNombre'],
                'fecha'=>$x['Fecha siniestro'],
                'id'=>$x['Id'],
            );
        }
        $template->assign('finpro',$finpro);
    }
    //Muestra expedientes que llevan mas de 15 dias pendientes de facturas
    $sql4=$db->query("SELECT siniestro.Id, siniestro.`Fecha siniestro`, abonados.Nombre, abonados.Apellido1, abonados.Apellido2, siniestro.`Fecha Alta` FROM siniestro, abonados WHERE siniestro.Abonado = abonados.Id AND ( siniestro.`Fecha Alta` < DATE_SUB(NOW(), INTERVAL 15 DAY) OR siniestro.`Fecha Alta` IS NULL ) AND (siniestro.Fase = 15) AND ( siniestro.Tramitador IN $tramitadores ) ORDER BY siniestro.`Fecha Alta` ASC;");
    if ($db->rows($sql4)>0){
        while ($x=$db->recorrer($sql4)){
            $ptefac[]=array(
                'nombre'=>$x['Nombre'],
                'apellido1'=>$x['Apellido1'],
                'apellido2'=>$x['Apellido2'],
                'representado'=>$x['RNombre'],
                'fecha'=>$x['Fecha Alta'],
                'id'=>$x['Id'],
            );
        }
        $template->assign('ptefac',$ptefac);
    }

    //Muestra expedientes que llevan mas de 20 dias con alta forense y sin informe
    $sql5=$db->query("SELECT siniestro.Id, siniestro.`Fecha siniestro`, abonados.Nombre, abonados.Apellido1, abonados.Apellido2, siniestro.FechaAltaForense FROM siniestro, abonados WHERE siniestro.Abonado = abonados.Id AND siniestro.FechaAltaForense < DATE_SUB(NOW(), INTERVAL 20 DAY) AND siniestro.Fase = 20 AND siniestro.Tramitador IN $tramitadores ORDER BY siniestro.FechaAltaForense ASC;");
    if ($db->rows($sql5)>0){
        while ($x=$db->recorrer($sql5)){
            $forense[]=array(
                'nombre'=>$x['Nombre'],
                'apellido1'=>$x['Apellido1'],
                'apellido2'=>$x['Apellido2'],
                'fechaf'=>$x['FechaAltaForense'],
                'fecha'=>$x['Fecha siniestro'],
                'id'=>$x['Id'],
            );
        }
        $template->assign('forense',$forense);
    }

        //Muestra expedientes que deberian haber llegado el talon
    $sql6=$db->query("SELECT abonados.Nombre, abonados.Apellido1, abonados.Apellido2, siniestro.`Fecha siniestro`, siniestro.FechaTalon, siniestro.Id FROM siniestro, abonados WHERE (siniestro.FechaTalon < NOW()) AND (siniestro.Fase = 39) AND ( siniestro.Abonado = abonados.Id ) AND siniestro.Tramitador IN $tramitadores ORDER BY siniestro.FechaTalon DESC;");
    if ($db->rows($sql6)>0){
        while ($x=$db->recorrer($sql6)){
            $talon[]=array(
                'nombre'=>$x['Nombre'],
                'apellido1'=>$x['Apellido1'],
                'apellido2'=>$x['Apellido2'],
                'fechat'=>$x['FechaTalon'],
                'fecha'=>$x['Fecha siniestro'],
                'id'=>$x['Id'],
            );
        }
        $template->assign('talon',$talon);
    }
    //Muestra expedientes pendientes de cobro por empresa
    /*$sql6=$db->query("SELECT abonados.Nombre, abonados.Apellido1, abonados.Apellido2, siniestro.`Fecha siniestro`, siniestro.FechaTalon, siniestro.Id FROM siniestro, abonados WHERE (siniestro.FechaTalon < NOW()) AND (siniestro.Fase = 39) AND ( siniestro.Abonado = abonados.Id ) AND siniestro.Tramitador IN $tramitadores ORDER BY siniestro.FechaTalon DESC;");
    if ($db->rows($sql6)>0){
        while ($x=$db->recorrer($sql6)){
            $talon[]=array(
                'nombre'=>$x['Nombre'],
                'apellido1'=>$x['Apellido1'],
                'apellido2'=>$x['Apellido2'],
                'fechat'=>$x['FechaTalon'],
                'fecha'=>$x['Fecha siniestro'],
                'id'=>$x['Id'],
            );
        }
        $template->assign('talon',$talon);
    }*/








    $db->liberar($sql,$sql2,$sql3,$sql4,$sql5,$sql6);
    $db->close();
    $template->display('principal.tpl');
    $log->insert('El usuario '.$_SESSION['usuario'].' accedió a principal', false, false, false);
}else{
    $log->insert('Acceso no autorizado a principal '.$_SESSION['usuario'], false, false, false);
    header('location:?view=login');
}

?>