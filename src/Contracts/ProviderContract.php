<?php


namespace CarlosOCarvalho\Sigiss\Contracts;


interface ProviderContract
{

    public function getCCM();

    public function getDocument();

    public function getPWD();

    public function getURL();
    public  function getCRC();
    public  function getCRCState();
    public function getSimpleRate();
    public function getCodeService();


    // public function getOwner();

}
