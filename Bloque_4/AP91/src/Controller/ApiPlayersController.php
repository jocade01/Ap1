<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\PlayerCard;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/AP91/player', name: 'api_players_')]
class ApiPlayersController extends AbstractController
{
    #[Route('', methods: ['GET'], name: 'list')]
    public function list(EntityManagerInterface $em): JsonResponse
    {
        $players = $em->getRepository(PlayerCard::class)->findAll();
        $data = [];

        foreach ($players as $player) {
            $data[] = [
                'name' => $player->getName(),
                'surname' => $player->getSurname(),
                'age' => $player->getAge(),
                'currentTeam' => $player->getCurrentTeam(),
                'goalsScored' => $player->getGoalsScored(),
                'cardsReceived' => $player->getCardsReceived(),
                'birthDate' => $player->getBirthDate()->format('Y-m-d'),
            ];
        }

        return new JsonResponse($data);
    }

    #[Route('/{id}', methods: ['GET'], name: 'show')]
    public function show(PlayerCard $player): JsonResponse
    {
        $data = [
            'id' => $player->getId(),
            'name' => $player->getName(),
            'surname' => $player->getSurname(),
            'age' => $player->getAge(),
            'currentTeam' => $player->getCurrentTeam(),
            'goalsScored' => $player->getGoalsScored(),
            'cardsReceived' => $player->getCardsReceived(),
            'birthDate' => $player->getBirthDate()->format('Y-m-d'),
        ];

        return new JsonResponse($data);
    }

    #[Route('', methods: ['POST'], name: 'create')]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $player = new PlayerCard();
        $player->setName($data['name']);
        $player->setSurname($data['surname']);
        $player->setAge($data['age']);
        $player->setCurrentTeam($data['currentTeam']);
        $player->setGoalsScored($data['goalsScored']);
        $player->setCardsReceived($data['cardsReceived']);
        $player->setBirthDate(new \DateTime());

        $em->persist($player);
        $em->flush();

        return new JsonResponse(['status' => 'PlayerCard created'], 201);
    }

    #[Route('/{id}', methods: ['PUT', 'PATCH'], name: 'update')]
    public function update(Request $request, PlayerCard $player, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['name'])) {
            $player->setName($data['name']);
        }
        if (isset($data['age'])) {
            $player->setAge($data['age']);
        }
        if (isset($data['currentTeam'])) {
            $player->setCurrentTeam($data['currentTeam']);
        }
        if (isset($data['goalsScored'])) {
            $player->setGoalsScored($data['goalsScored']);
        }
        if (isset($data['cardsReceived'])) {
            $player->setCardsReceived($data['cardsReceived']);
        }
        if (isset($data['birthDate'])) {
            $player->setBirthDate(new \DateTime($data['birthDate']));
        }

        $em->flush();

        return new JsonResponse(['status' => 'PlayerCard updated']);
    }

    #[Route('/{id}', methods: ['DELETE'], name: 'delete')]
    public function delete(PlayerCard $player, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($player);
        $em->flush();

        return new JsonResponse(['status' => 'PlayerCard deleted']);
    }
}
