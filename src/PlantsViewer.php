<?php
declare(strict_types=1); 

require_once 'src/Plant.php';

class PlantViewHelper
    {
        public static function displayAllPlants (array $plants): string
        {   
            if(empty($plants)){
                return "There are no plants just yet, please add some!";
            }

            $output = '';
            
            foreach ($plants as $plant) {
                $output .= "<div class='all_plants'>";
                $output .= "<h1>$plant->name</h1>";
                $output .= "<p>$plant->scientificName</p>";
                $output .= "<img src='$plant->image' />";
                $output .= "<p class='description'>$plant->description</p>";
                $output .= "</div>";
            }

            return $output;
        }
        public static function displayPlantDropDown(array $plants): string
        {
            if (empty($plants)) {
                return "There are no plants just yet, please add some!";
            } else {
                $output = '';
                foreach ($plants as $plant) {
                    $output .= "<option value='{$plant->family}'>";
                    $output .= "{$plant->family}";                    
                    $output .= "</option>";
                }
                return $output;
            }
        }
      
    }




    