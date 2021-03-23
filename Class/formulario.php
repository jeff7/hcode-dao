<?php 

class formulario 
{
    private $id;
    private $name;
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function setId($value)
    {
        return $this->id = $value;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($value)
    {
        return $this->name = $value;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($value)
    {
        return $this->email = $value;
    }

    public function __toString()
    {
        return json_encode(array(
            'id' => $this->getId(),
            'name' => $this->getName(),
            'email' => $this->getEmail(),
        ));
    }

    public function loadById($id)
    {
        $sql = new sql();

        $sqlresult = $sql->select("SELECT * FROM formulario WHERE id = :id", array(":id" => $id));

        if (isset($sqlresult[0]))
        {
            $row = $sqlresult[0];

            $this->setId($row['id']);
            $this->setName($row['nome']);
            $this->setEmail($row['email']);
        }
    }

    public static function getList()
    {
        $sql = new sql();

        return $sql->select("select * from formulario");
    }
}


?>