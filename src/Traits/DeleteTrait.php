<?php


namespace CarlosOCarvalho\Sigiss\Traits;


use CarlosOCarvalho\Sigiss\Validators\FieldsValidator;

trait DeleteTrait
{


    public function makeDelete($data)
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

        (new FieldsValidator)->rules($rules)->validate($data);




        return [
            'tcDadosCancelaNota' => array_merge([
                'ccm' => $this->getProvider()->getCCM(),
                'cnpj' => $this->getProvider()->getDocument(),
                'senha' => $this->getProvider()->getPWD(),
            ], $data)
        ];
    }

    public function getCallDeleteName()
    {
        return 'CancelarNota';
    }
}
