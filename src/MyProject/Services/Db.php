<?php


namespace MyProject\Services;


class Db
{
    private $db;

    public function __construct()
    {
        $dbOptions = (require __DIR__.'/../../settings.php')['db'];

        $this->db = new \PDO(
            'mysql:host='.$dbOptions['host'].';dbname='.$dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );

        $this->db->exec('SET NAMES UTF8');
    }

    public function query(string $sql, $params = []): ?array
    {
        $sth = $this->db->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result)
        {
            return null;
        }

        return $sth->fetchAll();
    }
}