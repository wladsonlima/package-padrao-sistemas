<?php

namespace pack\padrao\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use pack\padrao\Entities\Login;

use function GuzzleHttp\json_decode;

abstract class BaseService
{

    /**
     * @var Client $httpClient
     */
    protected $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client([
            'base_uri' => 'https://wcfcrediokpadrao.azurewebsites.net/WCFCrediok.svc/',
            'timeout' => 2.0,
            'cookies' => true
        ]);
    }

    /**
     * @return mixed
     * @throws \Exception
     */
    protected function login()
    {

        $loginEntity = new Login();
        $client = $this->httpClient;
        $response = $client->post('Login', [RequestOptions::JSON => $loginEntity->jsonSerialize()]);

        return $this->normalizeReturn($response);
    }

    protected function normalizeReturn(Response $response)
    {

        $content = json_decode($response->getBody()->getContents());

        if ($response->getStatusCode() != 200) {
            throw new \Exception($response->getStatusCode());
        }

        switch ($content->Resposta) {
            case 'Erro':
                throw new \Exception($content->MsgResposta);
                break;
            case 'Alert':
            case 'OK':
                return $content;
                break;
        }
    }
}
