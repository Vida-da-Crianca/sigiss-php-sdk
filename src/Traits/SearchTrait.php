<?php


namespace CarlosOCarvalho\Sigiss\Traits;


trait SearchTrait
{


    public function makeSearch()
    {
        // dump($this->getProvider()->getCCM());
        $auth = str_replace(['-','.'], ['',''],$this->authenticity);
        // dump($auth);
        return [
            'tcDadosConsultaNota' => [
                'nota' => $this->id,
                'serie' => $this->serie,
                'autenticidade' => $auth ,
                'valor' =>  $this->price,
                'prestador_ccm' => $this->getProvider()->getCCM(),
                'prestador_cnpj' => $this->getProvider()->getDocument(),
            ]
        ];
    }

    public function getCallSearchName()
    {
        return 'ConsultarNotaValida';
    }
}
