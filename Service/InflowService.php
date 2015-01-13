<?php

class InflowService
{
    use PdoAware;

    /**
     * @const string
     */
    const TABLE = 'inflows';

    /**
     * @return InflowCollection
     */
    public function getAll()
    {
        $inflowsArray     = $this->pdoAdapter->fetchAll(self::TABLE);
        $inflowCollection = new InflowCollection();

        foreach ($inflowsArray as $inflowArray) {
            $inflow = new Inflow();

            $inflow
                ->setName($inflowArray['name'])
                ->setDate($inflowArray['date'])
                ->setAmount($inflowArray['amount'])
            ;

            $inflowCollection->append($inflow);
        }

        return $inflowCollection;
    }

    /**
     * @param Inflow $inflow
     * @return bool
     */
    public function new(Inflow $inflow)
    {
        $inflowData = array(
            'name'   => $inflow->getName(),
            'date'   => $inflow->getDate(),
            'amount' => $inflow->getAmount(),
        );

        return $this->pdoAdapter->insert(self::TABLE, $inflowData);
    }

    /**
     * @param Inflow $inflow
     * @return bool
     */
    public function edit(Inflow $inflow)
    {
        $inflowData = array(
            'name'   => $inflow->getName(),
            'date'   => $inflow->getDate(),
            'amount' => $inflow->getAmount(),
        );

        $inflowWhere = array('id' => $inflow->getId());

        return $this->pdoAdapter->update(self::TABLE, $inflowData, $inflowWhere)
    }

    /**
     * @return Inflow $inflow
     * @return bool
     */
    public function delete(Inflow $inflow)
    {
        $inflowWhere = array('id' => $inflow->getId());

        return $this->pdoAdapter->delete(self::TABLE, $inflowWhere);
    }
}
