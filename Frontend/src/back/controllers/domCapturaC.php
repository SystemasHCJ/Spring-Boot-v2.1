<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of domCapturaC
 *
 * @author calle
 */
require_once '../dao/domCapturaD.php';

class domCapturaC {

    public static function obtenerGenero() {
        return domCapturaD::obtenerGenero();
    }

    public static function obtenerNacionalidad() {
        return domCapturaD::obtenerNacionalidad();
    }

    public static function obtenerTipoSangre() {
        return domCapturaD::obtenerTipoSangre();
    }

    public static function obtenerNivelEstudio() {
        return domCapturaD::obtenerNivelEstudio();
    }

    public static function obtenerPais() {
        return domCapturaD::obtenerPais();
    }

    public static function obtenerEntidadFederativa($id) {
        return domCapturaD::obtenerEntidadFederativa($id);
    }

    public static function obtenerMunicipio($id) {
        return domCapturaD::obtenerMunicipio($id);
    }

    public static function obtenerColonia($id) {
        return domCapturaD::obtenerColonia($id);
    }

    public static function obtenerCentro() {
        return domCapturaD::obtenerCentro();
    }
    
    public static function obtenerPuesto() {
        return domCapturaD::obtenerPuesto();
    }

}
