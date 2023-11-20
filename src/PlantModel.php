
<?php

class PlantModel 
{
    public PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllPlants()
    {
        $query = $this->db->prepare('SELECT * FROM `plant`;');
        $query->execute();
        $plants = $query->fetchAll();

        return $plants;
    }

    // public function getPlantsByFamily(int $family_id)
    // {
    //     $query = $this->db->prepare(

    //     )
    // }

    //addPlant
}