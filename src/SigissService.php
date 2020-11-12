<?php

namespace CarlosOCarvalho\Sigiss;

use CarlosOCarvalho\Sigiss\Contracts\ProviderContract;
use CarlosOCarvalho\Sigiss\Exceptions\SearchException;
use CarlosOCarvalho\Sigiss\Traits\CreateTrait;
use CarlosOCarvalho\Sigiss\Traits\DeleteTrait;
use CarlosOCarvalho\Sigiss\Traits\SearchTrait;
use Exception;
use SoapClient;
use stdClass;

/**
 * SigissService
 */
class SigissService
{

    use SearchTrait, CreateTrait, DeleteTrait;
    /**
     * Undocumented variable
     *
     * @var ProviderContract
     */
    private  $provider;



    /**
     * Undocumented variable
     *
     * @var SoapClient
     */
    private $client;


    public $keyIndexName = null;

    public $callFuncName;

    /**
     * Undocumented function
     *
     * @param Array $params
     */
    private $params = [];

    public function __construct(ProviderContract $provider)
    {    
        $this->provider =  $provider;
        $this->initialize();
    }

    /**
     * Undocumented function
     *
     * @return ProviderContract
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Undocumented function
     *
     * @return SoapClient
     */
    public function getClientSoap()
    {
        return $this->client;
    }
    public static function run($data)
    {


        // $url = $this->provider->getURL(); //'https://barretos.sigiss.com.br/barretos/ws/sigiss_ws.php?wsdl';
        // $client  = new SoapClient($url);


        // try {
        //     $arrContextOptions = array("ssl" => array("verify_peer" => false, "verify_peer_name" => false, 'crypto_method' => STREAM_CRYPTO_METHOD_TLS_CLIENT));

        //     $options = array(
        //         'soap_version' => SOAP_1_1,
        //         'exceptions' => true,
        //         'trace' => 1,
        //         'cache_wsdl' => WSDL_CACHE_NONE,
        //         'stream_context' => stream_context_create($arrContextOptions)
        //     );
        //     $client = new SoapClient($url, $options);
        //     // dump($client->__getFunctions());

        //     // dump( $client->__getTypes());

        //     $result =  $client->__soapCall('ConsultarNotaPrestador', array(

        //         'tcDadosPrestador' => [
        //             'ccm' => '15556',
        //             'cnpj' => '05460684000128',
        //             'senha' => '1234',
        //             'crc' => 'SP',
        //             'crc_estado' => 'SP',
        //             'aliquota_simples' => '2,8900',


        //         ],
        //         ''

        //     ));

        //     /***
        //      *  // 'tcDadosConsultaNota' => [
        //             //     'nota'=> '000000003271',
        //             //     'serie' => 1,
        //             //     'autenticidade' => 'KQZLSBO2',
        //             //     'valor' => '474,00',
        //             //     'prestador_ccm' => '15556',
        //             //     'prestador_cnpj' => '05460684000128',
        //             // ]
        //      */



        //     dump($result);
        // } catch (\Exception $e) {
        //     $response = $client->__getLastResponse();
        //     print_r($response);
        //     // $response = str_replace("&#x1A",'',$response); ///My Invalid Symbol
        //     // $response = str_ireplace(array('SOAP-ENV:','SOAP:'),'',$response);
        //     // $response = simplexml_load_string($response);
        // }
    }



    /**
     * params
     *
     * @param  mixed $params
     * @return SigissService
     */
    public function params(array $params = []): SigissService
    {
        $this->params = $params;
        return $this;
    }
       
    /**
     * fire
     *
     * @return stdClass
     */
    public function fire(): stdClass
    {    
        if (!$this->callFuncName or !$this->keyIndexName)
            throw new Exception("CallFunc or KeyName not defined");
        return     (object) $this->getClientSoap()->__soapCall($this->callFuncName, [$this->keyIndexName => $this->getBody()]);
    }

    /**
     * search
     *
     * @return void
     */
    public function search()
    {
        $this->makeSearch();
        $this->keyIndexName = $this->getIndexSearchName();
        $this->callFuncName = $this->getCallSearchName();

        return $this;
    }


    /**
     * create
     *
     * @return stdClass
     */
    public function create(): SigissService
    {

        $this->makeCreate();
        $this->keyIndexName = $this->getIndexCreateName();
        $this->callFuncName = $this->getCallCreateName();

        return $this;
    }




    /**
     * cancel
     *
     * @return stdClass
     */
    public function cancel(): SigissService
    {

        $this->makeDelete();
        $this->keyIndexName = $this->getKeyIndexDeleteName();
        $this->callFuncName = $this->getCallDeleteName();

        return $this;
    }






    /**
     * initialize
     *
     * @return void
     */
    private function initialize()
    {



        $url = $this->getProvider()->getURL();

        $arrContextOptions = array("ssl" => array("verify_peer" => false, "verify_peer_name" => false, 'crypto_method' => STREAM_CRYPTO_METHOD_TLS_CLIENT));
        $options = array(
            'soap_version' => SOAP_1_1,
            'exceptions' => true,
            'trace' => 1,
            'cache_wsdl' => WSDL_CACHE_NONE,
            'stream_context' => stream_context_create($arrContextOptions)
        );
        $this->client = new SoapClient($url, $options);
    }


    public function getBody()
    {
        return $this->params;
    }
}
