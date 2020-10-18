<?php 
namespace CarlosOCarvalho\Sigiss\Drivers;

use CarlosOCarvalho\Sigiss\ConfigBase;
use CarlosOCarvalho\Sigiss\Traits\SearchTrait;

class Barretos extends ConfigBase {
    
   

    public function __construct($config)
    {
          $this->setOwnerData($config);
    }
}