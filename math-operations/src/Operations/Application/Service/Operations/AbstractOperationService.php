<?php

namespace App\Operations\Application\Service\Operations;

abstract class AbstractOperationService
{
    protected float $operatorA;
    protected float $operatorB;

    public function __construct(float $operatorA, float $operatorB = 0.0){
        $this->operatorB = $operatorB;
        $this->operatorA = $operatorA;
    }

    abstract protected function getResult(): float;
}
