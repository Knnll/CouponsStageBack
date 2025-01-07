<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class UtilisateurController extends AbstractController
{
    #[Route('/api/users/details', name: 'app_utilisateur-details', methods: ["POST"])]
    public function utilisateurDetails(Request $requete, UserRepository $userRepository): JsonResponse
    {
        /* La doc conseille cette approche, mais je n'arrive pas à le faire fonctionner */

        // On crée un objet Request qui contiendra toutes les infos de la requête
        // Source : https://symfony.com/doc/7.1/components/http_foundation.html#identifying-a-request
        //
        //        $requete = Request::createFromGlobals();
        //        $email = $requete->attributes->get('email');

        // On décode le corps de la requête et on le retourne sous forme de tableau associatif

        $parametres = json_decode($requete->getContent(), true);
        $email = $parametres['email'];

        $infosUtilisateur = $userRepository->recupererInfosUtilisateur($email);

        return new JsonResponse(['infos' => $infosUtilisateur]);
    }
}
