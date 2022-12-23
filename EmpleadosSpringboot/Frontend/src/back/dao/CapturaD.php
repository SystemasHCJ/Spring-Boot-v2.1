<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CapturaD
 *
 * @author calle
 */
require_once '../enti/CapturaE.php';

class CapturaD extends webConfig {

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

    public static function insertarEmpleado($empleado) {
        try {
            self::getConexion(); // conectar ala abase 
            /* Creando la SQl de Insert */
            self::$SQL = "DECLARE @msg varchar(max)
                          EXEC [dbo].[crear_empleado]
                                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                                @msg OUTPUT
                        SELECT	@msg as N'msg'";
            self::$r = self::$cnx->prepare(self::$SQL); //Se prepera la SQl Anterios
            //$empleado = new CapturaE();
            //self::$r->bindParam(1, $empleado->getPk_idu_colonia(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(1, $empleado->getPk_idu_tiposangre(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(2, $empleado->getPk_idu_genero(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(3, $empleado->getNom_empleado(), PDO::PARAM_STR);
            self::$r->bindParam(4, $empleado->getApel_paterno_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(5, $empleado->getApellido_materno(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(6, $empleado->getNum_nomina(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(7, $empleado->getFec_nac_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(8, $empleado->getCurp_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(9, $empleado->getNss_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(10, $empleado->getRfc_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(11, $empleado->getTel_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(12, $empleado->getTel_incidente_empelado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(13, $empleado->getCta_ban_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(14, $empleado->getCorreo_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(15, $empleado->getCalle_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(16, $empleado->getNum_casa_ex_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(17, $empleado->getNum_casa_inter_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(18, $empleado->getDes_refer_domi_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(19, $empleado->getPk_idu_nivelestudio(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(20, $empleado->getPk_idu_nacionalidad(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(21, $empleado->getPk_idu_puesto(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(22, $empleado->getPk_idu_centro(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(23, $empleado->getPk_idu_colonia(), PDO::PARAM_STR); //pasando los atributos a insertar


            self::$r->execute(); // Se ejecuta la SQL
            self::$data = self::$r->fetch(); // Se obtiene los result de la sql
            $info = array("insert" => self::$data); // se crea un array con el resultado del insert
            self::desconectar(); // se deconecta de la bd
            return (json_encode($info, false)); // se retorna el array info en forma de json
        } catch (PDOException $exc) {// Constrola errores de sintaxis de la sql
            self::desconectar(); // DESCONOXION DE LA BD y lansa el codigo de error
            return (json_encode(array('Error' => $exc->getMessage(), 'Codigo' => $exc->getCode()), false));
        }
    }

    public static function obtenerEmpleados() {
        try {
            self::getConexion(); // conectar ala abase 
            /* Creando la SQl */
            self::$SQL = "EXEC [dbo].[sp_obtenerempleados]";
            self::$r = self::$cnx->prepare(self::$SQL); // preparando la sql            
            self::$r->execute(); //Ejecuta la SQL
            self::$data = self::$r->fetchAll(PDO::FETCH_ASSOC); //Asocia el resultado de la consulta
            self::desconectar(); // desconecta de la bd
            return json_encode(self::$data, false); //Retorna un json con los resultados de query
        } catch (PDOException $exc) {// Constrola errores de sintaxis de la sql
            self::desconectar(); // DESCONOXION DE LA BD y lansa el codigo de error
            return (json_encode(array('Error' => $exc->getMessage(), 'Codigo' => $exc->getCode()), false));
        }
    }

    public static function eliminarEmpleado($empleado) {
        try {
            //$Mov = new HIST_EMPLEAD_E();
            self::getConexion(); // conectar ala abase 
            /* Creando la SQl de delete */
            self::$SQL = "DECLARE @Mensaje varchar(100)
                          EXEC    [dbo].[sp_eliminar_empleado]
                                  ?,
                                  @Mensaje OUTPUT
                          SELECT @Mensaje as N'r'
                            ";
            self::$r = self::$cnx->prepare(self::$SQL); //Se prepera la SQl Anterios
            //$empleado = new CapturaE();
            self::$r->bindParam(1, $empleado->getPk_idu_empleado(), PDO::PARAM_STR); //pasando el atributos a eliminar           
            self::$r->execute(); // Se ejecuta la SQL
            self::$data = self::$r->fetch(); // Se obtiene los result de la sql
            $info = array("delete" => self::$data); // se crea un array con el resultado del insert
            self::desconectar(); // se deconecta de la bd
            return (json_encode($info, false)); // se retorna el array info en forma de json
        } catch (PDOException $exc) {// Constrola errores de sintaxis de la sql
            self::desconectar(); // DESCONOXION DE LA BD y lansa el codigo de error
            return (json_encode(array('Error' => $exc->getMessage(), 'Codigo' => $exc->getCode()), false));
        }
    }

    public static function obtenerInfoEmpleado($empleado) {
        try {
            self::getConexion(); // conectar ala abase 
            /* Creando la SQl */
            self::$SQL = "EXEC	[dbo].[sp_info_empelado] ?";
            self::$r = self::$cnx->prepare(self::$SQL); // preparando la sql 
            self::$r->bindParam(1, $empleado->getPk_idu_empleado(), PDO::PARAM_STR); //pasando los atributos           
            self::$r->execute(); //Ejecuta la SQL
            self::$data = self::$r->fetchObject(); //Asocia el resultado de la consulta
            self::desconectar(); // desconecta de la bd
            return json_encode((self::$data), false); //Retorna un json con los resultados de query
        } catch (PDOException $exc) {// Constrola errores de sintaxis de la sql
            self::desconectar(); // DESCONOXION DE LA BD y lansa el codigo de error
            return (json_encode(array('Error' => $exc->getMessage(), 'Codigo' => $exc->getCode()), false));
        }
    }

    public static function actualizarEmpleado($empleado) {
        try {
            self::getConexion(); // conectar ala abase 
            /* Creando la SQl de Insert */
            self::$SQL = "DECLARE @msg varchar(max)
                          EXEC [dbo].[sp_actualizar_empleado]
                                ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
                                @msg OUTPUT
                        SELECT	@msg as N'msg'";
            self::$r = self::$cnx->prepare(self::$SQL); //Se prepera la SQl Anterios
            //$empleado = new CapturaE();
            //self::$r->bindParam(1, $empleado->getPk_idu_colonia(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(1, $empleado->getPk_idu_tiposangre(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(2, $empleado->getPk_idu_genero(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(3, $empleado->getNom_empleado(), PDO::PARAM_STR);
            self::$r->bindParam(4, $empleado->getApel_paterno_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(5, $empleado->getApellido_materno(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(6, $empleado->getNum_nomina(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(7, $empleado->getFec_nac_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(8, $empleado->getCurp_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(9, $empleado->getNss_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(10, $empleado->getRfc_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(11, $empleado->getTel_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(12, $empleado->getTel_incidente_empelado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(13, $empleado->getCta_ban_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(14, $empleado->getCorreo_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(15, $empleado->getCalle_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(16, $empleado->getNum_casa_ex_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(17, $empleado->getNum_casa_inter_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(18, $empleado->getDes_refer_domi_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(19, $empleado->getPk_idu_nivelestudio(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(20, $empleado->getPk_idu_nacionalidad(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(21, $empleado->getPk_idu_puesto(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(22, $empleado->getPk_idu_centro(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(23, $empleado->getPk_idu_colonia(), PDO::PARAM_STR); //pasando los atributos a insertar
            self::$r->bindParam(24, $empleado->getPk_idu_empleado(), PDO::PARAM_STR); //pasando los atributos a insertar

            self::$r->execute(); // Se ejecuta la SQL
            self::$data = self::$r->fetch(); // Se obtiene los result de la sql
            $info = array("insert" => self::$data); // se crea un array con el resultado del insert
            self::desconectar(); // se deconecta de la bd
            return (json_encode($info, false)); // se retorna el array info en forma de json
        } catch (PDOException $exc) {// Constrola errores de sintaxis de la sql
            self::desconectar(); // DESCONOXION DE LA BD y lansa el codigo de error
            return (json_encode(array('Error' => $exc->getMessage(), 'Codigo' => $exc->getCode()), false));
        }
    }

}
