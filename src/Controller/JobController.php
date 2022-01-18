<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Job;
use App\Form\Type\JobType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;

class JobController extends AbstractAPIController
{
    public function indexAction(ManagerRegistry $doctrine): Response
    {
        $jobs = $doctrine->getRepository(Job::class)->findAll();

        return $this->json($jobs);
    }

    public function createAction(ManagerRegistry $doctrine, Request $request): Response
    {
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
}
