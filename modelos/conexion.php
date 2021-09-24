<?php
define('MYSQL_SERVIDOR','localhost');
define('MYSQL_USUARIO','root');
define('MYSQL_CONTRASENA','');
define('MYSQL_BD','donnelso');
$conexion = mysqli_connect(MYSQL_SERVIDOR, MYSQL_USUARIO, MYSQL_CONTRASENA, MYSQL_BD);


class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=donnelso",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}