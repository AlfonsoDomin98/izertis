<?php

namespace App\Operations\Application\Service\Operations;

class ExponentialOperationService extends AbstractOperationService
{

    public function getResult(): float
    {
        return $this->operatorA ** $this->operatorB;
    }
}
