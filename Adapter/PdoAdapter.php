<?php

class PdoAdapter
{
    /**
     * @var PDOStatement $pdo
     */
    protected $pdo;

    /**
     * @param PDOStatement $pdo 
     * @return $this
     */
    public function setPdo(PDOStatement $pdo)
    {
        $this->pdo = $pdo;

        return $this;
    }

    /**
     * @return PDOStatement
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * @param string $table
     * @param array $where
     * @return array
     */
    public function fetchAll($table, array $where = array())
    {

    }

    /**
     * @param string $table
     * @param array $data
     */
    public function insert($table, array $data)
    {

    }

    /**
     * @param string $table
     * @param array $data
     * @param array $where
     */
    public function update($table, array $data, array $where = array())
    {

    }

    /**
     * @param string $table
     * @param array $where
     */
    public function delete($table, array $where = array())
    {

    }
}
