<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class UserController
 *
 * @author Steve Rayner stephen.rayner@marmalade.co.uk
 * @package App\Controller
 */
class UserController extends AbstractAPIController
{
    public function indexAction(ManagerRegistry $doctrine): Response
    {
        $users = $doctrine->getRepository(User::class)->findAll();

        return $this->json($users);
    }
}
