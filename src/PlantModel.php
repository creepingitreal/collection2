
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

    public function getPlant()
    {
        $query = $this->db->prepare('SELECT * FROM `plant`;');
        $query->execute();
        $plants = $query->fetchAll();
        return $plants;
    }
    public function getPlantById(int $id): Plant
    {
        $query = $this->db->prepare('SELECT * FROM `plant` WHERE `id` = :id');
        $query->bindParam(':id', $id);
        $query->execute();
        $plant = $query->fetch();
        $plantObj = new Plant (
            $plant['name'],
            $plant['scientificName'],
            $plant['image'],
            $plant['description'],
            $plant['family_id'],
            $plant['light'],
            $plant['watering'],
            $plant['careDifficulty'],
            $plant['soilType']
        );
        return $plantObj;
    }








    // public function getPlantsByFamily(int $family_id)
    // {
    //     $query = $this->db->prepare(

    //     )
    // }

    //addPlant
}