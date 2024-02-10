<?php

namespace src\app\Config;

require_once __DIR__ . '/../../vendor/autoload.php';

use mysqli;
use Dotenv\Dotenv;

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
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
        $dotenv->load();

        $host       = $_ENV['DB_HOST'] ?? '127.0.0.1';
        $port       = $_ENV['DB_PORT'] ?? '3306';
        $database   = $_ENV['DB_DATABASE'] ?? 'example';
        $username   = $_ENV['DB_USERNAME'] ?? 'root';
        $password   = $_ENV['DB_PASSWORD'] ?? '';

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
