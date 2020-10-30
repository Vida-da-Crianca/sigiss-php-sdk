<?php


namespace CarlosOCarvalho\Sigiss\Traits;

use CarlosOCarvalho\Sigiss\Validators\FieldsValidator;

trait SearchTrait
{


    public function makeSearch()
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

        $this->params = array_merge(
            $this->params,
            [
                'prestador_ccm' => $this->getProvider()->getCCM(),
                'prestador_cnpj' => $this->getProvider()->getDocument(),
            ]
        );

        (new FieldsValidator)->rules($rules)->validate($this->params);
        return $this;
    }

    public function getCallSearchName()
    {
        return 'ConsultarNotaValida';
    }

    public function getIndexSearchName()
    {
        return 'tcDadosConsultaNota';
    }
}
