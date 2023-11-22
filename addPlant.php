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
    <form method="POST" class="add_plant">

        <?php
        require_once 'src/PlantModel.php';

        if (isset($_POST['newPlantName'])&&
            isset($_POST['newPlantFamily'])){
            
                echo "Hello";

            $inputtedPlantName = $_POST['newPlantName']; 
            $inputtedPlantFamily = $_POST['newPlantFamily'];

            $db = new PDO('mysql:host=db; dbname=plants', 'root', 'password');
            $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

            $plantModel = new PlantModel($db);

            $plantModel->addNewPlant($inputtedPlantName, $inputtedPlantFamily);
            }
        ?>
            <label for="newPlant">Plant Name</label>
            <input type="text" name="newPlantName" />

            <select name="newPlantFamily">
                <option value="">Plant Family</option>
                <option value="4">Foliage Plants</option>
                <option value="1">Succlents and Cacti</option>
                <option value="3">Flowing Plants</option>
                <option value="2">Trailing or Hanging Plants</option>
            </select>
            <!-- <select name="add_image">
                <option value="">Plant Family</option>
                <option value="red">Upload</option>
                <option value="green">Auto</option>
            </select> -->

            <input type="submit"/>
        </form>

        <div class="slider_wrapper">
            <div class="slider_inner">
                <div class="slider_left">
                </div>
                <div class="slider_container">
                    <div class=" slider_images">
                        <img src="#" />
                        <img src="#" />
                        <img src="#" />
                        <img src="#" />
                        <img src="#" />
                    </div>
                </div>
                <div class="slider_right">
                </div>
            </div>
        </div>
    </body>
</html>
