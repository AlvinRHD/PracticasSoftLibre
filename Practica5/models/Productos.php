<?php

class Productos
{
    private $conn;
    private $table_name = "procuctos";

    public $id;
    public $name;
    public $description;
    public $categorie;

    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function create()
    {
        $query = "INSERT INTO" . $this->table_name .
            "SET name=:name, description=description, categorie=:categorie";
        $result = $this->conn->prepare($query);

        //limpiar el codgio
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->description = htmlentities(strip_tags($this->description));
        $this->categorie = htmlentities(strip_tags($this->categorie));

        $result->bindParam(":name", $this->name);
        $result->bindParam(":description", $this->description);
        $result->bindParam(":categorie", $this->categorie);

        if ($result->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function get_productos()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->prepare($query);
        $result->execute();
        return $result;
    }

    public function get_productos_by_id($id){
        $query = "SELECT * FROM ". $this->table_name .
        " WHERE id=:id";
        $result = $this->conn->prepare($query);
        $result->bindParam(":id", $this->id);

        $row = $result->fetch(PDO::FETCH_ASSOC);

        $this->name = $row["name"];
        $this->description = $row["description"];
        $this->categorie=$row["categorie"]
    }
}
