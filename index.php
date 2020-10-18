<?php

use CarlosOCarvalho\Sigiss\Drivers\Barretos;
use CarlosOCarvalho\Sigiss\Provider;
use CarlosOCarvalho\Sigiss\SigissService;

require_once(__DIR__.'/vendor/autoload.php');



$config = new Barretos([
    'name' => 'ESCOLA DE ED. INF E ENSINO FUND.VIDA DE CRIANÇA LTDA',
    'description' => '',
    'phone' => '(17) 3322-3777',
    'ccm' => '15556',
    'document' => '05460684000128',
    'password' => '1234',
    'crc' => '1555603020201005',
    'crc_state' => 'SP', 
    'url' => 'https://barretos.sigiss.com.br/barretos/ws/sigiss_ws.php?wsdl',
    'simple_rate' => '2,8900%',
    'code_service' => 801, // codigo do servico
    'condition' =>  'T', // situacao


]);
$provider = new Provider($config);

dump($provider->getURL());
$service  =  new SigissService($provider);

//$service->search('3271', 'KQZL-SBO2', '474,00');

$data  = [
    'valor' => '10,6',
    'base'  => '10,6',
    'descricaoNF' => 'Apenas uma descricao de uma nota teste',
    'tomador_tipo' => 2,
    'tomador_cnpj' => '35918428003',
    'tomador_email' => 'contato@carlosorvalho.com.br',
    'tomador_razao' => 'Jose Maria dos Santos',
    'tomador_endereco' => 'Avenida Maria Trindade',
    'tomador_numero' => '2367',
    'tomador_bairro' => 'Paulista Nova',
    'tomador_CEP' => '08343320',
    'tomador_cod_cidade' => 'Barretos',
    'rps_num' => '2543122',
    'id_sis_legado' => '2543122',
    'rps_serie' => 1,
    'serie' => 1

    
];
$service->create($data);
//SigissService::addProvider($provider);
//SigissService::search( '');