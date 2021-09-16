<?php

class Bicycle {

  private $brand;
  private $model;
  private $year;
  private $description = 'Used bicycle';
  protected $weight_kg = 0; // unusable by unicycle
  protected $wheels = 2;

  // Getters
  public function brand() {
    return $this->brand;
  }
  
  public function model() {
    return $this->model;
  }
  
  public function year() {
    return $this->year;
  }
  
  public function description() {
    return $this->description;
  }
  
  public function name() {
    return "$this->brand $this->model ($this->year)";
  }
  
  public function weight_kg() {
    return "$this->weight_kg kg";
  }
  
  public function weight_lbs() {
    $weight_lbs = floatval($this->weight_kg) * 2.2046226218;
    return "$weight_lbs lbs";
  }
  
  public function wheel_details() {
    $is_wheels = ($this->wheels == 1) ? "It has only 1 wheel." : "It has $this->wheels wheels.";
    return $is_wheels;
  }
  
  //Setters
  public function set_brand($value) {
    $this->brand = $value;
  }
  
  public function set_model($value) {
    $this->model = $value;
  }
  
  public function set_year($value) {
    $this->year = $value;
  }
  
  public function set_description($value) {
    $this->description = $value;
  }
  
  public function set_weight_kg($value) {
    $this->weight_kg = floatval($value);
  }
  
  public function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }

}

class Unicycle extends Bicycle {
  protected $wheels = 1;
}

$lekker = new Bicycle;
$lekker->set_brand('Lekker');
$lekker->set_model('Jordaan');
$lekker->set_year('2020');

$uni = new Unicycle;

echo "<p>";
echo "Bicycle: " . $lekker->wheel_details() . "<br>";
echo "Unicycle: " . $uni->wheel_details() . "<br>";
echo "</p>";

echo "<p>";
echo "Set weight using kg <br>";
$lekker->set_weight_kg(1);
echo $lekker->weight_kg() . "<br>";
echo $lekker->weight_lbs() . "<br>";
echo "</p>";

echo "<p>";
echo "Set weight using lbs<br>";
$lekker->set_weight_lbs(2);
echo $lekker->weight_kg() . "<br>";
echo $lekker->weight_lbs() . "<br>";
echo "</p>";

echo "<p>";
echo "Featured Bicycle<br>";
echo $lekker->brand() . "<br>";
echo $lekker->model() . "<br>";
echo $lekker->year() . "<br>";
echo "</p>";

?>
