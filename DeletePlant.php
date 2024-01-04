
<?php
    require_once 'src/PlantModel.php';

    $db = new PDO('mysql:host=db; dbname=plants', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    $plantModel = new PlantModel($db);
    $plants = $plantModel->getAllPlants();

?>

<!DOCTYPE html>
<html>
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

            <nav>
                <a href="index.php" class="navButton">Home</a>
            </nav>
        </header>
                <form class="deletePlant" method="POST">
                    <h2>Delete a plant</h2>
                    <label for="delete_plant">Choose which plant you want to remove</label> <br>
                    <select name="delete_plant" id="delete_plant">
                        <option value="0">--Select Plant--</option>
                         <?php 
                               require_once 'src/PlantsViewer.php';
                               echo $plantViewHelper->displayPlantDropDown($plants);
                            ?>
                    </select><br>
                    <button type="submit" name="submit_delete">Delete Plant</button>
                    <?php
                    require_once 'src/PlantModel.php';
                    
                        if (isset($_POST['submit_delete'])) {
                            $selectedPlantId = $_POST['delete_plant'];
                            $plantDelete = new PlantModel($db);
                            $success = $plantDelete->deletePlant($selectedPlantId);
                            if ($success) {
                                echo "Plant successfully deleted!";
                            } else {
                                echo "Error deleting plant.";
                            }
                        }
                    ?>

                </form>

               
        </section>
</html>
