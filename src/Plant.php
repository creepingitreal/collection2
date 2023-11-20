<?php

readonly class Plant
{
    public string $name;
    public string $scientificName;
    public string $description;
    public string $image;
    public int $family_id;
    public string $light;
    public int $watering;
    public int $careDifficulty;
    public int $soilType;

    public function __construct(
        string $name,
        string $scientificName,
        string $description,
        string $image,
        int $family_id,
        string $light,
        int $watering,
        int $careDifficulty,
        int $soilType
    )    {

       $this->name = $name;
       $this->scientificName = $scientificName;
       $this->description = $description;
       $this->image = $image;
       $this->family_id = $family_id;
       $this->light = $light;
       $this->watering = $watering;
       $this->careDifficulty = $careDifficulty;
       $this->soilType = $soilType;
    }
}