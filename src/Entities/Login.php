<?php

namespace pack\padrao\Entities;

class Login implements \JsonSerializable
{


    private $Usuario;
    private $Senha;


    public function __construct()
    {
        $this->Usuario = getenv("PADRAO_USER");
        $this->Senha = getenv("PADRAO_PASS");
    }

    /**
     * @return string
     */
    public function getUsuario(): string
    {
        return $this->Usuario;
    }

    /**
     * @return string
     */
    public function getSenha(): string
    {
        return $this->Senha;
    }


    public function jsonSerialize()
    {
        return [
            'Usuario' => $this->getUsuario(),
            'Senha' => $this->getSenha()
        ];
    }
}
