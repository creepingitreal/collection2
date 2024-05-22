<?php
    require_once 'src/PlantModel.php';
    require_once 'src/PlantsViewer.php';

    $db = new PDO('mysql:host=db; dbname=plants', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    

    $plantModel = new PlantModel($db);
    $plants = $plantModel->getAllPlants();
    $allPlantFamilies = $plantModel->getAllPlantFamilies();
    
    $searchQuery = isset($_GET['search']) ? $_GET['search'] : '';
    $familyFilter = isset($_GET['family-filter']) ? $_GET['family-filter'] : 'all';
    
    if (isset($_GET['apply-filters'])) {
        $plants = $plantModel->getFilteredPlants($searchQuery, $familyFilter);
    }
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
                <a href="DeletePlant.php" class="navButton">Remove a Plant</a>
            </nav>

            <div class="search-filter">
                <form action="index.php" method="GET">
                    <label for="search">Search:</label>
                    <input type="text" name="search" id="search" placeholder="Enter search term" value="<?php echo $searchQuery; ?>">

                    <label for="family-filter">Filter by Family:</label>
                    <select name="family-filter" id="family-filter">
                        <option value="">All Families</option>
                        <?php
                        foreach ($allPlantFamilies as $family) {
                            echo "<option value='{$family->id}'>{$family->name}</option>";
                        }
                        ?>
                    </select>

                    <button type="submit" name="apply-filters">Apply Filters</button>
                    <a href="index.php" class="clear-filters">Clear Filters</a>
                </form>
            </div>
        </header>

        <div class="plants_display">
        <?php
            
            if (isset($plants)) {
                echo PlantViewHelper::displayAllPlants($plants);
            } else {
                echo "No plants to display."; // You can customize this message
            }
        ?>
        </div>
    </body>
</html>



