<?php

namespace App\Tests\Operations\Application\Service;

use App\Operations\Application\Service\GetResultOperationService;
use App\Operations\Domain\Model\Operation;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class GetResultOperationServiceTest extends TestCase
{
    public function testExecuteOperationAdd(): void
    {
        // Setup
        $operationName = 'add';
        $operatorA = 12;
        $operatorB = 2;
        $expected = $operatorA + $operatorB;
        $operation = new Operation($operationName, $operatorA, $operatorB);
        $getResultOperationService = new GetResultOperationService();

        // Act
        $result = $getResultOperationService->execute($operation);

        // Assert
        $this->assertEquals($expected, $result);
    }

    public function testExecuteOperationSubtract(): void
    {
        // Setup
        $operationName= 'subtract';
        $operatorA = 12;
        $operatorB = 2;
        $expected = $operatorA - $operatorB;
        $operation = new Operation($operationName, $operatorA, $operatorB);
        $getResultOperationService = new GetResultOperationService();

        // Act
        $result = $getResultOperationService->execute($operation);

        // Assert
        $this->assertEquals(round($expected, 2), $result);
    }

    public function testExecuteOperationMultiply(): void
    {
        // Setup
        $operationName = 'multiply';
        $operatorA = 12;
        $operatorB = 2;
        $expected = $operatorA * $operatorB;
        $operation = new Operation($operationName, $operatorA, $operatorB);
        $getResultOperationService = new GetResultOperationService();

        // Act
        $result = $getResultOperationService->execute($operation);

        // Assert
        $this->assertEquals(round($expected, 2), $result);
    }

    public function testExecuteOperationDivide(): void
    {
        // Setup
        $operationName = 'divide';
        $operatorA = 12;
        $operatorB = 2;
        $expected = $operatorA / $operatorB;
        $operation = new Operation($operationName, $operatorA, $operatorB);
        $getResultOperationService = new GetResultOperationService();

        // Act
        $result = $getResultOperationService->execute($operation);

        // Assert
        $this->assertEquals(round(round($expected, 2), 2), $result);
    }
    public function testExecuteOperationSquareRoot(): void
    {
        // Setup
        $operationName = 'square-root';
        $operatorA = 12;
        $expected = sqrt($operatorA);
        $operation = new Operation($operationName, $operatorA);
        $getResultOperationService = new GetResultOperationService();

        // Act
        $result = $getResultOperationService->execute($operation);

        // Assert
        $this->assertEquals(round($expected, 2), $result);
    }

    public function testExecuteOperationExponential(): void
    {
        // Setup
        $operationName = 'exponential';
        $operatorA = 12;
        $operatorB = 2;
        $expected = $operatorA ** $operatorB;
        $operation = new Operation($operationName, $operatorA, $operatorB);
        $getResultOperationService = new GetResultOperationService();

        // Act
        $result = $getResultOperationService->execute($operation);

        // Assert
        $this->assertEquals(round($expected, 2), $result);
    }

    public function testExecuteOperationPercentage(): void
    {
        // Setup
        $operationName = 'percentage';
        $operatorA = 12;
        $operatorB = 2;
        $expected = ($operatorA * $operatorB) / 100;
        $operation = new Operation($operationName, $operatorA, $operatorB);
        $getResultOperationService = new GetResultOperationService();

        // Act
        $result = $getResultOperationService->execute($operation);

        // Assert
        $this->assertEquals(round($expected, 2), $result);
    }

    public function testExecuteOperationNotFound(): void
    {
        // Setup
        $operationName = 'Not Found';
        $operatorA = 12;
        $operatorB = 2;
        $operation = new Operation($operationName, $operatorA, $operatorB);
        $getResultOperationService = new GetResultOperationService();


        // Assert
        $this->expectException(BadRequestException::class);
        $this->expectExceptionMessage('Operation Not Found');

        // Act
        $result = $getResultOperationService->execute($operation);

    }
}
