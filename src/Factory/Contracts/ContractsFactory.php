<?php

namespace Pack\Padrao\Factory\Contracts;

use Pack\Padrao\Entities\Contracts\ContractEntity;
use Pack\Padrao\Factory\IEntityFactory;
use Pack\Padrao\Helper\CheckerHelper;
use Pack\Padrao\Helper\ICheckerHelper;

class ContractsFactory implements IEntityFactory
{


    /**
     * @var CheckerHelper
     */
    private $checkerHelper;

    public function __construct(ICheckerHelper $ICheckerHelper)
    {
        $this->checkerHelper = new $ICheckerHelper();
    }

    public function createEntity(object $json)
    {
        $this->checkAllProperties($json);

        $entity = new ContractEntity($json->cpf, $json->number);
        $returnValidateEntity = $this->validateEntity($entity);

        if (!$returnValidateEntity['success']) {
            return $returnValidateEntity;
        }
        return $entity;
    }

    public function checkAllProperties(object $json)
    {
        $fields = ['cpf', 'number'];
        $this->checkerHelper->checkAllPropertiesJsonOfArray($json, $fields);
    }

    public function validateEntity(object $entity)
    {
        return $this->checkerHelper->checkEntityValidator($entity);
    }

}
