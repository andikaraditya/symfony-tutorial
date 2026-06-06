<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiController extends AbstractController
{
    #[Route('/hello', methods: ['GET'], name: 'hello_api')]
    public function hello(): Response
    {
        return new Response('Hello World');
    }

    #[Route('/users', methods: ['GET'], name: 'users_api')]
    public function users(): Response
    {
        return new JsonResponse([
            ['id' => 1, 'name' => 'John Doe'],
            ['id' => 2, 'name' => 'Jane Doe'],
        ]);
    }

    #[Route('/users/{id}', methods: ['GET'])]
    public function user(int $id): JsonResponse
    {
        return new JsonResponse([
            'id' => $id,
            'name' => 'John'
        ]);
    }

    #[Route('/users', methods: ['POST'])]
    public function createUser(Request $request): JsonResponse
    {
        $data = json_decode(
            $request->getContent(),
            true
        );

        return new JsonResponse([
            'message' => 'User created',
            'data' => $data
        ]);
    }
}
