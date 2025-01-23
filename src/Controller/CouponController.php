<?php

namespace App\Controller;

use App\Repository\CouponRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CouponController extends AbstractController
{
    #[Route('/api/coupons/acheter', name: 'acheter_coupon', methods: ['POST'])]
    public function acheterCoupon(Request $request, CouponRepository $couponRepository, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $coupon = $couponRepository->find($data['coupon_id']);

        if (!$coupon) {
            return new JsonResponse(['message' => 'Coupon non trouvé'], Response::HTTP_NOT_FOUND);
        }

        $user = $this->getUser();
        if (!$user) {
            return new JsonResponse(['message' => 'Utilisateur non authentifié'], Response::HTTP_UNAUTHORIZED);
        }

        if ($coupon->getAcheteur()) {
            return new JsonResponse(['message' => 'Coupon déjà acheté'], Response::HTTP_BAD_REQUEST);
        }

        $coupon->setAcheteur($user);
        $em->persist($coupon);
        $em->flush();

        return new JsonResponse(['message' => 'Coupon acheté avec succès'], Response::HTTP_OK);
    }

}
