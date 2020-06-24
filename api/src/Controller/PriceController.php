<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\PriceCalculator;

/**
 * @Route("/price")
 */
class PriceController extends AbstractController
{
    /**
     * @Route("/calculate", name="api_price_calculate", methods={"GET"})
     */
    public function calculate(Request $request, PriceCalculator $priceCalculator, $distance, $startTime, $duration): JsonResponse
    {
        return new JsonResponse([
            "price" => $priceCalculator->calculate($distance, $startTime, $duration)
        ]);
    }
}
