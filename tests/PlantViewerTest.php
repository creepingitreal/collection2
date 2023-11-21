<?php

require_once 'src/PlantsViewer.php';

use PHPUnit\Framework\TestCase;

class PlantViewHelperTest extends TestCase

{   public function test_displaySinglePlant(): void
    {
    $expected = 'Rubber Plant
                 Foliage
                 <img src=
                 The rubber plant, scientifically known as Ficus elastica, is a popular indoor plant known for its attractive glossy leaves and easy care. Native to Southeast Asia, it belongs to the fig family (Moraceae). The rubber plant gets its name from the latex sap it produces, which was historically used to make natural rubber. As a houseplant, it is valued for its ability to thrive in indoor conditions with low to moderate light and its air-purifying qualities. The leaves are large, dark green, and leathery, adding a touch of tropical elegance to interior spaces. With proper care, including regular watering and occasional pruning, the rubber plant can grow into a striking and resilient addition to home or office decor.';
    
    $plantviewer = new PlantViewHelper;
    $result = $plantviewer->displayAllPlants();

    $this->assertEquals($expected, $result);
}
}