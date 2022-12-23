<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of domCapturaD
 *
 * @author calle
 */
require_once '../enti/domCapturaE.php';

class domCapturaD extends webConfig {

    private static $cnx;
    private static $SQL = '';
    private static $r;
    private static $data;

    private static function getConexion() {
        self::$cnx = webConfig::conectar();
    }

    private static function desconectar() {
        self::$cnx = null;
    }

    public static function obtenerGenero() {
        try {
            self::getConexion(); //conecta a la bd
            self::$SQL = 'SELECT [pk_idu_genero]
                                ,[des_genero]
                            FROM [empleados].[dbo].[vis_genero]'; //Consulta SQL
            self::$r = self::$cnx->prepare(self::$SQL); // Prepara la consulta anterior
            self::$r->execute(); //Ejecuta la consulta
            self::$data = self::$r->fetchAll(PDO::FETCH_ASSOC); //Asocia los resultados de la consulta
            self::desconectar(); //desconecta la bd
            return json_encode(self::$data, JSON_UNESCAPED_UNICODE); //retorna un json con la consulta
        } catch (PDOException $exc) {
            $info = array("SQL" => 'false', 'Error' => $exc->getMessage(), 'Codigo' => $exc->getCode());
            return $info;
        }
    }

    public static function obtenerNacionalidad() {
        try {
            self::getConexion(); //conecta a la bd
            self::$SQL = 'SELECT [pk_idu_nacionalidad]
                                ,[nacionalidad]
                            FROM [empleados].[dbo].[vis_nacionalidad]'; //Consulta SQL
            self::$r = self::$cnx->prepare(self::$SQL); // Prepara la consulta anterior
            self::$r->execute(); //Ejecuta la consulta
            self::$data = self::$r->fetchAll(PDO::FETCH_ASSOC); //Asocia los resultados de la consulta
            self::desconectar(); //desconecta la bd
            return json_encode(self::$data, JSON_UNESCAPED_UNICODE); //retorna un json con la consulta
        } catch (PDOException $exc) {
            $info = array("SQL" => 'false', 'Error' => $exc->getMessage(), 'Codigo' => $exc->getCode());
            return $info;
        }
    }

    public static function obtenerTipoSangre() {
        try {
            self::getConexion(); //conecta a la bd
            self::$SQL = 'SELECT [key]
                                ,[des_tipo]
                            FROM [empleados].[dbo].[vis_tiposangre]'; //Consulta SQL
            self::$r = self::$cnx->prepare(self::$SQL); // Prepara la consulta anterior
            self::$r->execute(); //Ejecuta la consulta
            self::$data = self::$r->fetchAll(PDO::FETCH_ASSOC); //Asocia los resultados de la consulta
            self::desconectar(); //desconecta la bd
            return json_encode(self::$data, JSON_UNESCAPED_UNICODE); //retorna un json con la consulta
        } catch (PDOException $exc) {
            $info = array("SQL" => 'false', 'Error' => $exc->getMessage(), 'Codigo' => $exc->getCode());
            return $info;
        }
    }

    public static function obtenerNivelEstudio() {
        try {
            self::getConexion(); //conecta a la bd
            self::$SQL = 'SELECT [key]
                                ,[des_nivelacademico]
                            FROM [empleados].[dbo].[vis_nivelestudio]'; //Consulta SQL
            self::$r = self::$cnx->prepare(self::$SQL); // Prepara la consulta anterior
            self::$r->execute(); //Ejecuta la consulta
            self::$data = self::$r->fetchAll(PDO::FETCH_ASSOC); //Asocia los resultados de la consulta
            self::desconectar(); //desconecta la bd
            return json_encode(self::$data, JSON_UNESCAPED_UNICODE); //retorna un json con la consulta
        } catch (PDOException $exc) {
            $info = array("SQL" => 'false', 'Error' => $exc->getMessage(), 'Codigo' => $exc->getCode());
            return $info;
        }
    }

    public static function obtenerPais() {
        try {
            self::getConexion(); //conecta a la bd
            self::$SQL = 'SELECT [key]
                                ,[nom_pais]
                            FROM [empleados].[dbo].[vis_pais]'; //Consulta SQL
            self::$r = self::$cnx->prepare(self::$SQL); // Prepara la consulta anterior
            self::$r->execute(); //Ejecuta la consulta
            self::$data = self::$r->fetchAll(PDO::FETCH_ASSOC); //Asocia los resultados de la consulta
            self::desconectar(); //desconecta la bd
            return json_encode(self::$data, JSON_UNESCAPED_UNICODE); //retorna un json con la consulta
        } catch (PDOException $exc) {
            $info = array("SQL" => 'false', 'Error' => $exc->getMessage(), 'Codigo' => $exc->getCode());
            return $info;
        }
    }

    public static function obtenerEntidadFederativa($id) {
        try {
            self::getConexion(); //conecta a la bd
            self::$SQL = 'SELECT [key]
                                ,[nom_entidadfederativa]
                            FROM [empleados].[dbo].[vis_entidadfederativa] 
                           WHERE pk_idu_pais=?'; //Consulta SQL
            self::$r = self::$cnx->prepare(self::$SQL); // Prepara la consulta anterior
            self::$r->bindParam(1, $id, PDO::PARAM_STR); //pasando la variabel
            self::$r->execute(); //Ejecuta la consulta
            self::$data = self::$r->fetchAll(PDO::FETCH_ASSOC); //Asocia los resultados de la consulta
            self::desconectar(); //desconecta la bd
            return json_encode(self::$data, JSON_UNESCAPED_UNICODE); //retorna un json con la consulta
        } catch (PDOException $exc) {
            $info = array("SQL" => 'false', 'Error' => $exc->getMessage(), 'Codigo' => $exc->getCode());
            return $info;
        }
    }

    public static function obtenerMunicipio($id) {
        try {
            self::getConexion(); //conecta a la bd
            self::$SQL = 'SELECT [key]
                                ,[nom_munucipio]
                            FROM [empleados].[dbo].[vis_municipio] 
                           WHERE [pk_idu_entidadfederativa]=?'; //Consulta SQL
            self::$r = self::$cnx->prepare(self::$SQL); // Prepara la consulta anterior
            self::$r->bindParam(1, $id, PDO::PARAM_STR); //pasando la variabel
            self::$r->execute(); //Ejecuta la consulta
            self::$data = self::$r->fetchAll(PDO::FETCH_ASSOC); //Asocia los resultados de la consulta
            self::desconectar(); //desconecta la bd
            return json_encode(self::$data, JSON_UNESCAPED_UNICODE); //retorna un json con la consulta
        } catch (PDOException $exc) {
            $info = array("SQL" => 'false', 'Error' => $exc->getMessage(), 'Codigo' => $exc->getCode());
            return $info;
        }
    }

    public static function obtenerColonia($id) {
        try {
            self::getConexion(); //conecta a la bd
            self::$SQL = 'SELECT [key]
                                ,[nom__colonia]
                            FROM [empleados].[dbo].[vis_colonia]
                           WHERE [pk_idu_municipio]=?'; //Consulta SQL
            self::$r = self::$cnx->prepare(self::$SQL); // Prepara la consulta anterior
            self::$r->bindParam(1, $id, PDO::PARAM_STR); //pasando la variabel
            self::$r->execute(); //Ejecuta la consulta
            self::$data = self::$r->fetchAll(PDO::FETCH_ASSOC); //Asocia los resultados de la consulta
            self::desconectar(); //desconecta la bd
            return json_encode(self::$data, JSON_UNESCAPED_UNICODE); //retorna un json con la consulta
        } catch (PDOException $exc) {
            $info = array("SQL" => 'false', 'Error' => $exc->getMessage(), 'Codigo' => $exc->getCode());
            return $info;
        }
    }

    public static function obtenerCentro() {
        try {
            self::getConexion(); //conecta a la bd
            self::$SQL = "SELECT [key]
                                ,CONCAT([num_centro],' ',[nom_centro]) AS nom_completo
                            FROM [empleados].[dbo].[vist_centro]"; //Consulta SQL
            self::$r = self::$cnx->prepare(self::$SQL); // Prepara la consulta anterior
            self::$r->execute(); //Ejecuta la consulta
            self::$data = self::$r->fetchAll(PDO::FETCH_ASSOC); //Asocia los resultados de la consulta
            self::desconectar(); //desconecta la bd
            return json_encode(self::$data, JSON_UNESCAPED_UNICODE); //retorna un json con la consulta
        } catch (PDOException $exc) {
            $info = array("SQL" => 'false', 'Error' => $exc->getMessage(), 'Codigo' => $exc->getCode());
            return $info;
        }
    }

    public static function obtenerPuesto() {
        try {
            self::getConexion(); //conecta a la bd
            self::$SQL = "SELECT [key]
                                ,[des_puesto]
                            FROM [empleados].[dbo].[vis_puesto]"; //Consulta SQL
            self::$r = self::$cnx->prepare(self::$SQL); // Prepara la consulta anterior
            self::$r->execute(); //Ejecuta la consulta
            self::$data = self::$r->fetchAll(PDO::FETCH_ASSOC); //Asocia los resultados de la consulta
            self::desconectar(); //desconecta la bd
            return json_encode(self::$data, JSON_UNESCAPED_UNICODE); //retorna un json con la consulta
        } catch (PDOException $exc) {
            $info = array("SQL" => 'false', 'Error' => $exc->getMessage(), 'Codigo' => $exc->getCode());
            return $info;
        }
    }

}
