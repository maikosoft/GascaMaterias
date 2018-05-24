<?php
class Database
{
    // Conexion con la BD
    public static function StartUp()
    {
        $pdo = new PDO('pgsql:host=localhost;dbname=gasca_test;user=postgres;password=1234');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}