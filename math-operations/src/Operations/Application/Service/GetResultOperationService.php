<?php

namespace App\Operations\Application\Service;

use App\Operations\Application\Service\Operations\AddAbstractOperationService;
use App\Operations\Application\Service\Operations\DivideOperationService;
use App\Operations\Application\Service\Operations\ExponentialOperationService;
use App\Operations\Application\Service\Operations\MultiplyOperationService;
use App\Operations\Application\Service\Operations\PercentageOperationService;
use App\Operations\Application\Service\Operations\SquareRootOperationService;
use App\Operations\Application\Service\Operations\SubtractOperationService;
use App\Operations\Domain\Model\Operation;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class GetResultOperationService
{
    public function execute(Operation $operation): float
    {
       switch ($operation->operation()){
           case 'add':
                $addOperation = new AddAbstractOperationService($operation->operatorA(), $operation->operatorB());
                $result = $addOperation->getResult();
                break;
           case 'subtract':
               $subtract = new SubtractOperationService($operation->operatorA(), $operation->operatorB());
               $result = $subtract->getResult();
               break;
           case 'multiply':
               $multiply = new MultiplyOperationService($operation->operatorA(), $operation->operatorB());
               $result = $multiply->getResult();
               break;
           case 'divide':
               $divide = new DivideOperationService($operation->operatorA(), $operation->operatorB());
               $result = $divide->getResult();
               break;
           case 'square-root':
               $sqr = new SquareRootOperationService($operation->operatorA());
               $result = $sqr->getResult();
               break;
           case 'exponential':
               $exponential = new ExponentialOperationService($operation->operatorA(), $operation->operatorB());
               $result = $exponential->getResult();
               break;
           case 'percentage':
               $percentage = new PercentageOperationService($operation->operatorA(), $operation->operatorB());
               $result = $percentage->getResult();
               break;
           default:
               throw new BadRequestException('Operation Not Found');
       }

       return round($result, 2);
    }
}
