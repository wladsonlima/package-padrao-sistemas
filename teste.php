<?php

use Pack\Padrao\Services\ContractService;

require 'vendor\autoload.php';


$contractService = new ContractService();

$json = '{"cpf": "","number": 0}';
$json = json_decode($json);

try {
    $contractService->getContractList($json);
} catch (Exception $e) {
    dump($e->getMessage());
}
