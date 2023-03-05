<?php

namespace App\Operations\Application\Service\Operations;

class PercentageOperationService extends AbstractOperationService
{

    public function getResult(): float
    {
        return ($this->operatorA * $this->operatorB) / 100;
    }
}
