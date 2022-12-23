<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CapturaC
 *
 * @author calle
 */
require_once '../dao/CapturaD.php';

class CapturaC {

    public static function insertarEmpleado($pk_idu_nivelestudio, $pk_idu_nacionalidad, $pk_idu_puesto, $pk_idu_centro, $pk_idu_colonia, $pk_idu_tiposangre, $pk_idu_genero, $nom_empleado, $apel_paterno_empleado, $apellido_materno,
            $num_nomina, $fec_nac_empleado, $curp_empleado, $nss_empleado, $rfc_empleado, $tel_empleado,
            $tel_incidente_empelado, $cta_ban_empleado, $correo_empleado, $calle_empleado, $num_casa_ex_empleado,
            $num_casa_inter_empleado, $des_refer_domi_empleado) {

        $empleado = new CapturaE();
        $empleado->setPk_idu_nivelestudio($pk_idu_nivelestudio);
        $empleado->setPk_idu_nacionalidad($pk_idu_nacionalidad);
        $empleado->setPk_idu_puesto($pk_idu_puesto);
        $empleado->setPk_idu_centro($pk_idu_centro);
        $empleado->setPk_idu_colonia($pk_idu_colonia);
        $empleado->setPk_idu_tiposangre($pk_idu_tiposangre);
        $empleado->setPk_idu_genero($pk_idu_genero);
        $empleado->setNom_empleado($nom_empleado);
        $empleado->setApel_paterno_empleado($apel_paterno_empleado);
        $empleado->setApellido_materno($apellido_materno);
        $empleado->setNum_nomina($num_nomina);
        $empleado->setFec_nac_empleado($fec_nac_empleado);
        $empleado->setCurp_empleado($curp_empleado);
        $empleado->setNss_empleado($nss_empleado);
        $empleado->setRfc_empleado($rfc_empleado);
        $empleado->setTel_empleado($tel_empleado);
        $empleado->setTel_incidente_empelado($tel_incidente_empelado);
        $empleado->setCta_ban_empleado($cta_ban_empleado);
        $empleado->setCorreo_empleado($correo_empleado);
        $empleado->setCalle_empleado($calle_empleado);
        $empleado->setNum_casa_ex_empleado($num_casa_ex_empleado);
        $empleado->setNum_casa_inter_empleado($num_casa_inter_empleado);
        $empleado->setDes_refer_domi_empleado($des_refer_domi_empleado);
        return CapturaD::insertarEmpleado($empleado);
    }

    public static function obtenerEmpleados() {
        return CapturaD::obtenerEmpleados();
    }

    public static function eliminarEmpleado($pk_idu_empleado) {
        $empleado = new CapturaE();
        $empleado->setPk_idu_empleado($pk_idu_empleado);
        return CapturaD::eliminarEmpleado($empleado);
    }

    public static function obtenerInfoEmpleado($pk_idu_empleado) {
        $empleado = new CapturaE();
        $empleado->setPk_idu_empleado($pk_idu_empleado);
        return CapturaD::obtenerInfoEmpleado($empleado);
    }

    public static function actualizarEmpleado($pk_idu_nivelestudio, $pk_idu_nacionalidad, $pk_idu_puesto, $pk_idu_centro, $pk_idu_colonia, $pk_idu_tiposangre, $pk_idu_genero, $nom_empleado, $apel_paterno_empleado, $apellido_materno,
            $num_nomina, $fec_nac_empleado, $curp_empleado, $nss_empleado, $rfc_empleado, $tel_empleado,
            $tel_incidente_empelado, $cta_ban_empleado, $correo_empleado, $calle_empleado, $num_casa_ex_empleado,
            $num_casa_inter_empleado, $des_refer_domi_empleado, $pk_idu_empleado) {
        $empleado = new CapturaE();
        $empleado->setPk_idu_nivelestudio($pk_idu_nivelestudio);
        $empleado->setPk_idu_nacionalidad($pk_idu_nacionalidad);
        $empleado->setPk_idu_puesto($pk_idu_puesto);
        $empleado->setPk_idu_centro($pk_idu_centro);
        $empleado->setPk_idu_colonia($pk_idu_colonia);
        $empleado->setPk_idu_tiposangre($pk_idu_tiposangre);
        $empleado->setPk_idu_genero($pk_idu_genero);
        $empleado->setNom_empleado($nom_empleado);
        $empleado->setApel_paterno_empleado($apel_paterno_empleado);
        $empleado->setApellido_materno($apellido_materno);
        $empleado->setNum_nomina($num_nomina);
        $empleado->setFec_nac_empleado($fec_nac_empleado);
        $empleado->setCurp_empleado($curp_empleado);
        $empleado->setNss_empleado($nss_empleado);
        $empleado->setRfc_empleado($rfc_empleado);
        $empleado->setTel_empleado($tel_empleado);
        $empleado->setTel_incidente_empelado($tel_incidente_empelado);
        $empleado->setCta_ban_empleado($cta_ban_empleado);
        $empleado->setCorreo_empleado($correo_empleado);
        $empleado->setCalle_empleado($calle_empleado);
        $empleado->setNum_casa_ex_empleado($num_casa_ex_empleado);
        $empleado->setNum_casa_inter_empleado($num_casa_inter_empleado);
        $empleado->setDes_refer_domi_empleado($des_refer_domi_empleado);
        $empleado->setPk_idu_empleado($pk_idu_empleado);
        return CapturaD::insertarEmpleado($empleado);
    }

}
