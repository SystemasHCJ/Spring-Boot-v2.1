<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CapturaE
 *
 * @author calle
 */
class CapturaE {

    private $pk_idu_empleado;
    private $pk_idu_nivelestudio;
    private $pk_idu_nacionalidad;
    private $pk_idu_puesto;
    private $pk_idu_media;
    private $pk_idu_centro;
    private $pk_idu_usuario;
    private $pk_idu_usuario_nomi;
    private $pk_idu_colonia;
    private $pk_idu_tiposangre;
    private $pk_idu_genero;
    private $nom_empleado;
    private $apellido_materno;
    private $apel_paterno_empleado;
    private $num_nomina;
    private $fec_nac_empleado;
    private $num_empleado;
    private $curp_empleado;
    private $nss_empleado;
    private $rfc_empleado;
    private $tel_empleado;
    private $tel_incidente_empelado;
    private $cta_ban_empleado;
    private $correo_empleado;
    private $calle_empleado;
    private $num_casa_ex_empleado;
    private $num_casa_inter_empleado;
    private $des_refer_domi_empleado;
    private $fec_alta_empleado;
    private $clv_estatus_empleado;
    
    public function getPk_idu_empleado() {
        return $this->pk_idu_empleado;
    }

    public function getPk_idu_nivelestudio() {
        return $this->pk_idu_nivelestudio;
    }

    public function getPk_idu_nacionalidad() {
        return $this->pk_idu_nacionalidad;
    }

    public function getPk_idu_puesto() {
        return $this->pk_idu_puesto;
    }

    public function getPk_idu_media() {
        return $this->pk_idu_media;
    }

    public function getPk_idu_centro() {
        return $this->pk_idu_centro;
    }

    public function getPk_idu_usuario() {
        return $this->pk_idu_usuario;
    }

    public function getPk_idu_usuario_nomi() {
        return $this->pk_idu_usuario_nomi;
    }

    public function getPk_idu_colonia() {
        return $this->pk_idu_colonia;
    }

    public function getPk_idu_tiposangre() {
        return $this->pk_idu_tiposangre;
    }

    public function getPk_idu_genero() {
        return $this->pk_idu_genero;
    }

    public function getNom_empleado() {
        return $this->nom_empleado;
    }

    public function getApellido_materno() {
        return $this->apellido_materno;
    }

    public function getApel_paterno_empleado() {
        return $this->apel_paterno_empleado;
    }

    public function getNum_nomina() {
        return $this->num_nomina;
    }

    public function getFec_nac_empleado() {
        return $this->fec_nac_empleado;
    }

    public function getNum_empleado() {
        return $this->num_empleado;
    }

    public function getCurp_empleado() {
        return $this->curp_empleado;
    }

    public function getNss_empleado() {
        return $this->nss_empleado;
    }

    public function getRfc_empleado() {
        return $this->rfc_empleado;
    }

    public function getTel_empleado() {
        return $this->tel_empleado;
    }

    public function getTel_incidente_empelado() {
        return $this->tel_incidente_empelado;
    }

    public function getCta_ban_empleado() {
        return $this->cta_ban_empleado;
    }

    public function getCorreo_empleado() {
        return $this->correo_empleado;
    }

    public function getCalle_empleado() {
        return $this->calle_empleado;
    }

    public function getNum_casa_ex_empleado() {
        return $this->num_casa_ex_empleado;
    }

    public function getNum_casa_inter_empleado() {
        return $this->num_casa_inter_empleado;
    }

    public function getDes_refer_domi_empleado() {
        return $this->des_refer_domi_empleado;
    }

    public function getFec_alta_empleado() {
        return $this->fec_alta_empleado;
    }

    public function getClv_estatus_empleado() {
        return $this->clv_estatus_empleado;
    }

    public function setPk_idu_empleado($pk_idu_empleado): void {
        $this->pk_idu_empleado = $pk_idu_empleado;
    }

    public function setPk_idu_nivelestudio($pk_idu_nivelestudio): void {
        $this->pk_idu_nivelestudio = $pk_idu_nivelestudio;
    }

    public function setPk_idu_nacionalidad($pk_idu_nacionalidad): void {
        $this->pk_idu_nacionalidad = $pk_idu_nacionalidad;
    }

    public function setPk_idu_puesto($pk_idu_puesto): void {
        $this->pk_idu_puesto = $pk_idu_puesto;
    }

    public function setPk_idu_media($pk_idu_media): void {
        $this->pk_idu_media = $pk_idu_media;
    }

    public function setPk_idu_centro($pk_idu_centro): void {
        $this->pk_idu_centro = $pk_idu_centro;
    }

    public function setPk_idu_usuario($pk_idu_usuario): void {
        $this->pk_idu_usuario = $pk_idu_usuario;
    }

    public function setPk_idu_usuario_nomi($pk_idu_usuario_nomi): void {
        $this->pk_idu_usuario_nomi = $pk_idu_usuario_nomi;
    }

    public function setPk_idu_colonia($pk_idu_colonia): void {
        $this->pk_idu_colonia = $pk_idu_colonia;
    }

    public function setPk_idu_tiposangre($pk_idu_tiposangre): void {
        $this->pk_idu_tiposangre = $pk_idu_tiposangre;
    }

    public function setPk_idu_genero($pk_idu_genero): void {
        $this->pk_idu_genero = $pk_idu_genero;
    }

    public function setNom_empleado($nom_empleado): void {
        $this->nom_empleado = $nom_empleado;
    }

    public function setApellido_materno($apellido_materno): void {
        $this->apellido_materno = $apellido_materno;
    }

    public function setApel_paterno_empleado($apel_paterno_empleado): void {
        $this->apel_paterno_empleado = $apel_paterno_empleado;
    }

    public function setNum_nomina($num_nomina): void {
        $this->num_nomina = $num_nomina;
    }

    public function setFec_nac_empleado($fec_nac_empleado): void {
        $this->fec_nac_empleado = $fec_nac_empleado;
    }

    public function setNum_empleado($num_empleado): void {
        $this->num_empleado = $num_empleado;
    }

    public function setCurp_empleado($curp_empleado): void {
        $this->curp_empleado = $curp_empleado;
    }

    public function setNss_empleado($nss_empleado): void {
        $this->nss_empleado = $nss_empleado;
    }

    public function setRfc_empleado($rfc_empleado): void {
        $this->rfc_empleado = $rfc_empleado;
    }

    public function setTel_empleado($tel_empleado): void {
        $this->tel_empleado = $tel_empleado;
    }

    public function setTel_incidente_empelado($tel_incidente_empelado): void {
        $this->tel_incidente_empelado = $tel_incidente_empelado;
    }

    public function setCta_ban_empleado($cta_ban_empleado): void {
        $this->cta_ban_empleado = $cta_ban_empleado;
    }

    public function setCorreo_empleado($correo_empleado): void {
        $this->correo_empleado = $correo_empleado;
    }

    public function setCalle_empleado($calle_empleado): void {
        $this->calle_empleado = $calle_empleado;
    }

    public function setNum_casa_ex_empleado($num_casa_ex_empleado): void {
        $this->num_casa_ex_empleado = $num_casa_ex_empleado;
    }

    public function setNum_casa_inter_empleado($num_casa_inter_empleado): void {
        $this->num_casa_inter_empleado = $num_casa_inter_empleado;
    }

    public function setDes_refer_domi_empleado($des_refer_domi_empleado): void {
        $this->des_refer_domi_empleado = $des_refer_domi_empleado;
    }

    public function setFec_alta_empleado($fec_alta_empleado): void {
        $this->fec_alta_empleado = $fec_alta_empleado;
    }

    public function setClv_estatus_empleado($clv_estatus_empleado): void {
        $this->clv_estatus_empleado = $clv_estatus_empleado;
    }



}
