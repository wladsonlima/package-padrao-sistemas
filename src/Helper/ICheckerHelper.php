<?php

namespace Pack\Padrao\Helper;

interface ICheckerHelper
{

    public function checkEntityValidator(object $entity);

    public function checkAllPropertiesJsonOfArray(object $entity, array $fields);
}
