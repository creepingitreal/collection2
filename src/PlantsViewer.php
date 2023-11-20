<?php

require_once 'src/Plant.php';

class PlantViewHelper
{
    public function displaySinglePlant (Plant $plant): string
    {
        $output = '<div>';
        $output .= "<h1>$plant->name</h1>";
        $output .= "<p>£$plant->scientificName</p>";
        $output .= "<img src='$plant->image' />";
        $output .= "<p class='description'>$plant->description</p>";
        $output .= '</div>';

        return $output;
    }

    public function displayAllPlants (array $plants): string
    {
        $output = '';
        
        foreach ($plants as $plant) {
            $output = '<div>';
            $output .= "<h1>$plant->name</h1>";
            $output .= "<p>£$plant->scientificName</p>";
            $output .= "<img src='$plant->image' />";
            $output .= "<p class='description'>$plant->description</p>";
            $output .= '</div>';
        }

        return $output;
    }
}