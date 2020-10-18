<?php

namespace CarlosOCarvalho\Sigiss;

use CarlosOCarvalho\Sigiss\Contracts\ProviderContract;
use CarlosOCarvalho\Sigiss\Exceptions\SearchException;
use CarlosOCarvalho\Sigiss\Traits\CreateTrait;
use CarlosOCarvalho\Sigiss\Traits\SearchTrait;
use SoapClient;

/**
 * SigissService
 */
class SigissService
{

    use SearchTrait, CreateTrait;
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


    public function search($id, $authenticity, $price)
    {
        try {


            $this->id = $id;
            $this->authenticity =  $authenticity;
            $this->serie = 1;
            $this->price = $price;

            $response = (object) $this->getClientSoap()->__soapCall($this->getCallSearchName(), $this->makeSearch());

            if ($response->RetornoNota->Resultado == 0) {
                foreach ($response->DescricaoErros as $e) {
                       throw new SearchException(sprintf('Nota(%s) - %s', $e->id, strip_tags($e->DescricaoErro)));
                }
            }

            dump($response);
        } catch (\CarlosOCarvalho\Sigiss\Exceptions\SearchException $e) {

            dump($e->getMessage());
        }
    }


    public function create($data){
          
        try {


             

            // $options = $this->makeCreate($data);

           

            $response = (object) $this->getClientSoap()->__soapCall($this->getCallCreateName(), $this->makeCreate($data));

           

            dump($response);
        } catch (\Exception $e) {

            dump($e->getMessage());
        }

    }



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
}
