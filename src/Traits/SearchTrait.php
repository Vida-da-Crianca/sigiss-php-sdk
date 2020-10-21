<?php


namespace CarlosOCarvalho\Sigiss\Traits;

use CarlosOCarvalho\Sigiss\Validators\FieldsValidator;

trait SearchTrait
{


    public function makeSearch($data = [])
    {
        // dump($this->getProvider()->getCCM());
        $rules = [
            'nota' => [
                'NotEmpty' => 'Campo {%s} é necessário '
            ],
            'serie' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'autenticidade' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'valor' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ]
        ];

        (new FieldsValidator)->rules($rules)->validate($data);
        
        return [
            'tcDadosConsultaNota' => array_merge([
                // 'nota' => $this->id,
                // 'serie' => $this->serie,
                // 'autenticidade' => $auth ,
                // 'valor' =>  $this->price,
                'prestador_ccm' => $this->getProvider()->getCCM(),
                'prestador_cnpj' => $this->getProvider()->getDocument(),
            ], $data)
        ];
    }

    public function getCallSearchName()
    {
        return 'ConsultarNotaValida';
    }
}
