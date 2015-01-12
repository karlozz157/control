<?php

class OutflowService
{
    use PdoAware;

    /**
     * @const string
     */
    const TABLE = 'outflows';

    /**
     * @return OutflowCollection
     */
    public function getAll()
    {
        $outflowsArray     = $this->pdoAdapter->fetchAll(self::TABLE);
        $outflowCollection = new OutflowCollection();

        foreach ($outflowsArray as $outflowArray) {
            $outflow = new Outflow();
            $outflowCollection->append($outflow);
        }

        return $outflowCollection;
    }

    /**
     * @param Outflow $outflow
     * @return bool
     */
    public function new(Outflow $outflow)
    {
        $outflowData = array();

        return $this->pdoAdapter->insert(self::TABLE, $outflowData);
    }

    /**
     * @param Outflow $outflow
     * @return bool
     */
    public function edit(Outflow $outflow)
    {
        $outflowData  = array();
        $outflowWhere = array();

        return $this->pdoAdapter->update(self::TABLE, $outflowData, $outflowWhere)
    }

    /**
     * @return Outflow $outflow
     * @return bool
     */
    public function delete(Outflow $outflow)
    {
        $outflowData  = array();
        $outflowWhere = array();

        return $this->pdoAdapter->delete(self::TABLE, $outflowData, $outflowWhere);
    }
}
