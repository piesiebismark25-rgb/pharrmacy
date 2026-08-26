<?php
namespace App\Core;

use PDO;
use PDOException;

/**
 * Database Connection Wrapper (Singleton Pattern)
 *
 * Ensures only a single active PDO connection exists during a single
 * execution lifecycle to prevent database server socket exhaustion.
 */
class Database
{
    /**
     * The single instance of this class.
     * @var Database|null
     */
    private static ?Database $instance = null;

    /**
     * The raw PDO connection object.
     * @var PDO
     */
    private PDO $connection;

    /**
     * Private constructor to prevent direct instantiation of the class.
     */
    private function __construct()
    {
        // Load settings from config.php
        $host = DB_HOST;
        $port = DB_PORT;
        $db   = DB_NAME;
        $user = DB_USER;
        $pass = DB_PASS;
        $charset = DB_CHARSET;

        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset";

        $options = [
            // Throw exceptions on SQL errors instead of failing silently
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            // Fetch rows as clean associative arrays
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // Disable emulation of prepared statements to use native SQL parameter binding
            PDO::ATTR_EMULATE_PREPARES   => false,
            // Enable persistent connections (optional, but keep false for default stability)
            PDO::ATTR_PERSISTENT         => false,
        ];

        try {
            $this->connection = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            // In production, log the error and display a generic message. Do not expose connection details.
            error_log("Database connection failure: " . $e->getMessage());
            die("Database Connection Error. Please consult the system administrator.\n");
        }
    }

    /**
     * Get the single instance of the Database class.
     *
     * @return Database
     */
    public static function getInstance(): Database
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Get the PDO connection object.
     *
     * @return PDO
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }

    /**
     * Prevent cloning of the Singleton instance.
     */
    private function __clone() {}

    /**
     * Prevent unserializing of the Singleton instance.
     */
    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton class.");
    }
}
