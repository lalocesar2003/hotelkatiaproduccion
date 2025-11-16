<?php

Class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=u555795455_dueno",
						"u555795455_dueno",
						"@Laloeselmejor30");

		$link->exec("set names utf8");

		return $link;

	}


}