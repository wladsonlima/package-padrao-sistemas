<?php

namespace pack\padrao\Entities;

use DateTime;

class ContractEntity implements \JsonSerializable
{

    private $cpf;
    private $number;
    private $baseDate;

    /**
     * ContractEntity constructor.
     * @param $cpf
     * @param $number
     */
    public function __construct(string $cpf, int $number)
    {
        $this->cpf = $cpf;
        $this->number = $number;
        $this->baseDate =  DateTime::createFromFormat(
            'Ymd',
            date("Ymd"),
            new \DateTimeZone('America/Sao_Paulo')
        );
    }

    /**
     * @return mixed
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @return mixed
     */
    public function getBaseDate()
    {
        return $this->baseDate;
    }


    public function jsonSerialize()
    {
        return [
            'CPF' => $this->getCpf(),
            'Contrato' => $this->getNumber(),
            'DataBase' => $this->getBaseDate()->format('Ymd')
        ];
    }
}
