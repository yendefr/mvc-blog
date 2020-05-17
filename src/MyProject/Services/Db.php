<?php


namespace MyProject\Services;


class Db
{
    private $db;

    private static $instance;

    private function __construct()
    {
        $dbOptions = (require __DIR__.'/../../settings.php')['db'];

        $this->db = new \PDO(
            'mysql:host='.$dbOptions['host'].';dbname='.$dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );

        $this->db->exec('SET NAMES UTF8');
    }

    public static function getInstance(): self
    {
        if (self::$instance === null)
        {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function query(string $sql, $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->db->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result)
        {
            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }
}