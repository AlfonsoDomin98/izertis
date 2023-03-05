<?php

namespace App\Operations\Domain\Model;

class Operation
{
    private string $operation;
    private float $operatorA;
    private float $operatorB;

    public function __construct(string $operation, float $operatorA, float $operatorB = 0.0)
    {
        $this->operation = $operation;
        $this->operatorA = $operatorA;
        $this->operatorB = $operatorB;
    }

    public function operation(): string {
        return $this->operation;
    }

    public function operatorA(): float {
        return $this->operatorA;
    }

    public function operatorB(): float {
        return $this->operatorB;
    }
}
