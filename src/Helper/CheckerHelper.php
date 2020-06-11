<?php

namespace Pack\Padrao\Helper;

use Pack\Padrao\Exceptions\CheckerException;
use Symfony\Component\Validator\Validation;

class CheckerHelper implements ICheckerHelper
{

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CheckerHelper constructor.
     */
    public function __construct()
    {
        $this->validator = Validation::createValidator();
    }

    /**
     * @param object $entity
     * @return array|bool[]
     */
    public function checkEntityValidator(object $entity)
    {
        $errors = $this->validator->validate($entity, $entity->loadValidatorMetadata());

        if (count($errors) > 0) {
            $outErrors = ['errorsFields' => true, 'fields' => []];

            foreach ($errors as $error) {
                array_push(
                    $outErrors['fields'],
                    [
                        'field' => $error->getPropertyPath(),
                        'value' => $error->getInvalidValue(),
                        'message' => $error->getMessage()
                    ]
                );
            }
            return ['success' => false, 'message' => $outErrors];
        }

        return ['success' => true];
    }

    /**
     * Validate JSON
     * @param string $json
     * @return mixed
     * @throws CheckerException
     */
    public function isValidJSON(string $json)
    {
        $obj = json_decode($json);

        if (json_last_error() > 0) {
            throw new CheckerException("Json mal formado: " . json_last_error() . " - " . json_last_error_msg());
        }

        return $obj;
    }

    /**
     * @param object $entity
     * @param array $fields
     * @throws CheckerException
     */
    public function checkAllPropertiesJsonOfArray(object $entity, array $fields)
    {
        foreach ($fields as $field) {
            if (!property_exists($entity, $field)) {
                throw new CheckerException("Campo: " . $field . " não informado.");
            }
        }
    }
}
