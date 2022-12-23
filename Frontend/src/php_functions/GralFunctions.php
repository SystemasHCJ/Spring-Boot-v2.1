<?php

/**
 * Description of SystemasHCJ
 *
 * @author HUMBERTO CALLEJA JUAREZ
 */
date_default_timezone_set('America/Mexico_City');

class GralFunctions {

    public static function NoRandom() {
        return random_int(1, 9999);
    }

    public static function CadenaRandom($tamCadena = 16) {
        $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $input_length = strlen($permitted_chars);
        $random_string = '';
        for ($i = 0; $i < $tamCadena; $i++) {
            $random_character = $permitted_chars[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }
        return $random_string;
    }

    public static function Hoy() {
        $date = new DateTime();
        return $date->format('d/m/Y H:i:s');
    }

    public static function getYear() {
        $date = new DateTime();
        return $date->format('Y');
    }

    public static function DivString($separador, $string) {
        return explode($separador, $string);
    }

    public static function reemplazar($arrayOfCaracteres, $string, $por) {
        return str_replace($arrayOfCaracteres, $por, $string);
    }

    
    public static function SaveFileDropZone($uri, $name, $tmp_name) {
        if (!file_exists($uri)) {
            mkdir($uri . '/', 0777, true);
            if (file_exists($uri)) {
                if (move_uploaded_file($tmp_name, $uri . '/' . $name)) {
                    return "true";
                } else {
                    return "false";
                }
            }
        } else {
            if (move_uploaded_file($tmp_name, $uri . '/' . $name)) {
                return "true";
            } else {
                return "false";
            }
        }
    }

}
