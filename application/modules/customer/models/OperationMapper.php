<?php

/**
 * Class Customer_Model_OperationMapper
 */
class Customer_Model_OperationMapper
{
    /**
     * @var string
     */
    protected $_name = 'vehicle';
    private $dbconn;

    /**
     * @var array
     */
    private $params = [
        'host'     => '127.0.0.1',
        'username' => 'root',
        'password' => 'root',
        'dbname'   => 'zendApp'
    ];

    /**
     * @return Zend_Db_Adapter_Abstract
     * @throws Zend_Db_Exception
     */
    private function getDbConnection()
    {
        if (!$this->dbconn) {
            $this->dbconn = Zend_Db::factory('PDO_MYSQL', $this->params);
        }

        return $this->dbconn;
    }

    /**
     * @param Zend_Db $dbconn
     */
    public function setDbConnection(Zend_Db $dbconn)
    {
        $this->dbconn = $dbconn;
    }

    /**
     * Select all vehicles.
     *
     * @return array
     * @throws Zend_Db_Exception
     * @throws Zend_Db_Statement_Exception
     */
    public function selectAllVechicles()
    {
        $select = $this->getDbConnection()->query("select * from $this->_name");
        return $select->fetchAll();
    }

    /**
     * Insert.
     *
     * @param $data
     * @return int
     * @throws Zend_Db_Exception
     */
    public function insert($data)
    {
        $dao = $this->getDbConnection();

        $data = [
            'brand' => $data['brand'] ?? '',
            'model' => $data['model'] ?? '',
            'reg_year' => $data['reg_year'] ?? '',
            'reg_number' => $data['reg_number'] ?? '',
            'price' => $data['price'] ?? '',
        ];
        try {
            return $dao->insert($this->_name, $data);
        } catch (Zend_Db_Adapter_Exception $e) {
            var_dump($e->getMessage());
        }
    }
}
