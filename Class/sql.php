<?php

class sql extends PDO 
{
    private $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=paytour", "root", "root");
    }
    
    private function setParams($statment, $parameters = array())
    {
        foreach ($parameters as $key => $value)
        {
            $this->setParam($statment, $key, $value);
        }
    }

    private function setParam($statment, $key, $value)
    {
            $statment->bindParam($key, $value);
    }

    public function busca($rawquery, $params = array())
    {
        $stmt = $this->conn->prepare($rawquery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    public function select($rawquery, $params = array()):array
    {
        $stmt = $this->busca($rawquery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


?>