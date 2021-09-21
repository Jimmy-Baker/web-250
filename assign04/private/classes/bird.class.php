<?php

class Bird {

  public $commonName;
  public $habitat;
  public $food;
  public $nesting = "tree";
  public $behavior;
  public $conservation;
  public $backyardTips;
      
  public static $instance_count = 0;
  public static $egg_num = 0;
  
  public const CONSERVATION = ['Unknown','Low', 'Moderate','High', 'Extreme'];

  public static function create() {
    $class = get_called_class();
    $object = new $class;
    static::$instance_count++;
    return $object;
  }
  
  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->commonName = $args['brand'] ?? '';
    $this->habitat = $args['model'] ?? '';
    $this->food = $args['year'] ?? '';
    $this->nesting = $args['category'] ?? '';
    $this->behavior = $args['color'] ?? '';
    $this->conservation = $args['description'] ?? '';
  }


}

?>
