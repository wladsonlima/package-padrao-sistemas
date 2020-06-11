<?php

use pack\padrao\Services\BaseService;
use pack\padrao\Services\ContractService;

require 'vendor/autoload.php';
$_ENV['PADRAO_USER'] = 'api-crediok';
$_ENV['PADRAO_PASS'] = 's2{4ZVY*<-+{Dp?';

$login = new ContractService();

$retornLogin = $login->getContractList('05626937935', 0);

dump($retornLogin);