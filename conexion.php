<?php
 class Conexion{
     public static function Conectar(){
         define('servidor','orymizak.ddns.net');
         define('nombre_bd','seyda_bd');
         define('usuario','seyda_admin');
         define('password','seydamoda');

         $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
         try{
             $conexion = new PDO("mysql:host=".servidor."; dbname=".nombre_bd, usuario, password, $opciones);
             return $conexion;
         }catch(Exception $e){
             die("el error es: ".$e->getMessage());
         }
     }
 }