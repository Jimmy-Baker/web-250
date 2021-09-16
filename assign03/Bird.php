<?php

class Bird {
    public $habitat;
    public $food;
    public $nesting = "tree";
    public $conservation;
    public $song = "chirp";
    public $flying = "yes";
    
    public static $instance_count = 0;
    public static $egg_num = 0;

    public function can_fly() {
        $flying_string = ($this->flying == 'yes') ? 'can fly' : 'is stuck on the ground';
        return  $flying_string ;
    }
    
    public static function create() {
        $class = get_called_class();
        $object = new $class;
        static::$instance_count++;
        return $object;
    }
}

class YellowBelliedFlyCatcher extends Bird {
    public $name = "yellow-bellied flycatcher";
    public $diet = "mostly insects.";
    public $song = "flat chilk";
    public static $egg_num = "3-4, sometimes 5";
}

class Kiwi extends Bird {
    public $name = "kiwi";
    public $diet = "omnivorous";
    public $flying = "no";
}
