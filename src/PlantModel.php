
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
        $query = $this->db->prepare("SELECT `plant`.`name`, `plant`.`scientific_name`,
        `plant_family`.`name` AS `family`, 
        `plant`.`image`, 
        `plant`.`description`
            FROM `plant`
                INNER JOIN `plant_family`
                    ON `plant`.`family_id` = `plant_family`.`id`
                        WHERE `deleted` = 0;");
        $query->execute();x
        $plants = $query->fetchAll();
        $plantObjs = [];

        foreach ($plants as $plant) {
            $plantObjs[] = new Plant (
                        $plant['name'],
                        $plant['scientific_name'],
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

    public function getAllPlantFamilies(): array
    {
        $query = "SELECT `plant_family`.`id`, `plant_family`.`name`
            FROM `plant_family`";
    
        $query = $this->db->prepare($query);
        $query->execute();
    
        $plantFamilies = $query->fetchAll(PDO::FETCH_OBJ);
    
        return $plantFamilies;
    }
    
    public function getFilteredPlants($searchTerm, $familyFilter)
    {
    try {
        $query = "SELECT `plant`.`name`, `plant`.`scientific_name`,
            `plant_family`.`name` AS `family`, 
            `plant`.`image`, 
            `plant`.`description`
        FROM `plant`
            INNER JOIN `plant_family` ON `plant`.`family_id` = `plant_family`.`id`
        WHERE `plant`.`deleted` = 0
            AND (`plant`.`name` LIKE :searchTerm OR `plant`.`scientific_name` LIKE :searchTerm)
            AND (:familyFilter = '' OR `plant_family`.`name` = :familyFilter)";

        // Log the query to the error log
        error_log("Debug: $query");

        $query = $this->db->prepare($query);

        $query->bindValue(':searchTerm', "%$searchTerm%", PDO::PARAM_STR);
        $query->bindValue(':familyFilter', $familyFilter, PDO::PARAM_STR);

        $query->execute();
        $plants = $query->fetchAll();

        $plantObjs = [];

        foreach ($plants as $plant) {
            $plantObjs[] = new Plant(
                $plant['name'],
                $plant['scientific_name'],
                $plant['image'],
                $plant['description'],
                $plant['family']
            );
        }

        return $plantObjs;
    } catch (PDOException $e) {
        // Print detailed information about the exception for debugging
        error_log("Error: " . $e->getMessage());
        error_log("Query: $query");
        throw $e; // Rethrow the exception after logging details
    }
}

    public function getPlant(int $id): Plant
    {
        $query = $this->db->prepare("SELECT `plant`.`name`, 
        `plant_family`.`name` AS `family`, 
        `plant`.`image`, 
        `plant`.`description`
            FROM `plant`
                INNER JOIN `plant_family`
                    ON `plant`.`family_id` = `plant_family`.`id`
                        WHERE `delete` = 0;");
        $query->bindParam(':id', $id);
        $query->execute();
        $plant = $query->fetch();
        $plantObj = new Plant (
            $plant['name'],
            $plant['scientificName'],
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


    public function addNewPlant(string $name, string $scientific_name, int $family_id, string $image, string $description): bool
    {   
        $query = $this->db->prepare(
            'INSERT INTO `plant` 
                (`name`, `scientific_name`,`family_id`, `image`, `description`)
                VALUES (:name, :scientific_name, :family_id, :image, :description);'
            );
        
        $query->bindParam(':name', $name);
        $query->bindParam(':scientific_name', $scientific_name);
        $query->bindParam(':family_id', $family_id);
        $query->bindParam(':image', $image);
        $query->bindParam(':description', $description);
    
    
        $success = $query->execute();

        return $success;
        
    }

    public function deletePlant(int $id): bool
    {
        $query = $this->db->prepare("UPDATE `plant` SET `deleted`=1 WHERE `id`=$id ");
        $success = $query->execute();

        return $success;
    }
}

