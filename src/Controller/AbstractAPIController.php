<?php

declare(strict_types=1);

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AbstractAPIController
 *
 * @author Steve Rayner stephen.rayner@marmalade.co.uk
 * @package App\Controller
 */
class AbstractAPIController extends AbstractFOSRestController
{
    protected function respond($data, int $statusCode = Response::HTTP_OK): Response
    {
        return $this->handleView($this->view($data, $statusCode));
    }
}
