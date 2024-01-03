<?php

readonly class Plant
{
    public string $name;
    public string $scientificName;
    public string $image;
    public string $description;
    public string $family;
    // public string $light;
    // public int $watering;
    // public int $careDifficulty;
    // public int $soilType;

    public function __construct(
        string $name,
        string $scientificName,
        string $image,
        string $description,
        string $family,
        // string $light,
        // int $watering,
        // int $careDifficulty,
        // int $soilType
    )    {

       $this->name = $name;
       $this->scientificName = $scientificName;
        $this->image = $image;
        $this->description = $description;
        $this->family = $family;
    //    $this->light = $light;
    //    $this->watering = $watering;
    //    $this->careDifficulty = $careDifficulty;
    //    $this->soilType = $soilType;
    }
}