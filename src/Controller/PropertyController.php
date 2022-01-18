<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Property;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class PropertyController
 *
 * @author Steve Rayner stephen.rayner@marmalade.co.uk
 * @package App\Controller
 */
class PropertyController extends AbstractAPIController
{
    public function indexAction(ManagerRegistry $doctrine): Response
    {
        $properties = $doctrine->getRepository(Property::class)->findAll();

        return $this->json($properties);
    }
}
