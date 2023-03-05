<?php

namespace App\Operations\Application\Service\Operations;

class SquareRootOperationService extends AbstractOperationService
{

    public function getResult(): float
    {
        return sqrt($this->operatorA);
    }
}
