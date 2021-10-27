<?php

class Bird {

  // ------ START OF ACTIVE RECORD CODE ----- //
  protected static $database;
  static protected $db_columns = ['id', 'common_name', 'habitat', 'food', 'nesting', 'behavior', 'conservation_id', 'tips'];
  // static protected $db_params = [':common_name', ':habitat', ':food', ':nesting', ':behavior', ':conservation_id', ':tips'];
  
  public static function set_database($database) {
    self::$database = $database;
  }
  
  public static function find_sql($query) {
    $stmt = self::$database->prepare($query);
    $stmt->execute();
    if(!$stmt) {
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
  
  public static function find_id($id) {
    $stmt = self::$database->prepare("SELECT * FROM birds WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    $object = 0;
    while($record = $stmt->fetch(PDO::FETCH_ASSOC)){
      $object = self::instantiate($record);
    }
      return $object;
  }
  
  static protected function instantiate($record) {
    $object = new self;
    foreach($record as $property => $value) {
      if(property_exists($object, $property)) {
        $object->$property = $value;
  //    } else {
  //      $object->$property = self::$property;
      }
    }
    return $object;
  }
  
  public function create() {
    $attributes = $this->attributes();
    $parameters = preg_filter('/^/', ':', self::$db_columns);
    $sql = self::$database->prepare("INSERT INTO birds (" . join(', ', self::$db_columns).") VALUES (" . join(', ', $parameters).")");
    
    foreach (self::$db_columns as $column) {
      $concat = ':'.$column;
      $sql->bindParam($concat, $this->{$column});
    }
    
    try {
      $result = $sql->execute();
      if($result){
        $this->id = self::$database->lastInsertId();
        static::$instance_count++;
      }
    }
    catch(Exception $e) {
      echo $e->getMessage();
    }
  }
  
  public function update() {
    $sql = self::$database->prepare("UPDATE birds SET common_name=':common_name', habitat=':habitat', food=':food', nesting=':nesting', behavior=':behavior', conservation_id=':conservation_id', tips=':tips' WHERE id='" . self::$database->escape_string($this->id). "' LIMIT 1;");
    $sql->bindParam(':common_name', $this->common_name);
    $sql->bindParam(':habitat', $this->habitat);
    $sql->bindParam(':food', $this->food);
    $sql->bindParam(':nesting', $this->nesting);
    $sql->bindParam(':behavior', $this->behavior);
    $sql->bindParam(':conservation_id', $this->conservation_id);
    $sql->bindParam(':tips', $this->tips);
    try {
      $result = $sql->execute();
      if($result){
        $this->id = self::$database->lastInsertId();
        static::$instance_count++;
      }
    }
    catch(Exception $e) {
      echo $e->getMessage();
    }
  }
  
  public function merge_attributes($args=[]) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)) {
        $this->$key = $value;
      }
    }
  }
  
  //Properties which have database columns, ex id
  public function attributes() {
    $attributes = [];
    foreach(self::$db_columns as $column) {
      if($column == 'id') {continue;}
      $attributes[$column] = $this->$column;
    }
    return $attributes;
  }
  
  protected function sanitized_attributes() {
    $sanitized = [];
    foreach($this->attributes() as $key => $value) {
      $sanitized[$key] = self::$database->escape_string($value);
    }
    return $attributes;
  }
  
  
  
  // ------END OF ACTIVE RECORD CODE -----

  
  public $id;
  public $common_name;
  public $habitat;
  public $food;
  public $nesting = "tree";
  public $behavior;
  public $conservation_id;
  public $tips;
      
  public static $instance_count = 0;
  public static $egg_num = 0;
  
  public const CONSERVATION = ['Unknown','Low', 'Moderate','High', 'Extreme'];

//  public static function create() {
//    $class = get_called_class();
//    $object = new $class;
//    return $object;
//  }
  
  public function __construct($args=[]) {
    //$this->brand = isset($args['brand']) ? $args['brand'] : '';
    $this->common_name = $args['common_name'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->nesting = $args['nesting'] ?? '';
    $this->behavior = $args['behavior'] ?? '';
    $this->conservation_id = $args['conservation_id'] ?? '';
    $this->tips = $args['tips'] ?? '';
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
