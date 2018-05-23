<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('pgsql:host=localhost;dbname=GascaTest;user=postgres;password=1234');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}