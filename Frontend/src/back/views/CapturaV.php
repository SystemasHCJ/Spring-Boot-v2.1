<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CapturaV
 *
 * @author calle
 */
require_once '../webConfig/webConfig.php';
require_once '../controllers/CapturaC.php';
require_once '../../php_functions/GralFunctions.php';

class CapturaV {

    public static function menu($op) {
        switch ($op) {
            case 1:/* $_POST[''], */
                print CapturaC::insertarEmpleado(
                                $_POST['P_slctNV_estudio'],
                                $_POST['P_slctNacio'],
                                $_POST['P_slctPuesto'],
                                $_POST['P_slctCentro'],
                                $_POST['P_slctColonia'],
                                $_POST['P_slctSangre'],
                                $_POST['P_slctgenero'],
                                $_POST['P_Nombre'],
                                $_POST['P_ApelP'],
                                $_POST['P_ApelM'],
                                12,
                                self::FormatDMY($_POST['P_fec_nac']),
                                $_POST['P_CURP'],
                                $_POST['P_NSS'],
                                $_POST['P_RFC'],
                                $_POST['P_TEL'],
                                $_POST['P_TEL_acc'],
                                $_POST['P_cta_banc'],
                                $_POST['P_email'],
                                $_POST['P_calle'],
                                $_POST['P_NoExt'],
                                $_POST['P_NoInt'],
                                $_POST['P_refere']);
                break;
            case 2:
                print CapturaC::obtenerEmpleados();
                break;
            case 3:
                print CapturaC::eliminarEmpleado($_POST['key']);
                break;
            case 4:
                print CapturaC::obtenerInfoEmpleado($_POST['key']);
                break;
            case 5:
                print CapturaC::actualizarEmpleado(
                                $_POST['P_slctNV_estudio'],
                                $_POST['P_slctNacio'],
                                $_POST['P_slctPuesto'],
                                $_POST['P_slctCentro'],
                                $_POST['P_slctColonia'],
                                $_POST['P_slctSangre'],
                                $_POST['P_slctgenero'],
                                $_POST['P_Nombre'],
                                $_POST['P_ApelP'],
                                $_POST['P_ApelM'],
                                12,
                                self::FormatDMY($_POST['P_fec_nac']),
                                $_POST['P_CURP'],
                                $_POST['P_NSS'],
                                $_POST['P_RFC'],
                                $_POST['P_TEL'],
                                $_POST['P_TEL_acc'],
                                $_POST['P_cta_banc'],
                                $_POST['P_email'],
                                $_POST['P_calle'],
                                $_POST['P_NoExt'],
                                $_POST['P_NoInt'],
                                $_POST['P_refere'],
                                $_POST['key']);
                break;
            case 6:
                //echo '{"name":"john","email":"john@email.com"}' | curl -X POST -H "Content-Type: application/json" -d @- http://localhost:8080/api/user/create;
                break;

            default:
                break;
        }
    }

    public static function FormatDMY($fecha) {
        return date_format(date_create($fecha), 'd/m/Y');
    }

}

//CapturaV::menu(2);
CapturaV::menu($_POST['op']);
