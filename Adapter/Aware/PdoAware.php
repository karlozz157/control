<?php

trait PdoAware
{
    /**
     * @var PdoAdapter $pdoAdapter
     */
    protected $pdoAdapter;

    /**
     * @param PdoAdapter $pdoAdapter
     * @return $this
     */
    public function setPdoAdapter(PdoAdapter $pdoAdapter)
    {
        $this->pdoAdapter = $pdoAdapter;

        return $this;
    }

    /**
     * @return PdoAdapter
     */
    public function getPdoAdapter()
    {
        return $this->pdoAdapter;
    }
}
