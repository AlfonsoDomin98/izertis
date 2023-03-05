<?php

namespace App\Operations\Infrastructure\Controller;

use App\Operations\Application\Service\GetResultOperationService;
use App\Operations\Domain\Model\Operation;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("{operation}/{operatorA}/{operatorB}", methods={"GET"})
 */
class OperationsController extends AbstractController
{
    private GetResultOperationService $operationService;

    public function __construct(GetResultOperationService $operationService)
    {
        $this->operationService = $operationService;
    }

    public function __invoke(string $operation, float $operatorA, ?float $operatorB): JsonResponse
    {
        $result = $this->operationService->execute(new Operation($operation, $operatorA, $operatorB));
        return $this->json(['result' => $result]);
    }
}
