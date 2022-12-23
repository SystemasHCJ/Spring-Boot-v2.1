<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of domCapturaV
 *
 * @author calle
 */
require_once '../webConfig/webConfig.php';
require_once '../controllers/domCapturaC.php';

class domCapturaV {

    public static function menu($op) {
        switch ($op) {
            case 1:
                print domCapturaC::obtenerGenero();
                break;
            case 2:
                print domCapturaC::obtenerNacionalidad();
                break;
            case 3:
                print domCapturaC::obtenerTipoSangre();
                break;
            case 4:
                print domCapturaC::obtenerNivelEstudio();
                break;
            case 5:
                print domCapturaC::obtenerPais();
                break;
            case 6:
                print domCapturaC::obtenerEntidadFederativa($_POST['id']);
                break;
            case 7:
                print domCapturaC::obtenerMunicipio($_POST['id']);
                break;
            case 8:
                print domCapturaC::obtenerColonia($_POST['id']);
                break;
            case 9:
                print domCapturaC::obtenerCentro();
                break;
            case 10:
                print domCapturaC::obtenerPuesto();
                break;

            default:
                break;
        }
    }

}

domCapturaV::menu($_POST['op']);
