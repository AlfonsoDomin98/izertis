<?php

namespace App\Operations\Application\Service\Operations;

class SubtractOperationService extends AbstractOperationService
{
    public function getResult(): float
    {
        return $this->operatorA - $this->operatorB ;
    }
}
