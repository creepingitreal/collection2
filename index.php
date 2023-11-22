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
        <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Open+Sans:wght@300;400;500;600;700;800&family=Work+Sans:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="style.css">

        <title>Mr Fancy Plants</title>

    </head>
    <body>
        <header>
            <div class="logo">
                <h1> Mr Fancy Plants </h1>
                <p> Girl, pileas!</p>
            </div>
        </header>
        <div class="plants_display">
            <?php
                echo PlantViewHelper::displayAllPlants($plants);
            ?>
        </div>

        <form method="POST" class="add_plant">
            <label for="newPlant">Plant Name</label>
            <input type="text" name="newPlant" />

            <select name="select_family">
                <option value="">Plant Family</option>
                <option value="Foliage Plants">Foliage Plants</option>
                <option value="Succlents and Cacti">Succlents and Cacti</option>
                <option value="Flowing Plants">Flowing Plants</option>
                <option value="Trailing or Hanging Plants">Trailing or Hanging Plants</option>
            </select>
            <!-- <select name="add_image">
                <option value="">Plant Family</option>
                <option value="red">Upload</option>
                <option value="green">Auto</option>
            </select> -->

            <input type="submit"/>
                <?php
                if (isset($_POST['newPlantName'])){

                    {  
                        $db = new PDO('mysql:host=db; dbname=plants', 'root', 'password');
                        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                
                        $inputtedPlantName = $_POST['newPlantName']; 
                        $inputtedPlantFamily = $_POST['newPlantFamily']; 

                        $query = $db->prepare(
                            'INSERT INTO `plant` 
                                (`name`)
                                VALUES (:name);'
                            );
                        
                        $query->bindParam(':name', $inputtedPlantName);
                        $query->bindParam(':last_name', $inputtedPlantFamily);

                        $success = $query->execute();
                        if ($success) {
                            echo "$inputtedPlantName was added to the plant collection";
                        } else { 
                            echo "Sacrebleu! It did not work! Please ensure you completed all the";
                        }
                    }

                        
                
                        $query = $db->prepare(
                            'INSERT INTO `plant` 
                                (`family`)
                                VALUES (:family);'
                            );
                        
                        
                    
                          if ($success) {
                            echo "$inputtedPlantName was added to the plant collection";
                        } else { 
                            echo "Sacrebleu! It did not work! Please ensure you completed all the";
                        }
                    }
                }
                ?>


        </form>
    </body>
</html>



