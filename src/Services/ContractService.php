<?php

namespace pack\padrao\Services;

use Exception;
use GuzzleHttp\RequestOptions;
use pack\padrao\Entities\ContractEntity;

class ContractService extends BaseService
{

    /**
     * @param string $cpf
     * @param int $contractNumber
     * @return mixed
     * @throws Exception
     */
    public function getContractList(string $cpf, int $contractNumber)
    {
        $contract = new ContractEntity($cpf, $contractNumber);

        $this->login();

        $httpClient = $this->httpClient;
        $response = $httpClient->post('ListaDeContrato', [RequestOptions::JSON => $contract->jsonSerialize()]);
        return $this->normalizeReturn($response);
    }

    /**
     * @param string $cpf
     * @param int $contractNumber
     * @return mixed
     * @throws Exception
     */
    public function getContractInstallmentsList(string $cpf, int $contractNumber)
    {
        $contract = new ContractEntity($cpf, $contractNumber);

        $this->login();

        $httpClient = $this->httpClient;
        $response = $httpClient->post('ListaDeContratoPrestacoes', [RequestOptions::JSON => $contract->jsonSerialize()]);
        return $this->normalizeReturn($response);
    }


}
