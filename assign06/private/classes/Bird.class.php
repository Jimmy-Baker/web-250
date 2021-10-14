<?php

class Bird {

  protected static $database;
  
  public static function set_database($database) {
    self::$database = $database;
  }
  
  public static function find_sql($query) {
    $stmt = self::$database->prepare($query);
    $stmt->execute();
    if(!stmt) {
      exit("query failed");
    }
    
    $object_array = [];
    while($record = $stmt->fetch(PDO::FETCH_ASSOC)){
      $object_array[] = self::instantiate($record);
    }
        
    return $object_array;
  }
  
  public static function find_all() {
    //$stmt = self::$database->prepare("SELECT * FROM birds");
    //$stmt->execute();
    //return $stmt;
    $sql = "SELECT * FROM birds";
    return self::find_sql($sql);
  }
  
  public static function find_hard() {
    $stmt = self::$database->prepare("SELECT * FROM birds");
    $stmt->execute();
    
    $object_array = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
      $object_array[] = self::instantiate($row);
    }
    
    return $object_array;
  }
  
  static protected function instantiate($record) {
    $object = new self;
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
      } else {
        $object->$property = self::$property;
      }
    }
    return $object;
  }
  
  public $id;
  public $commonName;
  public $habitat;
  public $food;
  public $nesting = "tree";
  public $behavior;
  public $conservation_id;
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
    $this->nesting = $args['nesting'] ?? '';
    $this->behavior = $args['behavior'] ?? '';
    $this->conservation_id = $args['conservation_id'] ?? '';
    $this->tips = $args['backyard_tips'] ?? '';
  }
  
  public function status() {
    switch ($this->conservation_id) {
      case 0: return self::CONSERVATION[0]; break;
      case 1: return self::CONSERVATION[1]; break;
      case 2: return self::CONSERVATION[2]; break;
      case 3: return self::CONSERVATION[3]; break;
      case 4: return self::CONSERVATION[4]; break;
    }  
  }


}

?>
