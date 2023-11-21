<?php
    require_once 'src/PlantModel.php';
    require_once 'src/PlantsViewer.php';

    $db = new PDO('mysql:host=db; dbname=plants', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $plantModel = new PlantModel($db);
    
    $plants = $plantModel->getAllPlants();

?>

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
        <div class="plants_display">
            <?php
                echo PlantViewHelper::displayAllPlants($plants);
            ?>
        </div>
    </body>
</html>