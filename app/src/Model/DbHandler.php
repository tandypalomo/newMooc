<?php


namespace IntecPhp\Model;


use PDO;
use PDOException;
use PDOStatement;

/**
 * Faz a manipulação do banco de dados da aplicação
 *
 * @author intec
 */
class DbHandler
{
    const ERR_PRIMARY_KEY_VIOLATION = -1;
    const ERR_UNKNOWN = -2;

    // Instância da classe
    private static $instance = null;
    private $conn;

    // Construtor privado: só a própria classe pode invocá-lo
    private function __construct()
    {
        try {
            $host = getenv('DB_HOST');
            $db = getenv('DB_NAME');
            $user = getenv('DB_USER');
            $pass = getenv('DB_PASS');
            $charset = getenv('DB_CHARSET');

            $this->conn = new PDO(
                'mysql:host='.$host.';dbname='.$db.';charset=' . $charset,
                $user,
                $pass,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_PERSISTENT => false,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (\Exception $e) {
            error_log($e->getMessage());
        }
    }

    // método estático
    public static function getInstance()
    {

        if (self::$instance == null) {
            self::$instance = new static();
        }

        return self::$instance;
    }

    public function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }

    public function beginTransaction()
    {
        return $this->conn->beginTransaction();
    }

    public function commit()
    {
        return $this->conn->commit();
    }

    public function query($queryString, array $params = [])
    {
        try {
            $sth = $this->conn->prepare($queryString);
            $sth->execute($params);
            return $sth;
        } catch(\Exception $e) {
            if($this->conn->inTransaction()) {
                $this->conn->rollBack();
            }
            error_log($e->getMessage());

            $errorInfo = $sth->errorInfo();
            switch ($errorInfo[1]) { // indice 1 erro de driver
                case 1062:
                    throw new \Exception("Campo duplicado", self::ERR_PRIMARY_KEY_VIOLATION);
                    break;
                default:
                    throw new \Exception("Erro desconhecido", self::ERR_UNKNOWN);
            }
        }
    }

    private function __clone()
    {

    }

    private function __wakeup()
    {

    }
}
