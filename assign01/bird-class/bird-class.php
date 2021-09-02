<?php

class Bird {
  
  var $commonName;
  var $food;
  var $nestPlacement;
  var $clutchSize;
  var $conservationLevel;
  var $birdSong;
  
  function birdID() {
    return "This bird is a(n) " . $this->commonName . "(conservation level: " . $this->conservationLevel . "). It eats " . $this->food . ". It lays " . $this->clutchSize . " eggs in nests " . $this->nestPlacement . ". You can hear it go: '" . $this->birdSong . "!'";
  }
  
}

$bird1 = new Bird;
$bird1->commonName = 'Eastern Towee';
$bird1->food = 'seeds, fruits, insects, and spiders';
$bird1->nestPlacement = 'on the ground';
$bird1->clutchSize = '2-6';
$bird1->conservationLevel = 'low';
$bird1->birdSong = 'drink-your-tea';

$bird2 = new Bird;
$bird2->commonName = 'Indigo Bunting';
$bird2->food = 'small seeds, berries, buds, and insects';
$bird2->nestPlacement = 'in fields and on the edges of woods, roadsides, and railroad rights-of-way';
$bird2->clutchSize = '3-4';
$bird2->conservationLevel = 'low';
$bird2->birdSong = 'what what';


print("<!DOCTYPE html><html lang=\"en\"><head><title>Biirds</title><meta charset=\"utf-8\"></head><body>
      <p>" . $bird1-> birdID() . "</p>
      <p>" . $bird2-> birdID() . "</p>
      </body></html>");


?>
