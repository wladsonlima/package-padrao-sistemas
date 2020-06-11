<?php

namespace Pack\Padrao\Factory;

interface IEntityFactory
{
    public function createEntity(object $json);
    public function checkAllProperties(object $json);
    public function validateEntity(object $entity);

}
