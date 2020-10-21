<h3>SIG-ISS PHP SDK  FOR NOTA FISCAL DE SERVIÇO</h3>



<strong>Configure</strong>

```php


use CarlosOCarvalho\Sigiss\Drivers\Barretos;
use CarlosOCarvalho\Sigiss\Provider;
use CarlosOCarvalho\Sigiss\SigissService;



$config = new Barretos([
    'name' => 'Razao Social',
    'description' => '',
    'phone' => '(17) 3322-3777',
    'ccm' => '15556',//ccm 
    'document' => '******', //cnpj
    'password' => '****', // password
    'crc' => '******', // contador crc
    'crc_state' => 'SP', 
    'url' => 'https://barretos.sigiss.com.br/barretos/ws/sigiss_ws.php?wsdl',
    'simple_rate' => '2,8900%',// calculo aliquota
    'code_service' => 801, // codigo do servico
    'condition' =>  'T', // situacao


]);
$provider = new Provider($config); /// provider use in SigIssService

```



<strong>Search NFS (Pesquisando Nota Valida) </strong>


```php


use CarlosOCarvalho\Sigiss\Drivers\Barretos;
use CarlosOCarvalho\Sigiss\Provider;
use CarlosOCarvalho\Sigiss\SigissService;




$service  =  new SigissService($provider);
$service->search('3271', 'KQZL-SBO2', '474,00');

```

<strong>Create NFS </strong>

```php


use CarlosOCarvalho\Sigiss\Drivers\Barretos;
use CarlosOCarvalho\Sigiss\Provider;
use CarlosOCarvalho\Sigiss\SigissService;


$provider = new Provider($config);
$service  =  new SigissService($provider);

$data  = [
    'valor' => '10,6',
    'base'  => '10,6',
    'descricaoNF' => 'Apenas uma descricao de uma nota teste',
    'tomador_tipo' => 2,
    'tomador_cnpj' => '*****', //cnoj da empresa
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
try{
$response = $service->create($data);
  dump($response);
}catch(\Exception $e){
    dump($e->getMessage());
}

```



<strong>Cancel NFS </strong>


```php


use CarlosOCarvalho\Sigiss\Drivers\Barretos;
use CarlosOCarvalho\Sigiss\Provider;
use CarlosOCarvalho\Sigiss\SigissService;


$data = [
    'nota'=> 3338,
    'email' => 'example@gmail.com',
    'motivo' => 'Nota de teste para criacao do SDK'
    
];
try{
    $response = $service->params($data)->cancel();
    dump($response);
}catch(\Exception $e){
    dump($e->getMessage());
}

```