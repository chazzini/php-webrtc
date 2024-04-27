<?php
namespace Framework;

use Exception;
use PDO;
use PDOException;
use PDOStatement;

class Database
{
    public $conn;
    /**
     * __construct for database class
     * @param array $config
     * @return void
     */
    public function __construct($config)
    {
        $dsn = "{$config['driver']}:host={$config['dbhost']};dbname={$config['dbname']};port={$config['dbuser']}";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ];
        try
        {
            $this->conn = new PDO($dsn, $config['dbuser'], $config['dbpassword'], $options);

        } catch (PDOException $e)
        {
            throw new Exception("unable to connect to database" . $e->getMessage());
        }
    }
}