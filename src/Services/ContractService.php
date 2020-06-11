<?php

namespace Pack\Padrao\Services;

use Exception;
use Pack\Padrao\Entities\Contracts\ContractEntity;
use Pack\Padrao\Factory\Contracts\ContractsFactory;
use Pack\Padrao\Helper\CheckerHelper;

class ContractService extends BaseService
{


    /**
     * @var ContractsFactory
     */
    private $contractsFactory;

    public function __construct()
    {
        $this->contractsFactory = new ContractsFactory(new CheckerHelper());
    }

    /**
     * @param object $json
     * @return mixed
     * @throws Exception
     */
    public function getContractList(object $json)
    {

        $entity = $this->contractsFactory->createEntity($json);

        if (!$entity instanceof ContractEntity) {
            if (isset($entity['success']) && !$entity['success']) {
                return $entity;
            }
        }

        $entity;


//        $this->login();
//
//        $httpClient = $this->httpClient;
//        $response = $httpClient->post('ListaDeContrato', [RequestOptions::JSON => $contract->jsonSerialize()]);
//        return $this->normalizeReturn($response);
    }


}
