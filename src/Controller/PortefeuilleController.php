<?php

namespace App\Controller;

use App\Repository\CouponRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PortefeuilleController extends AbstractController
{
    #[Route('/api/coupons/portefeuille', name: 'portefeuille_coupons', methods: ['GET'])]
    public function getPortefeuilleCoupons(CouponRepository $couponRepository): JsonResponse
    {
        $user = $this->getUser(); // L'utilisateur connecté grâce au JWT
        if (!$user) {
            return new JsonResponse(['message' => 'Utilisateur non authentifié'], Response::HTTP_UNAUTHORIZED);
        }

        $coupons = $couponRepository->findBy(['acheteur' => $user]);

        return $this->json($coupons, Response::HTTP_OK);
    }
}