<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ApiController extends AbstractController
{
    #[Route('/hello', name: 'hello_api')]
    public function hello(): Response
    {
        return new Response('Hello World');
    }

    #[Route('/users', name: 'users_api')]
    public function users(): Response
    {
        return new JsonResponse([
            ['id' => 1, 'name' => 'John Doe'],
            ['id' => 2, 'name' => 'Jane Doe'],
        ]);
    }
}
