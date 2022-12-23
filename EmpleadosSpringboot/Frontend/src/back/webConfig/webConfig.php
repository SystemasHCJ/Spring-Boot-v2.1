<?php

/**
 * Description of SystemasHCJ
 *
 * @author HUMBERTO CALLEJA JUAREZ
 */
class webConfig {

    function conectar() {
        $Json = file_get_contents("../../../config/log.json");
        $dataContent = json_decode($Json, true);

        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        );
        $BDNameH = $dataContent['BD'];
        $urlServidor = $dataContent['rutaServer'];
        try {
            $conexion = new PDO("sqlsrv:server=$urlServidor;database=$BDNameH", $dataContent['user'], $dataContent['pwd'], $options);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conexion->setAttribute(PDO::SQLSRV_ATTR_QUERY_TIMEOUT, 1);
            //$conexion->setAttribute(PDO::DBLIB_ATTR_STRINGIFY_UNIQUEIDENTIFIER, true);
        } catch (PDOException $e) {
            return "Ocurrió un error con la base de datos: " . $e->getMessage();
        }
      

        return $conexion;
    }

}

webConfig::conectar();
