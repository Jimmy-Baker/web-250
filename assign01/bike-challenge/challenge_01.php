<?php

class Bicycle {
  
  var $brand;
  var $model;
  var $year;
  var $description;
  var $weight_kg;
  
  function name() {
    return $this->year . " " . $this->brand . " " . $this->model;
  }
  function weight_lbs(){
    return $this->weight_kg * 2.2046226218;
  }
  function set_weight_lbs($input){
    $this->weight_kg = floatval($input) / 2.2046226218;
  }
}

$trek = new Bicycle;
$trek->brand = 'Trek';
$trek->model = 'Emonda';
$trek->year = '2017';
$trek->weight_kg = 1.0;

$cd = new Bicycle;
$cd->brand = 'Cannondale';
$cd->model = 'Synapse';
$cd->year = '2016';
$cd->weight_kg = 8.0;

echo $trek->name() . "<br />";
echo $cd->name() . "<br />";

echo $trek->weight_kg . "<br />";
echo $trek->weight_lbs() . "<br />";

$trek->set_weight_lbs(2);
echo $trek->weight_kg . "<br />";
echo $trek->weight_lbs() . "<br />";

?>
