<?php

namespace App\Operations\Application\Service\Operations;

class DivideOperationService extends AbstractOperationService
{
    public function getResult(): float
    {
        return $this->operatorA / $this->operatorB ;
    }
}
