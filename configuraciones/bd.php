<?php
    class BD{//clase para la conexion a la base de datos

        public static $instancia=null;//almacena la conexion a la base de datos
        public static function crearInstancia() {//crea la instancia a la conexion a la base de datos
            if( !isset (self::$instancia)){//si no existe la instancia

                $opciones[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;//manejo de errores
                self::$instancia = new PDO('mysql:host=localhost;dbname=aplicacion','root','',$opciones);//crea la instancia
                echo "Conexion exitosa...";//mensaje de conexion exitosa
            }
            return self::$instancia;//retorna la instancia
        }        
    }
?>