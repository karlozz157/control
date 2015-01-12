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
        $outflowData = array(
            'name'   => $outflow->getName(),
            'date'   => $outflow->getDate(),
            'amount' => $outflow->getAmount(),
        );

        return $this->pdoAdapter->insert(self::TABLE, $outflowData);
    }

    /**
     * @param Outflow $outflow
     * @return bool
     */
    public function edit(Outflow $outflow)
    {
        $outflowData = array(
            'name'   => $outflow->getName(),
            'date'   => $outflow->getDate(),
            'amount' => $outflow->getAmount(),
        );

        $outflowWhere = array('id' => $outflow->getId());

        return $this->pdoAdapter->update(self::TABLE, $outflowData, $outflowWhere)
    }

    /**
     * @return Outflow $outflow
     * @return bool
     */
    public function delete(Outflow $outflow)
    {
        $outflowWhere = array('id' => $outflow->getId());

        return $this->pdoAdapter->delete(self::TABLE, $outflowWhere);
    }
}
