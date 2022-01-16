<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Job;
use App\Entity\Property;
use App\Form\Type\JobType;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpKernel\Exception\HttpException;

class JobController extends AbstractFOSRestController
{
    public function indexAction(ManagerRegistry $doctrine): Response
    {
        $jobs = $doctrine->getRepository(Job::class)->findAll();

        return $this->json($jobs);
    }

    public function createAction(ManagerRegistry $doctrine, Request $request): Response
    {
    //    //TODO: refactor this away
    //    $property = new Property();
    //    $property->setName('Example first property');
    //    $entityManager->persist($property);

        $form = $this->createForm(JobType::class);
        $form->submit($request->request->all());

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->respond($form, Response::HTTP_BAD_REQUEST);
        }
        $job = $form->getData();
        $job->setStatus('open');

        $entityManager = $doctrine->getManager();
        $entityManager->persist($job);
        $entityManager->flush();

        return $this->respond($job);
    }

    protected function respond($data, int $statusCode = Response::HTTP_OK)
    {
        return $this->handleView($this->view($data, $statusCode));
    }
}
