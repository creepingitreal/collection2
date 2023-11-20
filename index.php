<?php
    require_once 'src/PlantModel.php';
    require_once 'src/PlantsViewer.php';

    $db = new PDO('mysql:host=db; dbname=plants', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $plantModel = new PlantModel($db);

    $plants = $plantModel->getAllPlants();

    $viewhelper = new PlantViewHelper();
    echo $viewhelper->displaySinglePlant($plant);
?>
<!-- 
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">

        <title>Mr Fancy Plants</title>

    </head>
    <body>
        <header>
            
        </header>
        <div class="plant_individual">
            <?php
            //  foreach ($result as $plant) {
            //     echo '<ul class="plant">';
            //     echo "<li>{$plant['name']}</li>";
            //     echo "<li>{$plant['scientific_name']}</li>";
            //     echo "<li><img src='{$plant['image']}' /></li>";
            //     echo "<li>{$plant['description']}</li>";
            //     echo '</ul>';
            //     }
             ?>
        </div>
    </body>
</html> -->