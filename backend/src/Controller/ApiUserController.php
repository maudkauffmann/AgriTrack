<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

final class ApiUserController extends AbstractController
{
    #[Route('/api/user/add', name: 'api_user_add', methods: ['POST'])]
    public function add(
        Request $request,
        EntityManagerInterface $em,
        UserPasswordHasherInterface $passwordHasher
    ): JsonResponse {
        $data = json_decode($request->getContent(), true);

        if (!$data || empty($data['mdp'])) {
            return new JsonResponse(['message' => 'Mot de passe manquant'], 400);
        }

        $user = new Utilisateur();
        $user->setNomUtilisateur($data['nom'] ?? 'Anonyme');
        $user->setEmail($data['email'] ?? '');
        $user->setTelUtilisateur((string)($data['tel'] ?? '0'));
        $user->setIdRole((string)($data['role'] ?? '1'));

        $hashedPassword = $passwordHasher->hashPassword(
            $user,
            $data['mdp']
        );
        $user->setMdp($hashedPassword);

        try {
            $em->persist($user);
            $em->flush();

            return new JsonResponse([
                'status' => 'success',
                'message' => 'Utilisateur créé avec succès !'
            ], 201);

        } catch (\Exception $e) {
            return new JsonResponse([
                'status' => 'error',
                'message' => utf8_encode($e->getMessage())
            ], 500);
        }
    }
}
