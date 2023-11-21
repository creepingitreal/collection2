
<?php

require_once 'src/Plant.php';

class PlantModel 
{
    public PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getAllPlants()
    {
        $query = $this->db->prepare("SELECT `plant`.`name`, 
        `plant_family`.`name` AS `family`, 
        `plant`.`image`, 
        `plant`.`description`
            FROM `plant`
                INNER JOIN `plant_family`
                    ON `plant`.`family_id` = `plant_family`.`id`;");
        $query->execute();
        $plants = $query->fetchAll();
        $plantObjs = [];

        foreach ($plants as $plant) {
            $plantObjs[] = new Plant (
                        $plant['name'],
                        // $plant['scientificName'],
                        $plant['image'],
                        $plant['description'],
                        $plant['family'],
                        // $plant['light_indirect'],
                        // $plant['watering'],
                        // $plant['careDifficulty'],
                        // $plant['soilType'];
            );
        }

        return $plantObjs;
    }

    public function getPlant(int $id): Plant
    {
        $query = $this->db->prepare("SELECT `plant`.`name`, 
        `plant_family`.`name` AS `family`, 
        `plant`.`image`, 
        `plant`.`description`
            FROM `plant`
                INNER JOIN `plant_family`
                    ON `plant`.`family_id` = `plant_family`.`id`;");
        $query->bindParam(':id', $id);
        $query->execute();
        $plant = $query->fetch();
        $plantObj = new Plant (
            $plant['name'],
            // $plant['scientificName'],
            $plant['image'],
            $plant['description'],
            $plant['family'],
            // $plant['light_indirect'],
            // $plant['watering'],
            // $plant['careDifficulty'],
            // $plant['soilType']
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