<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Entity\Student;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/students', name: 'api_students_')]
class ApiStudentController extends AbstractController
{
    #[Route('', methods: ['GET'], name: 'list')]
    public function list(EntityManagerInterface $em): JsonResponse
    {
        $students = $em->getRepository(Student::class)->findAll();
        $data = [];

        foreach ($students as $student) {
            $data[] = [
                'name' => $student->getName(),
                'age' => $student->getAge(),

            ];
        }

        return new JsonResponse($data);
    }

    #[Route('/{id}', methods: ['GET'], name: 'show')]
    public function show(Student $student): JsonResponse
    {
        $data = [
            'id' => $student->getId(),
            'name' => $student->getName(),
            'age' => $student->getAge(),

        ];

        return new JsonResponse($data);
    }

    #[Route('', methods: ['POST'], name: 'create')]
    public function create(Request $request, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $student = new Student();
        $student->setName($data['name']);
        $student->setAge($data['age']);


        $em->persist($student);
        $em->flush();

        return new JsonResponse(['status' => 'Student created'], 201);
    }

    #[Route('/{id}', methods: ['PUT', 'PATCH'], name: 'update')]
    public function update(Request $request, Student $student, EntityManagerInterface $em): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        if (isset($data['name'])) {
            $student->setName($data['name']);
        }
        if (isset($data['age'])) {
            $student->setAge($data['age']);
        }


        $em->flush();

        return new JsonResponse(['status' => 'Student updated']);
    }

    #[Route('/{id}', methods: ['DELETE'], name: 'delete')]
    public function delete(Student $student, EntityManagerInterface $em): JsonResponse
    {
        $em->remove($student);
        $em->flush();

        return new JsonResponse(['status' => 'Student deleted']);
    }
}
