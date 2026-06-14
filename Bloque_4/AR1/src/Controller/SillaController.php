<?php

namespace App\Controller;

use App\Entity\Silla;
use App\Form\SillaType;
use App\Repository\SillaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/silla')]
final class SillaController extends AbstractController
{
    #[Route(name: 'app_silla_index', methods: ['GET'])]
    public function index(SillaRepository $sillaRepository): Response
    {
        return $this->render('silla/index.html.twig', [
            'sillas' => $sillaRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_silla_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $silla = new Silla();
        $form = $this->createForm(SillaType::class, $silla);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($silla);
            $entityManager->flush();

            return $this->redirectToRoute('app_silla_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('silla/new.html.twig', [
            'silla' => $silla,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_silla_show', methods: ['GET'])]
    public function show(Silla $silla): Response
    {
        return $this->render('silla/show.html.twig', [
            'silla' => $silla,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_silla_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Silla $silla, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(SillaType::class, $silla);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_silla_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('silla/edit.html.twig', [
            'silla' => $silla,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_silla_delete', methods: ['POST'])]
    public function delete(Request $request, Silla $silla, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$silla->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($silla);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_silla_index', [], Response::HTTP_SEE_OTHER);
    }
}
