<?php

class Bird extends DatabaseObject {

  static protected $table_name = 'birds';
  static protected $db_columns = ['id', 'common_name', 'habitat', 'food', 'nesting', 'behavior', 'conservation_id', 'tips'];

  public $id;
  public $common_name;
  public $habitat;
  public $food;
  public $nesting;
  public $behavior;
  public $conservation_id;
  public $tips;
  
  public const CONSERVATION = ['Unknown','Low', 'Moderate','High', 'Extreme'];

  public function __construct($args=[]) {
    //$this->property = isset($args['property']) ? $args['property'] : '';
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

  protected function validate() {
    $this->errors = [];

    if(is_blank($this->common_name)) {
      $this->errors[] = "Name cannot be blank.";
      $this->error_ids[] = "#common_name";
    }
    if(is_blank($this->habitat)) {
      $this->errors[] = "Habitat cannot be blank.";
      $this->error_ids[] = "#habitat";
    }
    return $this->errors;
  }


}

?>
