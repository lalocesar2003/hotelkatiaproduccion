<?php

Class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=u555795455_dueno",
						"u555795455_dueno",
						"sY.m5p$GMJ$t&u6");

		$link->exec("set names utf8");

		return $link;

	}


}