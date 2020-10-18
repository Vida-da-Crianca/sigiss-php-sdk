<?php


namespace CarlosOCarvalho\Sigiss;

use CarlosOCarvalho\Sigiss\Contracts\ConfigContract;
use CarlosOCarvalho\Sigiss\Contracts\ProviderContract;

class Provider implements ProviderContract
{
    /**
     * 
     *
     * @var ConfigContract
     */
    private $config;

    public function __construct(ConfigContract $config)
    {
        $this->config = $config->getOwnerData();
    }
    public function getDocument()
    {
        return $this->config->document;
    }
    public function getCCM()
    {
        return  $this->config->ccm;
    }

    public function getPWD()
    {
        return $this->config->password;
    }

    public function getURL()
    {
        return $this->config->url;
    }

    public function getCRC() {
       return $this->config->crc;
    }

    public function getCRCState()
    {
          
       return $this->config->crc_state;
    }

    public function getSimpleRate()
    {
         return $this->config->simple_rate;
    }

    public function getCodeService(){
        return $this->config->code_service;
    }

    public function getCondition(){
        return $this->config->condition;
    }

    public function getName(){
        return $this->config->name;
    }

    public function getPhone(){
        return $this->config->phone;
    }

    public function getDescription() {
        return $this->config->description;
    }
}
