<?php


namespace CarlosOCarvalho\Sigiss\Traits;

use CarlosOCarvalho\Sigiss\SigissService;
use CarlosOCarvalho\Sigiss\Validators\FieldsValidator;

trait DeleteTrait
{


    public function makeDelete() : SigissService
    {

        $rules = [
            'nota' => [
                'NotEmpty' => 'Campo {%s} é necessário '
            ],
            'motivo' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'email' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ]
        ];


        $this->params = array_merge($this->params,
            [
            'ccm' => $this->getProvider()->getCCM(),
            'cnpj' => $this->getProvider()->getDocument(),
            'senha' => $this->getProvider()->getPWD(),
            ]
        );

        (new FieldsValidator)->rules($rules)->validate( $this->params);

        return $this;
    }

    public function getCallDeleteName()
    {
        return 'CancelarNota';
    }

    public function getKeyIndexDeleteName(){
        return 'tcDadosCancelaNota';
    }
}
