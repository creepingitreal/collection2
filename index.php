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

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300&family=Source+Code+Pro:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="style.css">

        <title>Mr Fancy Plants</title>

    </head>
    <body>
        <header>
            <div class="logo">
                <h1> Mr Fancy Plants </h1>
                <p> Girl, pileas!</p>
            </div>
            <nav>
                <a href="index.php" class="navButton">Home</a>
                <a href="AddPlant.php" class="navButton">Add New Plant</a>
                <a href="#" class="navButton">Remove a Plant</a>
            </nav>
        </header>
        <div class="plants_display">
            <?php
                echo PlantViewHelper::displayAllPlants($plants);
            ?>
        </div>
    </body>
</html>



