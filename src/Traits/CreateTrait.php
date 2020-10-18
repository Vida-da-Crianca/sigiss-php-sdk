<?php


namespace CarlosOCarvalho\Sigiss\Traits;


trait CreateTrait
{


    public function makeCreate($data)
    {
        // dump($this->getProvider()->getCCM());
       
        // dump($auth);
        return [
            'tcDescricaoRps' => array_merge([
                'ccm' => $this->getProvider()->getCCM(),
                'cnpj' => $this->getProvider()->getDocument(),
                'senha'=> $this->getProvider()->getPWD(),
                'crc' =>  $this->getProvider()->getCRC(),
                'situacao' =>  $this->getProvider()->getCondition(),
                'servico' => $this->getProvider()->getCodeService(),
                'crc_estado' =>  $this->getProvider()->getCRCState(),
                'aliquota_simples' => $this->getProvider()->getSimpleRate(),
                'tomador_ie' => '',
                'tomador_im' => '',
                'tomador_razao' => $this->getProvider()->getName(),
                'tomador_fantasia' => $this->getProvider()->getName(),
                'tomador_complemento'=> $this->getProvider()->getDescription(),
                'tomador_fone'=> $this->getProvider()->getPhone(),
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


            ], $data)
        ];
    }

    public function getCallCreateName()
    {
        return 'GerarNota';
    }
}
