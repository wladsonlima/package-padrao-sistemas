<?php

use pack\padrao\Services\BaseService;


require 'vendor/autoload.php';

const USUARIO = '';
const SENHA = '';

$login = new BaseService();

$retornLogin  = $login->login();

dump($retornLogin);

//
//$client = new Client([
//    // Base URI is used with relative requests
//    'base_uri' => 'https://wcfcrediokpadrao.azurewebsites.net/WCFCrediok.svc/',
//    // You can set any number of default request options.
//    'timeout' => 2.0,
//    'cookies' => true
//]);
//
//$response = $client->post('Login',
//    [
//        GuzzleHttp\RequestOptions::JSON => ['Usuario' => 'api-crediok', 'Senha' => 's2{4ZVY*<-+{Dp?']
//    ]);
//
//
//$responseProposal = $client->post('ListaDeContrato',
//    [GuzzleHttp\RequestOptions::JSON => ['CPF' => '05626937935', 'Contrato' => 0, 'DataBase' => 20200513]
//    ]);
//
//$responseProposal;
//
//dump($responseProposal);



