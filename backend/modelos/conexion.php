<?php

Class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=u555795455_hotel",
						"u555795455_hotel",
						"@Laloeselmejor5");

		$link->exec("set names utf8");

		return $link;

	}


}