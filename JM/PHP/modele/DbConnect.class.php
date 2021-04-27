<?php

class DbConnect
{
    private static $db;

    public static function getDb()
    {
        return DbConnect::$db;
    }

    public static function init()
    {
        try {
            // On se connecte � MySQL
           self::$db = new PDO('mysql:host=' . Parametres::getHost() . ';port=' . Parametres::getPort() . ';dbname=' . Parametres::getDbname() . ';charset=utf8', Parametres::getLogin(), Parametres::getPwd());
        }
        catch (Exception $e)
        {
            // En cas d'erreur, on affiche un message et on arr�te tout
            die('Erreur : ' . $e->getMessage());
        }

    }
}
