<?php

class PdoAdapter
{
    /**
     * @var PDO $pdo
     */
    protected $pdo;

    /**
     * @param string $table
     * @param array $where
     * @return array
     */
    public function fetchAll($table, array $where = array())
    {
        $query = $this->pdo->prepare("SELECT * FROM $table");
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * @param string $table
     * @param array $data
     * @return bool
     */
    public function insert($table, array $data)
    {
        $values = implode(',', array_keys($data));
        $bind   = implode(',', array_fill(0, count($data), '?'));
        $query  = $this->pdo->prepare("INSERT INTO $table ($values) VALUES ($bind)");
        
        return $query->execute(array_values($data));
    }


    /**
     * @param string $table
     * @param array $data
     * @param array $where
     * @return bool
     */
    public function update($table, array $data, array $where = array())
    {
        $data  = $this->keyValueToString($data);
        $where = (empty($where)) ? 1 : $this->keyValueToString($where); 
        $query = $this->pdo->prepare("UPDATE $table SET $data WHERE $where");
        
        return $query->execute();
    }

    /**
     * @param string $table
     * @param array $where
     * @return int
     */
    public function delete($table, array $where = array())
    {
        $where = (empty($where)) ? 1 : $this->keyValueToString($where);

        return $this->pdo->exec("DELETE FROM $table WHERE $where");
    }

    /**
     * @param array $data
     * @return string
     */
    protected function keyValueToString(array $data)
    {
        $string = array();

        foreach ($data as $key => $value) {
            $string[] = sprintf('%s = "%s"', $key, $value);
        }

        return implode(',', $string);
    }

    /**
     * @param PDO $pdo 
     * @return $this
     */
    public function setPdoStatement(PDO $pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }

    /**
     * @return PDOStatement
     */
    public function PDO()
    {
        return $this->pdo;
    }
}
