<?php

class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=db5000431965.hosting-data.io;dbname=dbs412976;charset=utf8', 'dbu414743', 'Chaton33&aurelien');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }
}