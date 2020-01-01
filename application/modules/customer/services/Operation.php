<?php

/**
 * Class Customer_Service_Operation
 */
class Customer_Service_Operation
{
    /**
     * Select all vehicle.
     *
     * @return array
     */
    public function selectAllVehicle()
    {
        $obj = new Customer_Model_OperationMapper();

        return $obj->selectAllVechicles();
    }

    /**
     * Insert.
     *
     * @param array $data
     * @return array
     */
    public function insert(array $data): array
    {
        if ([] === $data) {
            return [];
        }

        $operationMapper = new Customer_Model_OperationMapper();

        return ['resposne' => $operationMapper->insert($data)];
    }
}
