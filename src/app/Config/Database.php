<?php

namespace App\Config;
/** 
 * --------------------------------------------------------------------------
 * Database Configuration
 * --------------------------------------------------------------------------
 */
class Database {
    /**
    * --------------------------------------------------------------------------
    * Database Connections
    * --------------------------------------------------------------------------
    */
    public static function connection(string $connectionName = 'mysql'): array
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '');
        $dotenv->load();

        $host = getenv('DB_HOST');
        $port = getenv('DB_PORT');
        $database = getenv('DB_DATABASE');
        $username = getenv('DB_USERNAME');
        $password = getenv('DB_PASSWORD');

        if (!$host || !$port || !$database || !$username) {
            throw new \RuntimeException('Missing required database configuration.');
        }

        return [
            'host'      => $host,
            'port'      => $port,
            'database'  => $database,
            'username'  => $username,
            'password'  => $password,
        ];
    }
}