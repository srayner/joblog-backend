<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Property;
use App\Form\Type\PropertyType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PropertyController extends AbstractAPIController
{
    public function indexAction(ManagerRegistry $doctrine): Response
    {
        $properties = $doctrine->getRepository(Property::class)->findAll();

        return $this->json($properties);
    }

    public function createAction(ManagerRegistry $doctrine, Request $request): Response
    {
        $form = $this->createForm(PropertyType::class);
        $form->submit($request->request->all());

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->respond($form, Response::HTTP_BAD_REQUEST);
        }
        $property = $form->getData();

        $entityManager = $doctrine->getManager();
        $entityManager->persist($property);
        $entityManager->flush();

        return $this->respond($property);
    }
}
