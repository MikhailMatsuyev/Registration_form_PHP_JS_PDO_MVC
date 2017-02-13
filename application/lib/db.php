<?php

// Подключение к базе данных выполненно в виде паттерна singleton
class DB
{
    private static $instance = NULL;
    private function __construct(){}
    private function __clone(){}
    public static function getInstance()
    {   
	if(!self::$instance){
        self::$instance = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PSW); 
        self::$instance -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}	
	return self::$instance;	
    }
}
