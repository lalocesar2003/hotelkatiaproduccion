<?php

Class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=u555795455_testeo",
						"u555795455_testeo",
						"@Testeoyoutube1");

		$link->exec("set names utf8");

		return $link;

	}


}