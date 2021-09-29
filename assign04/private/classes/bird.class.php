<?php

class Bird {

  public $commonName;
  public $habitat;
  public $food;
  public $nesting = "tree";
  public $behavior;
  public $conservation;
  public $tips;
      
  public static $instance_count = 0;
  public static $egg_num = 0;
  
  private const CONSERVATION = ['Unknown','Low', 'Moderate','High', 'Extreme'];

  public static function create() {
    $class = get_called_class();
    $object = new $class;
    static::$instance_count++;
    return $object;
  }
  
  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->commonName = $args['common_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->nesting = $args['nest_placement'] ?? '';
    $this->behavior = $args['behavior'] ?? '';
    $this->conservation = $args['conservation_id'] ?? '';
    $this->tips = $args['backyard_tips'] ?? '';
  }
  
  public function status() {
    switch ($this->conservation) {
      case 0: return self::CONSERVATION[0]; break;
      case 1: return self::CONSERVATION[1]; break;
      case 2: return self::CONSERVATION[2]; break;
      case 3: return self::CONSERVATION[3]; break;
      case 4: return self::CONSERVATION[4]; break;
    }  
  }


}

?>
