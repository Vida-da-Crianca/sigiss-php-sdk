<?php

namespace CarlosOCarvalho\Sigiss;

use CarlosOCarvalho\Sigiss\Contracts\ConfigContract;

class ConfigBase implements ConfigContract
{



    public function getOwnerData()
    {
        return $this;
    }

    public function setOwnerData($data)
    {
        foreach ($data as $key => $v) {
            $this->{$key} = $v;
        }
    }
}
