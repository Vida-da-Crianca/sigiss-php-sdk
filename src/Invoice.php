<?php

namespace CarlosOCarvalho\Sigiss;

class Invoice
{


    public function __construct($options)
    {  
            foreach($options as $key => $v){
                $this->{$key} = $v;
            }
    }  


    public function __get($name)
    {
        return $this->{$name};
    }
}
