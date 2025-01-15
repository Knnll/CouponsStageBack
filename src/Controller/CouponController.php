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
    #[Route('/api/coupons/acheter', name: 'app_coupon_acheter', methods: ["POST"])]
    public function acheterCoupon(
        Request $request,
        CouponRepository $couponRepository,
        EntityManagerInterface $entityManager,
    ): JsonResponse {
        // On récupère le contenu de la requête
        $data = json_decode($request->getContent(), true);

        // On vérifie que l'id du coupo est présent
        if (!isset($data['coupon_id'])) {
            return new JsonResponse(['erreur' => 'ID du coupon manquant'], 400);
            // (400 = bad request)
        }

        $couponId = $data['coupon_id'];

        // On récupère l'utilisateur qui est connecté
        $acheteur = $this->getUser();
        if (!$acheteur) {
            return new JsonResponse(['erreur' => 'L\'utilisateur n\'est pas connecté'], 401);
            // (401 = unauthorized)
        }

        // On vérifie également que le coupon existe
        $coupon = $couponRepository->find($couponId);
        if (!$coupon) {
            return new JsonResponse(['erreur' => 'Coupon introuvable'], 404);
            // (404 = not found)
        }

        // On vérifie si le coupon a déjà un acheteur
        if ($coupon->getAcheteur() !== null) {
            return new JsonResponse(['erreur' => 'Le coupon a déjà été acheté !'], 409);
            // (409 = conflict)
        }

        // Une fois toutes ces vérifications faites, on associe l'utilisateur connecté au coupon:
        $coupon->setAcheteur($acheteur);

        // On sauvegarde ces modifications en BDD !
        $entityManager->persist($coupon);
        $entityManager->flush();

        // Et on retourne une réponse JSON de succès !
        return new JsonResponse([
            'message' => 'Coupon acheté avec succès !',
            'coupon_id' => $coupon->getId(),
            'acheteur' => $acheteur->getId()
        ], 200);
        // (200 = OK)
    }
}
