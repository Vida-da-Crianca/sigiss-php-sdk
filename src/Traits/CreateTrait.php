<?php


namespace CarlosOCarvalho\Sigiss\Traits;

use CarlosOCarvalho\Sigiss\Validators\FieldsValidator;

trait CreateTrait
{


    public function makeCreate($data)
    {

        $params = array_merge([
            'ccm' => $this->getProvider()->getCCM(),
            'cnpj' => $this->getProvider()->getDocument(),
            'senha' => $this->getProvider()->getPWD(),
            'crc' =>  $this->getProvider()->getCRC(),
            'situacao' =>  $this->getProvider()->getCondition(),
            'servico' => $this->getProvider()->getCodeService(),
            'crc_estado' =>  $this->getProvider()->getCRCState(),
            'aliquota_simples' => $this->getProvider()->getSimpleRate(),
            'tomador_ie' => '',
            'tomador_im' => '',
            'tomador_razao' => $this->getProvider()->getName(),
            'tomador_fantasia' => $this->getProvider()->getName(),
            'tomador_complemento' => $this->getProvider()->getDescription(),
            'tomador_fone' => $this->getProvider()->getPhone(),
            'tomador_ramal' => '',
            'tomador_endereco' => '',
            'tomador_numero' => '',
            'tomador_complemento' => '',
            'tomador_bairro' => '',
            'tomador_CEP' => '',
            'tomador_cod_cidade' => '',
            'tomador_fax' => $this->getProvider()->getPhone(),
            'rps_dia' => '',
            'rps_mes' => '',
            'rps_ano' =>  '',
            'outro_municipio' => '',
            'cod_outro_municipio' => '',
            'retencao_iss' => '',
            'pis' => '',
            'cofins' => '',
            'inss' => '',
            'irrf' => '',
            'csll' => ''
        ], $data);


        (new FieldsValidator)->rules($this->getRulesCreate())->validate($params);

        return [
            'tcDescricaoRps' => $params
        ];
    }

    public function getCallCreateName()
    {
        return 'GerarNota';
    }


    public function getRulesCreate()
    {


        return [
            'ccm' => [
                'NotEmpty' => 'Campo {%s} é necessário '
            ],
            'cnpj' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'senha' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'crc' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'crc_estado' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_razao' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_fantasia' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_fone' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'servico' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'serie' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_cod_cidade' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_cod_cidade' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_tipo' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_cnpj' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_email' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_razao' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_endereco' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_numero' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_bairro' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_CEP' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'tomador_cod_cidade' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],

            // 'id_sis_legado' => [
            //     'NotEmpty' =>  'Campo {%s} é necessário'
            // ],
            'rps_serie' => [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'valor' =>  [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'base'  =>  [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],
            'descricaoNF' =>  [
                'NotEmpty' =>  'Campo {%s} é necessário'
            ],

        ];
    }
}
